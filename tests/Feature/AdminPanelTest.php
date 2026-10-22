<?php

namespace Tests\Feature;

use App\Models\PageView;
use App\Models\Property;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_admin(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
    }

    public function test_admin_can_login_and_see_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@daisyvanevieira.com.br',
        ]);

        $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Monitoramento de acessos');
    }

    public function test_admin_can_create_a_property(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('admin.properties.store'), [
            'title' => 'Casa nova no Cidade Nova',
            'description' => 'Imovel amplo e iluminado, pronto para morar.',
            'type' => 'casa',
            'offer' => 'venda',
            'price' => 990000,
            'neighborhood' => 'Cidade Nova',
            'city' => 'Parauapebas',
            'state' => 'PA',
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area' => 180,
            'image' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1400&q=80',
            'featured' => 1,
        ])->assertRedirect(route('admin.properties.index'));

        $this->assertDatabaseHas('properties', ['title' => 'Casa nova no Cidade Nova']);
    }

    public function test_admin_can_update_contact_settings(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->put(route('admin.settings.update'), [
            'whatsapp' => '55 91 98888-7777',
            'phone_display' => '(91) 9 8888-7777',
            'email' => 'contato@daisyvanevieira.com.br',
            'instagram' => 'https://instagram.com/daisyvane',
            'facebook' => 'https://facebook.com/daisyvane',
        ])->assertRedirect();

        $this->assertSame('5591988887777', Setting::getValue('whatsapp'));
        $this->assertStringContainsString('5591988887777', Setting::whatsappUrl());
    }

    public function test_public_visit_is_tracked(): void
    {
        Property::factory()->create(['featured' => true]);

        $this->get(route('home'))->assertOk();

        $this->assertGreaterThan(0, PageView::query()->count());
    }
}
