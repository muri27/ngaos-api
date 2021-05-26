<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $teacher = Pengajar::all();
        return response()->json([
            'success' => 'true',
            'data' => $teacher
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $teacher = Pengajar::create($request -> all());
        if($teacher){
            return response()->json([
                'success' => 'true',
                'message' => 'Data Berhasil Ditambahkan'
            ], 201);
        } else {
            return response()->json([
                'success' => 'false',
                'message' => 'Gagal Menambahkan Data'
            ], 500);
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
        $teacher = Pengajar::find($id);
        if($teacher){
            return response()->json([
                'success' => 'true',
                'data' => $teacher
            ]);
        } else {
            return response()->json([
                'success' => 'false',
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
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
        $teacher = Pengajar::find($id);
        $teacher->update($request->all());
        if($teacher){
            return response()->json([
                'success' => 'true',
                'message' => 'Data Berhasil Diubah'
            ], 200);
        }else{
            return response()->json([
                'success' => 'false',
                'message' => 'Gagal Mengubah Data'
            ], 404);
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
        $teacher = Pengajar::destroy($id);
        if($teacher){
            return response()->json([
                'success' => 'true',
                'message' => 'Data Berhasil Dihapus'
            ],200);
        } else {
            return response()->json([
                'success' => 'false',
                'message' => 'Gagal Menghapus Data'
            ], 404);
        }
    }
    
     /**
     * Search teacher by a name
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $teacher = Pengajar::where('namaPengajar', 'like', '%'.$name.'%')->get();
        $teacher_count = $teacher -> count();
        
        if($teacher_count > 0){
            return response()->json([
                'success' => 'true',
                'data' => $teacher
            ]);
        } else {
            return response()->json([
                'success' => 'false',
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }
}