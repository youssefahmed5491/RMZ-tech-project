<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouruseraccessories;
use Illuminate\Support\Facades\DB;
use App\Models\Ouradminaccessories;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
 
class OuraccessoriesController extends Controller
{
    public function index(){
        $accessories = Ouradminaccessories::paginate(6);

        return view('our.ouraccessories',[

            'accessories'=> $accessories
        ]);
    }
    

    public function search(Request $request) 
    {
        
        $name = $request->name;
        $accessory = Ouradminaccessories::where('name', $name)->paginate(6);
        
        return view('our.ouraccessories', [
            'accessories'=> $accessory
        ]);
    }

   public function destroy($id){
    $obj = Ouradminaccessories::findOrFail($id);
    // dd($obj->quantity);
    $obj->quantity=$obj->quantity-1;
    $obj->update(array('quantity' => $obj->quantity));

    Ouruseraccessories::create([
        'name' => $obj->name,
        'image' => $obj->image,
        'user_id' => auth()->user()->id,
        'price' => $obj->price,
        'AnimalType' => $obj->AnimalType
       ]);

    if($obj->quantity==0){
        DB::delete('DELETE FROM ouradminaccessories WHERE id = ?', [$id]);
    }
    return back();
   }
}
