
@extends('layouts.admin')






@section('content')


<div class="container">
<h1>Edit Blog</h1>
@if (count($errors) > 0)
<div class="alert alert-danger">
  @foreach ($errors->all() as $error)
   <p>{{ $error }}</p>
  @endforeach
</div>
@endif
@include('includes.tinyeditor')


<div class="row">
    <div class="col-md-2"></div>
   
    <div class="col-md-8">
    <form action="{{ route('blog.update',$blog->id) }}" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_method" value="PUT">
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter title" value="{{ $blog->title }}">
           
        </div>        
        
        <div class="form-group " style="width:  200px">


            <img src="{{asset($blog->image)}}" height="300" alt="" class="img-responsive img-rounded">


        </div> <br>
        <div >
            <label for="photo_id">Image Upload:</label>
            <input type="file" id="photo_id" name="photo_id" class="form-control" value="{{ old('photo_id') }}">
         
        </div> 

        <div >
            <label for="content">Content:</label>
            <textarea class="form-control" rows="5" id="content" name="content">{{ $blog->content }}</textarea>
        
        </div> 

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Edit Post" />
        </div>
    </form>
    </div>
    <div class="col-md-2"></div>
    

</div>

</div>

@stop
