<?php

use App\Filament\Resources\ArticleCategories\Pages\CreateArticleCategory;
use App\Filament\Resources\Articles\Pages\CreateArticle;
use App\Filament\Resources\Articles\Pages\EditArticle;
use App\Filament\Resources\Clients\Pages\CreateClient;
use App\Filament\Resources\Comments\CommentResource;
use App\Filament\Resources\Comments\Pages\EditComment;
use App\Filament\Resources\Employees\Pages\CreateEmployee;
use App\Filament\Resources\JobVacancies\Pages\CreateJobVacancy;
use App\Filament\Resources\StudyCases\Pages\CreateStudyCase;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Employee;
use App\Models\JobVacancy;
use App\Models\StudyCase;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->actingAs(User::factory()->create());
});

it('creates an article', function () {
    $category = ArticleCategory::factory()->create();

    \Livewire\Livewire::test(CreateArticle::class)
        ->fillForm([
            'category_id' => $category->id,
            'title' => 'Tips Konten 2026',
            'slug' => 'tips-konten-2026',
            'written_by' => 'Jane',
            'status' => 'published',
            'content' => '<p>Isi artikel.</p>',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Article::where('slug', 'tips-konten-2026')->exists())->toBeTrue();
});

it('validates required fields when creating an article', function () {
    \Livewire\Livewire::test(CreateArticle::class)
        ->call('create')
        ->assertHasFormErrors(['category_id', 'title', 'slug', 'written_by', 'content']);
});

it('updates an article status', function () {
    $article = Article::factory()->create(['status' => 'draft']);

    \Livewire\Livewire::test(EditArticle::class, ['record' => $article->slug])
        ->fillForm(['status' => 'published'])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($article->refresh()->status)->toBe('published');
});

it('deletes an article', function () {
    $article = Article::factory()->create();

    \Livewire\Livewire::test(EditArticle::class, ['record' => $article->slug])
        ->callAction(DeleteAction::class);

    expect(Article::find($article->id))->toBeNull();
});

it('creates an article category', function () {
    \Livewire\Livewire::test(CreateArticleCategory::class)
        ->fillForm([
            'name' => 'Tutorial',
            'slug' => 'tutorial',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(ArticleCategory::where('slug', 'tutorial')->exists())->toBeTrue();
});

it('updates a comment status for moderation', function () {
    $comment = Comment::factory()->create(['status' => 'pending']);

    \Livewire\Livewire::test(EditComment::class, ['record' => $comment->getKey()])
        ->fillForm(['status' => 'approved'])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($comment->refresh()->status)->toBe('approved');
});

it('disallows creating comments from the panel', function () {
    expect(CommentResource::canCreate())->toBeFalse();
});

it('creates a client with a logo', function () {
    Storage::fake('public');

    \Livewire\Livewire::test(CreateClient::class)
        ->fillForm([
            'filename' => 'Acme Corp',
            'client_logo' => UploadedFile::fake()->image('logo.png'),
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $client = Client::where('filename', 'Acme Corp')->firstOrFail();

    expect($client->client_logo)->not->toBeNull();
    Storage::disk('public')->assertExists($client->client_logo);
});

it('creates a study case', function () {
    \Livewire\Livewire::test(CreateStudyCase::class)
        ->fillForm([
            'name' => 'Kampanye Aurora',
            'slug' => 'kampanye-aurora',
            'situation' => 'Penjualan turun.',
            'solution' => 'Iklan digital.',
            'result' => 'Omzet naik 40%.',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(StudyCase::where('slug', 'kampanye-aurora')->exists())->toBeTrue();
});

it('creates an employee', function () {
    \Livewire\Livewire::test(CreateEmployee::class)
        ->fillForm([
            'fullname' => 'Budi Santoso',
            'slug' => 'budi-santoso',
            'employee_id' => 'IM-0001',
            'position' => 'Web Developer',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Employee::where('employee_id', 'IM-0001')->exists())->toBeTrue();
});

it('deletes an employee', function () {
    $employee = Employee::factory()->create();

    \Livewire\Livewire::test(\App\Filament\Resources\Employees\Pages\EditEmployee::class, ['record' => $employee->slug])
        ->callAction(DeleteAction::class);

    expect(Employee::find($employee->id))->toBeNull();
});

it('creates a job vacancy with details', function () {
    \Livewire\Livewire::test(CreateJobVacancy::class)
        ->fillForm([
            'title' => 'Web Developer',
            'slug' => 'web-developer',
            'employment_type' => 'Full-time',
            'work_arrangements' => ['On-site', 'Hybrid'],
            'status' => 'open',
            'apply_email' => 'hr@example.com',
            'apply_subject' => 'Lamaran Web Developer',
            'details' => [
                ['section' => 'Kualifikasi', 'content' => 'Menguasai PHP.', 'sort_order' => 1],
                ['section' => 'Benefit', 'content' => 'Asuransi kesehatan.', 'sort_order' => 2],
            ],
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $vacancy = JobVacancy::where('slug', 'web-developer')->firstOrFail();

    expect($vacancy->details()->count())->toBe(2)
        ->and($vacancy->work_arrangements)->toBe(['On-site', 'Hybrid']);
});

it('deletes a job vacancy', function () {
    $vacancy = JobVacancy::factory()->create();

    \Livewire\Livewire::test(\App\Filament\Resources\JobVacancies\Pages\EditJobVacancy::class, ['record' => $vacancy->slug])
        ->callAction(DeleteAction::class);

    expect(JobVacancy::find($vacancy->id))->toBeNull();
});
