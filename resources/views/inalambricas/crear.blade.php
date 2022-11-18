@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Inalambricas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>Revise los campos!</strong>
                                        @foreach ($errors->all() as $error)
                                            <span class="badge badge-danger">{{ $error }}</span>
                                        @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" >$times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('inalambricas.store') }}" method="POST">
                                @csrf                               
                                    <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="IP" name="ip">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Router" name="router">                 
                                    </div>                                   
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="conexion" placeholder="Conexion">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="ssid" placeholder="SSID">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="frecuencia" placeholder="Frecuencia">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="ancho_de_canal" placeholder="Ancho de Canal">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <select name="modelo" class="form-control">
                                        <option selected>Selecionar Modelo:</option>
                                        <option>(Selecionar todo)</option>
                                        <option>airFiber</option>
                                        <option>AirGrid M5 HP</option>
                                        <option>Cambium Networks</option>
                                        <option>ISO STATION 5AC</option>
                                        <option>LITEAP GPS</option>
                                        <option>LITEBEAM 5AC GEN2</option>
                                        <option>LITEBEAM 5AC GEN3</option>
                                        <option>MIKROTIK</option>
                                        <option>Minosa</option>
                                        <option>NanoBeam M5</option>
                                        <option>NamoStation loco M2</option>
                                        <option>NamoStation M2</option>
                                        <option>PoweBeam M5</option>
                                        <option>PoweBeam 5AC</option>
                                        <option>POWERBEAN 5AC 500</option>
                                        <option>POWERBEAN 5AC 501</option>
                                        <option>PowerBeam M5</option>
                                        <option>PRISMSTATION 5AC</option>
                                        <option>pt3-ac_01</option>
                                        <option>ROCKET 2AC PRISM</option>
                                        <option>Rocket 5 AC Lite</option>
                                        <option>ROCKET 5AC LITE</option>
                                        <option>Rocket AC Prism</option>
                                        <option>Rocket M2</option>
                                        <option>Rocket M5</option>
                                        <option>Rocket Prism 5AC Gen2</option>
                                        <option>ROCKET PRISM 5AC GEN2</option>
                                        <option>Vacías</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="lugar" placeholder="Lugar">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="switch" placeholder="Switch">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="puerto" placeholder="Puerto">
                                    </div>
                                    <input name="location_id" type="hidden" value="{{ $location->id }}"/>
                                    <div class="col-6">
                                        <br>
                                    <button type="submit" class="btn btn-primary">Guadar</button>
                                    </div>

                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection








