@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage District</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">District</li>
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
        <section class="col-lg-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3>
                @if(@$editData)
                  Edit District
                @else
                  Add District
                @endif
                <a href="{{route('districts.index')}}" class="btn btn-success float-right btn-sm"> <i class="fa fa-plus-circle">District List</i></a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <form class="" action="{{(@$editData)?route('districts.update',$editData->id):route('districts.store')}}" method="post" id="myForm">
                  @if(@$editData)
                      @method("put")
                  @else
                    @method("post")
                  @endif

                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Division Name</label>
                      <select class="form-control" name="division_id" id="division_id">
                        <option value="">Select Division</option>
                        @foreach($divisions as $division)
                          <option value="{{$division->id}}" {{(@$editData->division_id==$division->id)?"selected":""}}>{{$division->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">District Name</label>
                      <input type="text" placeholder="District name" value="{{@$editData->name}}" name="name" class="form-control">
                      <font style="color:red">
                        {{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>

                    <div class="form-group col-md-12" style="padding-top: 30px">
                      <button type="submit" name="button" class="btn btn-success">{{(@$editData)?'Update':'Submit'}}</button>
                    </div>
                  </div>
                </form>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection
