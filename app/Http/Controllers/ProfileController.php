<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Hash;

class ProfileController extends Controller
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
        $login = Auth::user();
        $user = DB::table('users as u')
            ->join('role_user as ru','ru.user_id','=','u.id')
            ->join('roles as r','r.id','=','ru.role_id')
            // ->join('students as s','s.user_id','=','u.id')
            // ->join('student_classes as sc','sc.id','=','s.class_id')
            ->select('u.name',
                    'u.email',
                    'u.username',
                    DB::raw('r.name as role'),
                    // 's.nis',
                    // DB::raw('sc.name as classname'),
                    'u.id'
                    )
            ->where('u.id',$login->id)
            ->get();
                return datatables()->of($user)
                ->make(true);
        }
        $isLoggin = Auth::user();
        $data = DB::table('users as u')
            ->join('role_user as ru','ru.user_id','=','u.id')
            ->join('roles as r','r.id','=','ru.role_id')
            // ->join('students as s','s.user_id','=','u.id')
            // ->join('student_classes as sc','sc.id','=','s.class_id')
            ->select(
                    'u.name',
                    'u.email',
                    DB::raw('r.name as role'),
                    // 's.nis',
                    // DB::raw('sc.name as classname'),
                    'u.id'
                    )
            ->where('u.id',$isLoggin->id)
            ->get();
        return view('profile.index',compact('data'));
        // dd($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
            // ->join('students as s','s.user_id','=','u.id')
            // ->join('student_classes as sc','sc.id','=','s.class_id')
            ->select('u.name',
                    'u.email',
                    DB::raw('r.name as role'),
                    // 's.nis',
                    // DB::raw('sc.name as classname'),
                    'u.id'
                    )
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
        //
         if(request()->ajax())
        {
        $data = User::findOrFail($id);
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
            'name' => ['required', 'string', 'regex:/^[a-zA-Z ]+$/'],
            'email' => ['required', 'email',
        ],
            'required' =>'Kolom :attribute tidak boleh kosong',
        ]);
        $user = User::findOrFail($request->hidden_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return response()->json(['success' => 'Profil berhasil diperbarui.']);
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
        //
    }
}
