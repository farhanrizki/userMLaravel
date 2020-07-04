<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function index(){
   		$datauser = \App\User::all();
   		return view('pages.datauser',['datauser' => $datauser]);
   	}

   	public function tambah(Request $request){
	    \App\User::create($request->all());
   		return redirect('/datauser')->with('sukses','Data user berhasil diinput');
   	}

   	public function update(Request $request, $id){
   		$user = \App\User::find($id);
   		$user->update($request->all());
   		return redirect('/datauser')->with('sukses','Data berhasil diupdate');
   	}

   	public function delete($id){
   		$user = \App\User::find($id);
   		$user->delete();
   		return redirect('/datauser')->with('sukses','Data berhasil dihapus');
   	}

   	public function register(Request $request){
        \App\User::create($request->all());
        return redirect()->back()->withSuccess('User berhasil ditambahkan');
    }
}
