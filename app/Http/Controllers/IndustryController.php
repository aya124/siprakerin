<?php

namespace App\Http\Controllers;

use App\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class IndustryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // filter kondisi apakah sudah auth/login atau belum
        //Param string / array
        //$this->middleware('guest')->only(['index', 'create']); //hanya untuk user 'guest'
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // index: untuk menampilkan seluruh resource
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Industry::latest()->get())
                ->addColumn('action', function($data){
                    if(Auth::user()->hasRole('admin')){
                        $button = '<button type="button" 
                        name="detail" id="'.$data->id.'" class="detail btn btn-success btn-sm">
                        <i class="fa fa-info-circle"></i> Detail</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" 
                        name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" 
                        name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus</button>';
                        $button .= '&nbsp;&nbsp;';
                        return $button;  
                      }else {
                        $button = '<button type="button" 
                        name="detail" id="'.$data->id.'" class="detail btn btn-success
                        btn-sm"><i class="fa fa-info-circle"></i> Detail</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" 
                        name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        return $button;
                      }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        // $industries = Industry::all();
        return view('industry.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('industry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request-> validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['max:255'],
            'city' => ['max:255'],
            'phone' => ['integer'],
            'detail' => ['max:255'],
        ], [
            'required' =>'Kolom :attribute tidak boleh kosong',
        ]);

        $industry = Industry::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'detail' => $request->detail,
            'username' => $user->id,
        ]);
        return response()->json(['success' => 'Industri berhasil diperbarui.']);
        // return redirect()->route('industry.index')
        // ->withStatus([
        //     'message' => 'Industri berhasil ditambahkan.',
        //     'color' => 'success'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Industry $industry)
    {
        $data = DB::table('industries as i')
        ->join('users as u', 'u.id', '=', 'i.username')
        ->select('i.name', 'i.address', 'i.city', 'i.phone', 'i.detail', 
        DB::raw('u.name as username'),'i.id')
        ->where('i.id', '=', $industry->id)
        ->get();
        // $d2 = Industry::findOrFail($industry);
        // dd($data,$d2);
        return view ('industry.show', compact('data'));
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
        $data = Industry::findOrFail($id);
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
            'address' => ['required', 'max:255'], 
            'city' => ['required', 'max:255'],
            'phone' => ['required', 'integer'],
            'detail' => ['required', 'max:255'],
            'status' => ['required'],
        ]);

        $industry = Industry::findOrFail($request->hidden_id);
        $industry->update([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'detail'=> $request->detail,
            'status'=> $request->status,
        ]);

        return response()->json(['success' => 'Industri berhasil diperbarui.']);

        // return redirect()->route('industry.index')->withStatus([
        //     'message' => 'Data industri berhasil diperbarui.',
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
        $industry = Industry::findOrFail($id);
        $industry->delete();
        return response()->json(['success' => 'Industri berhasil dihapus.']);

        // return back()->withStatus([
        // 'message' => 'Data industri telah terhapus.',
        // 'color' => 'success'
        // ]);
    }
}
