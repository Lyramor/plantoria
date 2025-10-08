<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $plant->name }} - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-3xl font-bold text-green-600 hover:text-green-700">🌱 Plantoria</a>
                    <p class="ml-4 text-gray-600">Ensiklopedia Tanaman</p>
                </div>
                <nav class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-green-600">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-green-600">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600">Login</a>
                        <a href="{{ route('register') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Register</a>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-6">
            <a href="{{ route('home') }}" class="text-green-600 hover:text-green-800 text-sm font-medium">
                ← Kembali ke Daftar Tanaman
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            @if($plant->image)
                <img src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}" 
                     class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-green-100 flex items-center justify-center">
                    <span class="text-green-600 text-8xl">🌱</span>
                </div>
            @endif

            <div class="p-8">
                <div class="mb-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                        <h1 class="text-3xl font-bold text-gray-900">{{ $plant->name }}</h1>
                        <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium mt-2 sm:mt-0">
                            {{ $plant->category->name }}
                        </span>
                    </div>
                    <p class="text-lg text-gray-600 italic">{{ $plant->scientific_name }}</p>
                </div>

                <div class="space-y-6">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">Deskripsi</h2>
                        <p class="text-gray-700 leading-relaxed">{{ $plant->description }}</p>
                    </div>

                    @if($plant->benefits)
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 mb-3">Manfaat</h2>
                            <p class="text-gray-700 leading-relaxed">{{ $plant->benefits }}</p>
                        </div>
                    @endif

                    <div class="border-t pt-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">Informasi Tambahan</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <span class="font-medium text-gray-900">Kategori:</span>
                                <span class="text-gray-700">{{ $plant->category->name }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-900">Nama Ilmiah:</span>
                                <span class="text-gray-700 italic">{{ $plant->scientific_name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" 
               class="inline-block bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition-colors">
                Lihat Tanaman Lainnya
            </a>
        </div>
    </main>

    <footer class="bg-white border-t mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center text-gray-600">
                <p>&copy; {{ date('Y') }} Plantoria. Ensiklopedia Tanaman untuk Semua.</p>
            </div>
        </div>
    </footer>
</body>
</html>