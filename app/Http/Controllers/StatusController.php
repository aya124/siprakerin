<?php

namespace App\Http\Controllers;

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
        return view('status.create');
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
            'status' => ['required', 'string', 'max:255'],
        ], [
            'required' =>'Kolom :attribute tidak boleh kosong',
        ]);

        $status = Status::create([
            'name' => $request->status,
        ]);
        return response()->json(['success' => 'Data status berhasil diperbarui.']);

        // return redirect()->route('status.index')
        // ->withStatus([
        //     'message' => 'Status berhasil ditambahkan.',
        //     'color' => 'success'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return view ('status.show', compact('status'));
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
    public function update(Request $request)
    {
        $request-> validate([
            'status' => ['required', 'string', 'max:255'],
        ]);
        $status = Status::findOrFail($request->hidden_id);
        $status->update([
            'name' => $request->status
        ]);

        return response()->json(['success' => 'Data status berhasil diperbarui.']);
        // $statuses->detail = $request->status;
        // $statuses->save();
        
        //return redirect()->route('status.index')->withStatus([
        //  'message' => 'Data status berhasil diperbarui.',
        //  'color' => 'success'
        //]);
        // return back()->withStatus([
        //     'message' => 'Data status berhasil diperbarui.',
        //     'color' => 'success'
        // ]);
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
