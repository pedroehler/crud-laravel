@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar ">
                        <div class="container-fluid">
                            <span class="navbar-brand">{{ __('Atualizar Usuário') }}</span>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-secondary me-2" href="{{route('usuarios.index')}}"><i class="bi bi-arrow-90deg-left me-2"></i>Voltar</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="card-body">
                    <form action="{{route('usuarios.update', $usuario->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" id="name" name="name" value="{{$usuario->name}}" class="form-control" aria-describedby="nameHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" id="email" name="email" value="{{$usuario->email}}" class="form-control" aria-describedby="emailHelp">
                        </div>
                        <nav class="navbar ">
                            <div class="container-fluid">
                                <span class="navbar-brand"></span>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-file-earmark-check me-2"></i>Atualizar</button>
                                </div>
                            </div>
                        </nav>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection