@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">Result</div>

                <div class="panel-body">
                             
                               <table class="table table-hover">
                                <thead>
      <tr>
        <th>component</th>
        <th>box</th>
        <th>quantity</th>
      </tr>
    </thead>
                               
                               

    <tbody>
    
@isset($data)

    @foreach ($data as $row)
   
      <tr>
     
        <td>{{ $row->name }}    </td>
          
      <td>
    {{ $row->box }}
   
      </td>
      
      <td>
    {{ $row->quantity}}
   
      </td>
      
      
      
      </tr>
     @endforeach
@endisset
    
      

     
    </tbody>
  </table>
                    
                </div>
            </div>
        </div>
         <div class="col-md-4 ">
                  
              <div class="panel panel-default">
                <div class="panel-heading">Search</div>

                <div class="panel-body">
                
                <form class="form-inline" method="post" action="/searchcomponent">
                
                {{csrf_field()}}
     
            <div class="form-group">
                <div>
                    <input type='text' class="form-control" placeholder="Search"   name="search" />
                   
                </div>
            </div>
           
 
   <br />
    <br />
  <button type="submit" class="btn btn-default">Search</button>
</form>
 <br />
    <br />
                
<br />
    <br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
