<?php

namespace App\Http\Controllers;

use App\file_upload;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $demande=$req->session()->get('demande');

        foreach($req->file("file") as $file)
        {
              $new_name = $file->getclientoriginalname();
             $file->move(public_path($demande), $new_name);

       $data['idFile']=$demande."/".$new_name;
       $data['visaDemand']=$demande;

            $file1= file_upload::create($data);
           $array[$new_name]=$file1->id;


        }

              return response()->json(['id'=>$array]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\file_upload  $file_upload
     * @return \Illuminate\Http\Response
     */
    public function show($file_upload)
    {
        $file=file_upload::find($file_upload);
        return redirect($file->idFile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\file_upload  $file_upload
     * @return \Illuminate\Http\Response
     */
    public function edit(file_upload $file_upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\file_upload  $file_upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, file_upload $file_upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\file_upload  $file_upload
     * @return \Illuminate\Http\Response
     */
    public function destroy($file_upload,Request $req)
    {

        $file=file_upload::find($file_upload);
        File::delete(public_path('public').$file->idFile);
        $file->delete();

        return response()->json(['s'=>"ss"]);
    }
}
