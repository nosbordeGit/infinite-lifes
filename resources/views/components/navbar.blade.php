<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" :href="route('site')">{{ config('app.name', 'Infinite Life') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <x-responsive-nav-link class="nav-link" :href="route('site')" :active="request()->routeIs('site')">{{ __('Home') }}</x-responsive-nav-link>

                <li class="nav-item">
                    <x-responsive-nav-link class="nav-link" :href="route('site')"
                        :active="request()->routeIs('site')">{{ __('Books') }}</x-responsive-nav-link>
                </li>
                <x-dropdown>
                    <x-slot name="trigger">
                        <span>Perfil</span>
                    </x-slot>
                    <x-slot name="content">
                        @if (!Auth::check())
                            <x-dropdown-link class="dropdown-item" :href="route('login')">{{ __('Log in') }}</x-dropdown-link>
                            <x-dropdown-link class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</x-dropdown-link>
                        @else
                        <x-dropdown-link class="dropdown-item" :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                            @if (Auth::user()->vendedor)
                                <x-dropdown-link class="dropdown-item" href="#">{{ __('Stock') }}</x-dropdown-link>
                                <x-dropdown-link class="dropdown-item" href="#">{{ __('Sales') }}</x-dropdown-link>
                            @elseif (Auth::user()->cliente)
                                <x-dropdown-link class="dropdown-item" href="{{ route('carrinho.index') }}">{{ __('Cart') }}</x-dropdown-link>
                                <x-dropdown-link class="dropdown-item" href="{{ route('favorito.index') }}">{{ __('Favorites') }}</x-dropdown-link>
                                <x-dropdown-link class="dropdown-item" href="{{ route('visitado.index') }}">{{ __('Visited') }}</x-dropdown-link>
                                <x-dropdown-link class="dropdown-item" href="{{ route('cartao.index') }}">{{ __('Card') }}</x-dropdown-link>
                                <x-dropdown-link class="dropdown-item" href="{{ route('pedido.index') }}">{{ __('Orders') }}</x-dropdown-link>
                            @else
                                <x-dropdown-link class="dropdown-item" href="#">{{ __("Users") }}</x-dropdown-link>
                            @endif
                            <x-dropdown-link class="dropdown-item" href="#">{{ __("Feedback") }}</x-dropdown-link>
                            <x-dropdown-link>
                                <hr class="dropdown-divider">
                            </x-dropdown-link>
                            <x-dropdown-link class="dropdown-item" :href="route('sair')">{{ __('Log Out') }}</x-dropdown-link>
                        @endif
                    </x-slot>
                </x-dropdown>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="{{ __('Search') }}" aria-label="Search">
                <button class="btn btn-outline-danger" type="submit">{{ __("Search") }}</button>
            </form>
        </div>
    </div>
</nav>

