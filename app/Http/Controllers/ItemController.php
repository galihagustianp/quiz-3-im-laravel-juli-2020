<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
     public function create(){
        return view('create');
    }
    public function store(Request $request){
     
        $query = DB::table('karyawan')->insert([
            "nama" => $request["nama"],
            "jabatan" => $request["jabatan"],
        

    ]);

    return redirect('/item')->with('success','Postingan Berhasil Disimpan');
    }

    public function index(){
        $item = DB::table('karyawan')->get();
        // dd($item);
        return view('index', compact('item'));
    }

    public function show($id){
        $post = DB::table('karyawan')->where('id', $id)->first();
        // dd($post);
        return view('show',compact('post'));
    }
        public function edit($id){
            $post = DB::table('karyawan')->where('id', $id)->first();
            return view('edit', compact('post'));
    }
    public function update($id, Request $request){
        $query = DB::table('karyawan')
                ->where('id', $id)
                ->update([
                    "nama" => $request["nama"],
            "jabatan" => $request["jabatan"],
                return redirect('/item')->with('success','Berhasil Update post');
    }
    public function destroy($id){
        $query = DB::table('karyawan')->where('id',$id)->delete();
        return redirect('/item')->with('success','Post Berhasil di Delete!');
    }
}
