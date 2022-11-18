@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inalambrica</h3>
        </div>
        <div class="section-body">
            <div class="row">
            <div class="col-xl-12">
                        <form action="{{ route('inalambricas.index') }}" method="GET">
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
                        
                        @can ('crear-inalambrica')
                        <a href="{{ route('getinalmloc', $location->id) }}" class="btn btn-warning ">Nuevo</a>
                        <br>
                        @endcan
                        
                        <table class="table table-striped  justify-content mt-2 ">
                                <thead style="background-color:#424242">
                                        <th style="display: none;">Id</th>
                                        <th style="color:#fff" >IP</th>
                                        <th style="color:#fff">Router</th>
                                        <th style="color:#fff">Conexion</th>
                                        <th style="color:#fff">SSID</th>
                                        <th style="color:#fff">Frecuencia</th>
                                        <th style="color:#fff">Ancho de Canal</th>
                                        <th style="color:#fff">Modelo</th>
                                        <th style="color:#fff">Lugar</th>
                                        <th style="color:#fff">Switch</th>
                                        <th style="color:#fff">Puerto</th>
                                        <th style="color:#fff">Acciones</th>
                                </thead>
                                <tbody>
                            @foreach ($inalambricas as $inalambrica)
                            <tr>
                                <td style="display: none;" >{{ $inalambrica->id }} </td>
                                <td>{{ $inalambrica->ip }} </td>
                                <td>{{ $inalambrica->router }}</td>
                                <td>{{ $inalambrica->conexion }}</td>
                                <td>{{ $inalambrica->ssid }}</td>
                                <td>{{ $inalambrica->frecuencia }}</td>
                                <td>{{ $inalambrica->ancho_de_canal }}</td>
                                <td>{{ $inalambrica->modelo }}</td>
                                <td>{{ $inalambrica->lugar }}</td>
                                <td>{{ $inalambrica->switch }}</td>
                                <td>{{ $inalambrica->puerto }}</td>
                                <td>
                                    <form action="{{ route('inalambricas.destroy',$inalambrica->id) }}" method="POST">
                                        @can('editar-inalambrica')
                                        <a class="btn btn-info" href="{{ route('inalambricas.edit',$inalambrica->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-inalambrica')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿seguro que quieres eliminar {{ $inalambrica->router }}?')" > Borrar</button>
                                        
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                                </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                                {!! $inalambricas->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection