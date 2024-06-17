<nav class="navbar navbar-expand-lg bg-main-dark-green justify-content-between p-4 fixed-top">
    <a class="text-decoration-none h2 text-light font-weight-bold" href="/{{ url('/') }}">
        Recraftify
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'leaderboard' ? 'navbar-active' : '' }}"
                    href="{{ url('/leaderboard') }}">
                    LEADERBOARD
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'discussion' ? 'navbar-active' : '' }}"
                    href="{{ url('/discussion') }}">
                    DISCUSSION
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'recycle' ? 'navbar-active' : '' }}"
                    href="{{ url('/recycle') }}">
                    RECYCLE
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'marketplace' ? 'navbar-active' : '' }}"
                    href="{{ url('/marketplace') }}">
                    MARKETPLACE
                </a>
            </li>
            @if (@auth()->check())
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == 'profile' ? 'navbar-active' : '' }}"
                        href="{{ url('/profile') }}">
                        PROFILE
                    </a>
                </li>
            @else
                <li class="nav-item ml-3">
                    <button
                    type="button"
                    class="btn btn-light btn-sm p-0 px-3">
                        <a class="nav-link m-0" href="{{ url('/login') }}">
                            LOGIN
                        </a>
                    </button>
                </li>
            @endif
        </ul>
    </div>
</nav>
<div style="margin-top: 80px;">
</div>
