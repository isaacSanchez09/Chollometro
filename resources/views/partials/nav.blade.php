<nav class="navbar navbar-expand-lg navbar-dark ps-2" style="background-color: #35373B">
    <a class="navbar-brand" href="{{route('chollometro.index')}}">
        <img src="https://www.chollometro.com/assets/images/schema.org/organisation/chollometro.png" width="100px"></a>    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('rated')}}">Destacats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('newest')}}">Novetats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('chollometro.create')}}">Afegir Chollo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories')}}">Categorias</a>
            </li>
            @if(Auth::user() && Auth::user()->name)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('myGangas')}}">Mis chollos</a>
                </li>
            @endif
        </ul>
        <div class="ms-auto nav-item dropdown text-white dropleft me-4">
            @if(Auth::user() && Auth::user()->name)
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu m-0" aria-labelledby="navbarDropdown">
                    <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();" class="dropdown-item">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            @else
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Guest
            </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('register')}}">Register</a>
                    <a class="dropdown-item" href="{{route('login')}}">Login</a>
                </div>
            @endif
        </div>
        <div class="navbar-text text-white me-2">
            <span>{{fechaActual('d/m/Y')}}</span>
        </div>
    </div>
</nav>
