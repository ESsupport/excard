<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'code',
        'use_type',
        'total_used',
        'percentage',
        'status'
    ];

    public static $rules = [
        'name'       => 'required|unique:coupons,name',
        'code'       => 'required',
        'percentage' => 'required|numeric',
        'use_type'   => 'required|numeric',
    ];

}
