<?php

use App\Models\Service;

it('lists services on the services index', function () {
    Service::factory()->create();

    $this->get(route('services.index'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Services/Index')
            ->has('services', 1)
        );
});

it('shows a service detail page', function () {
    $service = Service::factory()->create();

    $this->get(route('services.show', $service))
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->component('Services/Show')
            ->where('service.service_name', $service->service_name)
        );
});
