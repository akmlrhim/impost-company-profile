<?php

it('renders the about page via inertia', function () {
    $this->get(route('about'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('About'));
});
