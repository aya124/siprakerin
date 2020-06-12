<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
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
            return datatables()->of(Permission::latest()->get())
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
        return view('permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'name' => ['required', 'string', 'max:255'],
            'display_name' => ['max:255'],
        ], [
            'required' =>'Kolom :attribute tidak boleh kosong',
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        return response()->json(['success' => 'Permission berhasil diperbarui.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
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
            $data = Permission::findOrFail($id);
            return response()->json(compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request-> validate([
            'name' => ['required', 'string', 'max:255'],
            'display_name' => ['string', 'max:255'],
        ], [
            'required' =>'Kolom :attribute tidak boleh kosong',
        ]);
        $permission = Permission::findOrFail($request->hidden_id);
        $permission->update([
            'name'=> $request->name,
            'display_name'=> $request->display_name,
        ]);

        return response()->json(['success' => 'Permission berhasil diperbarui.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return response()->json(['success' => 'Permission berhasil dihapus.']);
    }
}