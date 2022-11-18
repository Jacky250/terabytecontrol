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

                        <form action="{{ route('fibras.update',$fibra->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Switch" name="switch" value="{{ $fibra->switch }}">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Router" name="router" value="{{ $fibra->router }}">
                                    
                                    </div>                                   
                                    
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="equipo" placeholder="Equipo" value="{{ $fibra->equipo }}">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="modelo" placeholder="Modelo" value="{{ $fibra->modelo }}">
                                    </div>
                                    <div class="col">
                                        <br>
                                    <input type="text" class="form-control" name="olt" placeholder="OLT" value="{{ $fibra->olt }}">
                                    </div>
                                    <div class="col-12">
                                        <br>
                                        <input name="location_id" type="hidden" value="{{ $fibra->location_id }}"/>
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