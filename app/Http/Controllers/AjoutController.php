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
use App\Http\Requests\StoreBeatFormatRequest;

class AjoutController extends Controller
{
    public function Addbeat()
    {
        $format = Format::all();
       return view('BeatsViews.ajouterbeat' , compact('format'));
    }

    /**
     * Montre la vue pour l'étape 2 de l'enregistrement d'un beat
     * dont l'id est recu dans l'URL
     */
    public function AllerSurEtape2($id)
    {
        $formats = Format::all();
        $beat = Beat::findorFail($id);

        return view('BeatsViews.ajouter-etape-2', compact('beat', 'formats'));
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
        $beat->bea_cheminImage = Storage::putFileAs('pochettes', $request->bea_pochette, $pochetteFullName);
        $beat->save();
        
        // Redirection vers l'étape 2 pour uploader les fichiers audio
        return Redirect::route('beats.create.etape2', ['id' => $beat->bea_id]);
    }

    /**
     * Enregistre dans BeatFormat les données reçues par POST
     */
    public function storeBeatFormat(StoreBeatFormatRequest $request)
    {
        $action;

        // Controle doublon
        $doublon = BeatFormat::where('id_format', $request->format)
                                ->where('id_beat', $request->bea_id)
                                ->get()
                                ->toArray();
        
        if (count($doublon) == 0) {

            // Récupération du nom du beat et formation du nom complet de l'audio (" nombeat.format ")
            $beat = Beat::findorFail($request->bea_id);
            $audioFullName = $beat->bea_nom . '.' . $request->audio->getClientOriginalExtension();
            
            // Enregistrement des données du beat
            $beatF = new BeatFormat;
            $beatF->id_format = $request->format;
            $beatF->id_beat = $request->bea_id;
            $beatF->bf_prix = $request->prix;
            $beatF->bf_taille = $request->audio->getClientSize(); // NB : La taille est en octet
            $beatF->bf_chemin = Storage::putFileAs('beats', $request->audio, $audioFullName);
            $beatF->save();

            $action = "Succès";

            // NB : Actuellement, j'affiche juste "Succs quand l'upload a marché
            // TODO: Je te laisse créer et faire une redirection vers la vue qu'il vaut afficher lorsque l'upload a réussi 
            // TODO: Pareil lorsque ça n'a pas marché
        }
        else {
            $action = 'Déjà existant';
        }

        return $action;        
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

    //      Enregistrement dans la table format 
    //    $format = new Format;
    //    $format -> for_nom = $request->input('for_nom');
    //    $format->save();

    //  Enregistrement dans la table beatformat 
        // $beatformat = new BeatFormat;
        //     $beatformat ->  id_format = $beat -> for_id;
        //     $beatformat -> id_beat = $beat -> bea_id;
        //     $beatformat -> bf_taille = $request->input('bf_taille');
        //     $beatformat -> bf_prix = $request->input('bf_prix');
        //     $beatformat -> bf_chemin = $request-> bf_chemin;
        //     $beatformat -> filepath = Storage::putFileAs('public/music', $request-> bf_chemin, $beatformat->filename);

            // $beatformat->save();
      
    //    return redirect('/ajout');
    }
    
       public function checklistbeat()
       {

        $results = \DB::table('beat')->get();
       
          return view ('beat/listebeat')->with('results', $results);
       }


}
