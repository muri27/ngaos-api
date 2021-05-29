<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Kelas::all();
<<<<<<< HEAD
=======
        $teacher = Pengajar::all();
>>>>>>> 29284657195ff0ebd477c3f5c7e341c89586b290
        return response()->json([
            'success' => 'true',
            'data' => $class
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
        $class = Kelas::create($request -> all());
        if($class){
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
        $class = Kelas::find($id);
        if($class){
            return response()->json([
                'success' => 'true',
                'data' => $class
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
        $class = Kelas::find($id);
        $class->update($request->all());
        if($class){
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
        $class = Kelas::destroy($id);
        if($class){
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
     * Search class by a name
     *
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $class = Kelas::where('namaKelas', 'like', '%'.$name.'%')->get();
        $class_count = $class -> count();
        
        if($class_count > 0){
            return response()->json([
                'success' => 'true',
                'data' => $class
            ]);
        } else {
            return response()->json([
                'success' => 'false',
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }
}
