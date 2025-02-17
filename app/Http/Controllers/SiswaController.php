<?php

namespace App\Http\Controllers;

use Storage;
use Throwable;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Requests\SiswaRequest;
use App\Models\JurusanKelasSiswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::with(['jurusans', 'kelass'])->get();
        // return response()->json($siswas);
        return view('siswaIndex', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $kelas = Kelas::all();
        return view('siswaCreate', compact('jurusans', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SiswaRequest $request)
    {
        // dd($request);
        try {

            $data = $request->validated();

            // Pastikan gambar diunggah sebelum disimpan
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('images', 'public');
            }

            // Simpan data siswa
            $siswa = Siswa::create($data);

            // Ambil ID siswa yang baru dibuat
            $siswaId = $siswa->id;

            // Ambil input array (pastikan tidak kosong)
            $jurusans = $request->input('jurusans', []);
            $class = $request->input('class', []);

            if (!empty($jurusans) && !empty($class)) {
                foreach ($jurusans as $jurusan) {
                    foreach ($class as $kelas) {
                        JurusanKelasSiswa::create([
                            'kelas_id' => $kelas,
                            'jurusan_id' => $jurusan,
                            'siswa_id' => $siswaId
                        ]);
                    }
                }
            }

            return response()->json(['success'=>'Berhasil menyimpan data', 'data'=>$siswa], 200);
            // return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambah');
        } catch (\Throwable $e) {
            return redirect()->route('siswa.index')->with('error', 'Gagal membuat data');
        }

    }

    // public function store(SiswaRequest $request)
    // {
    //     try {
    //         // Validasi request
    //         $data = $request->validated();

    //         // Simpan gambar jika ada
    //         if ($request->hasFile('image')) {
    //             $data['image'] = $request->file('image')->store('images', 'public');
    //         }

    //         // Simpan data siswa
    //         $siswas = Siswa::create($data);

    //         // Simpan hubungan siswa dengan jurusan & kelas
    //         $jurusans = $request->input('jurusans', []);
    //         $class = $request->input('class', []);

    //         foreach ($jurusans as $jurusan) {
    //             foreach ($class as $kelas) {
    //                 JurusanKelasSiswa::create([
    //                     'kelas_id' => $kelas,
    //                     'jurusan_id' => $jurusan,
    //                     'siswa_id' => $siswas->id
    //                 ]);
    //             }
    //         }

    //         // ✅ Kembalikan response JSON untuk AJAX
    //         // return response()->json([
    //         //     'success' => 'Berhasil menyimpan data!',
    //         //     'redirect' => route('siswa.index') // Kirim URL redirect ke JavaScript
    //         // ], 200);
    //     return response()->json(['siswas'=>$siswas,'success' => 'Berhasil menyimpan data!', 'redirect' => route('siswa.index')], 200);

    //     } catch (\Throwable $e) {
    //         return response()->json([
    //             'error' => 'Gagal menyimpan data!',
    //             'message' => $e->getMessage()
    //         ], 500);
    //     }
    // }


    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $jurusans = Jurusan::all();
        return view('siswaEdit', compact('siswa', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SiswaRequest $request, Siswa $siswa)
    {
        try {
            if (!empty($siswa->jurusans())) {
                $siswa->jurusans()->detach();
            }

            if (!empty($request['image'])) {
                if ($siswa->image) {
                    $filePath = storage_path('app/public/' . $siswa->image);
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
                $data['image'] = $request->File('image')->store('image', 'public');
            }

            $data = $request->validated();
            $siswa->update($data);

            $jurusans = $request->input('jurusans', []);
            if (!empty($jurusans)) {
                $siswa->jurusans()->attach($jurusans);
            }
            return redirect()->route('siswa.index')->with('success', 'data berhasil di update');
        } catch (\Throwable $e) {
            return redirect()->route('siswa.index')->with('error', 'tidak dapat mengupdate data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        try {
            if ($siswa->image->exists()) {
                $filePath = storage_path('app/public/' . $siswa->image);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            if ($siswa->jurusans()->exists()) {
                $siswa->jurusans()->detach();
            }
            if ($siswa->kelass()->exists()) {
                $siswa->kelass()->detach();
            }

            $siswa->delete();


            return redirect()->route('siswa.index')->with('success', 'data berhasil dihapus');
        } catch (\Throwable $e) {
            return redirect()->route('siswa.index')->with('error', 'data tidak dapat dihapus');
        }
    }
}
