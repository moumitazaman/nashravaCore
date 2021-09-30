 @extends('backend.layout.master')
 @section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{__('back_blade.manage_brand')}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('back_blade.home')}}</a></li>
              <li class="breadcrumb-item active">{{__('back_blade.brand')}}</li>
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
                <h3>{{__('back_blade.view_brand_list')}}
                   <a class="btn btn-success btn-sm float-right" href="{{route('brand.create')}}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;{{__('back_blade.view_brand_add')}}</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
               <table id="example1" class="table table-sm table-bordered table-hover" style="color:#00004d">
                    <thead>
                      <tr>
                        <th width="10%">SL.</th>
                        <th width="45%">Brand Name</th>
                        <th width="30%">Created_by</th>
                        <th width="15%">Action</th>
                      </tr> 
                    </thead>
                    <tbody style="color: #4d0026">
                      @foreach($brands as $key => $brand)
                      <tr>
                        <td># {{$key+1}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td>{{$brand->user->name}}</td>
                        <td>
                           @php
                           $count_brand = App\Model\Product::where('brand_id', $brand->id)->count();
                           @endphp
                           <div class="row">
                              <a title="Edit" class="btn btn-sm btn-primary" href="{{route('brand.edit',$brand->id)}}"><i class="fa fa-edit"></i></a>&nbsp;
                              @if( $count_brand < 1)
                                <form action="{{route('brand.destroy',$brand->id)}}" method="post">
                                   @csrf
                                   @method('delete')
                                  <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-confirm" ><i class="fa fa-trash"></i></a>
                                </form>
                              @endif  
                          </div>

                        </td>
                        
                      </tr> 
                      @endforeach
                    </tbody>   

                   </table>
               <!-- /.card-body -->
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection