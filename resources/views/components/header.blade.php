<header class="mb-4 position-sticky sticky-top bg-white shadow-sm">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            {{-- Logo con efecto hover --}}
            <a href="{{ url('/') }}" class="text-decoration-none">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('assets/image/logo.png') }}" 
                         alt="Logo" 
                         class="img-fluid transition-all" 
                         style="height: 50px; transition: all 0.3s ease;">
                    <span class="ms-2 fs-4 fw-bold text-gradient" 
                          style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        4sides
                    </span>
                </div>
            </a>

            {{-- Logout solo si está autenticado --}}
            @if(session()->has('user_id'))
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="btn btn-outline-danger px-4 py-2 rounded-pill fw-medium transition-all"
                            style="border-width: 2px; transition: all 0.3s ease;">
                        <i class="bi bi-box-arrow-right mx-2"></i>Cerrar sesión
                    </button>
                </form>
            @endif
        </div>
    </div>
    <div class="border-bottom" style="border-color: #e2e8f0 !important;"></div>
</header>