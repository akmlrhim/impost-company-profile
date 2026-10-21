<?php

use App\Filament\Resources\Portfolios\Pages\CreatePortfolio;
use App\Filament\Resources\Services\Pages\CreateService;
use App\Filament\Resources\Services\Pages\EditService;
use App\Filament\Resources\Testimonials\Pages\CreateTestimonial;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
    $this->actingAs(User::factory()->create());
});

it('uploads a service cover image', function () {
    \Livewire\Livewire::test(CreateService::class)
        ->fillForm([
            'service_name' => 'Social Media',
            'slug' => 'social-media',
            'description' => 'Deskripsi.',
            'category' => 'Utama',
            'sort' => 1,
            'cover_path' => UploadedFile::fake()->image('cover.jpg'),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $service = Service::where('slug', 'social-media')->firstOrFail();

    expect($service->cover_path)->not->toBeNull();
    Storage::disk('public')->assertExists($service->cover_path);
});

it('replaces and deletes the old service cover image', function () {
    Storage::disk('public')->put('services/old.jpg', 'old');
    Storage::disk('public')->put('services/new.jpg', 'new');
    $service = Service::factory()->create(['cover_path' => 'services/old.jpg']);

    $service->update(['cover_path' => 'services/new.jpg']);

    Storage::disk('public')->assertMissing('services/old.jpg');
    Storage::disk('public')->assertExists('services/new.jpg');
});

it('removes a service cover image when cleared', function () {
    $service = Service::factory()->create(['cover_path' => 'services/old.jpg']);
    Storage::disk('public')->put('services/old.jpg', 'old');

    \Livewire\Livewire::test(EditService::class, ['record' => $service->slug])
        ->fillForm([
            'cover_path' => null,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    Storage::disk('public')->assertMissing('services/old.jpg');
    expect($service->refresh()->cover_path)->toBeNull();
});

it('deletes the stored file when a service is destroyed', function () {
    $service = Service::factory()->create(['cover_path' => 'services/old.jpg']);
    Storage::disk('public')->put('services/old.jpg', 'old');

    $service->delete();

    Storage::disk('public')->assertMissing('services/old.jpg');
});

it('rejects a non-image upload', function () {
    \Livewire\Livewire::test(CreateService::class)
        ->fillForm([
            'service_name' => 'Bad',
            'slug' => 'bad',
            'description' => 'Deskripsi.',
            'sort' => 1,
            'cover_path' => UploadedFile::fake()->create('document.pdf', 10, 'application/pdf'),
        ])
        ->call('create')
        ->assertHasFormErrors(['cover_path']);
});

it('uploads a portfolio media image', function () {
    \Livewire\Livewire::test(CreatePortfolio::class)
        ->fillForm([
            'title' => 'Kampanye',
            'slug' => 'kampanye',
            'media_type' => 'image',
            'media_path' => UploadedFile::fake()->image('media.jpg'),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $portfolio = Portfolio::where('slug', 'kampanye')->firstOrFail();

    expect($portfolio->media_path)->not->toBeNull();
    Storage::disk('public')->assertExists($portfolio->media_path);
});

it('uploads a testimonial photo', function () {
    \Livewire\Livewire::test(CreateTestimonial::class)
        ->fillForm([
            'name' => 'Budi',
            'content' => 'Bagus.',
            'photo_path' => UploadedFile::fake()->image('photo.jpg'),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $testimonial = Testimonial::where('name', 'Budi')->firstOrFail();

    expect($testimonial->photo_path)->not->toBeNull();
    Storage::disk('public')->assertExists($testimonial->photo_path);
});
