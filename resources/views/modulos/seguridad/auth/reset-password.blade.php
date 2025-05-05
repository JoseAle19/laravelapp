{{-- resources/views/modulos/seguridad/auth/reset-password.blade.php --}}
@extends('layouts.auth.app')
@section('title', 'Restablecer contraseña')
@section('content')
<div class="card border-0 shadow-sm rounded-3 overflow-hidden">
  <div class="card-body p-5">
    <div class="text-center mb-4">
      <h2 class="fw-bold text-primary">Restablecer contraseña</h2>
      <p class="text-muted">Crea tu nueva contraseña para <strong>{{ $email }}</strong></p>
    </div>

    <form method="POST" action="{{ route('password.update') }}">
      @csrf
      <input type="hidden" name="usuarioEmail" value="{{ $email }}">

      <div class="mb-3">
        <label for="password" class="form-label">Nueva contraseña</label>
        <div class="input-group">
          <span class="input-group-text bg-white">
            <i class="bi bi-lock text-muted"></i>
          </span>
          <input id="password"
                 type="password"
                 name="password"
                 class="form-control @error('password') is-invalid @enderror"
                 required
                 minlength="8">
        </div>
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
        <div class="input-group">
          <span class="input-group-text bg-white">
            <i class="bi bi-lock-fill text-muted"></i>
          </span>
          <input id="password_confirmation"
                 type="password"
                 name="password_confirmation"
                 class="form-control"
                 required
                 minlength="8">
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <a href="{{ route('login') }}" class="btn btn-light">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>
@endsection
