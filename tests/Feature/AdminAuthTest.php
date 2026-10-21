<?php

use App\Models\User;

it('redirects guests from the panel to the login page', function () {
    $this->get('/admin')
        ->assertRedirect(route('filament.admin.auth.login'));
});

it('renders the panel login page', function () {
    $this->get(route('filament.admin.auth.login'))
        ->assertOk();
});

it('allows an authenticated user into the panel', function () {
    $this->actingAs(User::factory()->create());

    $this->get('/admin')
        ->assertOk();
});

it('logs a user out of the panel', function () {
    $this->actingAs(User::factory()->create());

    $this->post(route('filament.admin.auth.logout'))
        ->assertRedirect();

    $this->assertGuest();
});
