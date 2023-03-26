<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Kategori;

class ProdukController extends Controller
{
    
    public function index()
    {
        $produks = Produk::latest()->paginate(5);
        return view('admin.produk.index', compact('produks'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.produk.create', compact('kategoris'));
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
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok_barang' => 'required',
            'satuan' => 'required',
            'harga_modal' => 'required',
            'harga_jual' => 'required',
            'foto_barang' => 'required',
            'status_barang' => 'required',
           
        ]);
        $validated['avatar'] = 'default.png';

        if($request->hasFile('foto_barang')){
            $fileName = time() . '.' . $request->foto_barang->extension();
            $validated['foto_barang'] = $fileName;

            // move file
            $request->foto_barang->move(public_path('uploads/images'), $fileName);
        }

        $data = new Produk;
        $data->kode_barang = $request->kode_barang;
        $data->nama_barang = $request->nama_barang;
        $data->kategori = $request->kategori;
        $data->stok_barang = $request->stok_barang;
        $data->satuan = $request->satuan;
        $data->harga_modal = $request->harga_modal;
        $data->harga_jual = $request->harga_jual;
        $data->foto_barang = $validated['foto_barang'];
        $data->status_barang = $request->status_barang;
        $data->save();
        
        return redirect()->route('produk.index')->with('success', 'Berhasil Menyimpan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit',compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'stok_barang' => 'required',
            'satuan' => 'required',
            'harga_modal' => 'required',
            'harga_jual' => 'required',
            'foto_barang' => 'required',
            'status_barang' => 'required',
        ]);

        $validated['foto_barang'] = $request->foto_barang;

        if($request->hasFile('foto_barang')){
            $fileName = time() . '.' . $request->foto_barang->extension();
            $validated['foto_barang'] = $fileName;

            // move file
            $request->foto_barang->move(public_path('uploads/images'), $fileName);
            
            // delete old file
            $oldPath = public_path('/uploads/images/'.$request->foto_barang);
            if(file_exists($oldPath) && $request->foto_barang != 'default.png'){
                unlink($oldPath);
            }
        }

        $data = Produk::find($id);
        $data->kode_barang = $request->kode_barang;
        $data->nama_barang = $request->nama_barang;
        $data->kategori = $request->kategori;
        $data->stok_barang = $request->stok_barang;
        $data->satuan = $request->satuan;
        $data->harga_modal = $request->harga_modal;
        $data->harga_jual = $request->harga_jual;
        $data->foto_barang = $validated['foto_barang'];
        $data->status_barang = $request->status_barang;
        $data->update();
    
        return redirect()->route('produk.index')->with('success','Berhasil Update !');
    }

    public function delete($id)
    {
        $produk =  Produk::find($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success','Berhasil Hapus !');
    }
}
