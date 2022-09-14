<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['post'] = DB::table('posts')
        ->select('*')
        ->get();
        return view('post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['catagory'] = DB::table('catagory')
        ->select('*')
        ->get();
        return view('post.create', $data);
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
            'invoice_number' => 'required|max:10',
            'date' => 'required',
            'invoice_no' => 'required',
            'category' => 'required',
            'description' => 'required|max:255',
            'quentity' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'total' => 'required',
            'file' => 'required',
        ]);
        $file = time().$request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('File',$file);
                
        $data = array(
            'invoice_number'            => $request->input('invoice_number'),
            'date'      => $request->input('date'),
            'invoice_no'       => $request->input('invoice_no'),
            'category'       => $request->input('category'),
            'description'       => $request->input('description'),
            'quentity'       => $request->input('quentity'),
            'price'       => $request->input('price'),
            'amount'       => $request->input('amount'),
            'total'       => $request->input('total'),
            'file'           => $file,
            
        );
       $insert = DB::table('posts')->insert($data);
       if($insert){
            return redirect('post')->with('status', 'Successfully Added');
       }else{
            return redirect('post')->with('error', 'Something Went Wrong');
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
        $data['posts'] = DB::table('posts')
        ->select('*')
        ->where('id', $id)
        ->first();
        $data['catagory'] = DB::table('catagory')
        ->select('*')
        ->get();
        return view ('post.edit', $data);
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
        $validated = $request->validate([
            'invoice_number' => 'required',
            'date' => 'required',
            'invoice_no' => 'required',
            'category' => 'required',
            'description' => 'required|max:255',
            'quentity' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'total' => 'required',
        ]);
       
                
        $data = array(
            'invoice_number' => $request->input('invoice_number'),
            'date'      => $request->input('date'),
            'invoice_no'       => $request->input('invoice_no'),
            'category'       => $request->input('category'),
            'description'       => $request->input('description'),
            'quentity'       => $request->input('quentity'),
            'price'       => $request->input('price'),
            'amount'       => $request->input('amount'),
            'total'       => $request->input('total'),
            
        );
       $update = DB::table('posts')->where('id', $id)->update($data);
       if($update){
            return redirect('post')->with('status', 'Successfully Added');
       }else{
            return redirect('post')->with('error', 'Something Went Wrong');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DB::table('posts') ->where('id',$id)->delete();
 
         if($delete){
             return redirect('post')->with('status','Successfully deleted');
         }else{
             return redirect('post')->with('error','Something wrong');
         }
    }
}
