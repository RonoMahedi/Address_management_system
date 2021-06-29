<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\District;
use App\Models\Division;
use App\Models\Upazila;
use App\Http\Requests\UpazilaRequest;

class UpazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
      
         $allData=Upazila::all();
         return view('backend.upazila.index',compact('allData'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
        $data['divisions']=Division::all();
        $data['districts']=District::all();
         return view('backend.upazila.create',$data);
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
           'name'=>'required|unique:upazilas,name'
       ]);

       $data =new Upazila();
       $data->name=$request->name;
       $data->division_id=$request->division_id;
       $data->district_id=$request->district_id;
       $data->save();
       Toastr::success('Upazila Successfully Saved :)' ,'Success');
       return redirect()->route('upazilas.index');
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
       $data['editData']=Upazila::find($id);
       $data['divisions']=Division::all();
       $data['districts']=District::all();
       return view('backend.upazila.create',$data);
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

       $district=Upazila::find($id);
       $district->name=$request->name;
       $data->division_id=$request->division_id;
       $data->district_id=$request->district_id;
       $district->save();
       Toastr::success('Upazila updated Successfully Saved :)' ,'Success');
       return redirect()->route('upazilas.index');
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
