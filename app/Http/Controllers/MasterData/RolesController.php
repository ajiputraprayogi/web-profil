<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::all();
        return view('master_data.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $permission_grup = Permission::all()->groupby('permission_grup');
        return view('master_data.roles.create', compact('permissions','permission_grup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->input('nama')]);
        $permissions = Permission::find($request->input('permissions'));
        $role->syncPermissions($permissions);
        return redirect('/backend/roles')->with('status','Sukses Menyimpan Data');
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
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_grup = Permission::all()->groupby('permission_grup');
        $role_permission = DB::table('role_has_permissions')->where('role_id',$id)->get();
        return view('master_data.roles.edit',compact('role','permissions','permission_grup','role_permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);
        $role->name = $request->nama;
        $role->save();
        $permissions = Permission::find($request->input('permissions'));
        $role->syncPermissions($permissions);
        return redirect('/backend/roles')->with('status','Berhasil Merubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
    }
}
