<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            if (\Schema::hasTable('settings')) {
                $mailSettings = \App\Models\Settings::whereIn('key', [
                    'mail_driver', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption', 'mail_from_address', 'mail_from_name'
                ])->pluck('value', 'key');

                if ($mailSettings->count() > 0) {
                    $config = [
                        'driver' => $mailSettings['mail_driver'] ?? env('MAIL_MAILER', 'smtp'),
                        'host' => $mailSettings['mail_host'] ?? env('MAIL_HOST', 'smtp.mailgun.org'),
                        'port' => $mailSettings['mail_port'] ?? env('MAIL_PORT', 587),
                        'username' => $mailSettings['mail_username'] ?? env('MAIL_USERNAME'),
                        'password' => $mailSettings['mail_password'] ?? env('MAIL_PASSWORD'),
                        'encryption' => $mailSettings['mail_encryption'] ?? env('MAIL_ENCRYPTION', 'tls'),
                        'from' => [
                            'address' => $mailSettings['mail_from_address'] ?? env('MAIL_FROM_ADDRESS', 'hello@example.com'),
                            'name' => $mailSettings['mail_from_name'] ?? env('MAIL_FROM_NAME', 'Example'),
                        ],
                    ];

                    config(['mail.mailers.smtp' => array_merge(config('mail.mailers.smtp'), [
                        'transport' => $config['driver'],
                        'host' => $config['host'],
                        'port' => $config['port'],
                        'username' => $config['username'],
                        'password' => $config['password'],
                        'encryption' => $config['encryption'],
                    ])]);
                    
                    config(['mail.from.address' => $config['from']['address']]);
                    config(['mail.from.name' => $config['from']['name']]);
                }
            }
        } catch (\Exception $e) {
            // Logic to handle database connection issues usually not needed in boot unless strict
        }
    }
}
