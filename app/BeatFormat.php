<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeatFormat extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'beatformat';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'bf_id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['bf_chemin ', 'bf_taille', 'bf_prix ', 'id_format', 'id_beat'];
}