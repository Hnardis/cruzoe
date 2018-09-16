<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'format';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'for_id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['for_nom' , 'for_extension'];
}