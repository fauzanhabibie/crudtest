<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pasien = Pasien::all();

        $data = [
            'pasien' => $pasien,
        ];
        return view('pasien.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:255', // Add unique validation for NIK
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan', // Restrict values to laki-laki or perempuan
        ]);

        // Create a new Pasien instance
        $pasien = new Pasien;
        $pasien->nama_lengkap = $request->nama_lengkap;
        $pasien->nik = $request->nik;
        $alamat = $request->alamat; // Assuming you want to store the entire address in one field
        $pasien->alamat = $alamat;
        $pasien->jenis_kelamin = $request->jenis_kelamin;

        // Save the Pasien to the database
        $pasien->save();



        // Redirect to a desired location (e.g., pasien list)
        return redirect()->back()->with('success', 'Pasien berhasil di Tambahkan ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        //
    }
}
