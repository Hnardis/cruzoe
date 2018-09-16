<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreFilesNewsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Store;
use Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\File;
use App\Sample;
use App\Http\Requests\StoreSampleRequest;
use Illuminate\Support\Facades\Redirect;

class AddSampleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddSample()
    {
        return view('SampleViews.ajouterSample');
    }

    /**
     * Enregistre les données d'un Sample reçus par la méthode POST
     */

    public function store(request $request)
    {
        $listSam = \DB::table('sample')->get();;
      // Enegistrement dans la table Sample
      $sample = new Sample;
      $sampleFullName = $sample->sam_nom . '.' . $request->sample->getClientOriginalExtension(); 
      $pocheFullName = $request->sam_nom . '.' . $request->sam_poche->getClientOriginalExtension();
      $sample->sam_prix = $request->sam_prix;
      $sample->sam_nom = $request->sam_nom;
      $sample->sam_cover = Storage::putFileAs('poche', $request->sam_poche, $pocheFullName);
      $sample->sam_chemin = Storage::putFileAs('poches', $request->sample, $sampleFullName);
      $sample->save();
      
     return Redirect('/listeSample');
     
    }
    
    public function checklisteSample(){
        //selection de la table Sample et mis dans $listSam
		$listSam = \DB::table('sample')->get();;
        return view ('SampleViews/listeSample')->with('listSam', $listSam);;
    }

      public function deleteSample($id, Request $request)
      {
                   $var = new sample;
                   $var = sample::find($id);
                   $var->delete();
                   return redirect()->back();
                 
       } 

      public function editSample($id) // modifier un Sample
      {           
               $modif_Sam = sample::find($id);
               if (count ($modif_Sam) > 0 )
               {
                return view('SampleViews/modifierSample')->with('modif_Sam', $modif_Sam);
               }
               else
               {
                return view('SampleViews/listeSample');
               }
     }


    public function updateSample(Request $request) // mise a jour d'un sample
    {
       $refreshSample = new Sample;
       $refreshSample = Sample::find($request->input('sam_id'));   
       $sampleFullName = $refreshSample-> sam_nom . '.' . $request->sample->getClientOriginalExtension(); 
       $pocheFullName = $request-> sam_nom . '.' . $request->sam_poche->getClientOriginalExtension();
       $refreshSample-> sam_cover = $request->sam_poche;
       $refreshSample -> sam_prix = $request->sam_prix;
       $refreshSample-> sam_cover = Storage::putFileAs('poche', $request->sam_poche, $pocheFullName);
       $refreshSample-> sam_chemin = Storage::putFileAs('poches', $request->sample, $sampleFullName);
       $refreshSample -> save();
       return Redirect('/listeSample');
       
    }

}
  