<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function index(): View
    {
        $properties = Property::query()->latest('id')->paginate(12);

        return view('admin.properties.index', compact('properties'));
    }

    public function create(): View
    {
        return view('admin.properties.create', [
            'property' => new Property([
                'offer' => 'venda',
                'type' => 'apartamento',
                'city' => 'Belem',
                'state' => 'PA',
                'featured' => true,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Property::query()->create($this->payload($request));

        return redirect()->route('admin.properties.index')->with('status', 'Anuncio criado com sucesso.');
    }

    public function edit(Property $property): View
    {
        return view('admin.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property): RedirectResponse
    {
        $property->update($this->payload($request, $property));

        return redirect()->route('admin.properties.index')->with('status', 'Anuncio atualizado com sucesso.');
    }

    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();

        return redirect()->route('admin.properties.index')->with('status', 'Anuncio removido.');
    }

    private function payload(Request $request, ?Property $property = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'code' => ['nullable', 'string', 'max:30'],
            'description' => ['required', 'string', 'max:4000'],
            'type' => ['required', 'in:casa,apartamento,cobertura'],
            'offer' => ['required', 'in:venda,aluguel'],
            'price' => ['required', 'integer', 'min:1'],
            'neighborhood' => ['required', 'string', 'max:120'],
            'city' => ['required', 'string', 'max:120'],
            'state' => ['required', 'string', 'size:2'],
            'bedrooms' => ['required', 'integer', 'min:0', 'max:30'],
            'bathrooms' => ['required', 'integer', 'min:0', 'max:30'],
            'area' => ['required', 'integer', 'min:1'],
            'image' => ['nullable', 'url', 'max:500'],
            'featured' => ['nullable', 'boolean'],
        ]);

        $data['code'] = $data['code'] ?? $property?->code ?: 'DV-'.now()->format('ymdHis');
        $data['slug'] = Str::slug($data['title']).'-'.Str::lower($data['code']);
        $data['featured'] = $request->boolean('featured');
        $data['state'] = strtoupper($data['state']);
        $data['image'] = $data['image'] ?? $property?->image ?: 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1400&q=80';

        return $data;
    }
}
