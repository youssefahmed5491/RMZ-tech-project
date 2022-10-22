<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouruseraccessories;

class OuruseraccessoriesController extends Controller
{
    public function index(){
        
        $accessories = Ouruseraccessories::where("user_id",'=',auth()->user()->id)->paginate(6);
        
        return view('our.ouruseraccessories',[

            'accessories'=> $accessories
        ]);
    }
}
