@extends('our.ourwelcome')
@section('content')
<div class="flex justify-center bg-gradient-to-r from-green-400 to-blue-500">
        <div id="searchdiv" class="w-8/12 pt-20 pl-20 rounded-lg">
            
                <form action="{{ route('oursearch') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        
                        <input name="search" type="text" class="bg-gray-100 border-2 w-11/12 p-4 rounded-lg h-16" placeholder="search by location or animal type">
                    </div>

                    <div>
                        <button id="searchbutton" type="submit" class="bg-white text-black  px-4 py-2 rounded font-medium">search</button>
                    </div>
                </form>
            
        </div>
</div>

<div class="grid grid-cols-3 gap-4 flex justify-center text-center bg-gradient-to-r from-green-400 to-blue-500 h-full">
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
                        @auth
                        <form action="{{ route('oursearch.store',$animal->id) }}" method="post" class="mb-4">
                            
                                @csrf
                                
                                <button type="submit" class="bg-white text-black px-4 py-2 rounded font-medium">Adopt animal</button>
                            </form>
                        
                        @if(auth()->user()->admin)
                            <form action="{{ route('oursearch.destroy',$animal->id) }}" method="post" class="mb-4">
                            
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-white text-black px-4 py-2 rounded font-medium">Delete</button>
                            </form>
                        @endif
                        @endauth
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