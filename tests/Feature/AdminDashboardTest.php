<?php

use App\Filament\Widgets\LatestLeads;
use App\Filament\Widgets\LeadsChart;
use App\Filament\Widgets\StatsOverview;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

function makeLead(): Lead
{
    return Lead::create([
        'fullname' => 'Budi Santoso',
        'email' => 'budi@example.com',
        'phone' => '08123456789',
        'business_name' => 'Toko Budi',
        'income' => '10-50 juta',
        'objective' => 'Naikkan omzet',
    ]);
}

it('renders the dashboard with a logout control and the widgets', function () {
    $user = User::factory()->create(['name' => 'Admin Impost']);

    $this->actingAs($user)
        ->get('/admin')
        ->assertOk()
        ->assertSee('Halo, Admin Impost')
        ->assertSee('fi-sidebar-logout', escape: false)
        ->assertSee(route('filament.admin.auth.logout'), escape: false)
        ->assertSee('app.filament.widgets.stats-overview', escape: false)
        ->assertSee('app.filament.widgets.leads-chart', escape: false)
        ->assertSee('app.filament.widgets.latest-leads', escape: false);
});

it('renders the stats widget', function () {
    $this->actingAs(User::factory()->create());
    makeLead();

    Livewire::test(StatsOverview::class)
        ->assertOk()
        ->assertSee('Artikel')
        ->assertSee('Leads bulan ini')
        ->assertSee('Komentar pending');
});

it('renders the leads chart with 6 monthly buckets', function () {
    $this->actingAs(User::factory()->create());
    makeLead();

    $widget = Livewire::test(LeadsChart::class)->assertOk()->instance();
    $data = Closure::bind(fn (): array => $this->getData(), $widget, LeadsChart::class)();

    expect($data['labels'])->toHaveCount(6)
        ->and($data['datasets'][0]['data'])->toHaveCount(6)
        ->and(end($data['datasets'][0]['data']))->toBe(1);
});

it('renders the latest leads table', function () {
    $this->actingAs(User::factory()->create());
    makeLead();

    Livewire::test(LatestLeads::class)
        ->assertOk()
        ->assertSee('Leads terbaru')
        ->assertSee('Budi Santoso');
});

it('logs the user out', function () {
    $this->actingAs(User::factory()->create())
        ->post(route('filament.admin.auth.logout'))
        ->assertRedirect();

    $this->assertGuest();
});

it('does not show the logout control on the login page', function () {
    $this->get('/admin/login')
        ->assertOk()
        ->assertDontSee('fi-sidebar-logout', escape: false);
});
