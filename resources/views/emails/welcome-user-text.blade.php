WELCOME TO WATERYZE

Hello {{ $customer->first_name ?: $customer->name }},

Thank you for joining Wateryze. Your account is ready, and your personal dashboard brings your water operations, site information, reminders, and account details together in one place.

GET STARTED
- Add your treatment sites and facility details.
- Record chemical usage and set helpful reminders.
- Explore subscription options to unlock sensor-powered water monitoring.

Open your dashboard:
{{ route('user.dashboard') }}

If you have questions, reply to this email and our team will be glad to help.

Warm regards,
The Wateryze Team

This welcome message was sent to {{ $customer->email }} because a Wateryze account was created using this email address.
