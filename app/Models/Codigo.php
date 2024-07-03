<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Codigo
 *
 * @property $id
 * @property $codigo
 * @property $estado
 * @property $id_curso
 * @property $created_at
 * @property $updated_at
 *
 * @property Curso $curso
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Codigo extends Model
{
    
    static $rules = [
		'codigo' => 'required',
		'estado' => 'required',
		'id_curso' => 'required',
    ];

    protected $perPage = 50;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','estado','id_curso'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function curso()
    {
        return $this->hasOne('App\Models\Curso', 'id', 'id_curso');
    }
    public function codigovotos()
    {
        return $this->hasMany('App\Models\Codigovoto', 'id_codigo', 'id');
    }

}
