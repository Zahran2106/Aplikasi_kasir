<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('admin.tambahKasir.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.tambahKasir.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name_karyawan' => 'required',
            'username' => 'required',
            'password' => 'required',
            'status' => 'required',
            'role' => '',
            'foto' => 'image|mimes:jpg,png,svg',
        ]);

        $validated['avatar'] = 'default.png';

        if($request->hasFile('foto')){
            $fileName = time() . '.' . $request->foto->extension();
            $validated['foto'] = $fileName;

            // move file
            $request->foto->move(public_path('uploads/images'), $fileName);
        }
        
        $validateData['password'] = bcrypt($validateData['password']);

        $data = new User;
        $data->name = $request->name_karyawan;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->foto = $validated['foto'];
        $data->status = $request->status;
        $data->role = 'Kasir';
        $data->save();
  
        return redirect()->route('tambahKasir.index')->with('success','Berhasil Menyimpan !');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user, $id)
    {
        $user = User::findOrFail($id);
        return view('admin.tambahKasir.edit',compact('user'));
    }

    public function update(Request $request, User $user, $id)
    {

        $validateData = $request->validate([
            'name_karyawan' => 'required',
            'username' => 'required',
            'password' => 'required',
            'status' => 'required',
            'role' => '',   
            'foto' => 'image|mimes:jpg,png,svg',
        ]);
        
        $validated['foto'] = $request->foto;

        if($request->hasFile('foto')){
            $fileName = time() . '.' . $request->foto->extension();
            $validated['foto'] = $fileName;

            // move file
            $request->foto->move(public_path('uploads/images'), $fileName);
            
            $oldPath = public_path('/uploads/images/'.$request->foto);
            if(file_exists($oldPath) && $request->foto != 'default.png'){
                unlink($oldPath);
            }
        }
        
        $validateData['password'] = bcrypt($validateData['password']);

        $data = User::find($id);
        $data->name = $request->name_karyawan;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->foto = $validated['foto'];
        $data->status = $request->status;
        $data->role = 'Kasir';
        $data->update();

        return redirect()->route('tambahKasir.index')->with('success','Berhasil Update !');
    }

    public function delete(User $user, $id)
    {
        $user =  User::find($id);
        $user->delete();
        return redirect()->route('tambahKasir.index')->with('success','Berhasil Hapus !');
    }
}
