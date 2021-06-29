<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\District;
use App\Models\Division;
use App\Http\Requests\DistrictRequest;

class DistrictController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $allData=District::all();
      return view('backend.district.index',compact('allData'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
     $data['divisions']=Division::all();
      return view('backend.district.create',$data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate([
        'name'=>'required|unique:districts,name'
    ]);

    $data =new District();
    $data->name=$request->name;
    $data->division_id=$request->division_id;
    $data->save();
    Toastr::success('District Successfully Saved :)' ,'Success');
    return redirect()->route('districts.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data['editData']=District::find($id);
    $data['divisions']=Division::all();
    return view('backend.district.create',$data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(DistrictRequest $request, $id)
  {

    $district=District::find($id);
    $district->name=$request->name;
    $data->division_id=$request->division_id;
    $district->save();
    Toastr::success('District updated Successfully Saved :)' ,'Success');
    return redirect()->route('districts.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
