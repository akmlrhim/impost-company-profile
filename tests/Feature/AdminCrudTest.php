<?php

use App\Filament\Resources\Leads\LeadsResource;
use App\Filament\Resources\Leads\Pages\ListLeads;
use App\Filament\Resources\Leads\Pages\ViewLeads;
use App\Filament\Resources\PortfolioCategories\Pages\CreatePortfolioCategory;
use App\Filament\Resources\Portfolios\Pages\CreatePortfolio;
use App\Filament\Resources\Services\Pages\CreateService;
use App\Filament\Resources\Services\Pages\EditService;
use App\Filament\Resources\Services\Pages\ListServices;
use App\Filament\Resources\Testimonials\Pages\CreateTestimonial;
use App\Models\Leads;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Pages\Dashboard;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('renders the panel dashboard', function () {
    \Livewire\Livewire::test(Dashboard::class)
        ->assertSuccessful();
});

it('lists services in the panel', function () {
    Service::factory()->count(2)->create();

    \Livewire\Livewire::test(ListServices::class)
        ->assertSuccessful();
});

it('creates a service', function () {
    \Livewire\Livewire::test(CreateService::class)
        ->fillForm([
            'service_name' => 'Social Media Management',
            'slug' => 'social-media-management',
            'description' => 'Kelola sosial media.',
            'category' => 'Utama',
            'sort' => 1,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Service::where('slug', 'social-media-management')->exists())->toBeTrue();
});

it('validates required fields when creating a service', function () {
    \Livewire\Livewire::test(CreateService::class)
        ->call('create')
        ->assertHasFormErrors(['service_name', 'slug', 'description']);
});

it('updates a service', function () {
    $service = Service::factory()->create();

    \Livewire\Livewire::test(EditService::class, ['record' => $service->slug])
        ->fillForm([
            'service_name' => 'Updated Name',
            'category' => 'Tambahan',
            'sort' => 5,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($service->refresh()->service_name)->toBe('Updated Name');
});

it('deletes a service', function () {
    $service = Service::factory()->create();

    \Livewire\Livewire::test(EditService::class, ['record' => $service->slug])
        ->callAction(DeleteAction::class);

    expect(Service::find($service->id))->toBeNull();
});

it('creates a portfolio category', function () {
    \Livewire\Livewire::test(CreatePortfolioCategory::class)
        ->fillForm([
            'name' => 'Branding',
            'slug' => 'branding',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(PortfolioCategory::where('slug', 'branding')->exists())->toBeTrue();
});

it('creates a portfolio', function () {
    $category = PortfolioCategory::factory()->create();

    \Livewire\Livewire::test(CreatePortfolio::class)
        ->fillForm([
            'title' => 'Kampanye XYZ',
            'slug' => 'kampanye-xyz',
            'category_id' => $category->id,
            'media_type' => 'image',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Portfolio::where('slug', 'kampanye-xyz')->exists())->toBeTrue();
});

it('lists leads and shows a lead', function () {
    $lead = Leads::create([
        'fullname' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '08123456789',
        'business_name' => 'Acme',
        'income' => '10 - 50 Juta',
        'objective' => 'Branding',
    ]);

    \Livewire\Livewire::test(ListLeads::class)
        ->assertSuccessful();

    \Livewire\Livewire::test(ViewLeads::class, ['record' => $lead->getKey()])
        ->assertSuccessful();
});

it('disallows creating leads from the panel', function () {
    expect(LeadsResource::canCreate())->toBeFalse();
});

it('deletes a lead', function () {
    $lead = Leads::create([
        'fullname' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '08123456789',
        'business_name' => 'Acme',
        'income' => '10 - 50 Juta',
        'objective' => 'Branding',
    ]);

    \Livewire\Livewire::test(ViewLeads::class, ['record' => $lead->getKey()])
        ->callAction(DeleteAction::class);

    expect(Leads::find($lead->id))->toBeNull();
});

it('creates a testimonial', function () {
    \Livewire\Livewire::test(CreateTestimonial::class)
        ->fillForm([
            'name' => 'Budi',
            'company_name' => 'PT Maju',
            'content' => 'Pelayanan sangat baik.',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Testimonial::where('name', 'Budi')->exists())->toBeTrue();
});
