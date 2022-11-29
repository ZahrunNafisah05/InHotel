<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;


class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipe = Tipe::all();
        return $tipe;
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
        $table = Tipe::create([
            "namatipe" => $request->namatipe,
            "harga_tipe" => $request->harga_tipe,
            "deskripsi" => $request->deskripsi,
            "fasilitas" => $request->fasilitas,
            "kebijakan" => $request->kebijakan,
            "jumlah_kamar" => $request->jumlah_kamar,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Tipe Berhasil Ditambahkan!',
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
        $tipe = Tipe::find($id);
        if ($tipe) {
            return response()->json([
                'status' => 200,
                'data' => $tipe
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
        $tipe = Tipe::find($id);
        if($tipe){
            $tipe->namatipe = $request->namatipe ? $request->namatipe : $tipe->namatipe;
            $tipe->harga_tipe = $request->harga_tipe ? $request->harga_tipe : $tipe->harga_tipe;
            $tipe->deskripsi = $request->deskripsi ? $request->deskripsi : $tipe->deskripsi;
            $tipe->fasilitas = $request->fasilitas ? $request->fasilitas : $tipe->fasilitas;
            $tipe->kebijakan = $request->kebijakan ? $request->kebijakan : $tipe->kebijakan;
            $tipe->jumlah_kamar = $request->jumlah_kamar ? $request->jumlah_kamar : $tipe->jumlah_kamar;
            $tipe->save();
            return response()->json([
                'status' => 200,
                'data' => $tipe
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . ' tidak ditemukan'
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
        $tipe = Tipe::where('id', $id)->first();
        if($tipe){
            $tipe->delete();
            return response()->json([
                'status' => 200,
                'data' => $tipe
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .' tidak ditemukan'
            ], 404);
        }
    }
}
