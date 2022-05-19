<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\eze_candidates;

class FancyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fancy:command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //echo 'Hello world';
   

       $flight = eze_candidates::where('first_name', 'Zola')->first();

       //var_dump($flight);

       echo $flight['first_name'];

       echo $flight['last_name'];
    }
}
