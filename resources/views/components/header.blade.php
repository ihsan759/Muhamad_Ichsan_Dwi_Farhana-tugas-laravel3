<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
      <a class="navbar-brand text-light" href="#">Toko</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{ route('blog.index') }}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="{{ route('products.index') }}">Products</a>
            </li>
        </ul>
        @if (!session()->get("logged", false))
          <a href="{{ route('login') }}" class="btn btn-info d-flex">Login</a>
        @else
            <a href="{{ route('logout') }}" class="btn btn-info d-flex">Logout</a>
        @endif
      </div>
    </div>
</nav>