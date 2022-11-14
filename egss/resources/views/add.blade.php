@extends('layouts.app')
@section('content')
<div class="wrapper">
<div class="content-wrapper"> 
    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> add caregory </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('createCatagery') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="name" placeholder="name"> 
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">slug</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="slug" placeholder="slug"> 
                    </div> -->
                 <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
              </form>
            
        </div>
        </div>
    </section>
    </div>
</div>
@endsection