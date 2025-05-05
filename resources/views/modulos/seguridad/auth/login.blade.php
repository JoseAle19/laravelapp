@extends('layouts.auth.app')

@section('title', 'Inicio Sesión')

@section('content')
<div class="card border-0 shadow-sm rounded-3 overflow-hidden">
    <div class="card-body p-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">Bienvenido</h2>
            <p class="text-muted">Ingrese sus credenciales para continuar</p>
        </div>

        <div id="alertContainer"></div>
        
        <form id="formLogin" method="post" action="{{ route('login.acceso') }}">
            @csrf
            <div class="mb-3">
                <label for="usuarioAlias" class="form-label">Usuario</label>
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-person text-muted"></i>
                    </span>
                    <input id="usuarioAlias" type="text" class="form-control" 
                           name="usuarioAlias" required autocomplete="off" autofocus>
                </div>
            </div>
            
            <div class="mb-4">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-lock text-muted"></i>
                    </span>
                    <input id="password" type="password" class="form-control" 
                           name="usuarioPassword" required autocomplete="current-password">
                </div>
                <div class="text-end mt-2">
  <a href="{{ route('password.request') }}"
     class="text-decoration-none small text-muted">
    <i class="bi bi-question-circle me-1"></i> ¿Olvidé mi contraseña?
  </a>
</div>

            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                <i class="bi bi-box-arrow-in-right me-2"></i> Iniciar sesión
            </button>

           
        </form>
    </div>
</div>
@endsection