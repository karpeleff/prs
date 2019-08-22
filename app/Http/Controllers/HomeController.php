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

        $record->start = $this->request->start;
        $record->stop = $this->request->stop;
        $record->type = $this->request->type;

        $record->save();
        
        return view('home');
        
        
    }
}
