<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Materi as Model;
use Highlight\Mode;
use Illuminate\Support\Facades\Auth;

class GuruMateriController extends Controller
{
    public function index()
    {
        $data['model']= Model::where('user_id',Auth::user()->id)->latest()->get();
        return view('guru.materi_index',$data);
    }
    public function create()
    {   
        
        $data['model'] = new Model();
        $data['method']='POST';
        $data['url']=url('guru/materi');
        $data['namaTombol']= "Simpan";
        return view('guru.materi_form', $data);
    }

    public function store(Request $request) 
    {
        
        $request->validate(
            [
                'jenis'=>'required',
            ]);
        $isi = $request->isi;
        if($request->jenis=="file"){
            $request->validate(
                [
                    'isi'=>'file|mimes:pdf,png,doc,docx,ppt,pptx,jpg,jpeg',
                ]
                );
            $isi = $request->file('isi')->store('public/materi');
        }
        $model = new Model();
        $model->jenis = $request->jenis;
        $model->isi =$isi;
        $model->user_id=Auth::user()->id;
        $model->judul=$request->judul;
        $model->save();
        flash('Data Sudah Disimpan')->success();
        return redirect('guru/materi');
    }

    public function edit($id)
    {   
        
        $data['model'] = Model::findOrFail($id);
        $data['method']='PUT';
        $data['url']=url('guru/materi/'.$id);
        $data['namaTombol']= "Update";
        return view('guru.materi_form', $data);
    }

    public function update(Request $request ,$id) 
    {
        
        $request->validate(
            [
                'jenis'=>'required',
                

            ]);
        $request->merge(['user_id' => Auth::user() -> id ]);
        Model::where('id',$id)->update($request->except(['_method','_token']));
        flash('Data Sudah DiUpdate')->success();
        return redirect('guru/materi');
    }

    public function destroy($id)
    {
        $model = Model::findOrFail($id);
        $model->delete();
        flash('Data Berhasil DiHapus')->error();
        return back();
    }
}
