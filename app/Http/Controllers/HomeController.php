<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Models\DizelWork;
use App\Models\Diz;

use DB;

use Carbon\Carbon;

use Carbon\CarbonInterval;

/**
 * HomeController
 * 
 * @package   
 * @author newprs
 * @copyright admin
 * @version 2019
 * @access public
 */
/**
 * HomeController
 * 
 * @package   
 * @author neuron
 * @copyright admin
 * @version 2019
 * @access public
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * HomeController::__construct()
     * 
     * @param mixed $request
     * @return
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
    /**
     * HomeController::index()
     * 
     * @return
     */
    public function index()
    {
        return view('home');
    }

    /**
     * HomeController::addTime()
     * 
     * @return
     */
    public function addTime()//новая запись в базу работы дизельгенератора
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

    /**
     * HomeController::newDoc()
     * 
     * @return
     */
    public function newDoc()
    {


        $period = $this->request->period;

        $mons = substr($period, 0, 2);//подстрока месяц

        $year = substr($period, 3, 4);//подстрока год

        $last_day = cal_days_in_month(CAL_GREGORIAN, $mons, $year);


        $m = ['01' => 'января',
              '02' => 'февраля', 
              '03' => 'марта',
              '04' => 'апреля',
              '05' => 'мая',
              '06' => 'июня',
              '07' => 'июля',
              '08' => 'августа',
              '09' =>'сентября',
              '10' => 'октября',
              '11' => 'ноября',
              '12' => 'декабря' ];
              
              
        $m_1 = ['01' => 'январь',
              '02' => 'февраль', 
              '03' => 'март',
              '04' => 'апрель',
              '05' => 'май',
              '06' => 'июнь',
              '07' => 'июль',
              '08' => 'август',
              '09' =>'сентябрь',
              '10' => 'октябрь',
              '11' => 'ноябрь',
              '12' => 'декабрь' ];
              

        // $m[$mons];


        // $period = '2019-08';   03/2019;

        $search = $year . '-' . $mons;

        // echo $search;

        $data = $this->getPeriod($search);


        $count = count($data);

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('doctemplate/template#1.docx');
        $templateProcessor->setValue('mons', $m[$mons]);// подстановка строки  месяца 
        $templateProcessor->setValue('year', $year);
        $templateProcessor->setValue('last_day', $last_day);
        $templateProcessor->cloneRow('dez_type', $count);


        $i = 1;
        $itog_sd;
        $itog_adr;
        $work_time = 0;
        $date;
        $time;
        $itog_adr = [];
        $itog_sd = [];
        $adr;
        $sd;
        $amount;
        $rashod_adr;
        $rashod_sd;

        foreach ($data as $item)
        {

            $date = substr($item->created_at, 0, 10);
            
           // $date = date_create('2006-12-12');

            $time = strtotime($date);

            $newformat = date('d-m-y', $time); //'d-m-Y'
            
            
            
         
                if($item->stop < $item->start )//начало новых суток
                {
                                       
                   $work_time = (strtotime($item->stop) + 86400 - strtotime($item->start)) / 60;
                   
                  
                  
                                   
                }else{
                    
                    $work_time = (strtotime($item->stop) - strtotime($item->start)) / 60;
                                        
                }
            
                        
            $work_time = $work_time / 60;  // часы и сотые доли часа

            $work_time = round($work_time, 2);

            $templateProcessor->setValue(array
                                              ('dez_type#'   . $i,
                                               'start_time#' . $i,
                                               'stop_time#'  . $i,
                                               'date#'       . $i,
                                               'work_time#'  . $i,
                                               'reason#'     . $i),
                                                
                                                 array( $item->type, 
                                                        $item->start,
                                                        $item->stop,
                                                        $newformat, 
                                                        $work_time,
                                                        $item->reason));
            $i++;

            if ($item->type == 'ADR16.5')//подсчет общего времени работы ДГУ
            {
                $itog_adr[] = $work_time;
            } else
            {
                $itog_sd[] = $work_time;
            }

        }

        $sd  = array_sum($itog_sd);

        $adr = array_sum($itog_adr);
        
        


        $templateProcessor->setValue('itog_adr', $adr);
        
        $templateProcessor->setValue('itog_sd', $sd);

        $templateProcessor->saveAs("docs/Справка о работе дизелей " . $mons . ".docx");
        
        
        
         $newTemplate = new \PhpOffice\PhpWord\TemplateProcessor('doctemplate/template#2.docx');
         $newTemplate->setValue('mons', $m[$mons]);
         $newTemplate->setValue('year', $year);
         $newTemplate->setValue('last_day', $last_day);        
         $newTemplate->setValue('itog_adr', $adr);
         
         $rashod_adr = $adr*2.7 ; //Подсчет выработки топлива
         $rashod_sd = $sd*1.9 ;
         
        // $amount = Diz;
        // $amount->latest()->first();
         
         
         
        // $fuel = new Diz;
        // $fuel->amount = ($rashod_adr+$rashod_sd);
        // $fuel->save();
            //$last = DB::table('Dizs')->latest()->first();
          
                $amount = Diz::orderby('id', 'desc')->first();//остаток топлива
             // echo $qyery->amount;
             
                   $controlRecord =  $amount->created_at;
                   
                   $control =  substr($controlRecord,5,2);
                   
                   
                   if($mons != $control)
                   {
                    $fuel = new Diz;//отнимаем расход
                    $fuel->amount  = $amount->amount -($rashod_adr+$rashod_sd) ;
                    $fuel->save();
                   }
                 
                 
           
             
             
            
            
           
              
               
              
           // return;
         
         //dd($last);
         
         
         $newTemplate->setValue('itog_sd', $sd);
         $newTemplate->setValue('rashod_adr',$rashod_adr);
         $newTemplate->setValue('rashod_sd', $rashod_sd);
        
        
         $newTemplate->setValue('itog_all',$rashod_adr+$rashod_sd);       
         $newTemplate->saveAs("docs/Акт списания ГСМ  " . $mons . ".docx");
        
        //return view('home');
        
        //формирование документа Сводный отчет
        
         $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('doctemplate/template#3.xlsx');
         $worksheet = $spreadsheet->getActiveSheet();
         $worksheet->getCell('E12')->setValue($amount->amount);
         $worksheet->getCell('E10')->setValue("Остаток на 01.".$mons . "." . $year );
         $worksheet->getCell('H10')->setValue("Остаток на 01.".($mons+1) . "." . $year );
         $worksheet->getCell('B8')->setValue("за ".$m_1[$mons]." ".$year);
         $worksheet->getCell('G12')->setValue($rashod_adr+$rashod_sd);
         $worksheet->getCell('H12')->setValue($amount->amount -($rashod_adr+$rashod_sd));
         $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
         $writer->save("docs/сводный отчет ГСМ " . $mons . " " . $year  . ".xls" );
        
        return redirect('home');
        

    }


    /**
     * HomeController::getPeriod()
     * 
     * @param mixed $search
     * @return
     */
    public function getPeriod($search)
    {

        $data = DizelWork::where('created_at', 'like', $search . '%')->get();

        return $data;
    }
    /**
     * HomeController::test()
     * 
     * @return
     */
    public function test()
    {
   $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('doctemplate/template#2.docx');
   $templateProcessor->setImageValue('Sign', 'doctemplate/1.png');
   $templateProcessor->saveAs('doctemplate/sign.docx');
 

    }

/**
 * HomeController::dellRow()
 * 
 * @param mixed $id
 * @return
 */
public function   dellRow($id)
{
    
    DizelWork::destroy($id);
    
    return view('home');
    
    
    
}

public function   draft()
{
      $inputFileName = 'doctemplate/template#5.xlsx';
      // $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
       $spreadsheet = IOFactory::load($inputFileName);
       $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
     
      
      
      $file = serialize($sheetData);
            
       $filename = 'people.txt';
       
      
       file_put_contents($filename, $file); 
       
         $inputFileName = 'doctemplate/template#5.xlsx';
      // $helper->log('Loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
       $spreadsheet = IOFactory::load($inputFileName);
       $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
     
         
}



}
