<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreFilesNewsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Store;
use Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\File;
use App\BeatFormat;
use App\Beat;
use App\Format;

class AjoutController extends Controller
{
    

    public function Addbeat()
    {
        $format = Format::all();
       return view('BeatsViews.ajouterbeat' , compact('format'));
    }

    public function storebeat(Request $request)
    {

// Enregistrement dans la table beat
      $request->bea_cheminImage->getClientOriginalExtension();  
       $beat  = new Beat;
       $beat->bea_nom  = $request->bea_nom;
       $beat->bea_dureeExtrait = $request->input('bea_dureeExtrait');
       //$beat->bea_cheminImage = $request->bea_cheminImage;
       $beat->bea_cheminImage = Storage::putFileAs('public/image', $request->bea_cheminImage, $beat->bea_nom);
     // dd($beat);
       $beat->save();

// Enregistrement dans la table format 
    //    $format = new Format;
    //    $format -> for_nom = $request->input('for_nom');
    //    $format->save();

// Enregistrement dans la table beatformat 
        // $beatformat = new BeatFormat;
        //     $beatformat ->  id_format = $beat -> for_id;
        //     $beatformat -> id_beat = $beat -> bea_id;
        //     $beatformat -> bf_taille = $request->input('bf_taille');
        //     $beatformat -> bf_prix = $request->input('bf_prix');
        //     $beatformat -> bf_chemin = $request-> bf_chemin;
        //     $beatformat -> filepath = Storage::putFileAs('public/music', $request-> bf_chemin, $beatformat->filename);

        //     $beatformat->save();
      
       return redirect('/ajout');
        }

    

       public function checklistbeat()
       {

        $results = \DB::table('beat')->get();
       
          return view ('beat/listebeat')->with('results', $results);
       }


}
