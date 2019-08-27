@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">Рабочий стол</div>

                <div class="panel-body">
                    {!! Table::generateModel(
       [ 'Дизель', 'Старт','Стоп','причина'],  // Column for table
       'App\Models\DizelWork' // Model
       ,['type', 'start', 'stop','reason'], // Fields from model
       0, // Pagination Limit, if 0 all will show
       'class="table table-striped"' // Attributes sample js/css
       ) !!}  
                </div>
            </div>
        </div>
         <div class="col-md-4 ">
            <div class="panel panel-default">
                <div class="panel-heading">Панель Управления</div>

                <div class="panel-body">
                   

                    You are logged in!
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Генератор документов</div>

                <div class="panel-body">
                      <form class="form-inline" method="post" action="/">
                      {{csrf_field()}}
                      <div class="form-group">
  <label for="sel1">Выбрать период:</label>
  
  
        <div class="form-group">
            <div class='input-group date' id='datetimepicker16'>
                <input type='text' class="form-control" name="period" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker16').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
        });
    </script>
     <br />
 <br /> 
    <div class="form-group">
  <label for="sel1">Документ:</label>
  <br /> 
  
  <select class="form-control" >
    <option>План работ</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>
    
  <br />
 <br /> 

<button type="submit" class="btn btn-default">Сформировать</button>  
    
                      
    </form>                  
                      
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Работа Дизелей</div>

                <div class="panel-body">
                
                <form class="form-inline" method="post" action="/addtime">
                
                
                
                <label class="radio-inline"><input type="radio" name="type"  value="ADR16.5" checked>ADR16.5</label>
                
                <label class="radio-inline"><input type="radio" name="type" value="SD6000E" >SD6000E</label>
                 <br />
                 <br />
                 
                 <label class="radio-inline"><input type="radio" name="reason"  value="Отсутствие  промсети " checked>АВАРИЯ</label>
                
                <label class="radio-inline"><input type="radio" name="reason" value="Контрольный пуск" >ТО</label>
                 <br />
                 <br />
   
      
            <div class="form-group">
                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" placeholder="старт"   name="start" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
             <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker({
                    locale: 'ru',
                     format: 'HH:mm'
                });
            });
        </script>
       <br />
    <br /> 
  
  
  
            <div class="form-group">
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' class="form-control" placeholder="стоп"  name="stop"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
             <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    locale: 'ru',
                     format: 'HH:mm'
                });
            });
        </script>
        
 
  
   <br />
    <br />
  <button type="submit" class="btn btn-default">В журнал!</button>
</form>
 <br />
    <br />
<form class="form-inline" method="post" action="/newdoc">
                
                {{csrf_field()}}
<div class="form-group">
  <label for="sel1">Выбрать период:</label>
  
  
        <div class="form-group">
            <div class='input-group date' id='datetimepicker10'>
                <input type='text' class="form-control" name="period" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker10').datetimepicker({
                viewMode: 'years',
                format: 'MM/YYYY'
            });
        });
    </script>



<br />
 <br /> 

<button type="submit" class="btn btn-default">Сформировать отчеты</button>
  </form>                 
<br />
    <br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
