<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ItemController extends Controller
{
    public function create(){
        return view('post.create');
    }
    
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            "title"=>"required|unique:proyek",
            "body"=>"required"
        ]);
        $query = DB::table('proyek')->insert(
            ["title"=>$request["title"], "body"=>$request["body"]]
        );

        return redirect('/proyek')->with('success','Proyek Berhasil Disimpan');
    }

    public function index(){
        $proyek = DB::table('proyek')->get(); //kaya select * from proyek
        return view('post.index',compact('proyek'));
    }

    public function show($id){
        $post = DB::table('proyek')->where('id',$id)->first();
        return view('post.show',compact('post'));
    }

    public function edit($id){
        $post = DB::table('proyek')->where('id',$id)->first();
        return view('post.edit',compact('post'));
    }

    public function update($id, Request $request){
        $query = DB::table('proyek')
                    ->where('id',$id)
                    ->update([
                        "title"=>$request['title'],
                        "body"=>$request['body']
                    ]);
        return redirect('/proyek')->with('success','Berhasil update proyek!');  
    }

    public function destroy($id){
        $query = DB::table('proyek')
                    ->where('id',$id)
                    ->delete();

        return redirect('/proyek')->with('success','Proyek Berhasil Dihapus');
    }
}
