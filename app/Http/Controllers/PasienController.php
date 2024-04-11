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

        $pasien = Pasien::latest()->get();


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
        $pasien->alamat = $request->alamat; // Assuming you want to store the entire address in one field
        $pasien->jenis_kelamin = $request->jenis_kelamin;

        // Save the Pasien to the database
        $pasien->save();



        // Redirect to a desired location (e.g., pasien list)
        return redirect()->back()->with('success', 'Pasien berhasil di Tambahkan ');
    }

    /**
     * Display the specified resource.
     */
    public function show( Pasien $pasien)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Pasien $pasien)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $pasien = Pasien::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:255|unique:pasiens,nik,' . $pasien->id, // Add unique validation for NIK
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string|in:laki-laki,perempuan', // Restrict values to laki-laki or perempuan
        ]);


        $pasien->nama_lengkap = $request->nama_lengkap;
        $pasien->nik = $request->nik;
        $pasien->alamat = $request->alamat; // Assuming you want to store the entire address in one field
        $pasien->jenis_kelamin = $request->jenis_kelamin;

        // Save the Pasien to the database
        $pasien->save();

        return redirect()->back()->with('success', 'Pembaruan data pasien berhasil ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);
        if (!$pasien) {
            return redirect()->back()->with('error', 'Data pasien tidak ditemukan!');
        }


        // Delete the patient
        $pasien->delete();

        // Flash a success message

        // Redirect back or to a specific route
        return redirect()->back()->with('success', 'Data pasien berhasil dihapus!'); // Redirect back with success message
    }
}
