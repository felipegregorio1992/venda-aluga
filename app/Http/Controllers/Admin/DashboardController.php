<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageView;
use App\Models\Property;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'stats' => PageView::stats(),
            'propertiesCount' => Property::query()->count(),
            'featuredCount' => Property::query()->featured()->count(),
        ]);
    }
}
