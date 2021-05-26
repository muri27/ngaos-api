<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     * Get All
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Pembayaran::all();
        return response()->json([
            'success' => 'true',
            'data' => $payments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * Post cukup namaPembayaran sama totalPembayaran
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payments = Pembayaran::create($request -> all());
        if($payments){
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
     * Cari pembayaran berdasarkan id
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payments = Pembayaran::find($id);
        if($payments){
            return response()->json([
                'success' => 'true',
                'data' => $payments
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
     * Put buat ubah jenis pembayaran, bukti, sama status
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payments = Pembayaran::find($id);
        $payments->update($request->all());
        if($payments -> status == 'Belum Lunas'){
            $payments->update(['status' => 'Pending']);
            return response()->json([
                'success' => 'true',
                'message' => 'Data Berhasil Diubah'
            ], 200);
        }
        else if($payments -> status == 'Pending' || $payments -> status == 'Lunas'){
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
     * Hapus pembayaran
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payments = Pembayaran::destroy($id);
        if($payments){
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
     * Search payemnts by a name
     * Cari pembayaran berdasarkan nama
     * @param  str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $payments = Pembayaran::where('namaPembayaran', 'like', '%'.$name.'%')->get();
        $payments_count = $payments -> count();
        
        if($payments_count > 0){
            return response()->json([
                'success' => 'true',
                'data' => $payments
            ]);
        } else {
            return response()->json([
                'success' => 'false',
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
    }
}
