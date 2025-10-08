<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Ensiklopedia Tanaman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <header class="bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold text-success" href="{{ route('home') }}">
                        🌱 Plantoria
                        <small class="text-muted ms-2">Ensiklopedia Tanaman</small>
                    </a>
                    
                    <div class="navbar-nav ms-auto">
                        @auth
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                            <a class="btn btn-success btn-sm ms-2" href="{{ route('register') }}">Register</a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="container py-4">
        <div class="row mb-4">
            <div class="col-12">
                <form method="GET" action="{{ route('home') }}">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Cari tanaman..." class="form-control">
                        </div>
                        <div class="col-md-4">
                            <select name="category" class="form-select">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success w-100">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if($plants->count() > 0)
            <div class="row">
                @foreach($plants as $plant)
                    <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if($plant->image)
                                <img src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}" 
                                     class="card-img-top" style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-success bg-opacity-10 d-flex align-items-center justify-content-center" 
                                     style="height: 200px;">
                                    <span class="text-success" style="font-size: 3rem;">🌱</span>
                                </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $plant->name }}</h5>
                                <p class="card-text text-muted fst-italic small">{{ $plant->scientific_name }}</p>
                                <p class="card-text flex-grow-1">{{ Str::limit($plant->description, 100) }}</p>
                                
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <span class="badge bg-success">{{ $plant->category->name }}</span>
                                    <a href="{{ route('plants.show', $plant) }}" class="btn btn-outline-success btn-sm">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">
                    {{ $plants->links() }}
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <div style="font-size: 4rem;" class="mb-3">🌱</div>
                <h3 class="mb-2">Tidak ada tanaman ditemukan</h3>
                <p class="text-muted">Coba ubah kata kunci pencarian atau filter kategori Anda.</p>
            </div>
        @endif
    </main>

    <footer class="bg-white border-top mt-5 py-4">
        <div class="container">
            <div class="text-center text-muted">
                <p class="mb-0">&copy; {{ date('Y') }} Plantoria. Ensiklopedia Tanaman untuk Semua.</p>
            </div>
        </div>
    </footer>
</body>
</html>