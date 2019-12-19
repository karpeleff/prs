<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component_type;
use App\Models\Component;

class StorageController extends Controller
{
    //
    
     protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    
    
    
    
    public function addComponentType()
    {
       
       if ($this->request->name == null)
        {
            return view('storage.addtype');
        }
       
       
        $record = new Component_type;
       
        $record->name = $this->request->name;    
        
        $record->save();
        
         return view('storage.addtype');
        
    }
    
      public function addComponent()
    {
       
       if ($this->request->name == null)
        {
            return view('storage.addcomponent');
        }
       
       
        $record = new Component;
       
        $record->name = $this->request->name;
        
        $record->quantity = $this->request->quantity; 
        
        $record->price = $this->request->price; 
        
        $record->box = $this->request->box;
        
        $record->id_component_types = 567;      
        
        $record->save();
        
         return view('storage.addcomponent');
        
    }
    
    
     public function searchComponent()
    {
       
       if ($this->request->search == null)
        {
            return view('storage.searchcomponent');
        }
       
        $seek = $this->request->input('search');

        $data   =  Component::where('name', 'like','%' . $seek . '%')->get();
       
        return view('storage.searchcomponent', array('data' => $data));
       
       
    }
    
    
}
