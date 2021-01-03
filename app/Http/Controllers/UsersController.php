<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Permission;


class UsersController extends Controller
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
    public function index()
    {
      $user = Auth::user();
      if(request()->ajax())
      {
        $data = DB::table('users as u')
          ->join('role_user as ru', 'ru.user_id', '=', 'u.id')
          ->join('roles as r', 'r.id', '=', 'ru.role_id')
          ->select('u.name', 'u.email', 'u.username',
            DB:: raw('r.name as role'), 'u.id')
          ->get();

          return datatables()->of($data)
            ->addColumn('action', function($data){
                if(Auth::user()->id == $data->id){

                }else{
                $button = '<button type="button" name="edit" 
                id="'.$data->id.'" class="edit btn btn-primary btn-sm">
                <i class="fa fa-edit"></i> Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="change" 
                id="'.$data->id.'" class="change btn btn-warning btn-sm">
                <i class="fa fa-key"></i> Ganti Password</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" 
                id="'.$data->id.'" class="delete btn btn-danger btn-sm">
                <i class="fa fa-trash"></i> Hapus</button>';
                return $button;
            }  
        })
        ->rawColumns(['action'])
        ->make(true);
      }
      $role = DB::table('roles')
            ->select('name','id')
            ->get();
      $user = User::all();
      
      return view('user.index', compact('role', 'user'));
        // $users = User::all();
        // return view('user.index', compact('users')); //fungsi compact = ['users' => $users]
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('user.create');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'username' => ['required', 'unique:users']
        ], [
            'required' =>'Kolom :attribute tidak boleh kosong',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => hash::make ($request->password),
        ]);
        $user->attachRole($request->role);
        return response()->json(['success' => 'Data user berhasil diperbarui.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(request()->ajax()){
            $user = User::findOrFail($id);
            $data = DB::table('users as u')
            ->join('role_user as ru', 'ru.user_id', '=', 'u.id')
            ->join('roles as r', 'r.id', '=', 'ru.role_id')
            ->select('u.name', 'u.email', 
                DB::raw('r.name as role'), 'u.id')
            ->where('u.id', $id)
            ->get();
        }
        return response()->json(compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax()){
        $user = User::findOrFail($id);
        $data = DB::table('users as u')
            ->join('role_user as ru', 'ru.user_id', '=', 'u.id')
            ->join('roles as r', 'r.id', '=', 'ru.role_id')
            ->select('u.name', 'u.email', 
                DB::raw('r.id as role'), 'u.id')
            ->where('u.id', $id)
            ->get();
        }
        return response()->json(compact('data'));
        // return view ('user.edit', compact('user'));
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
        $user = User::findOrFail($request->hidden_id);
        $request-> validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 
            'username' => ['required', Rule::unique('users')->ignore($user)]
        ],
            // 'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
        ]);
        $roles = $user->roles;
        foreach ($roles as $key => $value){
            $user->detachRole($value);
        }
        $role = Role::find($request->input('role'));
        $user->attachRole($role);
        return response()->json(['success' => 'Data user berhasil diperbarui.']);

        // $user->name = $request->name;
        // $user->email = $request->email;

        // if (isset($request->avatar)){
        //     $avatar_name = 'IMG_'.date('Ymd_Gis').'.'.$request->avatar->getClientOriginalExtension();
        //     $request->avatar->storeAs('/public/avatars', $avatar_name);
        //     $user->avatar = $avatar_name;
        // }
        // $user->save();

        //return redirect()->route('user.index')->withStatus([
        //  'message' => 'Data siswa berhasil diperbarui.',
        //  'color' => 'success'
        //]); // -> update data dan mengembalikan ke hal index
        
        // return back()->withStatus([
        //     'message' => 'Data siswa berhasil diperbarui.',
        //     'color' => 'success'
        // ]);
    }

    public function change($id)
    {
       if(request()->ajax())
        {
        $data = User::findOrFail($id);
            return response()->json(compact('data'));
        }
    }

    public function passchanged(Request $request)
    {
        $rules = [
           'input' => 'required',
           'inputnew' => 'required|same:input' 
        ];
        $msg = [
            'input.required' => 'Password tidak boleh kosong',
            'inputnew.required' => 'Password tidak boleh kosong',
            'inputnew.same' => 'Password tidak sama',
        ];
        $this->validate($request,$rules,$msg);
        
        $pass = User::findOrFail($request->change_id);
        $pass->update([
            'password' => hash::make($request->input)
        ]);
            return response()->json(['success' => 'Password berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (auth()->user()->id == $user->$id) {
            return back()->withStatus([
                'message' => 'Bad decision!', 
                'color' => 'danger'
            ]);
        }
        $user->delete();
        return redirect()->route('user.index')->withStatus([
            'message' => 'Data user berhasil dihapus',
            'color' => 'success'
            ]);
    }
}