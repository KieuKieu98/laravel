<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\User;

class AdminUserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|min:5|max:35',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:20',
            'photo_id',
                ], [
            'name.required' => 'The username field is required.',
            'name.min' => 'The username must be at least 5 characters.',
            'name.max' => 'The username may not be greater than 35 characters.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 5 characters.',
            'password.max' => 'The password may not be greater than 20 characters.',
        ]);
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        User::create($input);

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id);
        
        return view('admin.users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
       $user = User:: findOrFail($id);
       
       if(trim($request->password)==''){
           $input = $request->except('password');
       }else{
           $input = $request->all();
           $input['password'] = bcrypt($request->password);
       }
       $user->update($input);
       return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
       $user = User:: findOrFail($id);
       
       $user->delete();
       \Illuminate\Support\Facades\Session::flash('deleted_user','The user has deleted');
       return redirect('/admin/users');
    }

}
