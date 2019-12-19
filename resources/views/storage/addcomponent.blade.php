@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">Storage</div>

                <div class="panel-body">
                
<!-- https://github.com/lloricode/laravel-html-table -->
                
                
                                
                    {!! Table::generateModel(
       [ ' компонент','количество','цена','№ бокса','тип'],  // Column for table
       'App\Models\Component' // Model
       ,['name','quantity','price','box','id_component_types'], // Fields from model
       7, // Pagination Limit, if 0 all will show
       'class="table table-striped"' // Attributes sample js/css
       ) !!} 
           
         {{ Table::links() }} 
                </div>
            </div>
        </div>
         <div class="col-md-4 ">
                  
              <div class="panel panel-default">
                <div class="panel-heading">New Component</div>

                <div class="panel-body">
                
                <form class="form-inline" method="post" action="/add_component">
                
                {{csrf_field()}}
     
            <div class="form-group">
                <div>
                    <input type='text' class="form-control" placeholder="name"   name="name" />
                   
                </div>
                <br />
                 <div>
                    <input type='text' class="form-control" placeholder="quantity"   name="quantity" />
                   
                </div>
                <br />
                 <div>
                    <input type='text' class="form-control" placeholder="price"   name="price" />
                   
                </div>
                <br />
                 <div>
                    <input type='text' class="form-control" placeholder="box"   name="box" />
                   
                </div>
            </div>
           
 
   <br />
    <br />
  <button type="submit" class="btn btn-default">add Component</button>
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
