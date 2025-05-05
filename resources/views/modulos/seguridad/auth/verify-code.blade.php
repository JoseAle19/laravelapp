@extends('layouts.auth.app')
@section('title', 'Verificar Codigo')
@section('content')
<div class="card border-0 shadow-sm rounded-3 overflow-hidden" style="max-width: 450px; margin: 0 auto;">
    <div class="card-body p-4 p-md-5">
        <div class="text-center mb-4">
            <div class="mb-3">
                <i class="bi bi-shield-lock text-primary" style="font-size: 2.5rem;"></i>
            </div>
            <h2 class="fw-bold mb-2">Ingresa el código de validación</h2>
            <p class="text-muted">Hemos enviado un código a <strong>{{ $email }}</strong></p>
        </div>

        <form method="POST" action="{{ route('password.verify') }}" class="mt-4">
            @csrf
            <input type="hidden" name="usuarioEmail" value="{{ old('usuarioEmail', $email) }}">

            <div class="mb-4">
                <label for="reset_code" class="form-label fw-medium">Código de verificación</label>
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-key-fill text-muted"></i>
                    </span>
                    <input type="text" id="reset_code" name="reset_code" 
                           class="form-control py-2" 
                           required autofocus
                           placeholder="Ingresa el código de 6 dígitos">
                </div>
                @error('reset_code')
                    <div class="text-danger small mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-primary py-2">
                    <i class="bi bi-check-circle me-2"></i> Continuar
                </button>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="text-decoration-none text-muted small">
                    <i class="bi bi-arrow-left me-1"></i> Volver al inicio de sesión
                </a>
            </div>
        </form>
    </div>
</div>
@endsection