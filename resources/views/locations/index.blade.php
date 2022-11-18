@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Location</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-xl-12">
                        <form action="{{ route('locations.index') }}" method="GET">
                            <div class="form-row">
                                <div class="col-sm-4 my-2">
                                    <input type="text" class="form-control" name="busqueda">
                                </div>
                                <div class="col-auto my-2">
                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                </div>
                            </div>
                        </form>
                </div>
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        
                        @can ('crear-local')
                        <a class="btn btn-warning" href="{{ route('locations.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2 col-lg-12">
                                <thead style="background-color:#424242">
                                        <th style="display: none;">Id</th>
                                        <th style="color:#fff" >Nombre</th>
                                        <th style="color:#fff">Dirección</th>
                                        <th style="color:#fff">Acciones</th>
                                </thead>
                                <tbody>
                            @foreach ($locations as $location)
                            <tr>
                                <td style="display: none;" >{{ $location->id }} </td>
                                
                                <td>
                                    <a href="{{ route('services.show', $location->id) }}">{{ $location->address }}</a>
                                </td>
                                <td>{{ $location->name }}</td>
                                <td>
                                    <form action="{{ route('locations.destroy',$location->id) }}" method="POST">
                                        @can('editar-local')
                                        <a class="btn btn-info" href="{{ route('locations.edit',$location->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-local')
                                        <button type="submit" class="btn btn-danger" >Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                                </tbody>
                        </table>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

