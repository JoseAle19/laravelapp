@extends('layouts.app')
@section('title', 'Catalogo de usuarios')

@section('content')
<div class=" py-5">
    <!-- Header con acciones -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-primary fw-bold">
                <i class="bi bi-people-fill mx-2"></i>Catálogo de Usuarios
            </h1>
            <p class="text-muted mb-0">Gestión completa de usuarios del sistema</p>
        </div>
        <div>
            <button class="btn btn-primary">
                <i class="bi bi-plus-circle mx-2"></i>Nuevo Usuario
            </button>
        </div>
    </div>

    <!-- Card contenedora -->
    <div class="card border-0 shadow-sm">
       

        <!-- Tabla de usuarios -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase text-muted fw-semibold fs-xs">Alias</th>
                            <th class="py-3 text-uppercase text-muted fw-semibold fs-xs">Nombre</th>
                            <th class="py-3 text-uppercase text-muted fw-semibold fs-xs">Email</th>
                            <th class="py-3 text-uppercase text-muted fw-semibold fs-xs text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $u)
                        <tr class="clickable-row position-relative" data-url="{{ route('usuarios.detalle', $u->idUsuario) }}">
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                  
                                    <div>
                                        <span class="fw-semibold d-block">{{ $u->usuarioAlias }}</span>
                                        <span class="text-muted fs-xs">ID: {{ $u->idUsuario }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="fw-semibold">{{ $u->usuarioNombre }}</span>
                            </td>
                            <td>
                                <a href="mailto:{{ $u->usuarioEmail }}" class="text-decoration-none d-flex align-items-center">
                                     <span>{{ $u->usuarioEmail }}</span>
                                </a>
                            </td>
                            <td class="text-end pe-4">
<div class="d-flex justify-content-end">
    <!-- Botón Editar - Versión mejorada -->
    <a href="{{ route('usuarios.detalle', $u->idUsuario) }}" 
       class="btn btn-icon btn-sm btn-clean btn-hover-primary me-2" 
       data-bs-toggle="tooltip" 
       title="Ver detalles">
        <i class="bi bi-eye-fill fs-5"></i>
    </a>
    
    <!-- Botón Editar - Versión alternativa si necesitas edición -->
    <a href="{{ route('usuarios.detalle', $u->idUsuario) }}" 
       class="btn btn-icon btn-sm btn-clean btn-hover-success me-2" 
       data-bs-toggle="tooltip" 
       title="Adjuntar Imagen">
        <i class="bi bi-pencil-square fs-5"></i>
    </a>
    
</div>
</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer con paginación y estadísticas -->
        <div class="card-footer bg-white border-top py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span class="text-muted fs-xs">
                        Mostrando <span class="fw-semibold">1-10</span> de <span class="fw-semibold">{{ count($usuarios) }}</span> usuarios
                    </span>
                </div>
                <div class="col-md-6">
                    <nav class="d-flex justify-content-end">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection