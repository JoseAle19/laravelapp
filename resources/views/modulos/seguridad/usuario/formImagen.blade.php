@extends('layouts.app')

@section('slot')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow">
                <!-- Card Header -->
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-camera-fill fs-4 me-3" style="margin-right:10px" ></i>
                        <h1 class="h5 mb-0">Adjuntar foto a {{ $usuario->usuarioAlias }}</h1>
                    </div>
                </div>
                
                <!-- Card Body -->
                <div class="card-body p-4">
                    <form action="{{ route('usuarios.subirImagen', $usuario->idUsuario) }}" 
                          method="POST" 
                          enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        @csrf

                        <!-- Error Message -->
                        @error('imagen')
                        <div class="alert alert-danger d-flex align-items-center mb-4">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <div>{{ $message }}</div>
                        </div>
                        @enderror

                        <!-- File Input -->
                        <div class="mb-4">
                            <label for="imagen" class="form-label fw-semibold">
                                <i class="bi bi-image me-1"></i> Selecciona una imagen (JPEG, PNG)
                            </label>
                            <div class="input-group">
                                <input type="file" 
                                       class="form-control" 
                                       id="imagen"
                                       name="imagen"
                                       accept="image/jpeg,image/png"
                                       required
                                       onchange="previewImage(this)">
                                <button class="btn btn-outline-secondary" type="button" onclick="clearImage()">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                            <div class="form-text">Tamaño máximo: 2MB</div>
                        </div>

                        <!-- Image Preview -->
                        <div class="mb-4 text-center">
                            <img id="preview" 
                                 src="#" 
                                 alt="Vista previa" 
                                 class="img-thumbnail mx-auto d-none"
                                 style="max-height: 300px; object-fit: contain;">
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end gap-2 pt-2">
                            <a href="{{ route('usuarios.detalle', $usuario->idUsuario) }}" 
                               class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle me-1"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection