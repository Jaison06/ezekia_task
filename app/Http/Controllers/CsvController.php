<?php

namespace App\Http\Controllers;
use App\Models\eze_candidates;
use App\Models\eze_jobs;
use Illuminate\Support\Carbon;

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

//         eze_candidates::insert([
//             'first_name' =>  $first_name,
//             'last_name' => $last_name,
//             'email' => $email,
           
//         ]);
//     }
//     fclose($handle);
// }
    
$csvFileName = "\csv\jobs.csv";


$row = 1;
if (($handle = fopen(storage_path().$csvFileName, 'r')) !== FALSE) {
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
$num = count($data);
$candidate_id = $data['1'];
$job_title =  $data['2'];
$company_name = $data['3'];
// $start_date = Carbon::createFromFormat('d.m.Y hh:mm:ss', $data['4'])->timestamp;
// $end_date =  Carbon::createFromFormat('d.m.Y hh:mm:ss', $data['5'])->timestamp;
$start_date = strtotime(str_replace(".", "-", $data['4']));
$end_date =  strtotime(str_replace(".", "-", $data['5']));

eze_jobs::insert([
    'candidate_id' =>  $candidate_id,
    'job_title' => $job_title,
    'company_name' => $company_name,
    'start_date' => $start_date,
    'end_date' => $end_date,
   
]);



// echo "<p> $num fields in line $row: <br /></p>\n";
// $row++;
// for ($c=0; $c < $num; $c++) {
//     echo $data[$c] . "<br />\n";
// }
}
fclose($handle);
}


     }
    

}
