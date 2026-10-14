<?php

use Illuminate\Testing\Fluent\AssertableJson;

it('renders the homepage via inertia', function () {
    $response = $this->get('/');

    $response->assertInertia(function (AssertableJson $page) {
        return $page->component('Home')
            ->has('services')
            ->has('portfolios');
    });
});

it('returns a successful response for the homepage', function () {
    $this->get('/')->assertOk();
});
