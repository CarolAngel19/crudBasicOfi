<div>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            @if(\Illuminate\Support\Facades\Auth::check())
                <h5 class="text-white">{{Illuminate\Support\Facades\Auth::user()->name}}</h5>
                <a href="{{route('logout') }}" class="btn btn-outline-info">Cerrar Sesion</a>
                
            @else
            <a href="{{route('login') }}" class="btn btn-outline-info">Login</a>
            <a href="{{route('register') }}" class="btn btn-outline-info">Register</a>

            @endif
        </div>
    </div>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
          </button>
        </div>
    </nav>
</div>