<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->only(['q', 'offer', 'type']);
        $heading = $this->heading($filters['offer'] ?? null);

        $properties = Property::query()
            ->search($filters)
            ->latest('id')
            ->paginate(9)
            ->withQueryString();

        return view('properties.index', compact('properties', 'filters', 'heading'));
    }

    public function show(Property $property): View
    {
        $related = Property::query()
            ->where('id', '!=', $property->id)
            ->where(function ($query) use ($property) {
                $query->where('offer', $property->offer)
                    ->orWhere('neighborhood', $property->neighborhood);
            })
            ->take(3)
            ->get();

        return view('properties.show', compact('property', 'related'));
    }

    private function heading(?string $offer): string
    {
        return match ($offer) {
            'venda' => 'Imoveis a venda',
            'aluguel' => 'Imoveis para alugar',
            default => 'Imoveis em destaque',
        };
    }
}
