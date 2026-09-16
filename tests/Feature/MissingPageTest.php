<?php

use Tests\TestCase;

uses(TestCase::class);

test('missing pages render the 404 error page without redirecting', function () {
    $response = $this->get('/this-route-does-not-exist');

    $response->assertNotFound();
    expect($response->isRedirect())->toBeFalse();
});

test('missing pages keep their 404 status when accessed after another page', function () {
    $this->get('/about');
    $response = $this->get('/some/missing/path');

    $response->assertNotFound();
    expect($response->isRedirect())->toBeFalse();
});
