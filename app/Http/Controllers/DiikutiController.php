<?php

namespace App\Http\Controllers;

use App\Models\Diikuti;
use App\Models\Kelas;
use Illuminate\Http\Request;

class DiikutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $follow = Diikuti::all();
        return response()->json([
            'success' => 'true',
            'data' => $follow
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
        $follow = Diikuti::create($request -> all());
        if($follow){
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
        $class = Kelas::where('idUser', 'like', '%'.$id.'%')->get();
        $idUser = Diikuti::where('idUser', '=', $id)->get();
        if($idUser){
            return response()->json([
                'success' => 'true',
                'data' => ['user' => $idUser, 
                'kelas' => $class] 
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
        $follow = Diikuti::find($id);
        $follow->update($request->all());
        if($follow){
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
        //
    }
}
