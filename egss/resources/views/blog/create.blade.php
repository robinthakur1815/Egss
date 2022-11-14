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
                <h3 class="card-title"> Creete Blog </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="title" placeholder="title"> 
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">slug</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="slug" placeholder="slug"> 
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">category_id</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="category_id" placeholder="category_id"> 
                    </div> -->
                    <div class="form-group">
                        <label>category_idP</label>
                        <select  class="form-control" name="category_id">
                        @foreach ($category as $list)
                          <option value="{{ $list->id }}">{{ $list->name}}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputEmail1">description</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="description" placeholder="description"> 
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select  class="form-control" name="Status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option> 
                        </select>
                        @error('Status')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">image</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="image" placeholder="image"> 
                    </div>
                 </div>
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