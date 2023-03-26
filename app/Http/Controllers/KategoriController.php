<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $kategoris = Kategori::latest()->paginate(5);
        return view('admin.kategori.index', compact('kategoris'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'jumlah' => 'required',
           
        ]);

        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Berhasil Menyimpan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit',compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_karyawan' => 'required',
            'jumlah' => 'required',
        ]);
        
        $kategori = Kategori::findOrFail($id);
        $kategori->update($validateData);
    
        return redirect()->route('kategori.index')->with('success','Berhasil Update !');
    }

    public function delete($id)
    {
        $kategori =  Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success','Berhasil Hapus !');
    }
}
