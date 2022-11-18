@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
        <h3 class="page__heading">Fibra en {{$location->address}}</h3>
        </div>
        <div class="section-body">
            <div class="row">
            <div class="col-lg-12">
                        <form action="{{ route('fibras.index') }}" method="GET">
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
                        
                        @can ('crear-fibra')
                        
                        <a href="{{ route('getfiberloc', $location->id) }}" class="btn btn-warning ">Nuevo</a>
                        @endcan

                        <table class=" table table-striped  justify-content mt-2">
                                <thead style="background-color:#424242">
                                        <th style="display: none;" class="col-lg-12">Id</th>
                                        <th style="color:#fff" >Switch</th>
                                        <th style="color:#fff">Router</th>
                                        <th style="color:#fff">Equipo</th>
                                        <th style="color:#fff">Modelo</th>
                                        <th style="color:#fff">OLT</th>
                                        <th style="color:#fff">Acciones</th>
                                </thead>
                                <tbody>
                                
                               
                                    
                            @foreach ($fibras as $fibra)
                            <tr>
                                <td style="display: none;" >{{ $fibra->id }} </td>
                                <td>{{ $fibra->switch }} </td>
                                <td>{{ $fibra->router }}</td>
                                <td>{{ $fibra->equipo }}</td>
                                <td>{{ $fibra->modelo }}</td>
                                <td>{{ $fibra->olt }}</td>
                                <td>
                                    <form action="{{ route('fibras.destroy',$fibra->id) }}" method="POST">
                                        @can('editar-fibra')
                                        <a class="btn btn-info" href="{{ route('fibras.edit',$fibra->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-fibra')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿seguro que quieres eliminar {{ $fibra->switch }}?')" >Borrar</button>
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
    <script>
        
    </script>
@endsection