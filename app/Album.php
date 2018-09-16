<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Album';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'album_id';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['album_titre','album_cover'];
}
