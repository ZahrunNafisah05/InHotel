<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return $pembayaran;
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
    public function store(Request $request)
    {
        $table = Pembayaran::create([
            "nama_pelanggan" => $request->nama_pelanggan,
            "no_rekening" => $request->no_rekening,
            "detail_pesanan" => $request->detail_pesanan,
            "total_bayar" => $request->total_bayar
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Pembayaran Berhasil Ditambahkan!',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kamar = Pembayaran::find($id);
        if ($kamar) {
            return response()->json([
                'status' => 200,
                'data' => $kamar
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas ' . $id . 'tidak ditemukan'
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = Pembayaran::where('id', $id)->first();
        if($kamar){
            $kamar->delete();
            return response()->json([
                'status' => 200,
                'data' => $kamar
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .' tidak ditemukan'
            ], 404);
        }
    }
}
