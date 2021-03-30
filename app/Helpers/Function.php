<?php

use App\Role;
use App\Submission;
use App\Teacher;

function userByRole($id)
{
    return Role::join('role_user','roles.id','role_user.role_id')
                ->join('users','users.id','role_user.user_id')
                ->where('roles.id',$id)
                ->first();
}

function nip($id)
{
    return Teacher::join('users','users.id','teachers.user_id')
                ->where('teachers.id',$id)
                ->first();
}

function YearSubmission($id)
{
    $count = Submission::where('year_id',$id)->count();
    if($count == 0)
    return true;
    else
    return false;
}

function tgl($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
    // $tg= $pecahkan[2].toString().replace(/^0/g,'');
    return $pecahkan[2]. ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
