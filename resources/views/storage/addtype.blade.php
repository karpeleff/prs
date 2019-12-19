@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">Рабочий стол</div>

                <div class="panel-body">
                                
                    {!! Table::generateModel(
       [ 'тип компонента'],  // Column for table
       'App\Models\Component_type' // Model
       ,['name'], // Fields from model
       7, // Pagination Limit, if 0 all will show
       'class="table table-striped"' // Attributes sample js/css
       ) !!} 
           
         {{ Table::links() }} 
                </div>
            </div>
        </div>
         <div class="col-md-4 ">
                  
              <div class="panel panel-default">
                <div class="panel-heading">New Type</div>

                <div class="panel-body">
                
                <form class="form-inline" method="post" action="/add_type">
                
                {{csrf_field()}}
     
            <div class="form-group">
                <div>
                    <input type='text' class="form-control" placeholder="New type"   name="name" />
                   
                </div>
            </div>
           
 
   <br />
    <br />
  <button type="submit" class="btn btn-default">add Type</button>
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
