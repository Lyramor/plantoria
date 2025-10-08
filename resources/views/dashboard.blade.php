<x-app-layout>
    <x-slot name="title">Dashboard Admin</x-slot>
    <x-slot name="header">
        <h2 class="h4 mb-0">Dashboard Admin Plantoria</h2>
    </x-slot>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3" style="font-size: 2rem;">🌱</div>
                        <div>
                            <h6 class="card-title mb-0">Total Tanaman</h6>
                            <h3 class="mb-0">{{ \App\Models\Plant::count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3" style="font-size: 2rem;">📂</div>
                        <div>
                            <h6 class="card-title mb-0">Total Kategori</h6>
                            <h3 class="mb-0">{{ \App\Models\Category::count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3" style="font-size: 2rem;">👥</div>
                        <div>
                            <h6 class="card-title mb-0">Total Pengguna</h6>
                            <h3 class="mb-0">{{ \App\Models\User::count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Menu Admin</h5>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action">
                            <span class="me-2">📂</span>
                            Kelola Kategori
                        </a>
                        <a href="{{ route('plants.create') }}" class="list-group-item list-group-item-action">
                            <span class="me-2">🌱</span>
                            Tambah Tanaman
                        </a>
                        <a href="{{ route('categories.create') }}" class="list-group-item list-group-item-action">
                            <span class="me-2">📁</span>
                            Tambah Kategori
                        </a>
                        <a href="{{ route('home') }}" class="list-group-item list-group-item-action">
                            <span class="me-2">🏠</span>
                            Lihat Website Publik
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tanaman Terbaru</h5>
                </div>
                <div class="card-body">
                    @foreach(\App\Models\Plant::latest()->take(5)->get() as $plant)
                        <div class="d-flex align-items-center mb-3 p-2 border rounded">
                            <div class="me-3 bg-success bg-opacity-10 rounded d-flex align-items-center justify-content-center" 
                                 style="width: 40px; height: 40px;">
                                🌱
                            </div>
                            <div>
                                <h6 class="mb-0">{{ $plant->name }}</h6>
                                <small class="text-muted">{{ $plant->category->name }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>