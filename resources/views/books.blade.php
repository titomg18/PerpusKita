<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku | PerpusKita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #3b82f6;
            --secondary: #10b981;
            --accent: #8b5cf6;
        }
        .sidebar {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }
        .gradient-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Layout dengan sidebar -->
    <div class="flex min-h-screen">
        <!-- Sidebar dengan gradien biru-ungu -->
        <aside class="sidebar w-64 text-white hidden lg:block">
            <div class="p-6 h-full flex flex-col">
                <!-- Logo -->
                <div class="mb-10">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center shadow-lg border border-white/20">
                            <i class="fas fa-book text-white text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">PerpusKita</h1>
                            <p class="text-xs text-white/80">Digital Library</p>
                        </div>
                    </div>
                </div>

                <!-- User Profile -->
                <div class="mb-8 p-4 bg-white/15 backdrop-blur-sm rounded-2xl border border-white/20">
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-400 rounded-xl flex items-center justify-center">
                                <i class="fas fa-user text-white text-lg"></i>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-400 border-2 border-white rounded-full flex items-center justify-center">
                                <i class="fas fa-check text-xs text-white"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-white">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-white/80">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 space-y-2">
                    <a href="/dashboard" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-home text-white"></i>
                        </div>
                        <span class="text-white/90">Dashboard</span>
                    </a>
                    
                    <a href="/books" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-book text-indigo-600"></i>
                        </div>
                        <span class="font-semibold text-white">Data Buku</span>
                    </a>
                    
                    <a href="/loans" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-exchange-alt text-white"></i>
                        </div>
                        <span class="text-white/90">Peminjaman</span>
                        <span class="ml-auto px-2 py-1 bg-red-400 text-xs rounded-full">3</span>
                    </a>
                    
                    <a href="/history" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-history text-white"></i>
                        </div>
                        <span class="text-white/90">Riwayat</span>
                    </a>
                    
                    <a href="/fines" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-money-bill-alt text-white"></i>
                        </div>
                        <span class="text-white/90">Denda</span>
                        <span class="ml-auto px-2 py-1 bg-yellow-400 text-xs rounded-full">Rp 75K</span>
                    </a>
                    
                    @if(auth()->user()->role === 'admin')
                    <div class="pt-6 mt-6 border-t border-white/30">
                        <p class="text-xs text-white/70 uppercase tracking-wider mb-4">Admin Tools</p>
                        <a href="/users" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-users-cog text-white"></i>
                            </div>
                            <span class="text-white/90">Manajemen User</span>
                        </a>
                        <a href="/analytics" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-chart-bar text-white"></i>
                            </div>
                            <span class="text-white/90">Analytics</span>
                        </a>
                    </div>
                    @endif
                </nav>

                <!-- Footer Sidebar -->
                <div class="pt-6 border-t border-white/30">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" 
                                class="flex items-center justify-center space-x-2 w-full p-3 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl transition-all duration-200 group border border-white/20">
                            <i class="fas fa-sign-out-alt text-white group-hover:rotate-12 transition-transform"></i>
                            <span class="font-medium text-white">Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200">
                <div class="flex justify-between items-center px-6 py-4">
                    <!-- Mobile Menu Button -->
                    <button class="lg:hidden text-gray-600 hover:text-blue-600" onclick="toggleSidebar()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <!-- Page Title -->
                    <div class="flex-1 mx-4">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold text-gray-900">Data Buku</h1>
                            <div class="ml-4 flex items-center text-sm text-gray-600">
                                <a href="/dashboard" class="hover:text-blue-600">Dashboard</a>
                                <i class="fas fa-chevron-right mx-2 text-xs"></i>
                                <span class="text-blue-600 font-semibold">Data Buku</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <div class="relative group">
                            <button class="relative p-2 text-gray-600 hover:text-blue-600">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                            </button>
                        </div>
                        
                        <!-- User Menu -->
                        <div class="relative group">
                            <button class="flex items-center space-x-3 p-2 hover:bg-gray-100 rounded-2xl">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-teal-400 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="hidden md:block text-left">
                                    <p class="font-semibold text-gray-800 text-sm">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500">Online</p>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400 text-sm hidden md:block"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Mobile Sidebar -->
            <div id="mobileSidebar" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden" onclick="toggleSidebar()"></div>
            <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-gradient-to-br from-indigo-600 to-purple-600 text-white z-50 transform -translate-x-full lg:hidden transition-transform duration-300 p-6">
                <!-- Mobile sidebar content -->
                <div class="h-full flex flex-col">
                    <div class="mb-10">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center shadow-lg border border-white/20">
                                <i class="fas fa-book text-white text-2xl"></i>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-white">PerpusKita</h1>
                                <p class="text-xs text-white/80">Digital Library</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-8 p-4 bg-white/15 backdrop-blur-sm rounded-2xl border border-white/20">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-400 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-user text-white text-lg"></i>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-400 border-2 border-white rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-xs text-white"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-white">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-white/80">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <nav class="flex-1 space-y-2">
                        <a href="/dashboard" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-home text-white"></i>
                            </div>
                            <span class="text-white/90">Dashboard</span>
                        </a>
                        
                        <a href="/books" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                <i class="fas fa-book text-indigo-600"></i>
                            </div>
                            <span class="font-semibold text-white">Data Buku</span>
                        </a>
                        
                        <!-- Add other navigation items here -->
                        
                        <form action="/logout" method="POST" class="mt-auto">
                            @csrf
                            <button type="submit" 
                                    class="flex items-center justify-center space-x-2 w-full p-3 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-xl transition-all duration-200 group border border-white/20">
                                <i class="fas fa-sign-out-alt text-white group-hover:rotate-12 transition-transform"></i>
                                <span class="font-medium text-white">Keluar</span>
                            </button>
                        </form>
                    </nav>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="p-6">
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Manajemen Data Buku</h2>
                        <p class="text-gray-600 mt-2">Kelola koleksi buku perpustakaan digital Anda</p>
                    </div>
                    
                    @if(auth()->user()->role === 'admin')
                    <button onclick="openAddBookModal()" class="mt-4 md:mt-0 flex items-center px-5 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl transition-all duration-200 hover-lift">
                        <i class="fas fa-plus mr-3"></i>
                        Tambah Buku Baru
                    </button>
                    @endif
                </div>

                <!-- Search and Filter Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
                    <form action="{{ route('books.index') }}" method="GET">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Search Input -->
                            <div class="md:col-span-2">
                                <div class="relative">
                                    <input type="text" 
                                           name="search"
                                           id="searchInput"
                                           value="{{ old('search', $search ?? '') }}"
                                           placeholder="Cari berdasarkan judul atau penulis..."
                                           class="w-full pl-12 pr-4 py-3 bg-gray-100 border-0 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200">
                                    <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
                                </div>
                            </div>
                            
                            <!-- Filter by Category -->
                            <div class="relative">
                                <select id="categoryFilter" name="category" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 appearance-none">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->name }}" {{ (isset($category) && $category === $cat->name) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Filter Badges -->
                        <div class="flex flex-wrap gap-2 mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium flex items-center">
                                Semua Buku <span class="ml-2 bg-blue-200 text-blue-800 px-2 py-0.5 rounded-full text-xs">{{ $counts['total'] }}</span>
                            </button>
                            <div class="px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium flex items-center">
                                Tersedia <span class="ml-2 bg-green-200 text-green-800 px-2 py-0.5 rounded-full text-xs">{{ $counts['available'] }}</span>
                            </div>
                            <div class="px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-medium flex items-center">
                                Dipinjam <span class="ml-2 bg-amber-200 text-amber-800 px-2 py-0.5 rounded-full text-xs">{{ $counts['borrowed'] }}</span>
                            </div>
                            <div class="px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm font-medium flex items-center">
                                Rusak/Hilang <span class="ml-2 bg-red-200 text-red-800 px-2 py-0.5 rounded-full text-xs">{{ $counts['missing'] }}</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Books Table -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-8">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-4 px-6 text-left">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                            <span class="ml-3 text-sm font-semibold text-gray-700">Judul Buku</span>
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Penulis</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Kategori</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Penerbit</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Status</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Stok</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($books as $book)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                            <div class="ml-4">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                                        <i class="fas fa-book text-white"></i>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold text-gray-900">{{ $book->title }}</p>
                                                        <p class="text-sm text-gray-500">Edisi {{ $book->year ?? '-' }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-900">{{ $book->author }}</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 {{ $book->category ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-700' }} text-xs font-semibold rounded-full">{{ $book->category->name ?? '-' }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-600">{{ $book->publisher ?? '-' }}</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 {{ $book->stock_status_color }} text-xs font-semibold rounded-full">{{ $book->stock_status }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <span class="text-gray-900 font-semibold">{{ $book->stock }}</span>
                                            @php $pct = min(100, ($book->stock / 20) * 100); @endphp
                                            <div class="ml-2 w-24 bg-gray-200 rounded-full h-2">
                                                <div class="bg-green-600 h-2 rounded-full" style="width: {{ $pct }}%"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            @if(auth()->user()->role === 'admin')
                                            <a href="#" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="#" method="POST" onsubmit="return confirm('Hapus buku ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @endif
                                            <a href="#" class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="py-6 px-6 text-center text-gray-500">Tidak ada buku ditemukan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Table Footer -->
                    <div class="px-6 py-4 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center">
                        <div class="text-sm text-gray-600 mb-4 md:mb-0">
                            Menampilkan <span class="font-semibold">{{ $books->firstItem() ?? 0 }}-{{ $books->lastItem() ?? 0 }}</span> dari <span class="font-semibold">{{ $books->total() }}</span> buku
                        </div>
                        <div class="flex items-center space-x-2">
                            {{ $books->links() }}
                        </div>
                        <div class="mt-4 md:mt-0">
                            <form method="GET" action="{{ route('books.index') }}">
                                <select name="per_page" onchange="this.form.submit()" class="px-4 py-2 bg-gray-100 border-0 rounded-lg focus:ring-2 focus:ring-blue-500">
                                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 per halaman</option>
                                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 per halaman</option>
                                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 per halaman</option>
                                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100 per halaman</option>
                                </select>
                                <input type="hidden" name="search" value="{{ $search ?? '' }}">
                                <input type="hidden" name="category" value="{{ $category ?? '' }}">
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-blue-100 text-sm">Total Buku</p>
                                <p class="text-3xl font-bold mt-2">1,254</p>
                            </div>
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="fas fa-book text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl p-6 text-white hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-emerald-100 text-sm">Tersedia</p>
                                <p class="text-3xl font-bold mt-2">983</p>
                            </div>
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-circle text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl p-6 text-white hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-amber-100 text-sm">Dipinjam</p>
                                <p class="text-3xl font-bold mt-2">271</p>
                            </div>
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="fas fa-hand-holding text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-2xl p-6 text-white hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-red-100 text-sm">Rusak/Hilang</p>
                                <p class="text-3xl font-bold mt-2">12</p>
                            </div>
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Import/Export Section -->
                @if(auth()->user()->role === 'admin')
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Import/Export Data Buku</h3>
                            <p class="text-gray-600">Unggah atau unduh data buku dalam format Excel/CSV</p>
                        </div>
                        <div class="flex space-x-4 mt-4 md:mt-0">
                            <button class="px-5 py-3 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white font-semibold rounded-xl transition-all duration-200 hover-lift flex items-center">
                                <i class="fas fa-file-export mr-3"></i>
                                Export Data
                            </button>
                            <button class="px-5 py-3 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold rounded-xl transition-all duration-200 hover-lift flex items-center">
                                <i class="fas fa-file-import mr-3"></i>
                                Import Data
                            </button>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Footer -->
                <footer class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-teal-400 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-book text-white text-sm"></i>
                                </div>
                                <span class="font-bold text-gray-900">PerpusKita v2.1</span>
                            </div>
                            <p class="text-gray-600 text-sm mt-2">Sistem Manajemen Perpustakaan Digital</p>
                        </div>
                        <div class="flex space-x-6">
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Tentang</a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Bantuan</a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Kontak</a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Privacy</a>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <p class="text-gray-500 text-sm">© 2024 PerpusKita. All rights reserved.</p>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
    </div>

    <!-- Modal untuk Tambah/Edit Buku -->
    <div id="bookModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-900" id="modalTitle">Tambah Buku Baru</h3>
                    <button onclick="closeBookModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>
                
                <form id="bookForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul Buku</label>
                            <input type="text" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200" placeholder="Masukkan judul buku" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Penulis</label>
                            <input type="text" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200" placeholder="Nama penulis" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">ISBN</label>
                            <input type="text" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200" placeholder="Nomor ISBN" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 appearance-none">
                                <option value="">Pilih kategori</option>
                                <option value="Teknologi">Teknologi</option>
                                <option value="Sains">Sains</option>
                                <option value="Fiksi">Fiksi</option>
                                <option value="Non-Fiksi">Non-Fiksi</option>
                                <option value="Sejarah">Sejarah</option>
                                <option value="Bisnis">Bisnis</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Terbit</label>
                            <input type="number" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200" placeholder="Tahun terbit" min="1900" max="2024">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Penerbit</label>
                            <input type="text" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200" placeholder="Nama penerbit">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Stok</label>
                            <input type="number" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200" placeholder="Jumlah stok" min="0" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 appearance-none">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Rusak">Rusak</option>
                                <option value="Hilang">Hilang</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200" rows="4" placeholder="Deskripsi singkat tentang buku"></textarea>
                    </div>
                    
                    <div class="mt-8 flex justify-end space-x-4">
                        <button type="button" onclick="closeBookModal()" class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-colors">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-200">
                            Simpan Buku
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Toggle mobile sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileSidebar');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Logout confirmation
        document.querySelector('form[action="/logout"]')?.addEventListener('submit', function(e) {
            if (!confirm('Apakah Anda yakin ingin logout?')) {
                e.preventDefault();
            }
        });

        // Auto-hide mobile sidebar on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('mobileSidebar');
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        });

        // Modal functions
        function openAddBookModal() {
            document.getElementById('modalTitle').textContent = 'Tambah Buku Baru';
            document.getElementById('bookModal').classList.remove('hidden');
        }
        
        function openEditBookModal() {
            document.getElementById('modalTitle').textContent = 'Edit Data Buku';
            document.getElementById('bookModal').classList.remove('hidden');
        }
        
        function closeBookModal() {
            document.getElementById('bookModal').classList.add('hidden');
        }
        
        // Close modal when clicking outside
        document.getElementById('bookModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeBookModal();
            }
        });
        
        // Form submission
        document.getElementById('bookForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Data buku berhasil disimpan!');
            closeBookModal();
        });
        
        // Search functionality: debounce and submit the filter form
        (function(){
            const input = document.getElementById('searchInput');
            if (!input) return;
            let t;
            input.addEventListener('input', function(e){
                clearTimeout(t);
                t = setTimeout(()=>{
                    // submit the nearest form (the filter form)
                    const form = input.closest('form');
                    if (form) form.submit();
                }, 500);
            });
        })();
        
        // Category filter
        document.getElementById('categoryFilter').addEventListener('change', function(e) {
            console.log('Filter by category:', e.target.value);
            // Implement actual filter logic here
        });
    </script>
</body>
</html>