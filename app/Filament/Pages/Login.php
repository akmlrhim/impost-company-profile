<?php

namespace App\Filament\Pages;

use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;

class Login extends BaseLogin
{
    public string $recaptchaToken = '';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent()
                    ->placeholder('Masukkan email Anda'),
                $this->getPasswordFormComponent()
                    ->placeholder('Masukkan password Anda'),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    #[On('recaptcha-verified')]
    public function setRecaptchaToken(string $token): void
    {
        $this->recaptchaToken = $token;
    }

    public function authenticate(): ?LoginResponse
    {
        if (empty($this->recaptchaToken) || ! $this->verifyRecaptcha($this->recaptchaToken)) {
            Notification::make()
                ->title('Verifikasi reCAPTCHA gagal. Silakan coba lagi.')
                ->danger()
                ->send();

            return null;
        }

        return parent::authenticate();
    }

    private function verifyRecaptcha(string $token): bool
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $token,
            'remoteip' => request()->ip(),
        ]);

        $result = $response->json();

        return ($result['success'] ?? false) && ($result['score'] ?? 0) >= 0.5;
    }
}
