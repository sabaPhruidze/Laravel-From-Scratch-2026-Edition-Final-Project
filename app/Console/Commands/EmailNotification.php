<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('email:notification')]
#[Description('Command description')]
class EmailNotification extends Command
{
    protected $signature = 'email:notification';

    protected $description = 'Command description';

    public function handle(): int
    {
        return self::SUCCESS;
    }
}
