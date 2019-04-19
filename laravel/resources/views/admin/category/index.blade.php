@extends('layouts.admin')





@section('content')
@if (Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

    <h1>Categories</h1>


    <!-- <div class="col-sm-6">
        <form action="{{ route('category.index') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        

            <div class=" form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="username">name:</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter category name" value="{{ old('name') }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>        

           
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Create Category" />
            </div>
        </form>
 


    </div> -->




    <div class="col-sm-12">


            @if($categories)    


            <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Content</th>
                    <th>Created date</th>
                    <th> Action</th>
                </tr>
                </thead>
                <tbody>

            @foreach($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('category.edit', $category->id)}}">{{$category->title}}</a></td>
                        <td><span class="{{$category->icon}}"> </span> </td>
                        <td>{!!str_limit($category->content, 30)!!}</td>
                        <td>{{$category->created_at}}</td>
                        <td><a href="{{ route('category.edit', $category->id) }}"><span class='glyphicon glyphicon-pencil'></span></a>
                        <form class="delete" action="{{route('category.destroy',$category->id)}}" method="POST">
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

                </tbody>
            </table>

         @endif

       

    </div>


   <div class="row">
        <div class="col-lg-6 col-sm-offset-5">
            {{ $categories->render() }}
        </div>
        
    </div>
    <script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
    </script>

@stop