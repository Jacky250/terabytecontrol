@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
        <h3 class="page__heading">Servicios en {{$location->address}} </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                          <div class="row">                         
                            <div class="col-md-4 col-xl-4"> 
                                <div class="card bg-c-red order-card">
                                    <div class="card-block">
                                        <h5>Fibra</h5>
                        
                                        @php
                                        use App\Models\Fibra;
                                        $cant_fibra = Fibra::where('location_id', $location->id)->count();
                                        @endphp
                                        <h2 class="text-right"><i class="fa fa-signal f-left"></i><span>{{$cant_fibra}}</span></h2>
                                       <p class="m-b-0 text-right"> <a href="{{ route('getFiber', $location->id) }}" class="text-white ">ver más</a></p>
                                        
                                        
                                    </div>
                                </div>  
                            </div> 

                            <div class="col-md-4 col-xl-4"> 
                                <div class="card bg-c-red order-card">
                                    <div class="card-block">
                                        <h5>Inalambrico</h5>
                                        @php
                                        use App\Models\Inalambrica;
                                        $cant_wireless = Inalambrica::where('location_id', $location->id)->count();
                                        

                                        @endphp
                                        <h2 class="text-right"><i class="fa fa-wifi f-left"></i><span>{{$cant_wireless}}</span></h2>
                                        <p class="m-b-0 text-right"><a href="{{ route('getInalambrica', $location->id) }}" class="text-white">ver más</a></p>
                                    </div>
                                </div>  
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection