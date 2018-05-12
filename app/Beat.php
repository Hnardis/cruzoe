<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beat extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'beat';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'bea_id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bea_nom', 'bea_dureeExtrait','bea_cheminImage'];
}
