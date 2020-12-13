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
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-8 align-self-center">
            <h3 class="text-themecolor">Системийн хэрэглэгчид</h3>
           
        </div>
        <div class="col-md-4 align-self-center">
            <a href="#" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" data-toggle="modal"
                data-target="#exampleModal"> <i class="fa fa-plus" aria-hidden="true"></i> Хэрэглэгч бүртгэх</a>
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
                           
                            
                            
                              <div class="table-responsive m-t-20">
                            


                             
                        <table class="table table-bordered vm" id="example"
                            style="font-size:10px; color:black; word-wrap:break-word;">
                            <thead>
                               
                                <tr>
                                <th>№</th>
                               
                                    <th>Алба хэлтэс</th>
                                    <th>Хэрэглэгчийн нэр</th>
                                    <th>Имейл хаяг</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                             
                                <?php $no = 1; ?>
                                    @foreach($user as $i=>$in)
                                       
                                            <tr>
                                            <td>{{$no}}</td>
                                                <td><b>{{$in->executor_abbr}}</b></td>
                                               
                                                <td>{{$in->name}}</td>
                                                <td>{{$in->email}}</td>
                                                <td class='m1'> <a class='btn btn-xs btn-info update' data-toggle='modal' data-target='#exampleModal' data-id="{{$in->id}}" onclick='updateuser({{$in->id}})'><i class="fa fa-pencil-square-o" style="color: rgb(255, 255, 255); "></i></a> </td>
                                          
                                            </tr>
                                            <?php $no++; ?>
                                        @endforeach
                                </tbody>
                        </table>
                    </div>
                   
                       
                   
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
        <form action="adduser" method="post" id="form1">
        <div class="modal-body">
            {{ csrf_field() }}
                <div class="form-row" style="margin-bottom:5px;">

                    <div class="form-group col-md-4">
                        <label for="inputAddress">Салбар нэгж</label>
                        <select class="form-control" id="executor_id" name="executor_id">
                        @foreach($executor as $executors)
                                                   
                                                   <option value= "{{$executors->executor_id}}" > @if($executors->executor_type == 2){{$executors->dep_abbr}} - {{$executors->executor_abbr}}
                                                       @else {{$executors->executor_abbr}}@endif</option>
                                          
                                               @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4">
                      
                    <label for="inputCity">Нэр</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <input type="hidden" class="form-control" id="id" name="id">
                    </div>
                    <div class="form-group col-md-4">
                     
                        <label for="inputState">Имейл</label>
                        <input type="text" class="form-control" id="email" name="email">
                        
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
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


<script>
      $(document).ready(function() {
        $('#example').DataTable();
  
      });
      $('.add').on('click',function(){
        $(".modal-title").text("хэрэглэгч бүртгэх");
            document.getElementById('form1').action = "adduser"
            document.getElementById('form1').method ="post";
            
            $('#id').val("");
               $('#name').val("");
               $('#executor_id').val("");
               $('#email').val("");
              
        });
      $('.delete').on('click',function(){
            var itag = $('#id').val();

            $.ajax(
                {
                    url: "user/delete/" + itag,
                    type: 'GET',
                    dataType: "JSON",
                    data: {
                        "id": itag,
                        "_method": 'DELETE',
                    },
                    success: function () {
                        alert('Хэрэглэгч устгагдлаа');
                    }

                });
           
                window.location.reload();
        });
      
           
      function updateuser(itag)
   {
    $('#form1').attr('action', 'updateuser');
    $(".modal-title").text("Хэрэглэгч засварлах");
    $('.delete').show();
       $.get('userfill/'+itag,function(data){
           $.each(data,function(i,qwe){
             
               $('#id').val(qwe.id);
               $('#name').val(qwe.name);
               $('#email').val(qwe.email);
               $('#executor_id').val(qwe.executor_id).trigger('change');
             
          
           });

       });


   }
</script>
@endsection