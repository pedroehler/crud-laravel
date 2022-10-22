@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar ">
                        <div class="container-fluid">
                            <span class="navbar-brand">Usuários</span>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-secondary me-2" href="{{route('/')}}"><i class="bi bi-arrow-90deg-left me-2"></i>Voltar</a>
                                <a class="btn btn-primary " href="{{route('usuarios.create')}}"><i class="bi bi-file-earmark-plus me-2"></i>Cadastrar</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $key => $usuario)
                                <tr>
                                    <th scope="row">{{$usuario->id}}</th>
                                    <td>
                                        <a href="{{route('usuarios.show', $usuario->id)}}">
                                            <h5>{{$usuario->name}}</h5>
                                        </a>
                                    </td>
                                    <td>{{$usuario->email}}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{route('usuarios.edit', $usuario->id)}}" class="btn btn-outline-info me-2">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{route('usuarios.destroy', $usuario->id)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                @method('delete')
                                                <button class="btn btn-outline-danger me-1">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </div>
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
@endsection