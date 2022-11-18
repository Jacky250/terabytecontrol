<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Fibra</h3>
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

                            <form action="{{ route('fibras.store') }}" method="POST">
                                @csrf 
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Switch" name="switch">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" placeholder="Router" name="router">
                                    
                                    </div>                                   
                                    
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="equipo" placeholder="Equipo">
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <input type="text" class="form-control" name="modelo" placeholder="Modelo">
                                    </div>
                                    <div class="col">
                                        <br>
                                    <input type="text" class="form-control" name="olt" placeholder="OLT">
                                    </div>
                                    <input name="location_id" type="hidden" value="{{ $location->id }}"/>
                                    <div class="col-12">
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








