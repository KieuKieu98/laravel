
@extends('layouts.admin')


@section('content')
@if (Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

    <h1>Services Information</h1>

    <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('myproductsDeleteAll') }}">Delete All Selected</button>
    <table class="table table-hover">
       <thead class="thead-dark">
         <tr>
            <th width="50px"><input type="checkbox" id="master"></th>
             <th>Id</th>
             <th>Title</th>
             <th>Category</th>
             <th>Content</th>
             <th>Image</th>
             <th>View Service</th>
             <th>Created at</th>
             <th>Update</th>
             <th> Action</th>
        </thead>
        <tbody>
        @if($services)

            @foreach($services as $service)

            <tr id="tr_{{$service->id}}">
                <td><input type="checkbox" class="sub_chk" data-id="{{$service->id}}"></td>
                <td>{{$service->id}}</td>
                <td>{{$service->title}}</td>
                <td>{{$service->category ? $service->category->title : 'Uncategorized'}}</td>
                <td>{!!str_limit($service->content, 30)!!}</td>
                <td><img height="50" src="{{asset($service->image)}}" alt=""></td>
                <td><a href="{{ url('service/'.$service->id) }}">View Service</a></td>
                <td>{{$service->created_at}}</td>
                <td>{{$service->updated_at}}</td>
                <td><a href="{{ route('service.edit', $service->id) }}"><span class='glyphicon glyphicon-pencil'></span></a>
                <form class="delete" action="{{route('service.destroy',$service->id)}}" method="POST">
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
            {{ $services->render() }}
        </div>
        
    </div>

    <script>
    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
    </script>
    <!-- <script type="text/javascript">
    $(document).ready(function () {


        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });


        $('.delete_all').on('click', function(e) {


            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  


            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  


                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  


                    var join_selected_values = allVals.join(","); 


                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });


                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });


        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();
            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script> -->
@stop



