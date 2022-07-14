<?php

namespace Andali\Anaf;

use Andali\Anaf\Commands\AnafCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AnafServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-anaf');
    }
}
