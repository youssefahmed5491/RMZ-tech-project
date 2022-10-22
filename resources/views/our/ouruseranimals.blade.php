@extends('our.ourwelcome')
@section('content')

                    
<div class="grid grid-cols-3 gap-4 flex justify-center text-center bg-gradient-to-r from-green-400 to-blue-500 h-screen pt-16">
                        <!-- hane3mel 7etet for each beta3et el pages -->
    @if ($animals->count())
        @foreach ($animals as $animal)
            <div>
                <div class="flex justify-center">
                                        
                    <div class="divide-y grid grid-cols-1 mx-auto divide-transparent">
                        <div class="h-96">
                            <img class="inline w-full h-96 object-contain  mx-auto p-4" src="images/animals/{{$animal->image}}" >
                        </div>               
                       
                        
                        <div class="text-center text-xl">
                            {{$animal->color}}    
                        </div>
                        <div class="text-center text-xl">
                        {{$animal->breed}} 
                        </div>
                        <div class="text-center text-xl">
                        {{$animal->AnimalType}} 
                        </div>
                        <div class="text-center text-xl">
                        {{$animal->location}} 
                        </div>
                        
                    </div>
                </div>
            </div>  
        @endforeach

        {{$animals->links()}}
                
    @else
        <p>There are no animals</p>
    @endif           
</div>
@endsection