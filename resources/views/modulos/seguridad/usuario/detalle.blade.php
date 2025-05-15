@extends('layouts.app')
@section('title', 'Detalles')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold text-primary mb-3" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">Detalle de {{ $usuario->usuarioAlias }}</h1>
                <p class="lead text-muted" style="letter-spacing: 0.5px;">Información detallada del usuario</p>
                <div class="mx-auto" style="height: 3px; width: 80px; background: linear-gradient(to right, transparent, #0d6efd, transparent);"></div>
            </div>

            <table class="table table-hover mb-5" style="background: white; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); overflow: hidden;">
                <tbody>
                    <tr class="border-bottom">
                        <th class="px-4 py-3" style="width: 30%; background-color: #f8fafc; font-weight: 600; color: #495057;">Alias:</th>
                        <td class="px-4 py-3">{{ $usuario->usuarioAlias }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="px-4 py-3" style="background-color: #f8fafc; font-weight: 600; color: #495057;">Nombre:</th>
                        <td class="px-4 py-3">{{ $usuario->usuarioNombre }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="px-4 py-3" style="background-color: #f8fafc; font-weight: 600; color: #495057;">Email:</th>
                        <td class="px-4 py-3">
                            <a href="mailto:{{ $usuario->usuarioEmail }}" class="text-decoration-none text-primary">
                                {{ $usuario->usuarioEmail }}
                            </a>
                        </td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="px-4 py-3" style="background-color: #f8fafc; font-weight: 600; color: #495057;">Estado:</th>
                        <td class="px-4 py-3">
                            <span class="{{ $usuario->usuarioEstado === 'A' ? 'text-success fw-bold' : 'text-danger fw-bold' }}">
                                {{ $usuario->usuarioEstado === 'A' ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="px-4 py-3" style="background-color: #f8fafc; font-weight: 600; color: #495057;">Conectado:</th>
                        <td class="px-4 py-3">
                            <span class="badge rounded-pill {{ $usuario->usuarioConectado === 'S' ? 'bg-success' : 'bg-secondary' }} px-3 py-1">
                                {{ $usuario->usuarioConectado === 'S' ? 'Sí' : 'No' }}
                            </span>
                        </td>
                    </tr>
                    <tr class="border-bottom">
                        <th class="px-4 py-3" style="background-color: #f8fafc; font-weight: 600; color: #495057;">Última conexión:</th>
                        <td class="px-4 py-3">
                            @if($usuario->usuarioUltimaConexion)
                                <span class="text-muted">
                                    {{ \Carbon\Carbon::parse($usuario->usuarioUltimaConexion)->format('d/m/Y H:i:s') }}
                                </span>
                            @else
                                <span class="text-muted">Nunca</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="px-4 py-3" style="background-color: #f8fafc; font-weight: 600; color: #495057;">Adjuntar Imagen:</th>
                        <td class="px-4 py-3">
                            <a href="{{ route('usuarios.formImagen', $usuario->idUsuario) }}"
                               class="btn btn-sm btn-primary mb-2" style="box-shadow: 0 2px 5px rgba(13, 110, 253, 0.3);">
                                <i class="bi bi-image me-1"></i> Adjuntar foto
                            </a>

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-2" style="border-left: 4px solid #198754;">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                <a href="{{ route('usuarios.catalogo') }}" class="btn btn-primary px-4 me-md-2 rounded-pill" style="min-width: 180px; box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);">
                    <i class="bi bi-arrow-left mx-2"></i>Volver al catálogo
                </a>
            </div>
        </div>
    </div>
</div>
@endsection