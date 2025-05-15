<header class="">
    <div class="d-flex justify-content-between align-items-center">
        @if(session()->has('user_id'))
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
                Cerrar sesións
            </button>
        </form>
        @endif
    </div>
    <hr>
</header>