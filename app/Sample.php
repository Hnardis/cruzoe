<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{   /**
    * The database table used by the model.
    *
    * @var string
    */
   protected $table = 'sample';

   /**
    * The primary key for the model.
    *
    * @var string
    */
   protected $primaryKey = 'sam_id';
   public $timestamps = true;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['sam_nom','sam_cover','sam_prix'];
}
