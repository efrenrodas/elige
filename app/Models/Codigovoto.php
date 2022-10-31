<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Codigovoto
 *
 * @property $id
 * @property $id_lista
 * @property $id_codigo
 * @property $created_at
 * @property $updated_at
 *
 * @property Codigo $codigo
 * @property Lista $lista
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Codigovoto extends Model
{
    
    static $rules = [
		'id_lista' => 'required',
		'id_codigo' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_lista','id_codigo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function codigo()
    {
        return $this->hasOne('App\Models\Codigo', 'id', 'id_codigo');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lista()
    {
        return $this->hasOne('App\Models\Lista', 'id', 'id_lista');
    }
    

}
