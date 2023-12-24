<?php

namespace Dulce\StatamicAdobeFonts;

use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Foundation\Application;
use Statamic\Statamic;
use Statamic\Providers\AddonServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Dulce\StatamicAdobeFonts\Commands\FetchAdobeTypekitCommand;
use Dulce\StatamicAdobeFonts\Services\AdobeTypekit;
use Dulce\StatamicAdobeFonts\Tags\TypekitTag;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        TypekitTag::class,
    ];
    public function configurePackage(Package $package): void
    {
        $package
            ->name('adobe-typekit')
            ->hasConfigFile()
            ->hasCommand(FetchAdobeTypekitCommand::class);
    }
    protected $commands = [
        FetchAdobeTypekitCommand::class,
    ];

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/adobe-typekit.php' => config_path('adobe-typekit.php'),
            ], 'config');
        }
        parent::boot();

        $this->app->singleton(AdobeTypekit::class, function (Application $app) {
            return new AdobeTypekit(
                filesystem: $app->make(FilesystemManager::class)->disk(config('adobe-typekit.disk')),
                path: config('adobe-typekit.path'),
                inline: config('adobe-typekit.inline'),
                fallback: config('adobe-typekit.fallback'),
                userAgent: config('adobe-typekit.user_agent'),
                fonts: config('adobe-typekit.fonts'),
            );
        });

        Statamic::tag(TypekitTag::class, 'typekit');
    }
}
