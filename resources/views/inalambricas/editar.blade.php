@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Dispositivos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                        @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>
                            @foreach ($errors->all() as $error)
                            <span class="badge badge-danger">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <form action="{{ route('inalambricas.update', $inalambrica->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="IP" name="ip" value="{{ $inalambrica->ip }}">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Router" name="router" value="{{ $inalambrica->router }}">                 
                                    </div>                                   
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="conexion" placeholder="Conexion" value="{{ $inalambrica->conexion }}">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="ssid" placeholder="SSID" value="{{ $inalambrica->ssid }}">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="frecuencia" placeholder="Frecuencia" value="{{ $inalambrica->frecuencia }}">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="ancho_de_canal" placeholder="Ancho de Canal" value="{{ $inalambrica->ancho_de_canal }}">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <select name="modelo" class="form-control" value="{{ $inalambrica->modelo }}">
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
                                        <input type="text" class="form-control" name="lugar" placeholder="Lugar" value="{{ $inalambrica->lugar }}">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="switch" placeholder="Switch" value="{{ $inalambrica->switch }}">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="puerto" placeholder="Puerto" value="{{ $inalambrica->puerto }}">
                                    </div><div class="col-6">
                                        <br>
                                    <button type="submit" class="btn btn-primary">Guadar</button>
                                    </div>                                   
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