<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Role;
use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Role::latest()->get())
                    ->addColumn('action', function($data){
                      
                        $button= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-info btn-sm">
                        <i class="fa fa-edit"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        $permit = DB::table('permissions')
            ->select('id', 'name')
            ->get();
        return view('role.index', compact('permit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        try {
            $data = $request->all();
            $data-> attachPermissions($request->p);
            Role::create($data);
            return response()->json(['success' => 'Role berhasil ditambah.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Role gagal ditambah.']);
        }
        // $request-> validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'display_name' => ['required', 'string', 'max:255'],
        // ], [
        //     'required' =>'Kolom role :attribute tidak boleh kosong',
        // ]);

        // $role = Role::create([
        //     'name' => $request->name,
        //     'display_name' => $request->display,
        // ]);
        // $role-> attachPermissions($request->p);
        // return response()->json(['success' => 'Role berhasil diperbarui.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // return view ('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $dataa = DB::table('roles as r')
                ->join('permission_role as pr', 'pr.role_id', '=', 'r.id')
                ->join('permissions as p', 'p.id', '=', 'pr.permission_id')
                ->select('r.id', 'r.name', DB::raw('p.id as perm_id'))
                ->where('r.id', $id)
                ->get();
            $data = Role::findOrFail($id);
            $role_permission = $data->permissions()->get()->pluck('id')->toArray();
            return response()->json(compact('data', 'dataa', 'role_permission'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request)
    {
        // $request-> validate([
        //     'name' => ['required', 'max:255'],
        //     'display_name' => ['max:255'],
        // ], [
        //     'required' =>'Kolom role :attribute tidak boleh kosong',
        // ]);
        $data = $request->all();
        $role = Role::findOrFail($request->hidden_id);
        $role->update([
            'name'=> $request->name,
            'display_name' => $request->display,
        ]);
        DB::table('permission_role')
        ->where('permission_role.role_id', $request->hidden_id)
        ->delete();
        // Attach permission to role
        $role->attachPermissions($request->p);
        return response()->json(['success' => 'Role berhasil diperbarui.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(['success' => 'Role berhasil dihapus.']);
    }
}