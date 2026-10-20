<?php

use App\Models\Leads;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('renders the admin dashboard with counts', function () {
    Service::factory()->create();

    $this->get(route('admin.dashboard'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Admin/Dashboard')
            ->has('counts')
            ->has('recent_leads')
        );
});

it('lists services in the admin', function () {
    Service::factory()->count(2)->create();

    $this->get(route('admin.services.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Admin/Services/Index')
            ->has('services.data', 2)
        );
});

it('creates a service', function () {
    $this->post(route('admin.services.store'), [
        'service_name' => 'Social Media Management',
        'slug' => 'social-media-management',
        'description' => 'Kelola sosial media.',
        'category' => 'Utama',
        'sort' => 1,
    ])->assertRedirect(route('admin.services.index'));

    expect(Service::where('slug', 'social-media-management')->exists())->toBeTrue();
});

it('validates required fields when creating a service', function () {
    $this->post(route('admin.services.store'), [])
        ->assertSessionHasErrors(['service_name', 'slug', 'description', 'sort']);
});

it('updates a service', function () {
    $service = Service::factory()->create();

    $this->put(route('admin.services.update', $service), [
        'service_name' => 'Updated Name',
        'slug' => $service->slug,
        'description' => 'Updated description.',
        'category' => 'Tambahan',
        'sort' => 5,
    ])->assertRedirect(route('admin.services.index'));

    expect($service->refresh()->service_name)->toBe('Updated Name');
});

it('deletes a service', function () {
    $service = Service::factory()->create();

    $this->delete(route('admin.services.destroy', $service))
        ->assertRedirect(route('admin.services.index'));

    expect(Service::find($service->id))->toBeNull();
});

it('creates a portfolio category', function () {
    $this->post(route('admin.portfolio-categories.store'), [
        'name' => 'Branding',
        'slug' => 'branding',
    ])->assertRedirect(route('admin.portfolio-categories.index'));

    expect(PortfolioCategory::where('slug', 'branding')->exists())->toBeTrue();
});

it('creates a portfolio', function () {
    $category = PortfolioCategory::factory()->create();

    $this->post(route('admin.portfolios.store'), [
        'title' => 'Kampanye XYZ',
        'slug' => 'kampanye-xyz',
        'category_id' => $category->id,
        'media_type' => 'image',
    ])->assertRedirect(route('admin.portfolios.index'));

    expect(Portfolio::where('slug', 'kampanye-xyz')->exists())->toBeTrue();
});

it('lists and shows leads', function () {
    $lead = Leads::create([
        'fullname' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '08123456789',
        'business_name' => 'Acme',
        'income' => '10 - 50 Juta',
        'objective' => 'Branding',
    ]);

    $this->get(route('admin.leads.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Admin/Leads/Index')
            ->has('leads.data', 1)
        );

    $this->get(route('admin.leads.show', $lead))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Admin/Leads/Show')
            ->where('lead.email', 'jane@example.com')
        );
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

    $this->delete(route('admin.leads.destroy', $lead))
        ->assertRedirect(route('admin.leads.index'));

    expect(Leads::find($lead->id))->toBeNull();
});

it('creates a testimonial', function () {
    $this->post(route('admin.testimonials.store'), [
        'name' => 'Budi',
        'company_name' => 'PT Maju',
        'content' => 'Pelayanan sangat baik.',
    ])->assertRedirect(route('admin.testimonials.index'));

    expect(Testimonial::where('name', 'Budi')->exists())->toBeTrue();
});
