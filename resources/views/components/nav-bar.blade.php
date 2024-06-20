<nav class="navbar navbar-expand-lg bg-main-dark-green justify-content-between fixed-top py-2 px-5">
    <a class="navbar-brand text-light" href="http://127.0.0.1:8000" style="font-weight: bold">
        Recraftify
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center">
            <li class="nav-item mx-2">
                <a class="nav-link p-2 {{ Request::path() == 'leaderboard' ? 'navbar-active' : '' }}"
                    href="{{ url('/leaderboard') }}" style="color: #ffffff">
                    Leaderboard
                </a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link p-2 {{ Request::path() == 'discussion' ? 'navbar-active' : '' }}"
                    href="{{ url('/discussion') }}" style="color: #ffffff">
                    Discussion
                </a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link p-2 {{ Request::path() == 'recycle' ? 'navbar-active' : '' }}"
                    href="{{ url('/recycle') }}" style="color: #ffffff">
                    Recycle
                </a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link p-2 {{ Request::path() == 'marketplace' ? 'navbar-active' : '' }}"
                    href="{{ url('/marketplace') }}" style="color: #ffffff">
                    Marketplace
                </a>
            </li>
            @if (auth()->check())
                <li class="nav-item mx-2">
                    <div class="dropdown">
                        <a class="nav-link p-2 d-flex align-items-center dropdown-toggle {{ Request::path() == 'profile' ? 'navbar-active' : '' }}"
                            href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ asset('upload/profile_images/' . Auth::user()->image) }}" alt="Profile Photo"
                                class="rounded-circle" width="40" height="40">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown"
                            style="width: auto; text-align: center; padding: 0; margin: 0; border: none; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
                            <li style="padding: 0; margin: 0;">
                                <a class="dropdown-item" href="{{ url('/user/profile') }}"
                                    style="color: #579966; font-weight: bold; display: block; padding: 10px 15px; text-align: center; box-sizing: border-box; margin: 0;">
                                    Profile
                                </a>
                            </li>
                            <li style="padding: 0; margin: 0;">
                                <hr class="dropdown-divider" style="border-color: #579966; width: 70%; display: block; margin: auto auto">
                            </li>
                            <li style="padding: 0; margin: 0;">
                                <form action="{{ route('logout') }}" method="POST" style="margin: 0; padding: 0;">
                                    @csrf
                                    <button type="submit" class="dropdown-item"
                                        style="color: #579966; font-weight: bold; display: block; padding: 10px 15px; text-align: center; box-sizing: border-box; margin: 0; border: none;">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            @else
                <li class="nav-item mx-2">
                    <button type="button" class="btn btn-light btn-sm p-0 px-3">
                        <a class="nav-link m-0 p-1" href="{{ url('/login') }}" style="font-weight: bold;">
                            Login
                        </a>
                    </button>
                </li>
            @endif
        </ul>
    </div>
</nav>

<div style="margin-top: 55px;">
    <!-- Konten di bawah navbar tetap -->
</div>
