<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fire;

class FireController extends Controller
{
    public function __construct(Request $request)
    {

        $this->request = $request;

        //$this->middleware('auth');
    }
    
    public function    allData()//вывод всех записей в таблицу
    {
      
      $data = Fire::All();
      
      return view('fire.allData')->with('data', $data);
      
        
    }
    
    
    public  function  newFire()//поля для ввода данных
    {
      return   view('fire.makeForm');   
    }
    
    
    public function  addFire()//вставка новой записи в таблицу бд
    {
        $record = new Fire;
        
        
        $record->weight             = $this->request->weight;
        
        $record->install_place      = $this->request->install_place;
        
        $record->category_place     = $this->request->category_place;
        
        $record->manufactory_number = $this->request->manufactory_number;
        
        $record->inv_number         = $this->request->inv_number;
        
        $record->stuff_type         = $this->request->stuff_type;
         
        $record->model              = $this->request->model;
            
        $record->save();
        
        return   view('fire.makeForm');
        
        
    }
    
    public  function  updateRecord()//  обновление даных
    {
        $record                     = Fire::find($this->request->id);
      
        $record->weight             = $this->request->weight;
        
        $record->install_place      = $this->request->install_place;
        
        $record->category_place     = $this->request->category_place;
        
        $record->manufactory_number = $this->request->manufactory_number;
        
        $record->inv_number         = $this->request->inv_number;
        
        $record->stuff_type         = $this->request->stuff_type;
         
        $record->model              = $this->request->model;
            
        $record->save();

      
      return redirect('/allfire');
        
    }
    
    public function  getRecord($id)//выбор одной записи
    {
       $data = Fire::find($id);
       
  
       return view('fire.editForm')->with('data', $data); 
        
    }
    
    
     public function  delRecord($id)// удаление записи по id
    {
       $data = Fire::find($id);
       
       $data->delete();
        
      return redirect('/allfire');
        
    }
    
    
    
    
    
    public  function  printLabel()//вывод  на печать
    {
        
         $data = Fire::All();
          
         return view('fire.printForm')->with('data', $data);
    }
    
    
    
}
