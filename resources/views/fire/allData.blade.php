@extends('fire.header')

@section('content')

  <div class="starter-template">
   <br /> <br /> <br /> <br /> <br /> <br />
   <div class="alert alert-primary" role="alert">
 Список всех
</div>

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">№</th>
      <th scope="col">место уст</th>
      <th scope="col">модель</th>
      <th scope="col">тип ОТВ</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($data as $row)
  
    <tr>
      <th scope="row">{{$row->inv_number}}</th>
      <td>{{$row->install_place}}</td>
      <td>{{$row->model}}</td>
      <td>{{$row->stuff_type}}</td>
      <td><a href="/getrecord/{{$row->id}}" > <i class="fab fa-apple" ></i> </a></td>
      <td><a href="/delrecord/{{$row->id}}" > <i class="fas fa-cart-arrow-down"></i> </a></td>
    </tr>
  @endforeach
    
  </tbody>
</table>

</div>




</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/bower_components/bootstrap/dist.4.3/js/bootstrap.bundle.min.js"></script>
      
      <!-- модальное окно -->
      
      <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog  modal-sm ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Basic Modal </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Действительно удалить запись ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть </button>
        <button type="button" class="btn btn-success">Удалить</button>
      </div>
    </div>
  </div>
</div>
      </body>
</html>

@endsection
