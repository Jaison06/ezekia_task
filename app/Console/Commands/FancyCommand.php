<?php

namespace App\Console\Commands;

use App\Models\Candidates;
use App\Models\Jobs;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

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

        $csvFileName = "\csv\candidates.csv";

        $row = 1;
        if (($handle = fopen(storage_path() . $csvFileName, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $num = count($data);
                $first_name = $data['1'];
                $last_name = $data['2'];
                $email = $data['3'];

                $check_candidates = candidates::where('email', '=', $email)->first();
                if ($check_candidates === null) {

                    candidates::insert([
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,

                    ]);

                }

            }
            fclose($handle);
        }

        $csvFileName = "\csv\jobs.csv";

        $row = 1;
        if (($handle = fopen(storage_path() . $csvFileName, 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $num = count($data);

                $candidates_id = $data['1'];
                $job_title = $data['2'];
                $company_name = $data['3'];
                $start_date = Carbon::createFromFormat("d.m.Y H:i", $data['4']);
                $end_date = Carbon::createFromFormat("d.m.Y H:i", $data['5']);

                $check_jobs = jobs::where([['candidates_id', '=', $candidates_id], ['job_title', '=', $job_title], ['company_name', '=', $company_name]])->first();
                if ($check_jobs === null) {

                    jobs::insert([
                        'candidates_id' => $candidates_id,
                        'job_title' => $job_title,
                        'company_name' => $company_name,
                        'start_date' => $start_date,
                        'end_date' => $end_date,

                    ]);

                }

            }
            fclose($handle);
        }

        foreach (Candidates::all() as $candidate) {

            $candidates_id = $candidate->id;

            echo "Name:" . $candidate->first_name . " " . $candidate->last_name . ",  " . "Email:" . $candidate->email . "\n\n";

            $jobs_list = Jobs::where('candidates_id', '=', $candidates_id)->orderBy('end_date', 'DESC')->get();

            foreach ($jobs_list as $jobs) {

                echo "Job Title:" . $jobs->job_title . ", Company Name: " . $jobs->company_name . ",  " . "Start Date:" . $jobs->start_date . " " . "End Date:" . $jobs->end_date . "\n";

            }

            echo "\n\n";

        }

    }
}
