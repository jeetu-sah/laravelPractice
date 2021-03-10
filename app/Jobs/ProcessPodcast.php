<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use DB;
use Excel;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Storage;
use Throwable;
use App\Events\JobsComplete;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $hostName;
    public function __construct($varArr)
    {
       
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $folderPath = 'export';
        collect(DB::select('show tables'))->map(function ($val) use($folderPath){
            foreach ($val as $table) {
                if($table == "users"){
                        $fileName   = $table.'.csv';
                        $filePath   = $folderPath."/".$fileName;
                        Storage::put($filePath, '');
                        /*open file path*/
                        $openFilePath = storage_path('app/'.$filePath);

                        //echo $openFilePath;exit;
                        $fh = fopen($openFilePath,'w');

                        /*Set the header of table */
                        $tableColumn = DB::table($table)->first();
                        if($tableColumn != NULL){
                            $tableColumn = array_keys((array) $tableColumn);
                            fputcsv($fh, $tableColumn);
                        }
                        /*End*/
                        /*Data store in csv file */
                        DB::table($table)->orderBy('id')->chunk(100 , function($response) use ($fh){
                            foreach ($response as $line) {
                                $arrayValue = array_values((array) $line);
                                fputcsv($fh, $arrayValue);
                            }
                        });
                        /*end*/
                        fclose($fh);
                }
            }
        });
        //event( new JobsComplete("Jobs Working successs fully"));
       
    }

    public function failed(Throwable $exception)
    {
       echo "jobs failed";
    }
}
