@extends('layouts.admin')






@section('content')
<div class="container">
<h1>Create Blog</h1>
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
        <form action="{{ route('blog.store') }}" method="post" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <div >
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter title" value="{{ old('title') }}">
                   
            </div>        
           
            <div >
                <label for="photo_id">Thumnail:</label>
                <input type="file" id="photo_id" name="photo_id" class="form-control" value="{{ old('photo_id') }}">
               
           </div> 
            
            
           <div >
                    <label for="content">Content:</label>
                     <textarea class="form-control" rows="5" id="content" name="content">{{ old('content') }}</textarea>
            
            </div> 
            
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Create blog" />
            </div>
        </form>
        </div>
      
        <div class="col-md-2"></div>
    </div>

</div>


@stop