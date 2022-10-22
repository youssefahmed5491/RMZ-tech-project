@extends('our.ourwelcome')
@section('content')

                    
<div class="grid grid-cols-3 gap-4 flex justify-center text-center bg-gradient-to-r from-green-400 to-blue-500 h-screen pt-16">
                        <!-- hane3mel 7etet for each beta3et el pages -->
    @if ($accessories->count())
        @foreach ($accessories as $accessory)
            <div>
                <div class="flex justify-center">
                                        
                    <div class="divide-y grid grid-cols-1 mx-auto divide-transparent">
                        <div class="h-96">
                            <img class="inline w-full h-96 object-contain  mx-auto p-4" src="images/offers/{{$accessory->image}}" >
                        </div>               
                       
                        
                        <div class="text-center text-xl">
                            {{$accessory->name}}    
                        </div>
                        <div class="text-center text-xl">
                        {{$accessory->price}} 
                        </div>
                    </div>
                </div>
            </div>  
        @endforeach

        {{$accessories->links()}}
                
    @else
        <p>There are no accessories</p>
    @endif           
</div>
                    
                   
                
            

@endsection