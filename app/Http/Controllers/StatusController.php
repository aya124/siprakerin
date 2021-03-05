<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Status;
use Illuminate\Http\Request;
//use DB;

class StatusController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Status::latest()->get())
                    ->addColumn('action', function($data){
                        $button= '<button type="button" 
                        name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" 
                        name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus</button>';
                        return $button;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // $statuses = Status::all();
        return view('status.index');
        // return view('status.index', compact('statuses')); //fungsi compact = ['users' => $users]
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        try {
            $data = $request->all();
            Status::create($data);
            return response()->json(['success' => 'Status berhasil ditambah.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Gagal menambah data.']);
        }
        // $request-> validate([
        //     'status' => ['required', 'string', 'max:255'],
        // ], [
        //     'required' =>'Kolom :attribute tidak boleh kosong!',
        // ]);

        // $status = Status::create([
        //     'name' => $request->status,
        // ]);
        // return response()->json(['success' => 'Data status berhasil diperbarui.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
       // return view ('status.show', compact('status'));
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
        $data = Status::findOrFail($id);
            return response()->json(compact('data'));
        }
        // dd($statuses);
        // $statuses = Status::findOrFail($id);
        // return view ('status.edit', compact('statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request)
    {
        // $request-> validate([
        //     'status' => ['required', 'string', 'max:255'],
        // ],[
        //     'required' =>'Kolom :attribute tidak boleh kosong!',
        // ]);
        $data = $request->all();
        $status = Status::findOrFail($request->hidden_id);
        // $status->update([
        //     'name' => $request->status
        // ]);
        $status-> update($data);
        return response()->json(['success' => 'Data berhasil diperbarui.']);
        // $statuses->detail = $request->status;
        // $statuses->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();
        return response()->json(['success' => 'Data status berhasil dihapus.']);
        // return back()->withStatus([
        // 'message' => 'Data status telah terhapus.',
        // 'color' => 'success'
        // ]);
    }
}
