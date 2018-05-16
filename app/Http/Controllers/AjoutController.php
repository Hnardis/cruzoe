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
use App\Http\Requests\StoreBeatRequest;
use Illuminate\Support\Facades\Redirect;

class AjoutController extends Controller
{
    public function Addbeat()
    {
        $format = Format::all();
       return view('BeatsViews.ajouterbeat' , compact('format'));
    }

    /**
     * Enregistre les données d'un beat reçus par la méthode POST
     */
    public function store(StoreBeatRequest $request) {
        
        // Enregistrement dans la table Beat ....
        $pochetteFullName = $request->bea_nom . '.' . $request->bea_pochette->getClientOriginalExtension();
        $beat = new Beat;
        $beat->bea_nom = $request->bea_nom;
        $beat->bea_dureeExtrait = $request->bea_dureeExtrait;
        $beat->bea_cheminImage = Storage::putFileAs('pochettes', $request->bea_pochette, $pochetteFullName) ;
        $beat->save();
        // Enregistrement dans la table Beat terminée !

        // TODO:: Enregistrer dans la table <beatformat> (j'te laisse faire cette partie)

        return Redirect::route('beats.create');
    }

    public function storebeat(Request $request)
    {

    // Enregistrement dans la table beat
        // $request->bea_cheminImage->getClientOriginalExtension();  
        // $beat  = new Beat;
        // $beat->bea_nom  = $request->bea_nom;
        // $beat->bea_dureeExtrait = $request->input('bea_dureeExtrait');
        // //$beat->bea_cheminImage = $request->bea_cheminImage;
        // $beat->bea_cheminImage = Storage::putFileAs('public/image', $request->bea_cheminImage, $beat->bea_nom);
        // dd($beat);
        // $beat->save();

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
