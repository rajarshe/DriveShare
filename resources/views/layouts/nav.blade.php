<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">DriveShare</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            @auth
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cars.index') }}">Your Record</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cars.create') }}">Add New Record</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('booking.list') }}">Booking List</a>
                </li>
            </ul>
            @endauth

            <!-- Search Form -->
            <form class="d-flex ms-3" action="{{ route('cars.search') }}" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>

            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                    {{-- Notification Bell --}}
                    <li class="nav-item position-relative me-3">
                        <a class="nav-link" href="{{route('notifications.index')}}">
                            <i class="bi bi-bell fs-5"></i>
                            @php
                                $unreadCount = \App\Models\Notification::where('user_id', auth()->id())->where('is_read', false)->count();
                            @endphp
                            @if ($unreadCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $unreadCount }}
                                </span>
                            @endif
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
