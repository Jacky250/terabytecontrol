@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        @can ('crear-user')
                            <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>
                            @endcan
                            <div class="table-responsive">
                            <table class="table    justify-content mt-2">
                                <thead style="background-color: #424242;">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff;">Nombre</th>
                                    <th style="color: #fff;">E-mail</th>
                                    <th style="color: #fff;">Rol</th>
                                    <th style="color:#fff">Editar</th>
                                        <th style="color:#fff">Eliminar</th>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td style="display: none;">{{$usuario->id}}</td>
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>
                                                @if(!empty($usuario->getRoleNames()))
                                                    @foreach($usuario->getRoleNames() as $rolName)
                                                    <h5><span class="badge ">{{$rolName}}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @can('editar-user')
                                                <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                                                @endcan
                                                <td>
                                                @can('borrar-user')
                                                {!! Form::open(['method' => 'DELETE', 'route'=> ['usuarios.destroy', $usuario->id], 'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class'=> 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                                </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="pagination justify-content-end">
                                {!! $usuarios->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection