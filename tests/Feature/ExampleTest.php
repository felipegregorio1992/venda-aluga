<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_shows_featured_properties(): void
    {
        Property::factory()->create([
            'title' => 'Cobertura duplex no Cidade Nova',
            'featured' => true,
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Daisyvane Vieira')
            ->assertSee('Cobertura duplex no Cidade Nova');
    }

    public function test_properties_index_filters_by_offer(): void
    {
        Property::factory()->create(['title' => 'Casa a venda', 'offer' => 'venda']);
        Property::factory()->create(['title' => 'Casa para alugar', 'offer' => 'aluguel']);

        $this->get(route('properties.index', ['offer' => 'venda']))
            ->assertOk()
            ->assertSee('Casa a venda')
            ->assertDontSee('Casa para alugar');
    }

    public function test_property_show_page_is_successful(): void
    {
        $property = Property::factory()->create(['title' => 'Apartamento amplo no Jardim Canada']);

        $this->get(route('properties.show', $property))
            ->assertOk()
            ->assertSee('Apartamento amplo no Jardim Canada');
    }

    public function test_about_and_contact_pages_are_successful(): void
    {
        $this->get(route('about'))->assertOk()->assertSee('Daisy Vieira');
        $this->get(route('contact'))->assertOk()->assertSee('Enviar mensagem');
    }

    public function test_contact_form_can_be_submitted(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Ana Silva',
            'email' => 'ana@example.com',
            'message' => 'Quero agendar uma visita.',
        ])->assertRedirect()->assertSessionHas('status');
    }
}
