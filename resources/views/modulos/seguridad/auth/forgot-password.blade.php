{{-- resources/views/modulos/seguridad/auth/forgot-password.blade.php --}}
@extends('layouts.auth.app')


@section('title', 'Olvide mi contraseña')
@section('content')
<div class="card border-0 shadow-sm rounded-3 overflow-hidden">
  <div class="card-body p-5">
    <div class="text-center mb-4">
      <h2 class="fw-bold text-primary">Recuperar contraseña</h2>
      <p class="text-muted">Ingresa tu correo para recibir el código de verificación</p>
    </div>

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <div class="mb-3">
        <label for="usuarioEmail" class="form-label">Correo electrónico</label>
        <div class="input-group">
          <span class="input-group-text bg-white">
            <i class="bi bi-envelope text-muted"></i>
          </span>
          <input id="usuarioEmail"
                 type="email"
                 name="usuarioEmail"
                 value="{{ old('usuarioEmail') }}"
                 class="form-control @error('usuarioEmail') is-invalid @enderror"
                 required
                 autofocus>
        </div>
        @error('usuarioEmail')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('login') }}" class="btn btn-light">Cancelar</a>
        <button type="submit" class="btn btn-primary">Continuar</button>
      </div>
    </form>
  </div>
</div>
@endsection
