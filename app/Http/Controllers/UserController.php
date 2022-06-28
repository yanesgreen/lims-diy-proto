<?php

namespace App\Http\Controllers;

use App\Bidang;
use App\Http\Requests\UserStoreRequest;
use App\Jabatan;
use App\Pangkat;
use App\Role;
use App\Subbidang;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        $roles = Role::pluck('nama', 'id');
        $bidang = Bidang::pluck('nama', 'id')->prepend('---', '');
        $jabatan = Jabatan::pluck('nama', 'id');
        $pangkat = Pangkat::pluck('nama', 'id');
        return view('users.create', [
            'roles' => $roles,
            'bidang' => $bidang,
            'jabatan' => $jabatan,
            'pangkat' => $pangkat,
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        // upload foto profil
        if ($request->foto) {
            $filenameExt = $request->file('foto')->getClientOriginalExtension();
            $fileNameToStore = $request->username . '_' . time() . '.' . $filenameExt;
            $request->file('foto')->storeAs('public/avatars', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        // upload digitalsign
        if ($request->digitalsign) {
            $image = $request->digitalsign;
            $image = str_replace('data:image/png;base64,', '', $image);
            $imageName = $request->username . Str::random(10) . '.' . 'png';
            File::put(storage_path('app/public/') . $imageName, base64_decode($image));
        }


        // user input
        $user = new User();
        $user->nama = ucwords($request->input('nama'));
        $user->foto = $fileNameToStore;
        $user->nrp = $request->input('nrp');
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id');
        $user->bidang_id = $request->input('bidang_id');
        $user->subbidang_id = $request->input('subbidang_id');
        $user->pangkat_id = $request->input('pangkat_id');
        $user->jabatan_id = $request->input('jabatan_id');
        $user->aktif = 1;
        $user->remember_token = Str::random(10);
        if ($request->digitalsign) {
            $user->digitalsign = $imageName;
        }

        // save user
        $user->save();

        return redirect()
            ->route('pengguna.index')
            ->with('success', 'data pengguna baru berhasil disimpan');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        $roles = Role::pluck('nama', 'id');
        $bidang = Bidang::pluck('nama', 'id')->prepend('---', '');
        $subbidang = Subbidang::pluck('nama', 'id');
        $pangkat = Pangkat::pluck('nama', 'id');
        $jabatan = Jabatan::pluck('nama', 'id');
        return view('users.edit', [
            'roles' => $roles,
            'bidang' => $bidang,
            'subbidang' => $subbidang,
            'pangkat' => $pangkat,
            'jabatan' => $jabatan,
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $pengguna)
    {
        // validation rules
        $rules = [
            'nama' => 'required|min:3',
            'foto' => 'image|mimes:jpeg,png,jpg|max:512',
            'nrp' => ['required', 'numeric', Rule::unique('users')->ignore($pengguna->id)],
            'username' => ['required', 'min:5', 'max:20', 'alpha_num', Rule::unique('users')->ignore($pengguna->id)],
            'role_id' => 'required',
            'pangkat_id' => 'required',
            'jabatan_id' => 'required',
        ];

        // validate $_POST
        $this->validate($request, $rules);

        // upload foto profil
        if ($request->foto) {
            $filenameExt = $request->file('foto')->getClientOriginalExtension();
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameToStore = $filename . '_' . time() . '.' . $filenameExt;
            $request->file('foto')->storeAs('public/avatars', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        // upload digitalsign
        if ($request->digitalsign) {
            $image = $request->digitalsign;
            $image = str_replace('data:image/png;base64,', '', $image);
            $imageName = $request->username . Str::random(10) . '.' . 'png';
            File::put(storage_path('app/public/') . $imageName, base64_decode($image));
        }

        // update user input
        $pengguna->nama = ucwords($request->input('nama'));
        $pengguna->nrp = $request->input('nrp');
        $pengguna->username = $request->input('username');
        $pengguna->role_id = $request->input('role_id');
        $pengguna->bidang_id = $request->input('bidang_id');
        $pengguna->subbidang_id = $request->input('subbidang_id');
        $pengguna->jabatan_id = $request->input('jabatan_id');
        $pengguna->pangkat_id = $request->input('pangkat_id');
        $pengguna->remember_token = Str::random(10);
        $pengguna->updated_at = date('Y-m-d H:i:s');
        if ($fileNameToStore !== '') {
            $pengguna->foto = $fileNameToStore;
        }
        if ($request->digitalsign) {
            $pengguna->digitalsign = $imageName;
        }

        // update data
        $pengguna->update();

        // return
        return redirect()->route('pengguna.index')->with('success', 'data berhasil diubah');
    }


    public function delete(User $user)
    {
        return view('users.delete', ['user' => $user]);
    }

    public function softdelete(User $user)
    {
        // insert user input
        $user->aktif = 0;

        // save data
        $user->update();

        //response
        $response = ['message' => 'Pengguna berhasil dihapus'];
        return $response;
    }
}
