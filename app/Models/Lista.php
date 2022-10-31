<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Lista
 *
 * @property $id
 * @property $nombres
 * @property $imagen
 * @property $string
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lista extends Model
{
    
    static $rules = [
		'nombres' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','imagen','string'];



}
