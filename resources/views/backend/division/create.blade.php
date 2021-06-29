@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Division</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Division</li>
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
                  Edit Division
                @else
                  Add Division
                @endif
                <a href="{{route('divisions.index')}}" class="btn btn-success float-right btn-sm"> <i class="fa fa-plus-circle">Division List</i></a>
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <form class="" action="{{(@$editData)?route('divisions.update',$editData->id):route('divisions.store')}}" method="post" id="myForm">
                  @if(@$editData)
                      @method("put")
                  @else
                    @method("post")
                  @endif

                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="name">Division Name</label>
                      <input type="text" placeholder="Division name" value="{{@$editData->name}}" name="name" class="form-control">
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
