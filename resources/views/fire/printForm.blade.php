 <script src="https://kit.fontawesome.com/5b60663aaf.js" crossorigin="anonymous"></script>
<style type="text/css">

table {
  width: 350px;
 
}

.fire{

float: left;

}


.tg td{font-family:Times New Roman;
  text-align: center;
  font-size:10pt;
  border-style:solid;
  border-width:2px;
  border-color:black;
}
.tg th{font-family:Times New Roman;
  text-align: center;
  font-size:10pt;
  border-style:solid;
  border-width:2px;
  border-color:black;
}
.tg-my{
   padding-bottom: 30px;

}

</style>

@foreach ($data as $item)
   
    
  <div class="fire"  >
  <table class="tg">
  <tr>
    <th class="tg-lboi" colspan="3">   Вид технического обслуживания</th>
  </tr>
  <tr>
    <td class="tg-lboi">Осмотр огнетушителя {{$item->model}} № {{$item->inv_number}}
снаружи
20.03.20
Вес: {{$item->weight}} кг.
</td>
    <td class="tg-lboi">Проверка качества ОТВ 19.12.2019 г.;
  ВДПО г.Дальнереченск {{$item->stuff_type}}
</td>
    <td class="tg-lboi">Гидравлическое
(пневматическое)
испытание /дата
проведения, величина
испытательного
давления/
</td>
  </tr>
  <tr>
    <td class="tg-my" colspan="2" rowspan="2"> ВЦ ОВД ОПРС Богуславец. 
Техник  РН. РЛ и связи Карпелев А.А.
</td>
    <td class="tg-lboi"> Дата проведения следующего испытания огнетушителя
</td>
  </tr>
  <tr>
    <td class="tg-lboi"> июнь 2020 г</td>
  </tr>
</table>

<br />  
<br />     
 <br /> 
</div>
   
@endforeach
<br />
<a class ="print-doc" href="javascript:(print());"> <i class="fas fa-print"></i></a>


