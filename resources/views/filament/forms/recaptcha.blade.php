<div
    x-data="{
        init() {
            this.waitForRecaptcha();
        },
        waitForRecaptcha() {
            if (typeof grecaptcha !== 'undefined') {
                grecaptcha.ready(() => this.generateToken());
            } else {
                setTimeout(() => this.waitForRecaptcha(), 200);
            }
        },
        generateToken() {
            grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'login' })
                .then((token) => {
                    $wire.recaptchaToken = token;
                    setTimeout(() => this.generateToken(), 90000);
                });
        }
    }"
    wire:ignore
></div>

<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer></script>
