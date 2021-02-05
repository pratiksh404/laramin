<?php

namespace Pratiksh\Laramin\Console\Commands;

use Illuminate\Console\Command;
use Pratiksh\Laramin\Services\MakeAPIResource;

class MakeAPIResourceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:api {name : Model Class (Singular), e.g role, Place, Car, Post}  {--rest}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make API Resource for Model';

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
        $name = $this->argument('name');

        if ($this->option('rest')) {
            MakeAPIResource::makeRestAPI($name);
            $this->info("Restful API Resource created for model" . $name);
        } else {
            MakeAPIResource::makeAPI($name);
            $this->info("API Resource created for model" . $name);
        }
    }
}
