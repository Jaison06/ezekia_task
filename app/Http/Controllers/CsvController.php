<?php

namespace App\Http\Controllers;
use App\Models\eze_candidates;
use App\Models\eze_jobs;
use Illuminate\Support\Carbon;
use DateTime;

use Illuminate\Http\Request;

class CsvController extends Controller
{
    //

    function index(){
//         $csvFileName = "\csv\candidates.csv";


//         $row = 1;
// if (($handle = fopen(storage_path().$csvFileName, 'r')) !== FALSE) {
//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//         $num = count($data);
//         $first_name = $data['1'];
//         $last_name =  $data['2'];
//         $email = $data['3'];

//$check_candidates = eze_candidates::where('email', '=', $email)->first();
//if ($check_candidates === null) {
  

//         eze_candidates::insert([
//             'first_name' =>  $first_name,
//             'last_name' => $last_name,
//             'email' => $email,
           
//         ]);

//}

//     }
//     fclose($handle);
// }
    
// $csvFileName = "\csv\jobs.csv";


// $row = 1;
// if (($handle = fopen(storage_path().$csvFileName, 'r')) !== FALSE) {
// while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
// $num = count($data);

// $candidate_id = $data['1'];
// $job_title =  $data['2'];
// $company_name = $data['3'];
// $start_date = Carbon::createFromFormat("d.m.Y H:i", $data['4']);
// $end_date =  Carbon::createFromFormat("d.m.Y H:i", $data['5']);

//$check_jobs = eze_jobs::where([['candidate_id', '=', $candidate_id] ,['job_title', '=', $job_title], ['company_name', '=', $company_name]])->first();
//if ($check_jobs === null) {


// eze_jobs::insert([
//     'candidate_id' =>  $candidate_id,
//     'job_title' => $job_title,
//     'company_name' => $company_name,
//     'start_date' => $start_date,
//     'end_date' => $end_date,
   
// ]);

//}

// echo "<p> $num fields in line $row: <br /></p>\n";
// $row++;
// for ($c=0; $c < $num; $c++) {
//     echo $data[$c] . "<br />\n";
// }
//}
//fclose($handle);
//}




$eze_jobs = eze_candidates::find(1)->eze_jobs;

return $eze_jobs;







 }
    

}
