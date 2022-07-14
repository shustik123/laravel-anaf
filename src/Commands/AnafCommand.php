<?php

namespace Andali\Anaf\Commands;

use Illuminate\Console\Command;

class AnafCommand extends Command
{
    public $signature = 'laravel-anaf';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
