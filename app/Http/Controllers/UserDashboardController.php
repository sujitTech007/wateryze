<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class UserDashboardController extends Controller
{
    public function dashboard(): View
    {
        return view('user.index');
    }

    public function waterMonitoring(): View
    {
        return view('user.water-monitoring');
    }

    public function chemicalKits(): View
    {
        return view('user.chemical-kits.index');
    }

    public function createChemicalKitUsage(): View
    {
        return view('user.chemical-kits.create');
    }

    public function compliance(): View
    {
        return view('user.compliance');
    }

    public function auditReport(): View
    {
        return view('user.view-audit-report');
    }

    public function schedule(): View
    {
        return view('user.schedule');
    }

    public function reports(): View
    {
        return view('user.report.index');
    }

    public function viewReport(): View
    {
        return view('user.report.view');
    }

    public function editReport(): View
    {
        return view('user.report.edit');
    }

    public function siteLocations(): View
    {
        return view('user.site-location');
    }

    public function notifications(): View
    {
        return view('user.notifications');
    }

    public function profile(): View
    {
        return view('user.profile');
    }

    public function settings(): View
    {
        return view('user.settings');
    }
}
