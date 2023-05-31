<?php

namespace App\Http\Controllers;

use App\Models\PembayaranUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PembayaranUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bayarByuserId($id)
    {
        $data = PembayaranUser::where('users_id', $id)->get();

        if ($data->isNotEmpty()) {
            return response()->json(["data" => $data], 200);
        } else {
            return response()->json(["error" => "No data found for the given users ID!"], 404);
        }
    }
    public function bayarById($id, $bulan)
    {
        $data = PembayaranUser::where('users_id', $id)->where('pembayaran_bulan', $bulan)->get();

        if ($data->isNotEmpty()) {
            return response()->json(["data" => $data], 200);
        } else {
            return response()->json(["error" => "No data found for the given users ID!"], 404);
        }
    }

    public function indexbyBulan($bulan)
    {
        $data = PembayaranUser::with('users')->where('pembayaran_bulan', $bulan)->get();

        return response()->json(["data" => $data], 200);

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
        $data = new PembayaranUser();
        $data->status = $request->input('status');
        $data->pembayaran_bulan = $request->input('pembayaran_bulan');
        $data->users_id = $request->input('users_id');
        $data->save();

        return response()->json(["message" => "Data added successfully"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PembayaranUser $pembayaranUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PembayaranUser $pembayaranUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateData(Request $request, $users_id, $pembayaranBulan)
    {
        $data = PembayaranUser::where('users_id', $users_id)->where('pembayaran_bulan', $pembayaranBulan)->first();

        if ($data) {
            $data->status = $request->input('status');
            // $data->users_id = $request->input('users_id');
            $data->save();

            return response()->json(["message" => "Data updated successfully"], 200);
        } else {
            return response()->json(["error" => "Data not found"], 404);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PembayaranUser $pembayaranUser)
    {
        //
    }
}