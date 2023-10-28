<?php

namespace App\Http\Controllers\Mhs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// ini code tuk hubungkan view
use Illuminate\View\View;
// code hubungkan model
use App\Models\Mahasiswa;

//tambahkan kode ini utuk muncul status respon
use Illuminate\Http\RedirectResponse;
// tambahkan kode ini untuk munculkan file gambar
use Illuminate\Support\Facades\Storage;

class MhsController extends Controller
{
        // Method Tampilkan data
        public function index(): View
        {
            $mhs = Mahasiswa::latest()->paginate(5);
            return view('mhs.index', compact('mhs'));
        }
   // buat method untuk input data
    public function create():View{
        return view('mhs.create');
    }
    // Method untuk store data
    public function store(Request $request): RedirectResponse
    {
        // Validasi inputan
            $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama'     => 'required|min:5',
            'nim'   => 'required|min:8',
            'jurusan' => 'required|min:5',
            'alamat'   => 'required|min:10'
        ]);

       $image = $request->file('image');
        $image->storeAs('public/image', $image->hashName());

        // berikan dengan nama class Model yang dibuat
        Mahasiswa::create([
            'image'     => $image->hashName(),
            'nama'     => $request->nama,
            'nim'     => $request->nim,
            'jurusan'     => $request->jurusan,
            'alamat'   => $request->alamat
        ]);

       return redirect()->route('mhs.index')->with(['success' => 'Data Sukses Disimpan!']);
       // jangan lupa tambahkan script untuk pesan sukses
    }
    // method untuk menampilkan view ubah data
    public function edit(string $id): View
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('mhs.edit', compact('mhs'));
    }

    // buat method untuk update data kirimkan ke database
    public function update(Request $request, $id): RedirectResponse
    {
        // validasi
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required'
        ]);

        $mhs = Mahasiswa::findOrFail($id);

        // kondisi yang diberikan ketika ubah data
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/image', $image->hashName());
            Storage::delete('public/image/'.$mhs->image);

            $mhs->update([
                'image' => $image->hashName(),'nama' => $request->nama,
                'nim' => $request->nim,
                'jurusan' => $request->jurusan,
                'alamat' => $request->alamat
            ]);
        } else {
            $mhs->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'jurusan' => $request->jurusan,
                'alamat' => $request->alamat
            ]);
        }
        return redirect()->route('mhs.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    // buat method untuk hapus data
    public function destroy($id): RedirectResponse
    {
        // ini kode untuk ambil data berdasarkan ID di tabel mahasiswa
        $mhs = Mahasiswa::findOrFail($id);
        // kode ini untuk menghapus gambar yang ada dalam folder direktory
        Storage::delete('public/image/'. $mhs->image);
        // pangil fungsi untuk hapus data
        $mhs->delete();
        return redirect()->route('mhs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    // buat method untuk tampilkan detail data
    public function show(string $id): View
    {
        $mhs = Mahasiswa::findOrFail($id);
        return view('mhs.show', compact('mhs'));
    }

}
