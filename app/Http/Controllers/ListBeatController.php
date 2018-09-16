<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Response;
use App\Beat;
use App\Format;


class ListBeatController extends Controller
{


  public function __construct()
  {
      $this->middleware('auth');
  }

    
    public function Affichebeat()
    {
        //selection de la table beat
        //selection de la table format
        $resultBF = DB::table('beatformat')
        
       ->join('beat', 'beatformat.id_beat', '=', 'beat.bea_id')
       ->join('format', 'beatformat.id_format', '=', 'format.for_id')
       ->get();

        return view('BeatsViews.listebeat', ['resultBF' => $resultBF]);
    }

   public function EditBeat($id)
   {

    $beat =  Beat::find($id);
    //Redirect to state liste if updating state wasn't existed
    if ($beat == null || count($beat) == 0 )
      {
        return redirect()->intended('BeatsViews.listebeat');
      }

      

   }

   public function deleteBeat($id, Request $request)
   {
                $var = new Beat;
              
                $var = Beat::find($id);
               
                $var->delete();
                return redirect()->back();
              
    } 
}


