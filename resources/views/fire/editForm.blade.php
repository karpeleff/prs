@extends('fire.header')

@section('content')

  <div class="starter-template">
   <br /> <br /> <br /> <br /> <br /> <br />
   <div class="alert alert-primary" role="alert">
 Редактируем данные
</div>
<div>
<form  action="/updaterecord"  method="post"  >

 {{csrf_field()}}
 
 <input  type="hidden"  name="id" value="{{$data->id}}"  />
 
<label>порядковый  номер </label>
<input  type="text"   class="form-control" name="inv_number"  value="{{$data->inv_number}}" />
<br />
<label>вес</label>
<input  type="text"   class="form-control"  name="weight" value="{{$data->weight}}" />
<br />
<label>место  установки</label>
<input  type="text"   class="form-control" name="install_place" value="{{$data->install_place}}" />
<br />
<label>категория помещения</label>
<input  type="text"   class="form-control"  name="category_place" value="{{$data->category_place}}"/>
<br />
<label>заводской номер</label>
<input  type="text"   class="form-control"  name="manufactory_number"  value="{{$data->manufactory_number}}" />
<br />

<label>тип огнетушащего вещества</label>
<input  type="text"   class="form-control" name="stuff_type"  value="{{$data->stuff_type}}" />
<br />

<label>модель</label>
<input  type="text"   class="form-control" name="model"  value="{{$data->model}}" />
<br />


 <button type="submit" class="btn btn-primary">Submit</button>
 <br />
 <br />
</form>
</div>


</div>




</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/bower_components/bootstrap/dist.4.3/js/bootstrap.bundle.min.js"></script></body>
</html>
@endsection
