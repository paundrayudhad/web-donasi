<nav
        class="navbar navbar-expand-lg navbar-dark bg-{{$background ?? 'transparent'}} position-absolute top-0 start-0 w-100 p-3"
        style="z-index: 10"
      >
        <div class="container">
          <a
            class="navbar-brand super-bold fs-3 text-{{$color ?? 'white'}}"
            href="{{route('landing')}}"
            style="font-family: 'Rubik', sans-serif"
            >Yuk Donasi</a
          >
          <ul class="navbar-nav d-flex gap-3 ms-5">
            <li class="nav-item">
              <a class="nav-link fw-bold text-{{$color ?? 'white'}}"  href="{{route('campaign.index')}}">Campaign</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-{{$color ?? 'white'}}"  href="{{route('article.index')}}">Artikel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-{{$color ?? 'white'}}"  href="#">Support</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-{{$color ?? 'white'}}"  href="#">Contact</a>
            </li>
          </ul>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-content-center"
            id="navbarNav"
          ></div>
          <a href="#" class="btn btn-outline-light fw-bold px-3 py-2"
            >Campaign</a
          >
        </div>
      </nav>
