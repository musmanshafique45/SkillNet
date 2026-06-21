<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'SkillNest - Online Learning Platform')</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  @stack('styles')
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar" id="mainNav">
    <div class="container navbar-inner">
      <a href="{{ url('/') }}" class="navbar-logo" style="text-decoration:none;">
        <div class="logo-icon">🎓</div>
        <span class="brand">SkillNest</span>
      </a>
      <ul class="nav-links">
        <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ url('/courses') }}" class="{{ request()->is('courses') ? 'active' : '' }}">Courses</a></li>
        <li><a href="{{ url('/courses?cat=Design') }}">Design</a></li>
        <li><a href="{{ url('/courses?cat=Data+Science') }}">Data Science</a></li>
      </ul>
      <div class="nav-actions">
        @auth
          <a href="{{ url('/student/dashboard') }}" class="btn btn-outline btn-sm">Dashboard</a>
          <div class="nav-avatar-wrapper" onclick="toggleDropdown(event, '.avatar-dropdown')" style="position:relative;cursor:pointer">
            <div class="nav-avatar" title="{{ Auth::user()->name }}">
              {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="avatar-dropdown dropdown-menu" style="display:none;position:absolute;right:0;top:110%;background:var(--bg-card);border:1px solid var(--border);border-radius:var(--radius);padding:8px;min-width:160px;box-shadow:0 8px 24px rgba(0,0,0,0.15);z-index:100;text-align:left;">
              <a href="{{ url('/student/profile') }}" style="display:block;padding:10px 12px;color:var(--text-primary);text-decoration:none;border-radius:6px;font-size:0.9rem;">👤 View Profile</a>
              <form method="POST" action="{{ url('/logout') }}">
                  @csrf
                  <button type="submit" style="background:none;border:none;cursor:pointer;display:block;padding:10px 12px;color:var(--danger);text-align:left;width:100%;font-size:0.9rem;">🚪 Logout</button>
              </form>
            </div>
          </div>
        @else
          <a href="{{ url('/login') }}" class="btn btn-ghost btn-sm">Login</a>
          <a href="{{ url('/register') }}" class="btn btn-primary btn-sm">Get Started</a>
        @endauth
        <div class="hamburger" onclick="toggleMobileMenu()">
          <span></span><span></span><span></span>
        </div>
      </div>
    </div>
  </nav>

  <main>
      @yield('content')
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <div class="navbar-logo" style="font-size:1.3rem;display:flex;align-items:center;gap:10px;margin-bottom:16px;">
            <div class="logo-icon">🎓</div>
            <span class="brand">SkillNest</span>
          </div>
          <p>Empowering learners worldwide with expert-led courses and a modern learning experience.</p>
        </div>
        <div class="footer-col">
          <h5>Learn</h5>
          <a href="{{ url('/courses') }}">All Courses</a>
        </div>
        <div class="footer-col">
          <h5>Platform</h5>
          <a href="{{ url('/register') }}">Join as Student</a>
          <a href="{{ url('/login') }}">Login</a>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} SkillNest Inc. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/app.js') }}"></script>
  <script>
      // Temporary inline polyfill for the dropdown
      window.toggleDropdown = function(e, selector) {
        e.stopPropagation();
        const dropdown = e.currentTarget.querySelector(selector);
        const allDropdowns = document.querySelectorAll('.dropdown-menu');
        allDropdowns.forEach(d => { if(d !== dropdown) d.style.display = 'none'; });
        if (dropdown) {
          dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }
      };
      window.addEventListener('click', function() {
        const allDropdowns = document.querySelectorAll('.dropdown-menu');
        allDropdowns.forEach(d => { d.style.display = 'none'; });
      });
  </script>
  @stack('scripts')
</body>
</html>
