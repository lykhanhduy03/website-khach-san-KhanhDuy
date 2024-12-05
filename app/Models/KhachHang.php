<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    //
    protected $table = 'kh';
    protected $filltable = [
        'id',
        'ten_kh',
        'sdt',
        'email'
    ];

    public function datphong()
    {
        return $this->hasMany(KhachHang::class,'khachhang_id');
    }



}
