<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DB;

class CatagoryController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:catagory-list|catagory-create|catagory-edit|catagory-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:catagory-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:catagory-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:catagory-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['catagory'] = DB::table('catagory')
        ->select('*')
        ->get();
        return view('catagory/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('catagory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'catagory_name' => 'required|max:10',
        ]);
                
        $data = array(
            'catagory_name'            => $request->input('catagory_name'),            
        );
       $insert = DB::table('catagory')->insert($data);
       if($insert){
            return redirect('catagory-list')->with('status', 'Successfully Added');
       }else{
            return redirect('catagory-list')->with('error', 'Something Went Wrong');
       }
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
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
