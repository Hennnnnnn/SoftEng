<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between p-4">
  <a class="navbar-brand h1" href="/{{ url('/') }}">
      Recraftify
  </a>
  <div>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ Request::path() ==  'leaderboard' ? 'active' : '' }}" 
           href="{{ url('/leaderboard') }}">
          LEADERBOARD
        </a>
      </li>
      <li class="nav-item">
        <a  class="nav-link {{ Request::path() ==  'discussion' ? 'active' : '' }}" 
            href="{{ url('/discussion') }}">
            DISCUSSION
        </a>
      </li>
      <li class="nav-item">
        <a  class="nav-link {{ Request::path() ==  'discussion' ? 'active' : '' }}" 
            href="{{ url('/recycle') }}">
            RECYCLE
        </a>
        </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::path() ==  'marketplace' ? 'active' : '' }}" 
        href="{{ url('/marketplace') }}">
        MARKETPLACE
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::path() ==  'profile' ? 'active' : '' }}" 
           href="{{ url('/prfile') }}">
           PROFILE
        </a>
      </li>
    </ul>
  </div>    
</nav>
  