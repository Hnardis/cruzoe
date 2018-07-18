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
     // ('SampleViews/listeSample')->with('listSam', $listSam);
     // return Redirect::route('samples.create.etape1', ['id' => $sample->sam_id] );
    }
    
    public function checklisteSample(){
        //selection de la table Sample et mis dans $listSam
		$listSam = \DB::table('sample')->get();;
        return view ('SampleViews/listeSample')->with('listSam', $listSam);;
    }

      public function deleteSample($id, Request $request){
        
                   $var = new sample;
                   $var = sample::find($id);
                   $var->delete();
                   return redirect()->back();
                 
        } 

      public function editSample()
      {
            //   $modif_Sam = new sample;
            //   $modif_Sam = sample::find($id);
              return view('SampleViews/modifierSample');
              //->with('modif_Sam', $modif_Sam);      

      }

    // public function refreshSample($id, Request $request)
    // {
    //     $refreshSample = new Sample;
    //    // Renvoie de  L'objet Sample 
    //   // $id = $request->input('sam_id');
    //    $refreshSample = Sample::find($id); 
    //    $refreshSample -> sam_cover = $request->input('sam_cover');
    //    $refreshSample -> sam_nom = $request->input('sam_nom');
    //    $refreshSample -> sam_prix = $request->input('sam_prix');
    //    $refreshSample -> save();
         
    // }


}
