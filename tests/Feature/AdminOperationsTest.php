<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Invoice;
use App\Models\PartnerLab;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminOperationsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_update_view_search_and_delete_module_records(): void
    {
        $admin = Admin::create([
            'name' => 'Operations Admin',
            'email' => 'admin@example.test',
            'password' => 'password',
        ]);
        $customer = User::factory()->create();
        $this->actingAs($admin, 'admin');

        $this->post(route('admin.kit-delivery.store'), [
            'user_id' => $customer->id,
            'delivery_address' => '123 Test Street',
            'kit_type' => 'Water Testing Kit',
            'quantity' => 2,
            'delivery_date' => '2026-10-28',
            'status' => 'pending',
        ])->assertRedirect(route('admin.kit-delivery'));
        $this->assertDatabaseHas('kit_deliveries', [
            'user_id' => $customer->id,
            'quantity' => 2,
            'status' => 'pending',
        ]);

        $this->post(route('admin.subscription-plans.store'), [
            'name' => 'Starter',
            'amount' => '19.95',
            'billing_cycle' => 'monthly',
            'status' => 'active',
        ])->assertRedirect(route('admin.subscription-plans'));
        $plan = SubscriptionPlan::firstOrFail();
        $this->get(route('admin.subscription-plans'))
            ->assertOk()
            ->assertSee('Starter');
        $this->get(route('admin.subscription-plans.show', $plan))
            ->assertOk()
            ->assertSee('Subscription plan details');
        $this->put(route('admin.subscription-plans.update', $plan), [
            'name' => 'Starter Plus',
            'amount' => '29.95',
            'billing_cycle' => 'monthly',
            'status' => 'active',
        ])->assertRedirect(route('admin.subscription-plans'));
        $this->assertDatabaseHas('subscription_plans', ['id' => $plan->id, 'name' => 'Starter Plus']);

        $this->post(route('admin.subscriptions.store'), [
            'user_id' => $customer->id,
            'subscription_plan_id' => $plan->id,
            'billing_cycle' => 'monthly',
            'amount' => '29.95',
            'start_date' => '2026-10-01',
            'status' => 'active',
        ])->assertRedirect(route('admin.subscriptions'));
        $this->assertDatabaseHas('subscriptions', [
            'user_id' => $customer->id,
            'subscription_plan_id' => $plan->id,
            'amount' => '29.95',
        ]);

        $this->post(route('admin.partner-labs.store'), [
            'lab_name' => 'Quality Lab',
            'lab_type' => 'Water Testing Laboratory',
            'email' => 'lab@example.test',
            'contact_person' => 'Lab Contact',
            'phone' => '+1 416 555 0100',
            'country' => 'Canada',
            'status' => 'active',
            'services' => ['Water Testing'],
        ])->assertRedirect(route('admin.partner-labs'));
        $lab = PartnerLab::firstOrFail();
        $this->get(route('admin.partner-labs'))
            ->assertOk()
            ->assertSee('Quality Lab');
        $this->put(route('admin.partner-labs.update', $lab), [
            'lab_name' => 'Updated Quality Lab',
            'lab_type' => 'Water Testing Laboratory',
            'email' => 'lab@example.test',
            'contact_person' => 'Lab Contact',
            'phone' => '+1 416 555 0100',
            'country' => 'Canada',
            'status' => 'active',
        ])->assertRedirect(route('admin.partner-labs'));
        $this->assertDatabaseHas('partner_labs', [
            'id' => $lab->id,
            'lab_name' => 'Updated Quality Lab',
            'services' => '[]',
        ]);

        $this->post(route('admin.technicians.store'), [
            'first_name' => 'Taylor',
            'last_name' => 'Tech',
            'email' => 'tech@example.test',
            'phone' => '+1 416 555 0101',
            'country' => 'Canada',
            'availability' => 'available',
            'employment_status' => 'active',
            'certification_status' => 'pending',
        ])->assertRedirect(route('admin.technicians'));
        $technician = Technician::firstOrFail();
        $this->get(route('admin.technicians'))
            ->assertOk()
            ->assertSee('Taylor');
        $this->get(route('admin.technicians.edit', $technician))->assertOk()->assertSee('Edit Technician');

        $this->delete(route('admin.technicians.destroy', $technician))
            ->assertRedirect(route('admin.technicians'));
        $this->assertDatabaseMissing('technicians', ['id' => $technician->id]);
    }

    public function test_invoices_validate_customer_subscription_and_calculate_total(): void
    {
        $admin = Admin::create([
            'name' => 'Operations Admin',
            'email' => 'admin@example.test',
            'password' => 'password',
        ]);
        $customer = User::factory()->create();
        $otherCustomer = User::factory()->create();
        $plan = SubscriptionPlan::create([
            'name' => 'Monthly',
            'amount' => 20,
            'billing_cycle' => 'monthly',
            'status' => 'active',
        ]);
        $subscription = Subscription::create([
            'user_id' => $customer->id,
            'subscription_plan_id' => $plan->id,
            'billing_cycle' => 'monthly',
            'amount' => 20,
            'start_date' => '2026-10-01',
            'status' => 'active',
        ]);
        $this->actingAs($admin, 'admin');

        $invoice = [
            'user_id' => $otherCustomer->id,
            'subscription_id' => $subscription->id,
            'invoice_number' => 'INV-100',
            'invoice_date' => '2026-10-01',
            'due_date' => '2026-10-31',
            'amount' => '19.99',
            'tax_amount' => '2.01',
            'status' => 'paid',
            'billing_email' => $otherCustomer->email,
        ];
        $this->post(route('admin.billing.store'), $invoice)
            ->assertSessionHasErrors('subscription_id');
        $this->assertDatabaseCount('invoices', 0);

        $invoice['user_id'] = $customer->id;
        $this->post(route('admin.billing.store'), $invoice)
            ->assertRedirect(route('admin.billing'));
        $savedInvoice = Invoice::firstOrFail();
        $this->assertSame('22.00', $savedInvoice->total);
        $this->assertNotNull($savedInvoice->paid_at);
        $this->get(route('admin.billing.show', $savedInvoice))
            ->assertOk()
            ->assertSee('Calculated total')
            ->assertSee('22.00');
    }

    public function test_admin_module_validation_and_plan_delete_protection(): void
    {
        $admin = Admin::create([
            'name' => 'Operations Admin',
            'email' => 'admin@example.test',
            'password' => 'password',
        ]);
        $customer = User::factory()->create();
        $adminCustomer = User::factory()->create(['email' => 'shadow-admin@example.test']);
        Admin::create([
            'name' => 'Legacy Admin',
            'email' => $adminCustomer->email,
            'password' => 'password',
        ]);
        $plan = SubscriptionPlan::create([
            'name' => 'Protected Plan',
            'amount' => 20,
            'billing_cycle' => 'monthly',
            'status' => 'active',
        ]);
        Subscription::create([
            'user_id' => $customer->id,
            'subscription_plan_id' => $plan->id,
            'billing_cycle' => 'monthly',
            'amount' => 20,
            'start_date' => '2026-10-01',
            'status' => 'active',
        ]);
        $this->actingAs($admin, 'admin');

        $this->post(route('admin.kit-delivery.store'), [
            'user_id' => $adminCustomer->id,
            'delivery_address' => '123 Test Street',
            'kit_type' => 'Water Testing Kit',
            'quantity' => 1,
            'delivery_date' => '2026-10-28',
            'status' => 'pending',
        ])->assertSessionHasErrors('user_id');
        $this->assertDatabaseCount('kit_deliveries', 0);

        $this->delete(route('admin.subscription-plans.destroy', $plan))
            ->assertSessionHasErrors('record');
        $this->assertDatabaseHas('subscription_plans', ['id' => $plan->id]);

        $this->post(route('admin.subscription-plans.store'), [
            'name' => 'Protected Plan',
            'amount' => 'invalid',
            'billing_cycle' => 'invalid',
            'status' => 'active',
        ])->assertSessionHasErrors(['name', 'amount', 'billing_cycle']);
    }

    public function test_admin_profile_settings_and_password_are_saved_with_validation(): void
    {
        $admin = Admin::create([
            'name' => 'Operations Admin',
            'email' => 'admin@example.test',
            'password' => 'password',
        ]);
        $this->actingAs($admin, 'admin');

        $this->get(route('admin.profile'))
            ->assertOk()
            ->assertSee('admin@example.test');
        $this->put(route('admin.profile.update'), [
            'name' => 'Updated Admin',
            'email' => 'updated-admin@example.test',
        ])->assertRedirect()
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('admins', [
            'id' => $admin->id,
            'name' => 'Updated Admin',
            'email' => 'updated-admin@example.test',
        ]);

        $this->get(route('admin.settings'))
            ->assertOk()
            ->assertSee('General and regional settings');
        $this->put(route('admin.settings.update'), [
            'support_email' => 'support@example.test',
            'contact_phone' => '+1 416 555 0100',
            'timezone' => 'America/Toronto',
            'language' => 'en',
            'email_notifications' => '1',
            'sms_notifications' => '0',
        ])->assertRedirect()
            ->assertSessionHasNoErrors();
        $this->assertDatabaseHas('admin_settings', [
            'id' => 1,
            'support_email' => 'support@example.test',
            'timezone' => 'America/Toronto',
            'email_notifications' => true,
            'sms_notifications' => false,
        ]);

        $this->put(route('admin.settings.password'), [
            'current_password' => 'incorrect',
            'password' => 'New-secure-password-123!',
            'password_confirmation' => 'New-secure-password-123!',
        ])->assertSessionHasErrors('current_password');

        $this->put(route('admin.settings.password'), [
            'current_password' => 'password',
            'password' => 'New-secure-password-123!',
            'password_confirmation' => 'New-secure-password-123!',
        ])->assertRedirect()
            ->assertSessionHasNoErrors();
        $this->assertTrue(password_verify('New-secure-password-123!', $admin->fresh()->password));
    }
}
