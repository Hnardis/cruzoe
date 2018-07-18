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

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        return Redirect::route('beats.create.etape2', ['id' => $beat->bea_id] );
    }

    /**
     * Enregistre dans BeatFormat les données reçues par POST
     */
    public function storeBeatFormat(StoreBeatFormatRequest $request)
    {
        

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

            return view('BeatsViews.succes-ajout-beat');

            // NB : Actuellement, j'affiche juste "Succs quand l'upload a marcher
            // TODO: Pareil lorsque ça n'a pas marché
        }
        else {
            return redirect()->back();;
        }

    }

    public function storeBeatFormat1(Request $request)
    {
        

        // definition des variables
                $id_format=$request->for_id;
                $prix=$request->prix;
                $image=$request->audio;
        
        for($i=0; $i<count($id_format); $i++ )
      {

            // Récupération du nom du beat et formation du nom complet de l'audio (" nombeat.format ")
            $beat = Beat::findorFail($request->bea_id);
            $audioFullName = $beat->bea_nom . '.' . $image[$i]->getClientOriginalExtension();
            
            // Enregistrement des données du beat
            $beatF = new BeatFormat;
            $beatF->id_format =   $id_format[$i];
            $beatF->id_beat = $request->bea_id;
            $beatF->bf_prix = $prix[$i];
            $beatF->bf_taille = $image[$i]->getClientSize(); // NB : La taille est en octet
            $beatF->bf_chemin = Storage::putFileAs('beats',  $image[$i], $audioFullName);
            $beatF->save();

           

            // NB : Actuellement, j'affiche juste "Succs quand l'upload a marcher
            // TODO: Pareil lorsque ça n'a pas marché
        }
        return view('BeatsViews.succes-ajout-beat');

    }

    
   
    



}
