 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Size Measurement</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">size-measurement</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>Edit Size Measurement
                  <a class="btn btn-success btn-sm float-right" href="{{route('size-measurement.index')}}"><i class="fa fa-list"></i>&nbsp;&nbsp;&nbsp;Measurement List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <form  method="post" action="{{route('size-measurement.update',$measurement->id)}}"  id="myForm" enctype="multipart/form-data">
                      @csrf
                      @method('patch')
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label for="measurement_name">Measurement</label>
                              <input type="text" name="measurement" class="form-control"  value="{{$measurement->measurement}}">
                              <font style="color:#e60000">
                                 {{($errors->has('measurement'))?($errors->first('measurement')):' '}}
                              </font>
                          </div>
                          <div class="form-group col-md-6" style="padding: 30px;">
                              <input type="submit" name="submit" value="Update" class="btn btn-primary">
                          </div>
                      </div>
                  </form>
              <!-- /.card-body -->
              </div>
            </div>
          </section>
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
 @endsection