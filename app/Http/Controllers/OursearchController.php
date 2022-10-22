<?php

namespace App\Http\Controllers;

use App\Models\Ouranimals;
use Illuminate\Http\Request;
use App\Models\Ouruseranimals;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OursearchController extends Controller
{
    public function index(){
        $animals = Ouranimals::paginate(6);
        return view('our.oursearch',[
            'animals'=> $animals
        ]);
    }

    public function store($id){
        $obj = Ouranimals::findOrFail($id);
        
        Ouruseranimals::updateOrcreate([
            
            'user_id' => auth()->user()->id,    
            'image' => $obj->image,
            'color' => $obj->color,
            'breed' => $obj->breed,
            'AnimalType' => $obj->AnimalType,
            'location' => $obj->location,
            'animal_id' => $obj->id
           ]);
           return back();
    }

    public function search(Request $request) 
    {
        
        $search = $request->search;
        
        if($search==null){
            $animals = Ouranimals::paginate(7);
        }
        else{
            $animals = Ouranimals::where('location','like', $search)
                                  ->orwhere('AnimalType','like', $search)->paginate(7);
        
        }
        return view('our.oursearch', [
            'animals'=> $animals
        ]);
    }
    
   public function destroy($id){
    $obj = Ouranimals::findOrFail($id);
    DB::delete('DELETE FROM ouranimals WHERE id = ?', [$id]);
    return back();
   }

}
