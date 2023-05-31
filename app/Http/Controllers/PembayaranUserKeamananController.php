<?php

namespace App\Http\Controllers;

use App\Models\PembayaranUserKeamanan;
use Illuminate\Http\Request;

class PembayaranUserKeamananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bayarekeamananByuserId($id)
    {
        $data = PembayaranUserKeamanan::where('users_id', $id)->get();

        if ($data->isNotEmpty()) {
            return response()->json(["data" => $data], 200);
        } else {
            return response()->json(["error" => "No data found for the given users ID!"], 404);
        }
    }
    public function bayarkeamananById($id,$bulan)
    {
        $data = PembayaranUserKeamanan::where('users_id', $id)->where('pembayaran_bulan', $bulan)->get();

        if ($data->isNotEmpty()) {
            return response()->json(["data" => $data], 200);
        } else {
            return response()->json(["error" => "No data found for the given users ID!"], 404);
        }
    }
    public function indexbyBulan($bulan)
    {
        $data = PembayaranUserKeamanan::with('users')->where('pembayaran_bulan', $bulan)->get();

        return response()->json(["data" => $data], 200);

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new PembayaranUserKeamanan();
        $data->status = $request->input('status');
        $data->pembayaran_bulan = $request->input('pembayaran_bulan');
        $data->users_id = $request->input('users_id');
        $data->save();

        return response()->json(["message" => "Data added successfully"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PembayaranUserKeamanan $pembayaranUserKeamanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PembayaranUserKeamanan $pembayaranUserKeamanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PembayaranUserKeamanan $pembayaranUserKeamanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PembayaranUserKeamanan $pembayaranUserKeamanan)
    {
        //
    }
}
