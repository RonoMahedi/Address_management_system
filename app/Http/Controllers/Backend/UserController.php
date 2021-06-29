<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function view()
    {
      $data['allData']=User::all();

      return view('backend.user.index',$data);
    }

    public function add()
    {
      return view('backend.user.add');
    }

    public function store(Request $request)
    {
      // $this->validate($request,[
      //   'name'=>'requird',
      //   'email'=>'requird|unique:users,email'
      // ]);
      $data =new user();
      $data->usertype=$request->usertype;
      $data->name=$request->name;
      $data->email=$request->email;
      $data->password=bcrypt($request->password);
      $data->save();
      Toastr::success('User Successfully Saved :)' ,'Success');
      return redirect()->route('users.view');
    }

    public function edit($id)
    {
      $editData=User::find($id);
      return view('backend.user.edit',compact('editData'));
    }
    public function update(Request $request,$id)
    {
      $data =User::find($id);;
      $data->usertype=$request->usertype;
      $data->name=$request->name;
      $data->save();

      Toastr::success('User Successfully Update :)' ,'Success');
      return redirect()->route('users.view');
    }

    public function delete($id)
    {
      $user=User::find($id);
      if(file_exists('public/upload/user_image/'.$user->image) AND empty($user->image)){
        unlink('public/upload/user_image/'.$user->image);
      }
      $user->delete();
      Toastr::success('User Successfully Deleted :)' ,'Success');
      return redirect()->route('users.view');
    }
}
