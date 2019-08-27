<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DizelWork;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        
        $this->request = $request;
        
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function addTime()
    {
       if ($this->request->start == null)
        {
            return view('home');
        }
        
          $record = new DizelWork;

        $record->start   = $this->request->start;
        $record->stop    = $this->request->stop;
        $record->type    = $this->request->type;
        $record->reason  = $this->request->reason;
        $record->save();
        
        return view('home');
        
        
    }
    
    public function  newDoc()
    {
      
      
         $period  =   $this->request->period;
      
         $mons    =   substr($period, 0, 2);
         
        // $mons   = strval($mons );
         
         
         $year    =   substr($period, 3, 4);
         
         $last_day = cal_days_in_month(CAL_GREGORIAN, $mons, $year);
         
         
         $m = [
         '01'=>'января',
         '02' => 'февраля',
         '03' => 'марта',
         '04' => 'апреля',
         '05' => 'мая',
         '06' => 'июня',
         '07' => 'июля',
         '08 '=> 'августа',
         '09' => 'сентября',
         '10' => 'октября',
         '11' => 'ноября',
         '12' => 'декабря',                 
         ];
         
        // echo $m[$mons];
         
         
      
       // $period = '2019-08';   03/2019;
        
        $search = $year.'-'.$mons;
        
       // echo $search;
        
        $data = $this->getPeriod($search);
        
        //$mons_ru =strval($m[$mons] ); ;
        
     /**
 *    foreach ($data as $item) {
 *             
 *          echo $item->type;
 *          
 *          echo '<br>';
 *          
 *           echo $item->start;

 *           echo '<br>';
 *           echo $item->stop;

 *           echo '<br>';
 *           
 *         echo $item->reason;

 *           echo '<br>';
 *     }
 */
       $count = count($data);
 
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('doctemp/Справка о работе дизелей  шаблон .docx');
    $templateProcessor->setValue('mons','$mons_ru' );
    $templateProcessor->setValue('year', $year);
    $templateProcessor->setValue('date', '14.02');
    $templateProcessor->setValue('stop_time', '00.25');
    $templateProcessor->cloneRow('dez_type',$count );
    $values = [
    ['userId' => 1, 'userName' => 'Batman', 'userAddress' => 'Gotham City'],
    ['userId' => 2, 'userName' => 'Superman', 'userAddress' => 'Metropolis'],
];
$templateProcessor->cloneRowAndSetValues('userId', $a );
    
    foreach($data   as $item)
    {
      $i = 1;
      
        
        
    }
    
    
    $templateProcessor->saveAs("docs/Справка о работе дизелей ".$mons.".docx");
    
 }   
    
    
    public function getPeriod($search)
    {    
        
        $data  = DizelWork::where('created_at', 'like', $search . '%')->get();
       
        return $data;
    }
    
    
}
