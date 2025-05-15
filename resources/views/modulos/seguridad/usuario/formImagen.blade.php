@extends('layouts.app')
@section('title', 'Actualizar Imagen')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Tarjeta con sombra y transición suave -->
            <div class="card border-0 shadow-lg transition-all" style="transition: all 0.3s ease; border-radius: 12px;">
                <!-- Encabezado de tarjeta con gradiente -->
                <div class="card-header py-3 text-white" style="
                    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                    border-radius: 12px 12px 0 0 !important;
                ">
                    <div class="d-flex align-items-center">
                        <div class="bg-white p-2 rounded-circle me-3" style="width: 40px; height: 40px;">
                            <i class="bi bi-camera-fill text-primary fs-5"></i>
                        </div>
                        <h1 class="h5 mb-0 fw-semibold">Adjuntar foto a {{ $usuario->usuarioAlias }}</h1>
                    </div>
                </div>
                
                <!-- Cuerpo de tarjeta -->
                <div class="card-body p-4">
                    <form action="{{ route('usuarios.subirImagen', $usuario->idUsuario) }}" 
                          method="POST" 
                          enctype="multipart/form-data"
                          class="needs-validation" novalidate>
                        @csrf

                        <!-- Mensaje de error mejorado -->
                        @error('imagen')
                        <div class="alert alert-danger d-flex align-items-center mb-4 p-3" style="border-radius: 8px;">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                            <div class="fw-medium">{{ $message }}</div>
                        </div>
                        @enderror

                        <!-- Input de archivo con estilo mejorado -->
                        <div class="mb-4">
                            <label for="imagen" class="form-label fw-semibold text-gray-700">
                                <i class="bi bi-image-fill me-2 text-primary"></i> Selecciona una imagen (JPEG, PNG)
                            </label>
                            <div class="input-group border rounded-3" style="overflow: hidden;">
                                <input type="file" 
                                       class="form-control border-0 py-2 px-3" 
                                       id="imagen"
                                       name="imagen"
                                       accept="image/jpeg,image/png"
                                       required
                                       onchange="previewImage(this)">
                                <button class="btn btn-outline-danger border-0" type="button" onclick="clearImage()" style="border-left: 1px solid #dee2e6 !important;">
                                    <i class="bi bi-trash3"></i> Limpiar
                                </button>
                            </div>
                            <div class="form-text text-muted mt-1">Tamaño máximo: 2MB • Resolución recomendada: 600x600px</div>
                        </div>

                        <!-- Vista previa de imagen con mejor estilo -->
                        <div class="mb-4 text-center border-2 rounded-3 p-3" style="
                            border: 2px dashed #e2e8f0;
                            background-color: #f8fafc;
                            min-height: 200px;
                        ">
                            <img id="preview" 
                                 src="#" 
                                 alt="Vista previa" 
                                 class="img-fluid mx-auto d-none shadow-sm"
                                 style="
                                    max-height: 300px; 
                                    object-fit: contain;
                                    border-radius: 8px;
                                    transition: all 0.3s ease;
                                 ">
                            <div id="preview-placeholder" class="d-flex flex-column align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-image text-muted fs-1 mb-2"></i>
                                <p class="text-muted mb-0">Vista previa de la imagen</p>
                            </div>
                        </div>

                        <!-- Botones de acción con mejor espaciado -->
                        <div class="d-flex justify-content-end gap-3 pt-3">
                            <a href="{{ route('usuarios.detalle', $usuario->idUsuario) }}" 
                               class="btn btn-outline-secondary px-4 py-2 rounded-pill fw-medium">
                                <i class="bi bi-arrow-left me-2"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success px-4 py-2 rounded-pill fw-medium shadow-sm">
                                <i class="bi bi-check-circle me-2"></i> Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection