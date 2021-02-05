<?php

namespace Pratiksh\Laramin\Console\Commands;

use Illuminate\Console\Command;

class InstallLaraminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:laramin {--a|assets : Installs only asset files} {--c|config : Installs only config file} {--f|view : Installs only view files} {--m|migration : Installs only migration files} {--d|dummy : Installs only seed files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to install laramin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!empty($this->options())) {
            if ($this->option('config')) {
                $this->call('vendor:publish', [
                    '--tag' => ['laramin-config']
                ]);
                $this->info("Laramin config file published ... ✅");
            }
            if ($this->option('view')) {
                $this->call('vendor:publish', [
                    '--tag' => ['laramin-views']
                ]);
                $this->info("Laramin view files published ... ✅");
            }
            if ($this->option('migration')) {
                $this->call('vendor:publish', [
                    '--tag' => ['laramin-migrations']
                ]);
                $this->info("Laramin migration files published ... ✅");
            }
            if ($this->option('dummy')) {
                $this->call('vendor:publish', [
                    '--tag' => ['laramin-seeds']
                ]);
                $this->info("Laramin seeding files published ... ✅");
            }
            if ($this->option('assets')) {
                $this->call('vendor:publish', [
                    '--tag' => ['laramin-assets-files']
                ]);
                $this->info("Laramin asset files published ... ✅");
                $this->call('vendor:publish', [
                    '--tag' => ['laramin-static-files']
                ]);
                $this->info("Laramin static files published ... ✅");
            }
        } else {

            $this->call('vendor:publish', [
                '--tag' => ['laramin-config']
            ]);
            $this->info("Laramin config file published ... ✅");
            $this->call('vendor:publish', [
                '--tag' => ['laramin-views']
            ]);
            $this->info("Laramin view files published ... ✅");
            $this->call('vendor:publish', [
                '--tag' => ['laramin-migrations']
            ]);
            $this->info("Laramin migration files published ... ✅");
            $this->call('vendor:publish', [
                '--tag' => ['laramin-seeds']
            ]);
            $this->info("Laramin seeding files published ... ✅");
            $this->call('vendor:publish', [
                '--tag' => ['laramin-assets-files']
            ]);
            $this->info("Laramin asset files published ... ✅");
            $this->call('vendor:publish', [
                '--tag' => ['laramin-static-files']
            ]);
            $this->info("Laramin static files published ... ✅");
            $this->info("Laramin Installed");
        }
    }
}
