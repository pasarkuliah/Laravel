<!-- Navigation -->
<nav
class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
data-aos="fade-down"
>
<div class="container">
  <a class="navbar-brand" href="/homesuccess">
    <img src="/images/Logo_2 Pasku.png" width="160" alt="Logo" />
  </a>
  
  <!-- Form pencarian -->
  <div class="row flex-grow-1 ml-3">
    <div class="col-md-auto">
      <form method="GET" action="{{ route('products.search') }}">
        <div class="input-group">
          <input type="search" name="query" class="form-control" placeholder="Cari produk...." aria-label="Search" required>
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Search</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarResponsive"
    aria-controls="navbarResponsive"
    aria-expanded="false"
    aria-label="Toggle navigation"
  >
    <span class="navbar-toggler-icon"></span>
  </button>

   <!-- Daftar navigasi -->
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">

      <!-- Navigasi Home -->
      <li class="nav-item active">
        <a class="nav-link" href="/homesuccess">Home </a>
      </li>

      <!-- Navigasi Categories -->
      <li class="nav-item">
        <a class="nav-link" href="/categories">Categories</a>
      </li>
      
      <!-- Navigasi Cart -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('cart.show') }}">Cart</a>
      </li>
    
      <!-- Navigasi Logout -->
      <li class="nav-item">
        <a class="nav-link logout-link" href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    
    </ul>
  </div>
</div>
</nav>
