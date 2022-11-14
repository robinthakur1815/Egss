@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Blog</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update',$data->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="title" placeholder="title" value="{{ $data->title }}"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">slug</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="slug" placeholder="slug" value="{{ $data->slug }}"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">category_id</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="category_id" placeholder="category_id" value="{{ $data->category_id }}"> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">description</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="description" placeholder="description" value="{{ $data->description }}"> 
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
                        <input type="text" class="form-control" id="exampleInputEmail1"  name ="image" placeholder="image" value="{{ $data->image }}"> 
                    </div>
                 </div>
                 <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
              </form>
            
        </div>
        </div>
    </section>
   
    </form>
@endsection
