@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit user</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 " style="margin: 0 auto;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit {{$employee->name}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <div style="margin: 25px auto;">
                <img style="width: 300px" src="{{$employee->photo}}">
              </div>
              <form method="POST" enctype="multipart/form-data" action="{{route('update',$employee->id)}}">
                @csrf
                <div class="card-body">
                  @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                @endif
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value="{{$employee->email}}" placeholder="{{$employee->email}}">
                  </div>
                  <div class="form-group">
                    <label>ПІБ</label>
                    <input type="text" name="name" class="form-control" value="{{$employee->name}}" placeholder="{{$employee->name}}">
                  </div>
                <div class="form-group">
                  <label>Керівник</label>
                  <select name="employer_id" class="form-control select2bs4" style="width: 100%;">
                    @foreach($employees as $employer)
                      <option @if($employee->employer_id == $employer->id) selected @endif value="{{$employer->id}}">{{$employer->name}}</option>
                    @endforeach
                  </select>
                </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Фото</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                <div class="form-group">
                  <label>Посада</label>
                  <select name="position_id" class="form-control select2bs4" style="width: 100%;">
                    @foreach($positions as $position)
                      <option @if($position->id == $employee->position->id) selected @endif value="{{$position->id}}">{{$position->name}}</option>
                    @endforeach
                  </select>
                </div>
                  <div class="form-group">
                    <label>Розмір заробітної плати</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="amount_salary" value="{{number_format($employee->amount_salary,'2', '.')}}" placeholder="{{$employee->amount_salary}}">
                    </div>
                  </div>
                <!-- Date mm/dd/yyyy -->
                <div class="form-group">
                  <label>Дата прийому на роботу</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="date_start_works" data-inputmask-alias="datetime" value="{{Carbon\Carbon::createFromFormat('Y-m-d',$employee->date_start_works)->format('d.m.Y')}}" data-inputmask-inputformat="dd.mm.yyyy" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <!-- phone mask -->
                <div class="form-group">
                  <label>Номер телефону</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" name="phone" class="form-control" value="{{$employee->phone}}" data-inputmask='"mask": "+380 (99) 999 99 99"' data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.form group -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

  })
</script>
<script>
  let item = document.getElementById('employees');
  item.classList.add('active');
</script>
@endsection
