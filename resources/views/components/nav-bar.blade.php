<nav class="navbar navbar-expand-lg bg-main-dark-green justify-content-between p-4">
  <a class="text-decoration-none h2 text-light font-weight-bold" href="/{{ url('/') }}">
      Recraftify
  </a>
  <div>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ Request::path() ==  'leaderboard' ? 'navbar-active' : '' }}" 
           href="{{ url('/leaderboard') }}">
          LEADERBOARD
        </a>
      </li>
      <li class="nav-item">
        <a  class="nav-link {{ Request::path() ==  'discussion' ? 'navbar-active' : '' }}" 
            href="{{ url('/discussion') }}">
            DISCUSSION
        </a>
      </li>
      <li class="nav-item">
        <a  class="nav-link {{ Request::path() ==  'discussion' ? 'navbar-active' : '' }}" 
            href="{{ url('/recycle') }}">
            RECYCLE
        </a>
        </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::path() ==  'marketplace' ? 'navbar-active' : '' }}" 
        href="{{ url('/marketplace') }}">
        MARKETPLACE
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::path() ==  'profile' ? 'navbar-active' : '' }}" 
           href="{{ url('/prfile') }}">
           PROFILE
        </a>
      </li>
    </ul>
  </div>    
</nav>
  