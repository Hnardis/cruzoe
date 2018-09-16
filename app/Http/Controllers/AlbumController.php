<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Storage; 
use App\Beat;
use App\Format;
use App\Album;

class AlbumController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
//    public function CreateAlbum()
//    {
//       return view('AlbumsViews.creeralbum');

//    }

   public function CreateAlbum()
   {
       //selection de la table beat
       //selection de la table format
       $resultBF = DB::table('beatformat')
      ->join('beat', 'beatformat.id_beat', '=', 'beat.bea_id')
      ->join('format', 'beatformat.id_format', '=', 'format.for_id')
      ->where('beatformat.id_format', '=', 1)
      ->get();


       return view('AlbumsViews.creeralbum', ['resultBF' => $resultBF]);
   }
   


   public function store(Request $request)
   {

 // Enregistrement dans la table Album
  $album = new Album;

  $pochetteFullName = $request->album_titre . '.' . $request->album_pochette->getClientOriginalExtension();

  $album->album_titre = $request->album_titre;
  $album->album_cover = Storage::putFileAs('pochettes', $request->album_pochette, $pochetteFullName);
  $album->save();
  
    
   }
}
