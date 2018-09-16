<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Beat;
use App\Format;
use Response;


class ClientController extends Controller
{
    public function AfficheListeBeat () 
    {
        $BT = DB::table('beatformat')

        ->join('beat', 'beatformat.id_beat', '=', 'beat.bea_id')
        ->join('format', 'beatformat.id_format', '=', 'format.for_id')
        ->get();

           return view('ClientsViews.ClientListeBeat', ['BT' => $BT]);
    }
}
