<nav class="navbar navbar-expand sticky-top navbar-light bg-light">
    <div class="container-fluid">
        <button type="button" class="btn btn-secondary btn-sm me-2 my-1 te-toggle-sidenav">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-list-ul" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
            </svg>
        </button>

        <div class="d-flex">
            <form class="my-auto pe-2">
                <div class="input-group input-group-sm">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>

            <button type="button" class="btn btn-secondary btn-sm mx-2 position-relative">
                <i class="bi bi-bell-fill"></i>
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </button>
            <button type="button" class="btn btn-secondary btn-sm mx-2 position-relative">
                <i class="bi bi-envelope-fill"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    12
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle btn-sm mx-2"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end bg-transparent p-0 border-0">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="https://picsum.photos/300/100.webp" class="card-img-top" alt="Foto Sampul">
                        <div class="card-body text-center position-relative">
                            <img src="https://picsum.photos/100.webp"
                                class="w-25 position-absolute translate-middle border border-light rounded-circle"
                                alt="Foto Profil">
                            <h5 class="card-title mt-5">{{Auth::user()->username}}</h5>
                            {{-- <h6 class="card-subtitle mb-2 text-muted">@namapengguna</h6> --}}
                            <p class="card-text">
                                <a href="#" class="card-link">Kebijakan Privasi</a>
                                <a href="#" class="card-link">Bantuan</a>
                            </p>

                            <div class="d-grid gap-2">
                                {{-- <button type="button" class="btn btn-dark"><i class="bi bi-gear-fill"></i>
                                    Setting</button> --}}
                                <button type="button" onclick="formConfirmationId('#logout-form','Kamu akan logout?')" class="btn btn-outline-danger"><i
                                        class="bi bi-box-arrow-right"></i> Logout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
  @csrf
</form>
