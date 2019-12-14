@include('partial.header')
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">KasirResto</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">KR</a>
          </div>
          @yield('sidebar')
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
          @yield('content')
        </div>
@include('partial.footer')