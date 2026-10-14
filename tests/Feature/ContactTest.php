<?php

use App\Models\Leads;

it('renders the contact page', function () {
    $this->get(route('contact.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('Contact'));
});

it('stores a lead and redirects', function () {
    $this->post(route('contact.store'), [
        'fullname' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '08123456789',
        'business_name' => 'Acme',
        'income' => '10 - 50 Juta',
        'objective' => 'Branding',
        'note' => 'Hello',
    ])->assertRedirect(route('contact.index'));

    expect(Leads::where('email', 'john@example.com')->exists())->toBeTrue();
});

it('validates required fields on contact store', function () {
    $this->post(route('contact.store'), [])
        ->assertSessionHasErrors(['fullname', 'email', 'phone']);
});
