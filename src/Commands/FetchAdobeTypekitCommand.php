<?php

namespace Dulce\StatamicAdobeFonts\Commands;;

use Illuminate\Console\Command;
use Dulce\StatamicAdobeFonts\Services\AdobeTypekit;

class  FetchAdobeTypekitCommand extends Command
{
    public $signature = 'typekit:fetch';
    public $description = 'Fetch Adobe Typekit fonts and store them on a local disk';

    public function handle()
    {
        $this->info('Start fetching Adobe Typekit Fonts...');

        collect(config('adobe-typekit.fonts'))
            ->keys()
            ->each(function (string $font) {
                $this->info("Fetching `{$font}`...");

                app(AdobeTypekit::class)->load($font, forceDownload: true);
            });

        $this->info('All done!');
    }
}
