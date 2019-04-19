@extends('layouts.admin')

@section('content')
@if (Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

    <h1>Abouts</h1>

    <div class="col-sm-12">


            @if($abouts)   
            <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Content</th>
                    <th>Created date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

            @foreach($abouts as $about)
                    <tr>
                        <td>{{$about->id}}</td>
                        <td><a href="{{route('about.edit', $about->id)}}">{{$about->title}}</a></td>
                        <td><span class="{{$about->icon}}"> </span> </td>
                        <td>{!!str_limit($about->content, 30)!!}</td>
                        <td>{{$about->created_at}}</td>
                        <td><a href="{{ route('about.edit', $about->id) }}"><span class='glyphicon glyphicon-pencil'></span></a>
                        <form class="delete" action="{{route('about.destroy',$about->id)}}" method="POST">
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
            {{ $abouts->render() }}
        </div>
        
    </div>
    <script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
    </script>

@stop