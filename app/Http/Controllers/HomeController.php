<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $properties = Property::query()->featured()->latest('id')->take(6)->get();

        return view('home', compact('properties'));
    }
}
