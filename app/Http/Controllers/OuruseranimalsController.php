<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouruseranimals;

class OuruseranimalsController extends Controller
{
    public function index(){
        
        $animals = Ouruseranimals::where("user_id",'=',auth()->user()->id)->paginate(6);
        
        return view('our.ouruseranimals',[

            'animals'=> $animals
        ]);
    }
}
