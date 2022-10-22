<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // protected $keyType = 'int';
    // public $timestamps = true;
    // protected $dateFormat = 'U';
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';

	protected $casts = [
		// 'campo_bool' => 'int'
	];

	protected $dates = [
		// 'creation_date',
		// 'updated_date'
	];
    
    protected $fillable = [
        'name',
        'email'
    ];

    protected $attributes = [
        // 'name' => '',
        // 'email' => ''
    ];
}