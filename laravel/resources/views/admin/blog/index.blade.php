
@extends('layouts.admin')


@section('content')
@if (Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

    <h1>Blogs Information</h1>


    <table class="table table-hover">
       <thead class="thead-dark">
         <tr>
             <th>Id</th>
             <th>Title</th>
             <th>Content</th>
             <th>Image</th>
             <th>View Blog</th>
             <th>Created at</th>
             <th>Update</th>
             <th> Action</th>
        </thead>
        <tbody>
        @if($blogs)

            @foreach($blogs as $blog)

            <tr>
                <td>{{$blog->id}}</td>
                <td>{{$blog->title}}</td>
                <td>{!!str_limit($blog->content, 30)!!}</td>
                <td><img height="50" src="{{asset($blog->image)}}" alt=""></td>
                <td><a href="{{ url('blog/'.$blog->id) }}">View blog</a></td>
                <td>{{$blog->created_at}}</td>
                <td>{{$blog->updated_at}}</td>
                <td><a href="{{ route('blog.edit', $blog->id) }}"><span class='glyphicon glyphicon-pencil'></span></a>
                <form class="delete" action="{{route('blog.destroy',$blog->id)}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                 <div class="form-group">
                 <input type="submit" value="Delete">
                 <!-- <span class='glyphicon glyphicon-trash'> -->
                 </input>
                 </div>
                </form>
                </td>
            </tr>

            @endforeach

            @endif

        </tbody>
     </table>


      <div class="row">
        <div class="col-lg-6 col-sm-offset-5">
            {{ $blogs->render() }}
        </div>
        
    </div>
    <script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
    </script>
    

@stop



