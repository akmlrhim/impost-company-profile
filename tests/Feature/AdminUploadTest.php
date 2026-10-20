<?php

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
    $this->post(route('admin.services.store'), [
        'service_name' => 'Social Media',
        'slug' => 'social-media',
        'description' => 'Deskripsi.',
        'category' => 'Utama',
        'sort' => 1,
        'cover_file' => UploadedFile::fake()->image('cover.jpg'),
    ])->assertRedirect(route('admin.services.index'));

    $service = Service::where('slug', 'social-media')->firstOrFail();

    expect($service->cover_path)->not->toBeNull();
    Storage::disk('public')->assertExists($service->cover_path);
});

it('replaces and deletes the old service cover image', function () {
    $service = Service::factory()->create(['cover_path' => 'services/old.jpg']);
    Storage::disk('public')->put('services/old.jpg', 'old');

    $this->put(route('admin.services.update', $service), [
        'service_name' => $service->service_name,
        'slug' => $service->slug,
        'description' => $service->description,
        'category' => $service->category,
        'sort' => $service->sort,
        'cover_file' => UploadedFile::fake()->image('new.jpg'),
    ])->assertRedirect(route('admin.services.index'));

    Storage::disk('public')->assertMissing('services/old.jpg');
    Storage::disk('public')->assertExists($service->refresh()->cover_path);
});

it('removes a service cover image when requested', function () {
    $service = Service::factory()->create(['cover_path' => 'services/old.jpg']);
    Storage::disk('public')->put('services/old.jpg', 'old');

    $this->put(route('admin.services.update', $service), [
        'service_name' => $service->service_name,
        'slug' => $service->slug,
        'description' => $service->description,
        'category' => $service->category,
        'sort' => $service->sort,
        'remove_image' => true,
    ])->assertRedirect(route('admin.services.index'));

    Storage::disk('public')->assertMissing('services/old.jpg');
    expect($service->refresh()->cover_path)->toBeNull();
});

it('deletes the stored file when a service is destroyed', function () {
    $service = Service::factory()->create(['cover_path' => 'services/old.jpg']);
    Storage::disk('public')->put('services/old.jpg', 'old');

    $this->delete(route('admin.services.destroy', $service))
        ->assertRedirect(route('admin.services.index'));

    Storage::disk('public')->assertMissing('services/old.jpg');
});

it('rejects a non-image upload', function () {
    $this->post(route('admin.services.store'), [
        'service_name' => 'Bad',
        'slug' => 'bad',
        'description' => 'Deskripsi.',
        'sort' => 1,
        'cover_file' => UploadedFile::fake()->create('document.pdf', 10, 'application/pdf'),
    ])->assertSessionHasErrors('cover_file');
});

it('uploads a portfolio media image', function () {
    $this->post(route('admin.portfolios.store'), [
        'title' => 'Kampanye',
        'slug' => 'kampanye',
        'media_type' => 'image',
        'media_file' => UploadedFile::fake()->image('media.jpg'),
    ])->assertRedirect(route('admin.portfolios.index'));

    $portfolio = Portfolio::where('slug', 'kampanye')->firstOrFail();

    expect($portfolio->media_path)->not->toBeNull();
    Storage::disk('public')->assertExists($portfolio->media_path);
});

it('uploads a testimonial photo', function () {
    $this->post(route('admin.testimonials.store'), [
        'name' => 'Budi',
        'content' => 'Bagus.',
        'photo_file' => UploadedFile::fake()->image('photo.jpg'),
    ])->assertRedirect(route('admin.testimonials.index'));

    $testimonial = Testimonial::where('name', 'Budi')->firstOrFail();

    expect($testimonial->photo_path)->not->toBeNull();
    Storage::disk('public')->assertExists($testimonial->photo_path);
});
