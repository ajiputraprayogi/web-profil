<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolio = DB::table('portofolio')->get();
        return view('master_data.portofolio.index', compact('portofolio'));
    }

    public function create()
    {
        return view('master_data.portofolio.create');
    }

    public function store(Request $request)
    {
        // Handle upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName(); // Buat nama unik untuk file
            $lokasiSimpan = 'image/portofolio/'; // Folder penyimpanan
            $gambar->move(public_path($lokasiSimpan), $namaGambar); // Pindahkan file ke folder yang ditentukan
        } else {
            return redirect()->back()->with('error', 'Gambar tidak ditemukan.'); // Jika tidak ada file
        }

        // Simpan data ke database
        $data = [
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $lokasiSimpan . $namaGambar, // Simpan path gambar ke database
        ];

        DB::table('portofolio')->insert($data);

        return redirect('/backend/portofolio')->with('status', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $portofolio = DB::table('portofolio')->get();
        return view('master_data.portofolio.edit', compact('portofolio'));
    }

    public function update($id, Request $request)
    {
        // Ambil data portofolio berdasarkan ID
        $portofolio = DB::table('portofolio')->where('id', $id)->first();

        // Jika tidak ditemukan, kembalikan dengan error
        if (!$portofolio) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Inisialisasi data yang akan diperbarui
        $data = [
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
        ];

        // Handle upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName(); // Buat nama unik untuk file
            $lokasiSimpan = 'image/portofolio/'; // Folder penyimpanan
            $gambar->move(public_path($lokasiSimpan), $namaGambar); // Pindahkan file ke folder

            // Hapus gambar lama jika ada
            if ($portofolio->gambar && file_exists(public_path($portofolio->gambar))) {
                unlink(public_path($portofolio->gambar));
            }

            // Simpan path gambar baru ke dalam data
            $data['gambar'] = $lokasiSimpan . $namaGambar;
        }

        // Update data di database
        DB::table('portofolio')->where('id', $id)->update($data);

        return redirect('/backend/portofolio')->with('status', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Ambil data portofolio berdasarkan ID
        $portofolio = DB::table('portofolio')->where('id', $id)->first();

        // Periksa apakah data ditemukan
        if (!$portofolio) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Hapus file gambar jika ada
        if ($portofolio->gambar && file_exists(public_path($portofolio->gambar))) {
            unlink(public_path($portofolio->gambar)); // Hapus file dari storage
        }

        // Hapus data dari database
        DB::table('portofolio')->where('id', $id)->delete();

        return redirect('/backend/portofolio')->with('status', 'Data berhasil dihapus.');
    }
}
