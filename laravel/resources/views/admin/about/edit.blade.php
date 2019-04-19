@extends('layouts.admin')





@section('content')

<div class="container">
<h1>Edit About Information</h1>
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
    <form action="{{ route('about.update',$about->id) }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_method" value="PUT">

        <div >
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter about name" value="{{ $about->title }}">
           
        </div>     
        <div>
            <label for="icon">Icon:</label>
            <input type="text" id="icon" name="icon" class="form-control" placeholder="Enter about icon" value="{{ $about->icon }}">
         
        </div>    
        <a href="https://fontawesome.com/">Click here to know more about font awesome</a>
        <div>
            <label for="content">Content:</label>
            <textarea class="form-control" rows="5" id="content" name="content">{{ $about->content }}</textarea>
         
        </div> 

        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Edit about" />
        </div>
    </form>
    </div>
        <div class="col-md-2"></div>
</div>
</div>







@stop