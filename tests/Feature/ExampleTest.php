<?php

it('renders the home inertia component', function () {
    $this->get('/')->assertOk()->assertInertia(fn ($page) => $page->component('Home'));
});
