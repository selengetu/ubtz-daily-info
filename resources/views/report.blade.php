@extends('layouts.parent')

@section('style')

<style>
    .table td,
    .table th {
        font-size: 10px;
    }
    
</style>
@endsection

@section('content')
<style>
   .form-group {
    margin-bottom: 5px;
}
    
</style>
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-8 align-self-center">
           
            
        </div>
        
    </div>

    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                <form action="home" method="post" >
                                        {{ csrf_field() }}
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label for="count_year">Эхлэх огноо</label>
                                        <input class="form-control form-control-inline input-medium date-picker" name="sdate" id="sdate"
                        size="16" type="text" value="">
                                      </div>
                                   
                                </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="count_year">Дуусах огноо</label>
                                      <input class="form-control form-control-inline input-medium date-picker" name="fdate" id="fdate"
                        size="16" type="text" value="">
                                    </div>
                                 
                              </div>
                                        <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="count_year">Алба/Салбар нэгж</label>
                                      <select class="form-control" id="sexecutor_id" name="sexecutor_id">
                                        <option value= "0"> Бүгд </option>
                                                @foreach($executor as $executors)
                                                   
                                                    <option value= "{{$executors->executor_id}}" > @if($executors->executor_type == 2){{$executors->dep_abbr}} - {{$executors->executor_abbr}}
                                                        @else {{$executors->executor_abbr}}@endif</option>
                                           
                                                @endforeach
                                      
                                      </select>
                                    </div>
                                  </div>
                                 
                                  <div class="col-md-1">
                                    <div class="form-group">
                                        <label for="count_year">.</label>
                                        <button type="submit" class="btn btn-info form-control" style="color:white">Хайх</button>
                                    </div>
                                  </div>
                         </form>
                                  
                                    
    
    
                                </div>
                             
                              </div>
                              <div class="col-md-2">
                             
                                        
                             <button class="btn btn-info" id="export-btn" onclick="printData()"><i class="fa fa-print" aria-hidden="true"></i> Хэвлэх/Pdf</button>
                         </div>       
                <div id="test" class="table-responsive m-t-20"> 
                <h3 class="text-themecolor">Замын хэмжээнд хийгдэж буй халдваргүйжүүлэлтийн мэдээ</h3>   
                
                <table class="table table-bordered vm"  cellpadding="5" 
                style="border-collapse:collapse; font-size:10px; color:black; word-wrap:break-word; " id="example2">
                <thead>
                    <tr>
                        <th rowspan="2">Огноо</th>
                        
                        <th rowspan="2">Салбар<br>нэгж</th>
                        <th colspan="2">Өдөр тутмын<br> халдваргүйтэл <br> хийсэн (өөрсдөө)</th>
                        <th colspan="2">Мэргэжлийн<br> байгууллагаар <br> хийлгэсэн <br> халдваргүйжүүлэлт</th>
                        <th colspan="2">Мэргэжлийн<br> байгууллагаар <br> хийлгэсэн <br> халдваргүйжүүлэлт</th>
                        <th colspan="3">Зүтгүүрийн <br> халдваргүйжүүлэлт</th>
                        <th  colspan="2">Зорчигчийн вагон</th>
                        <th rowspan="2">Албан <br> хэрэгцээний<br>автомашин </th>
                        <th  rowspan="2">Ажилчдын<br>автобус</th>
                        <th  rowspan="2">Хүнс<br>тээвэрлэх<br>машин </th>
                        <th rowspan="2">Тайлбар</th>
                    </tr>
                    <tr>
                        <?php $sum_self_room = 0 ?>
                        <?php $sum_self_plot = 0 ?>
                        <?php $sum_ex_room = 0 ?>
                        <?php $sum_ex_plot = 0 ?>
                        <?php $sum_ex_container = 0 ?>
                        <?php $sum_ex_train = 0 ?>
                        <?php $sum_loc_z = 0 ?>
                        <?php $sum_loc_a = 0 ?>
                        <?php $sum_loc_s = 0 ?>
                        <?php $sum_pas_vag = 0 ?>
                        <?php $sum_pas_teesh = 0 ?>
                        <?php $sum_autobus = 0 ?>
                        <?php $sum_company_car = 0 ?>
                        <?php $sum_food_car = 0 ?>
                   
                        <th>Өрөө байр</th>
                        <th>Талбай</th>
                        <th>Өрөө байр</th>
                        <th>Талбай</th>
                        <th>Галт тэрэг</th>
                        <th>Вагон <br>чингэлэг</th>
                        <th>Зөөврийн</th>
                        <th>Ачааны</th>
                        <th>Сэлгээний</th>
                        <th>Вагон</th>
                        <th>Тээш</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <?php $s=1;
                        $p=0;
                        $p1=0;
                        $iall=0;
                        $i1=0;
                        $i2=0;
                        $i3=0;
                        $i4=0;
                        $i5=0;
                        $i6=0;
                        $i7=0;
                        $i8=0;
                        $i9=0;
                        $i10=0;
                        $i11=0;
                        $i12=0;
                        $i13=0;
                        $i14=0;
                    
                        ?>
                        <?php $all=count($info);?>
                        <?php $no = 1; ?>
                        <?php $no1 = 1; ?>
                        @foreach($info as $i=>$in)
                            @if($p!=$in->executor_par and $p>0 )
                    
                                <tr style="background: #F0F0B2">
                                    <td colspan="2"><center><b>Дүн</b> </center></td>
                                    <td><b>{{number_format($i1)}}</b></td>
                                    <td><b>{{number_format($i2)}}</b> </td>
                                    <td><b>{{number_format($i3)}}</b> </td>
                                    <td><b>{{number_format($i4)}}</b></td>
                                    <td><b>{{number_format($i5)}}</b></td>
                                    <td><b>{{number_format($i6)}}</b></td>
                                    <td><b>{{number_format($i7)}}</b></td>
                                    <td><b>{{number_format($i8)}}</b></td>
                                    <td><b>{{number_format($i9)}}</b> </td>
                                    <td><b>{{number_format($i10)}}</b> </td>
                                    <td><b>{{number_format($i11)}}</b></td>
                                    <td><b>{{number_format($i12)}}</b></td>
                                    <td><b>{{number_format($i13)}}</b></td>
                                    <td><b>{{number_format($i14)}}</b></td>
                                    <td></td>
                                    
                                </tr>
                            @endif
                            <?php if($p!=$in->executor_par) { $p=$in->executor_par;
                                $i1=0;
                                $i2=0;
                                $i3=0;
                                $i4=0;
                                $i5=0;
                                $i6=0;
                                $i7=0;
                                $i8=0;
                        $i9=0;
                        $i10=0;
                        $i11=0;
                        $i12=0;
                        $i13=0;
                        $i14=0;
                       
                            } else  { $p1=$in->executor_par; }?>
                    
                            @if($p!=$p1 and $p>0)
                                <?php $no = 1; ?>
                                <Tr><td colspan="19" style="font-weight: bold;font-size: 12px;"> {{$in->dep_abbr}}</td></Tr>
                                <?php $s++; ?>
                                <tr>
                                    @if($in->executor_id == $in->executor_par) 
                                    <td colspan=2 ><b>{{$in->date}}</b></td>
                                   @else
                                   <td ><b>{{$in->date}}</b></td>
                                   <td> <b>{{$in->executor_abbr}}</b> </td>
                                    @endif
                                   
                                   
                                  
                                   
                                    <td>{{$in->self_room}}</td>
                                    <?php $sum_self_room += ($in->self_room) ?>
                                    <td>{{$in->self_plot}}</td>
                                    <?php $sum_self_plot += ($in->self_plot) ?>
                                    <td>{{$in->ex_room}}</td>
                                    <?php $sum_ex_room += ($in->ex_room) ?>
                                    <td>{{$in->ex_plot}}</td>
                                    <?php $sum_ex_plot += ($in->ex_plot) ?>
                                    <td>{{$in->ex_train}}</td>
                                    <?php $sum_ex_train += ($in->ex_train) ?>
                                    <td>{{$in->ex_container}}</td>
                                    <?php $sum_ex_container += ($in->ex_container) ?>
                                    <td>{{$in->loc_z}}</td>
                                    <?php $sum_loc_z += ($in->loc_z) ?>
                                    <td>{{$in->loc_a}}</td>
                                    <?php $sum_loc_a += ($in->loc_a) ?>
                                    <td>{{$in->loc_s}}</td>
                                    <?php $sum_loc_s += ($in->loc_s) ?>
                                    <td>{{$in->pas_vag}}</td>
                                    <?php $sum_pas_vag += ($in->pas_vag) ?>
                                    <td>{{$in->pas_teesh}}</td>
                                    <?php $sum_pas_teesh += ($in->pas_teesh) ?>
                                    <td>{{$in->company_car}}</td>
                                    <?php $sum_company_car += ($in->company_car) ?>
                                    <td>{{$in->autobus}}</td>
                                    <?php $sum_autobus += ($in->autobus) ?>
                                    <td>{{$in->food_car}}</td>
                                    <?php $sum_food_car += ($in->food_car) ?>
                                    <td>{{$in->description}}</td>
                                     </tr>
                                <?php $no++; ?>
                                <?php $no1++; ?>
                            @else
                    
                            <tr>
                                @if($in->executor_id == $in->executor_par) 
                                    <td colspan=2 ><b>{{$in->date}}</b></td>
                                   @else
                                   <td ><b>{{$in->date}}</b></td>
                                   <td> <b>{{$in->executor_abbr}}</b> </td>
                                    @endif
                                <td>{{$in->self_room}}</td>
                                <?php $sum_self_room += ($in->self_room) ?>
                                <td>{{$in->self_plot}}</td>
                                <?php $sum_self_plot += ($in->self_plot) ?>
                                <td>{{$in->ex_room}}</td>
                                <?php $sum_ex_room += ($in->ex_room) ?>
                                <td>{{$in->ex_plot}}</td>
                                <?php $sum_ex_plot += ($in->ex_plot) ?>
                                <td>{{$in->ex_train}}</td>
                                <?php $sum_ex_train += ($in->ex_train) ?>
                                <td>{{$in->ex_container}}</td>
                                <?php $sum_ex_container += ($in->ex_container) ?>
                                <td>{{$in->loc_z}}</td>
                                <?php $sum_loc_z += ($in->loc_z) ?>
                                <td>{{$in->loc_a}}</td>
                                <?php $sum_loc_a += ($in->loc_a) ?>
                                <td>{{$in->loc_s}}</td>
                                <?php $sum_loc_s += ($in->loc_s) ?>
                                <td>{{$in->pas_vag}}</td>
                                <?php $sum_pas_vag += ($in->pas_vag) ?>
                                <td>{{$in->pas_teesh}}</td>
                                <?php $sum_pas_teesh += ($in->pas_teesh) ?>
                                <td>{{$in->company_car}}</td>
                                <?php $sum_company_car += ($in->company_car) ?>
                                <td>{{$in->autobus}}</td>
                                <?php $sum_autobus += ($in->autobus) ?>
                                <td>{{$in->food_car}}</td>
                                <?php $sum_food_car += ($in->food_car) ?>
                                <td>{{$in->description}}</td>
                                 </tr>
                                <?php $no++; ?>
                                <?php $no1++; ?>
                            @endif
                            <?php
                    
                    
                          
                                  $i1=$i1+$in->self_room;
                                  $i2=$i2+$in->self_plot;
                                  $i3=$i3+$in->ex_room;
                                  $i4=$i4+$in->ex_plot;
                                  $i5=$i5+$in->ex_train;
                                  $i6=$i6+$in->ex_container;
                                  $i7=$i7+$in->loc_z;
                                  $i8=$i8+$in->loc_a;
                                  $i9=$i9+$in->loc_s;
                                  $i10=$i10+$in->pas_vag;
                                  $i11=$i11+$in->pas_teesh;
                                  $i12=$i12+$in->company_car;
                                  $i13=$i13+$in->autobus;
                                  $i14=$i14+$in->food_car;
                            ?>
                            <?php
                            if(++$iall === $all) { ?>
                    
                    <tr style="background: #F0F0B2">
                                <td colspan="2"><center><b>Дүн</b> </center></td>
                                <td><b>{{number_format($i1)}}</b></td>
                                <td><b>{{number_format($i2)}}</b> </td>
                                <td><b>{{number_format($i3)}}</b> </td>
                                <td><b>{{number_format($i4)}}</b></td>
                                <td><b>{{number_format($i5)}}</b></td>
                                <td><b>{{number_format($i6)}}</b></td>
                                <td><b>{{number_format($i7)}}</b></td>
                                <td><b>{{number_format($i8)}}</b></td>
                                <td><b>{{number_format($i9)}}</b> </td>
                                <td><b>{{number_format($i10)}}</b> </td>
                                <td><b>{{number_format($i11)}}</b></td>
                                <td><b>{{number_format($i12)}}</b></td>
                                <td><b>{{number_format($i13)}}</b></td>
                                <td><b>{{number_format($i14)}}</b></td>
                                <td></td>
                                
                                
                    
                                    <?php } ?>
                    
                        @endforeach
                      
                    
                        <tr style="background:#B9F0B2">
                                <td colspan="2">Нийт</td>
                               
                                <td>{{$sum_self_room}}</td>
                                <td>{{$sum_self_plot}}</td>
                                <td>{{$sum_ex_room}}</td>
                                <td>{{$sum_ex_plot}}</td>
                                <td>{{$sum_ex_train}}</td>
                                <td>{{$sum_ex_container}}</td>
                                <td>{{$sum_loc_z}}</td>
                                <td>{{$sum_loc_a}}</td>
                                <td>{{$sum_loc_s}}</td>
                                <td>{{$sum_pas_vag}}</td> 
                                <td>{{$sum_pas_teesh}}</td>
                                <td>{{$sum_company_car}}</td> 
                                <td>{{$sum_autobus}}</td>
                                <td>{{$sum_food_car}}</td>
                                <td></td>
                            </tr>
                       
                     
                    
                    </tbody>
            </table>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Мэдээ бүртгэх</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="adddaily" method="post" id="form1">
        <div class="modal-body">
            {{ csrf_field() }}
                <div class="form-row" style="margin-bottom:5px;">

                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Огноо</label>
                        <input class="form-control form-control-inline input-medium date-picker" name="date1" id="date1"
                        size="16" type="text" value="">
                        <input type="hidden" class="form-control" id="info_id" name="info_id">
                    </div>
                    <div class="form-group col-md-4" id="dep">
                        <label for="inputPassword4">Алба</label>
                        <select class="form-control select2 " id="dep_id" name="dep_id">
                            <option value= "0">Бүгд</option>
                            @foreach($dep as $deps)
                               
                                <option value= "{{$deps->executor_id}}">
                                 {{$deps->executor_abbr}}</option>
                               
                            @endforeach
                        </select>
                    
                    </div>
                    <div class="form-group col-md-4" id="executor">
                        <label for="inputAddress">Салбар нэгж</label>
                        <select class="form-control" id="executor_id" name="executor_id">
                        </select>
                    </div>
                    <div class="form-group col-md-9" style="margin-bottom:5px;">
                     <label for="inputCity"><b>Өөрсдийн хийсэн</b></label>
                    </div>
                    <div class="form-group col-md-4">
                      
                    <label for="inputCity">Өрөө байр</label>
                    <input type="number" class="form-control" id="self_room" name="self_room">
                
                    </div>
                    <div class="form-group col-md-4">
                     
                        <label for="inputState">Талбай</label>
                        <input type="number" class="form-control" step="0.01"  id="self_plot" name="self_plot">
                        
                    </div>
                    <div class="form-group col-md-12" style="margin-bottom:5px;">
                        <label for="inputCity"><b>Мэргэжлийн байгууллагын хийсэн</b></label>
                       </div>
                       <div class="form-group col-md-4">
                      
                        <label for="inputCity">Өрөө байр</label>
                        <input type="number" class="form-control" id="ex_room" name="ex_room">
                    
                        </div>
                        <div class="form-group col-md-4">
                         
                            <label for="inputState">Талбай</label>
                            <input type="number" class="form-control"  id="ex_plot" name="ex_plot">
                            
                        </div>
                        <div class="form-group col-md-4">
                         
                        </div>
                        <div class="form-group col-md-4">
                      
                            <label for="inputCity">Галт тэрэг</label>
                            <input type="number" class="form-control" id="ex_train" name="ex_train">
                        
                            </div>
                            <div class="form-group col-md-4">
                             
                                <label for="inputState">Вагон чингэлэг</label>
                                <input type="number" class="form-control"  id="ex_container" name="ex_container">
                                
                            </div>
                            <div class="form-group col-md-4">
                             
                            </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Зөөврийн зүтгүүр</label>
                            <input type="number" class="form-control" id="loc_z" name="loc_z">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Ачааны зүтгүүр</label>
                            <input type="number" class="form-control" id="loc_a" name="loc_a">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Сэлгээний зүтгүүр</label>
                            <input type="number" class="form-control" id="loc_s" name="loc_s">
                        </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Зорчигчийн вагон</label>
                        <input type="number" class="form-control" id="pas_vag" name="pas_vag">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Зорчигчийн тээш</label>
                        <input type="number" class="form-control" id="pas_teesh" name="pas_teesh">
                    </div>
                    <div class="form-group col-md-4">
                      
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Албаны машин</label>
                    <input type="number" class="form-control" id="company_car" name="company_car">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Ажилчдын автобус</label>
                        <input type="number" class="form-control"  id="autobus" name="autobus">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputState">Хүнсний машин</label>
                    <input type="number" class="form-control"  id="food_car" name="food_car">
                    </div>
                </div>
                
            
        </div>
        <div class="modal-footer">
            <div class="col-md-5">
                <button type="button" class="btn btn-danger delete">Устгах</button>
            </div>
            <div class="col-md-7" style="display: inline-block; text-align: right;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
          <button type="submit" class="btn btn-primary">Хадгалах </button>
        </div>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
      $(document).ready(function() {
    $("#date1, #sdate, #fdate").datepicker({
                format: 'yyyy-mm-dd',
            });
          
            $('#dep_id').change(function() {
        var itag = $(this).val();
        console.log(itag);
        $.get('getexecutor/'+itag,function(data){
            $('#executor_id').empty();
            $.each(data,function(i,qwe){
            $('#executor_id').append('<option value="'+ qwe.executor_id +'">'+qwe.executor_abbr +'</option>');
         });
        });
    });
  
      });
      $('.add').on('click',function(){
        $(".modal-title").text("Мэдээ бүртгэх");
            document.getElementById('form1').action = "adddaily";
            document.getElementById('form1').method ="post";
            
            $('#info_id').val("");
               $('#self_room').val("");
               $('#self_plot').val("");
               $('#ex_room').val("");
               $('#ex_plot').val("");
               $('#ex_train').val("");
               $('#ex_container').val("");
               $('#loc_z').val("");
               $('#loc_a').val("");
               $('#loc_s').val("");
               $('#pas_vag').val("");
               $('#pas_teesh').val("");
               $('#company_car').val("");
               $('#autobus').val("");
               $('#food_car').val("");
               $('#date1').val("");
            $('.delete').hide();
            $("#executor").show();
    $("#dep").show();
        });
      $('.delete').on('click',function(){
            var itag = $('#info_id').val();

            $.ajax(
                {
                    url: "info/delete/" + itag,
                    type: 'GET',
                    dataType: "JSON",
                    data: {
                        "id": itag,
                        "_method": 'DELETE',
                    },
                    success: function () {
                        alert('Мэдээ устгагдлаа');
                    }

                });
           
                window.location.reload();
        });
        function printData() {

var divToPrint=document.getElementById("test");
newWin= window.open("");
newWin.document.write(divToPrint.outerHTML);
newWin.print();
newWin.close();
}
   
    
</script>
@endsection