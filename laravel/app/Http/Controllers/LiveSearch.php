<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Service;

class LiveSearch extends Controller
{
    function index()
    {
     return view('layouts.live-search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('services')
         ->where('title', 'like', '%'.$query.'%')
         ->orWhere('content', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('services')
       ->orderBy('id', 'desc')
       ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->title.'</td>
         <td>'.$row->content.'</td>
         <td>'.$row->image.'</td>
         <td>'.$row->category.'</td>
         <td>'.$row->category.'</td>
         <td>'.$row->created_at.'</td>
         <td>'.$row->updated_at.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}