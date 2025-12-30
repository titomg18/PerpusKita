<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Peminjaman | Admin PerpusKita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #3b82f6;
            --secondary: #10b981;
            --accent: #8b5cf6;
        }
        .sidebar {
            background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 100%);
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
        <!-- Sidebar dengan gradien biru gelap untuk admin -->
        <aside class="sidebar w-64 text-white hidden lg:block">
            <div class="p-6 h-full flex flex-col">
                <!-- Logo -->
                <div class="mb-10">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center shadow-lg border border-white/20">
                            <i class="fas fa-user-shield text-white text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">PerpusKita</h1>
                            <p class="text-xs text-white/80">Admin Panel</p>
                        </div>
                    </div>
                </div>

                <!-- User Profile -->
                <div class="mb-8 p-4 bg-white/15 backdrop-blur-sm rounded-2xl border border-white/20">
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-user-cog text-white text-lg"></i>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-400 border-2 border-white rounded-full flex items-center justify-center">
                                <i class="fas fa-crown text-xs text-white"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="font-bold text-white">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-white/80">Administrator</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-tachometer-alt text-white"></i>
                        </div>
                        <span class="text-white/90">Dashboard</span>
                    </a>
                    
                    <a href="{{ route('admin.books.index') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <span class="text-white/90">Buku</span>
                    </a>
                    
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-tags text-white"></i>
                        </div>
                        <span class="text-white/90">Kategori</span>
                    </a>
                    
                    <a href="{{ route('admin.loans.index') }}" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-hand-holding text-indigo-600"></i>
                        </div>
                        <span class="font-semibold text-white">Peminjaman</span>
                        <span class="ml-auto px-2 py-1 bg-blue-400 text-xs rounded-full">{{ \App\Models\Loan::where('status', 'dipinjam')->count() }}</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-money-bill-alt text-white"></i>
                        </div>
                        <span class="text-white/90">Denda</span>
                        <span class="ml-auto px-2 py-1 bg-yellow-400 text-xs rounded-full">Rp 850K</span>
                    </a>
                    
                    <!-- Separator -->
                    <div class="pt-6 mt-6 border-t border-white/30">
                        <p class="text-xs text-white/70 uppercase tracking-wider mb-4">Admin Tools</p>
                        
                        <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-users-cog text-white"></i>
                            </div>
                            <span class="text-white/90">Manajemen User</span>
                        </a>
                        
                        <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-chart-bar text-white"></i>
                            </div>
                            <span class="text-white/90">Laporan & Analytics</span>
                        </a>
                        
                        <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-cog text-white"></i>
                            </div>
                            <span class="text-white/90">Pengaturan</span>
                        </a>
                    </div>
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
                    
                    <!-- Search -->
                    <div class="flex-1 max-w-2xl mx-4">
                        <form action="{{ route('admin.loans.index') }}" method="GET">
                            <div class="relative">
                                <input type="text" 
                                       name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Cari peminjaman, nama peminjam, atau judul buku..."
                                       class="w-full pl-12 pr-4 py-3 bg-gray-100 border-0 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200">
                                <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Right Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <div class="relative group">
                            <button class="relative p-2 text-gray-600 hover:text-blue-600">
                                <i class="fas fa-bell text-xl"></i>
                                @php
                                    $overdueCount = \App\Models\Loan::where('status', 'dipinjam')
                                        ->where('due_date', '<', now()->toDateString())
                                        ->count();
                                @endphp
                                @if($overdueCount > 0)
                                <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">{{ $overdueCount }}</span>
                                @endif
                            </button>
                            <!-- Notification Dropdown -->
                            <div class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl border border-gray-200 hidden group-hover:block z-50">
                                <div class="p-4 border-b border-gray-200">
                                    <h3 class="font-bold text-gray-800">Peminjaman Jatuh Tempo</h3>
                                </div>
                                <div class="max-h-96 overflow-y-auto">
                                    <!-- Notification Items -->
                                    @php
                                        $overdueLoans = \App\Models\Loan::with(['user', 'book'])
                                            ->where('status', 'dipinjam')
                                            ->where('due_date', '<', now()->toDateString())
                                            ->limit(3)
                                            ->get();
                                    @endphp
                                    @forelse($overdueLoans as $overdueLoan)
                                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-exclamation text-red-600 text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-sm">{{ $overdueLoan->user->name }} - terlambat {{ \Carbon\Carbon::parse($overdueLoan->due_date)->diffInDays(now()) }} hari</p>
                                                <p class="text-xs text-gray-600">"{{ Str::limit($overdueLoan->book->title, 30) }}"</p>
                                            </div>
                                            <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($overdueLoan->due_date)->format('d M') }}</span>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="p-4 text-center text-gray-500">
                                        <p>Tidak ada notifikasi</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Stats -->
                        <div class="hidden md:flex items-center space-x-3 text-sm">
                            <div class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-full font-medium">
                                <i class="fas fa-hand-holding mr-1"></i> {{ \App\Models\Loan::where('status', 'dipinjam')->count() }} Dipinjam
                            </div>
                            <div class="px-3 py-1.5 bg-red-50 text-red-700 rounded-full font-medium">
                                <i class="fas fa-exclamation-triangle mr-1"></i> {{ $overdueCount }} Terlambat
                            </div>
                        </div>
                        
                        <!-- User Menu -->
                        <div class="relative group">
                            <button class="flex items-center space-x-3 p-2 hover:bg-gray-100 rounded-2xl">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-user-shield text-white"></i>
                                </div>
                                <div class="hidden md:block text-left">
                                    <p class="font-semibold text-gray-800 text-sm">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500">Administrator</p>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400 text-sm hidden md:block"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Mobile Sidebar -->
            <div id="mobileSidebar" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden" onclick="toggleSidebar()"></div>
            <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-gradient-to-br from-indigo-800 to-purple-800 text-white z-50 transform -translate-x-full lg:hidden transition-transform duration-300 p-6">
                <!-- Mobile sidebar content -->
                <div class="h-full flex flex-col">
                    <div class="mb-10">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center shadow-lg border border-white/20">
                                <i class="fas fa-user-shield text-white text-2xl"></i>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-white">PerpusKita</h1>
                                <p class="text-xs text-white/80">Admin Panel</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-8 p-4 bg-white/15 backdrop-blur-sm rounded-2xl border border-white/20">
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-user-cog text-white text-lg"></i>
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-400 border-2 border-white rounded-full flex items-center justify-center">
                                    <i class="fas fa-crown text-xs text-white"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-white">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-white/80">Administrator</p>
                            </div>
                        </div>
                    </div>
                    
                    <nav class="flex-1 space-y-2">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-tachometer-alt text-white"></i>
                            </div>
                            <span class="text-white/90">Dashboard</span>
                        </a>
                        
                        <a href="{{ route('admin.books.index') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-book text-white"></i>
                            </div>
                            <span class="text-white/90">Buku</span>
                        </a>
                        
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-tags text-white"></i>
                            </div>
                            <span class="text-white/90">Kategori</span>
                        </a>
                        
                        <a href="{{ route('admin.loans.index') }}" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                <i class="fas fa-hand-holding text-indigo-600"></i>
                            </div>
                            <span class="font-semibold text-white">Peminjaman</span>
                        </a>
                        
                        <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-money-bill-alt text-white"></i>
                            </div>
                            <span class="text-white/90">Denda</span>
                        </a>
                        
                        <div class="pt-6 mt-6 border-t border-white/30">
                            <p class="text-xs text-white/70 uppercase tracking-wider mb-4">Admin Tools</p>
                            
                            <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-users-cog text-white"></i>
                                </div>
                                <span class="text-white/90">Manajemen User</span>
                            </a>
                            
                            <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-chart-bar text-white"></i>
                                </div>
                                <span class="text-white/90">Laporan & Analytics</span>
                            </a>
                        </div>
                        
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
                <!-- Welcome Banner -->
                <div class="gradient-card rounded-2xl p-6 text-white mb-6 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 opacity-20">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full"></div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full"></div>
                    </div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-start">
                            <div>
                                <h1 class="text-3xl font-bold mb-2">Manajemen Peminjaman 📚</h1>
                                <p class="text-blue-100 max-w-2xl">Kelola seluruh data peminjaman buku di perpustakaan. Pantau status, batas waktu, dan pengembalian buku.</p>
                            </div>
                            <div class="hidden md:block">
                                <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                    <i class="fas fa-hand-holding text-white text-4xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-3 mt-4">
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm">📊 {{ \App\Models\Loan::count() }} total peminjaman</span>
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm">⏰ {{ \App\Models\Loan::where('status', 'dipinjam')->count() }} sedang dipinjam</span>
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm">⚠️ {{ $overdueCount }} terlambat</span>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Peminjaman</p>
                                <p class="text-2xl font-bold text-gray-900 mt-1">{{ \App\Models\Loan::count() }}</p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-hand-holding text-blue-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                                <span class="text-green-600 font-semibold">+12%</span>
                                <span class="text-gray-500 ml-1">dari bulan lalu</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Sedang Dipinjam</p>
                                <p class="text-2xl font-bold text-gray-900 mt-1">{{ \App\Models\Loan::where('status', 'dipinjam')->count() }}</p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-book-open text-emerald-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i>
                                <span class="text-green-600 font-semibold">Dalam batas waktu</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Terlambat</p>
                                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $overdueCount }}</p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-amber-100 to-amber-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-exclamation-triangle text-amber-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-clock text-red-500 mr-1"></i>
                                <span class="text-red-600 font-semibold">Perlu penanganan</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Sudah Kembali</p>
                                <p class="text-2xl font-bold text-gray-900 mt-1">{{ \App\Models\Loan::where('status', 'dikembalikan')->count() }}</p>
                            </div>
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-double text-purple-600 text-xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-arrow-up text-green-500 mr-1"></i>
                                <span class="text-green-600 font-semibold">+8%</span>
                                <span class="text-gray-500 ml-1">dari bulan lalu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Header & Actions -->
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Riwayat Peminjaman</h2>
                        <p class="text-gray-600 text-sm">Kelola seluruh data peminjaman buku di perpustakaan</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <button onclick="openModal('loanModal')" class="px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-200 flex items-center text-sm">
                            <i class="fas fa-plus-circle mr-2 text-sm"></i>
                            Tambah Peminjaman
                        </button>
                        <button class="px-4 py-2.5 bg-white border border-gray-300 text-gray-800 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200 flex items-center text-sm">
                            <i class="fas fa-download mr-2 text-sm"></i>
                            Ekspor Data
                        </button>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5 mb-6">
                    <form action="{{ route('admin.loans.index') }}" method="GET" class="flex flex-wrap gap-4">
                        <div class="flex-1 min-w-[180px]">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status Peminjaman</label>
                            <select name="status" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <option value="">Semua Status</option>
                                <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Sedang Dipinjam</option>
                                <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Sudah Dikembalikan</option>
                            </select>
                        </div>
                        <div class="flex-1 min-w-[180px]">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Pinjam</label>
                            <input type="date" name="loan_date" value="{{ request('loan_date') }}" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                        </div>
                        <div class="flex-1 min-w-[180px]">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Batas Pengembalian</label>
                            <input type="date" name="due_date" value="{{ request('due_date') }}" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-200 text-sm">
                                Terapkan Filter
                            </button>
                            @if(request()->hasAny(['status', 'loan_date', 'due_date', 'search']))
                            <a href="{{ route('admin.loans.index') }}" class="ml-2 px-5 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all duration-200 text-sm">
                                Reset
                            </a>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Table Container -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-8">
                    <div class="px-5 py-5 border-b border-gray-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Daftar Peminjaman</h3>
                            <p class="text-gray-500 text-xs">Menampilkan {{ $loans->firstItem() }} hingga {{ $loans->lastItem() }} dari {{ $loans->total() }} total peminjaman</p>
                        </div>
                        <form action="{{ route('admin.loans.index') }}" method="GET" class="flex items-center">
                            <div class="relative">
                                <input type="text" 
                                       name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Cari peminjam / buku..." 
                                       class="pl-9 pr-3 py-2 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full md:w-64 outline-none text-sm">
                                <i class="fas fa-search absolute left-3 top-2.5 text-gray-400 text-sm"></i>
                            </div>
                            <button type="submit" class="ml-2 px-3 py-2 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition-all text-sm">
                                Cari
                            </button>
                        </form>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="text-left py-3 px-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">ID</th>
                                    <th class="text-left py-3 px-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Peminjam</th>
                                    <th class="text-left py-3 px-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Buku</th>
                                    <th class="text-left py-3 px-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Tanggal Pinjam</th>
                                    <th class="text-left py-3 px-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Batas Kembali</th>
                                    <th class="text-left py-3 px-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Tanggal Kembali</th>
                                    <th class="text-left py-3 px-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Status</th>
                                    <th class="text-left py-3 px-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse($loans as $loan)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="py-4 px-4 font-bold text-gray-700 text-sm">#LN-{{ str_pad($loan->id, 5, '0', STR_PAD_LEFT) }}</td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-50 to-blue-100 text-blue-600 rounded-lg flex items-center justify-center mr-3 border border-blue-200">
                                                <i class="fas fa-user text-xs"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold text-gray-900 text-sm">{{ $loan->user->name }}</p>
                                                <p class="text-xs text-gray-500 truncate max-w-[120px]">{{ $loan->user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="max-w-[200px]">
                                            <p class="font-bold text-gray-900 text-sm truncate">{{ $loan->book->title }}</p>
                                            <p class="text-xs text-gray-500 italic truncate">Oleh: {{ $loan->book->author }}</p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-sm font-medium text-gray-600">
                                        {{ \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') }}
                                    </td>
                                    <td class="py-4 px-4 text-sm font-bold {{ $loan->status == 'dipinjam' && $loan->due_date < now()->toDateString() ? 'text-red-600' : 'text-indigo-600' }}">
                                        {{ \Carbon\Carbon::parse($loan->due_date)->format('d M Y') }}
                                    </td>
                                    <td class="py-4 px-4 text-sm">
                                        @if($loan->return_date)
                                            <span class="font-medium text-emerald-600">{{ \Carbon\Carbon::parse($loan->return_date)->format('d M Y') }}</span>
                                        @else
                                            <span class="text-gray-400 italic text-xs">Belum kembali</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4">
                                        @if($loan->status == 'dipinjam')
                                            @if($loan->due_date < now()->toDateString())
                                                <span class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-full uppercase tracking-tighter">
                                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1 animate-pulse"></span>
                                                    Terlambat
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full uppercase tracking-tighter">
                                                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-1"></span>
                                                    Dipinjam
                                                </span>
                                            @endif
                                        @elseif($loan->status == 'request_return')
                                            <span class="inline-flex items-center px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full uppercase tracking-tighter">
                                                <i class="fas fa-exclamation-circle mr-1 text-xs"></i>
                                                Permintaan Pengembalian
                                            </span>
                                        @elseif($loan->status == 'dikembalikan')
                                            <span class="inline-flex items-center px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full uppercase tracking-tighter">
                                                <i class="fas fa-check-circle mr-1 text-xs"></i>
                                                Kembali
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-800 text-xs font-bold rounded-full uppercase tracking-tighter">{{ $loan->status }}</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center space-x-2">
                                            @if($loan->status == 'dipinjam')
                                                <form action="{{ route('admin.loans.return', $loan->id) }}" method="POST" onsubmit="return confirm('Konfirmasi pengembalian buku?')">
                                                        @csrf
                                                        <button type="submit" class="w-8 h-8 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-all duration-200" title="Tandai Kembali">
                                                        <i class="fas fa-check text-xs"></i>
                                                    </button>
                                                </form>
                                            @elseif($loan->status == 'request_return')
                                                <form action="{{ route('admin.loans.approveReturn', $loan->id) }}" method="POST" onsubmit="return confirm('Setujui pengembalian buku ini?')">
                                                    @csrf
                                                    <button type="submit" class="w-8 h-8 bg-green-50 text-green-600 rounded-lg flex items-center justify-center hover:bg-green-600 hover:text-white transition-all duration-200" title="Setujui">
                                                        <i class="fas fa-check text-xs"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.loans.rejectReturn', $loan->id) }}" method="POST" onsubmit="return confirm('Tolak permintaan pengembalian ini?')">
                                                    @csrf
                                                    <button type="submit" class="w-8 h-8 bg-red-50 text-red-600 rounded-lg flex items-center justify-center hover:bg-red-600 hover:text-white transition-all duration-200" title="Tolak">
                                                        <i class="fas fa-times text-xs"></i>
                                                    </button>
                                                </form>
                                            @endif

                                            <form action="{{ route('admin.loans.destroy', $loan->id) }}" method="POST" onsubmit="return confirm('Hapus riwayat peminjaman ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-8 h-8 bg-red-50 text-red-600 rounded-lg flex items-center justify-center hover:bg-red-600 hover:text-white transition-all duration-200" title="Hapus Data">
                                                    <i class="fas fa-trash-alt text-xs"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="py-16 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center mb-3 border-2 border-dashed border-gray-200">
                                                <i class="fas fa-folder-open text-gray-300 text-2xl"></i>
                                            </div>
                                            <h4 class="text-lg font-bold text-gray-900">Belum Ada Peminjaman</h4>
                                            <p class="text-gray-500 mt-1 text-sm">Data peminjaman akan muncul di sini setelah didaftarkan.</p>
                                            <button onclick="openModal('loanModal')" class="mt-4 px-5 py-2 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-all text-sm">
                                                Daftarkan Sekarang
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($loans->hasPages())
                    <div class="p-5 bg-gray-50/50 border-t border-gray-100">
                        {{ $loans->links() }}
                    </div>
                    @endif
                </div>

                <!-- Footer -->
                <footer class="mt-10 pt-6 border-t border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-shield text-white text-sm"></i>
                                </div>
                                <span class="font-bold text-gray-900">PerpusKita Admin v2.1</span>
                            </div>
                            <p class="text-gray-600 text-sm mt-1">Panel Manajemen Peminjaman Buku</p>
                        </div>
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-blue-600 text-sm">Dashboard</a>
                            <a href="{{ route('admin.books.index') }}" class="text-gray-600 hover:text-blue-600 text-sm">Buku</a>
                            <a href="{{ route('admin.loans.index') }}" class="text-gray-600 hover:text-blue-600 text-sm">Peminjaman</a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Laporan</a>
                        </div>
                        <div class="mt-3 md:mt-0">
                            <p class="text-gray-500 text-xs">© 2024 PerpusKita. Hak cipta dilindungi.</p>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
    </div>

    <!-- Loan Modal -->
    <div id="loanModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg transform scale-95 transition-transform duration-300">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-xl font-black text-gray-900 tracking-tight">Daftarkan Peminjam</h3>
                        <p class="text-gray-500 text-sm mt-1 italic">Masa pinjam: 7 hari secara otomatis.</p>
                    </div>
                    <button onclick="closeModal('loanModal')" class="w-9 h-9 bg-gray-100 rounded-full flex items-center justify-center text-gray-500 hover:bg-gray-200 hover:text-gray-800 transition-all">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <form action="{{ route('admin.loans.store') }}" method="POST" class="space-y-5">
                    @csrf
                    
                    <!-- Peminjam -->
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 tracking-wide">Pilih Peminjam</label>
                        <div class="relative group">
                            <i class="fas fa-user absolute left-3 top-3.5 text-gray-400 group-focus-within:text-blue-500 transition-colors text-sm"></i>
                            <select name="user_id" required class="w-full pl-10 pr-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-blue-500 focus:bg-white transition-all outline-none appearance-none text-sm">
                                <option value="" disabled selected>Cari member...</option>
                                @php
                                    $members = \App\Models\User::where('role', 'user')->get();
                                @endphp
                                @foreach($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->email }})</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-3.5 text-gray-400 pointer-events-none text-sm"></i>
                        </div>
                    </div>

                    <!-- Buku -->
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 tracking-wide">Pilih Buku</label>
                        <div class="relative group">
                            <i class="fas fa-book absolute left-3 top-3.5 text-gray-400 group-focus-within:text-blue-500 transition-colors text-sm"></i>
                            <select name="book_id" required class="w-full pl-10 pr-4 py-3 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:border-blue-500 focus:bg-white transition-all outline-none appearance-none text-sm">
                                <option value="" disabled selected>Cari judul buku...</option>
                                @php
                                    $books = \App\Models\Book::where('stock', '>', 0)->get();
                                @endphp
                                @foreach($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }} - Stok: {{ $book->stock }}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down absolute right-3 top-3.5 text-gray-400 pointer-events-none text-sm"></i>
                        </div>
                    </div>

                    <div class="pt-4 flex gap-3">
                        <button type="button" onclick="closeModal('loanModal')" class="flex-1 py-3 px-4 bg-gray-100 text-gray-700 font-bold rounded-2xl hover:bg-gray-200 transition-all text-sm">
                            Batal
                        </button>
                        <button type="submit" class="flex-[2] py-3 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-black rounded-2xl hover:shadow-xl hover:shadow-blue-200 transition-all active:scale-95 text-sm">
                            Simpan Peminjaman
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
            if (!confirm('Apakah Anda yakin ingin logout dari panel admin?')) {
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

        // Add active state to clicked nav items
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.getAttribute('href') === '#') {
                    e.preventDefault();
                    document.querySelectorAll('nav a').forEach(a => {
                        a.classList.remove('bg-white/20', 'backdrop-blur-sm', 'border', 'border-white/30');
                    });
                    this.classList.add('bg-white/20', 'backdrop-blur-sm', 'border', 'border-white/30');
                }
            });
        });

        // Modal functionality
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.querySelector('div').classList.remove('scale-95');
            }, 10);
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.add('opacity-0');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
</body>
</html>