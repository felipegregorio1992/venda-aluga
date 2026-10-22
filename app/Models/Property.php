<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'slug',
        'description',
        'type',
        'offer',
        'price',
        'neighborhood',
        'city',
        'state',
        'bedrooms',
        'bathrooms',
        'area',
        'image',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'featured' => 'boolean',
        ];
    }

    public function getFormattedPriceAttribute(): string
    {
        $value = 'R$ '.number_format($this->price, 0, ',', '.');

        return $this->offer === 'aluguel' ? $value.'/mês' : $value;
    }

    public function getLocationAttribute(): string
    {
        return "{$this->neighborhood}, {$this->city} - {$this->state}";
    }

    public function getOfferLabelAttribute(): string
    {
        return $this->offer === 'aluguel' ? 'Aluguel' : 'Venda';
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOffer($query, ?string $offer)
    {
        return $offer ? $query->where('offer', $offer) : $query;
    }

    public function scopeSearch($query, array $filters)
    {
        return $query
            ->when($filters['q'] ?? null, function ($query, $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('title', 'like', "%{$term}%")
                        ->orWhere('neighborhood', 'like', "%{$term}%")
                        ->orWhere('city', 'like', "%{$term}%")
                        ->orWhere('code', 'like', "%{$term}%");
                });
            })
            ->when($filters['offer'] ?? null, fn ($query, $offer) => $query->where('offer', $offer))
            ->when($filters['type'] ?? null, fn ($query, $type) => $query->where('type', $type));
    }
}
