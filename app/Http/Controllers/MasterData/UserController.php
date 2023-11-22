<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('master_data.users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master_data.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'nama_lengkap' => $request->nama,
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->userpassword)
        ]);
        return redirect('/backend/users')->with('status','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id',$id)->get();
        return view('master_data.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->userpassword != ''){
            User::where('id',$id)->update([
                'nama_lengkap' => $request->nama,
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->userpassword)
            ]);
        }else{
            User::where('id',$id)->update([
                'nama_lengkap' => $request->nama,
                'name' => $request->username,
                'email' => $request->email,
            ]);
        }
        return redirect('/backend/users')->with('status','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        // return redirect('/backend/users')->with('status','Data berhasil dihapus');
    }
}
