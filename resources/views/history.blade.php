<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman | PerpusKita</title>
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
        /* Timeline styles */
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 10px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, #3b82f6, #10b981);
        }
        .timeline-item {
            position: relative;
            margin-bottom: 20px;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -30px;
            top: 5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #3b82f6;
            border: 3px solid white;
            box-shadow: 0 0 0 3px #3b82f6;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Layout dengan sidebar -->
    <div class="flex min-h-screen">
        <!-- Sidebar dengan gradien biru-ungu seperti register -->
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
                    
                    <a href="/books" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <span class="text-white/90">Data Buku</span>
                    </a>
                    
                    <a href="/loans" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-exchange-alt text-white"></i>
                        </div>
                        <span class="text-white/90">Peminjaman</span>
                        <span class="ml-auto px-2 py-1 bg-red-400 text-xs rounded-full">3</span>
                    </a>
                    
                    <a href="/history" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-history text-indigo-600"></i>
                        </div>
                        <span class="font-semibold text-white">Riwayat</span>
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
                            <h1 class="text-2xl font-bold text-gray-900">Riwayat Peminjaman</h1>
                            <div class="ml-4 flex items-center text-sm text-gray-600">
                                <a href="/dashboard" class="hover:text-blue-600">Dashboard</a>
                                <i class="fas fa-chevron-right mx-2 text-xs"></i>
                                <span class="text-blue-600 font-semibold">Riwayat</span>
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
                        
                        <a href="/history" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                <i class="fas fa-history text-indigo-600"></i>
                            </div>
                            <span class="font-semibold text-white">Riwayat</span>
                        </a>
                        
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
                <div class="gradient-card rounded-2xl p-8 text-white mb-8 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 opacity-20">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full"></div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full"></div>
                    </div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-start">
                            <div>
                                <h1 class="text-4xl font-bold mb-3">Riwayat Peminjaman 📚</h1>
                                <p class="text-blue-100 text-lg max-w-2xl">Lihat semua riwayat peminjaman buku di perpustakaan, termasuk yang sedang dipinjam dan sudah dikembalikan.</p>
                            </div>
                            <div class="hidden md:block">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                    <i class="fas fa-history text-white text-5xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-6">
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm">👥 {{ $usersCount ?? 0 }} user sedang meminjam</span>
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm">📚 {{ $booksCount ?? 0 }} buku sedang dipinjam</span>
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm">⏰ {{ $overdueCount ?? 0 }} hampir jatuh tempo</span>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Peminjam Aktif</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $usersCount ?? 0 }}</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-blue-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-arrow-up text-green-500 mr-2"></i>
                                <span class="text-green-600 font-semibold">+5%</span>
                                <span class="text-gray-500 ml-2">dari minggu lalu</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Buku Dipinjam</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">{{ $booksCount ?? 0 }}</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-hand-holding text-emerald-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-exclamation-triangle text-amber-500 mr-2"></i>
                                <span class="text-amber-600 font-semibold">8 buku</span>
                                <span class="text-gray-500 ml-2">hampir jatuh tempo</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Buku Dikembalikan</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">856</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-undo-alt text-green-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span class="text-green-600 font-semibold">92%</span>
                                <span class="text-gray-500 ml-2">tepat waktu</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Denda</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">Rp 2,5JT</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-rose-100 to-rose-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-money-bill-wave text-rose-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-arrow-down text-green-500 mr-2"></i>
                                <span class="text-green-600 font-semibold">-12%</span>
                                <span class="text-gray-500 ml-2">dari bulan lalu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <!-- Status Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Filter Status</label>
                            <select id="statusFilter" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 appearance-none">
                                <option value="">Semua Status</option>
                                <option value="active">Sedang Dipinjam</option>
                                <option value="overdue">Terlambat</option>
                                <option value="returned">Sudah Dikembalikan</option>
                            </select>
                        </div>
                        
                        <!-- User Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Filter User</label>
                            <select id="userFilter" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 appearance-none">
                                <option value="">Semua User</option>
                                <option value="user1">Budi Santoso</option>
                                <option value="user2">Siti Nurhaliza</option>
                                <option value="user3">Ahmad Dhani</option>
                                <option value="user4">Dewi Sartika</option>
                            </select>
                        </div>
                        
                        <!-- Date Range -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Dari Tanggal</label>
                            <input type="date" id="dateFrom" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sampai Tanggal</label>
                            <input type="date" id="dateTo" class="w-full px-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200">
                        </div>
                    </div>
                    
                    <!-- Filter Badges -->
                    <div class="flex flex-wrap gap-2 mt-6">
                        <button onclick="filterHistory('all')" class="px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium flex items-center">
                            Semua <span class="ml-2 bg-blue-200 text-blue-800 px-2 py-0.5 rounded-full text-xs">156</span>
                        </button>
                        <button onclick="filterHistory('active')" class="px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-medium flex items-center">
                            Sedang Dipinjam <span class="ml-2 bg-emerald-200 text-emerald-800 px-2 py-0.5 rounded-full text-xs">42</span>
                        </button>
                        <button onclick="filterHistory('overdue')" class="px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm font-medium flex items-center">
                            Terlambat <span class="ml-2 bg-red-200 text-red-800 px-2 py-0.5 rounded-full text-xs">8</span>
                        </button>
                        <button onclick="filterHistory('returned')" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-medium flex items-center">
                            Dikembalikan <span class="ml-2 bg-gray-200 text-gray-800 px-2 py-0.5 rounded-full text-xs">856</span>
                        </button>
                    </div>
                </div>

                <!-- User Loans Table -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-8">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Semua Peminjaman Aktif</h3>
                            <p class="text-gray-600">Daftar semua user yang sedang meminjam buku</p>
                        </div>
                        <div class="flex items-center">
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 hover:bg-gray-200 rounded-lg text-sm font-medium transition-colors mr-3">
                                <i class="fas fa-file-export mr-2"></i> Export
                            </button>
                            <button class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-lg text-sm font-medium transition-colors">
                                <i class="fas fa-plus mr-2"></i> Tambah Peminjaman
                            </button>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-4 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="text-sm font-semibold text-gray-700">User</span>
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Buku</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Tanggal Pinjam</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Batas Kembali</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Status</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200" id="historyTableBody">
                                @forelse($loans as $loan)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $loan->user->name }}</p>
                                                <p class="text-sm text-gray-500">{{ $loan->user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="w-10 h-14 bg-gradient-to-br from-blue-300 to-blue-500 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-book text-white"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $loan->book->title }}</p>
                                                <p class="text-sm text-gray-500">{{ $loan->book->author }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div>
                                            <p class="text-gray-900 font-medium">{{ $loan->loan_date->format('d F Y') }}</p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div>
                                            <p class="text-gray-900 font-medium">{{ $loan->due_date->format('d F Y') }}</p>
                                            @if($loan->due_date->gte(now()))
                                                @php $days = $loan->due_date->diffInDays(now()); @endphp
                                                <p class="text-sm text-emerald-600 font-medium">@if($days === 0) Hari ini @else {{ $days }} hari lagi @endif</p>
                                            @else
                                                @php $daysLate = $loan->due_date->diffInDays(now()); @endphp
                                                <p class="text-sm text-red-600 font-medium">Terlambat {{ $daysLate }} hari</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $loan->status_color }}">{{ $loan->status_label }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <button onclick="viewLoanDetails({{ $loan->id }})" class="px-4 py-2 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg text-sm font-medium transition-colors">Detail</button>
                                        <button onclick="sendReminder({{ $loan->user->id }})" class="px-4 py-2 bg-amber-100 text-amber-700 hover:bg-amber-200 rounded-lg text-sm font-medium transition-colors ml-2">Pengingat</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="py-6 px-6 text-center text-gray-500">Tidak ada peminjaman aktif.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Table Footer -->
                    <div class="px-6 py-4 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center">
                        <div class="text-sm text-gray-600 mb-4 md:mb-0">
                            Menampilkan <span class="font-semibold">1-5</span> dari <span class="font-semibold">156</span> peminjaman
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">1</button>
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">2</button>
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">3</button>
                            <span class="px-2">...</span>
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">11</button>
                            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <select class="px-4 py-2 bg-gray-100 border-0 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option>10 per halaman</option>
                                <option>25 per halaman</option>
                                <option>50 per halaman</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Timeline Section -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Aktivitas Peminjaman Terbaru</h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold text-gray-900">Budi Santoso meminjam "Pemrograman Laravel"</p>
                                        <p class="text-sm text-gray-600 mt-1">Dipinjam pada 15 Oktober 2024, batas kembali 29 Oktober 2024</p>
                                    </div>
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Baru</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-3"><i class="fas fa-clock mr-1"></i> 2 hari yang lalu</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold text-gray-900">Siti Nurhaliza terlambat mengembalikan "Data Science"</p>
                                        <p class="text-sm text-gray-600 mt-1">Terlambat 3 hari, denda Rp 15.000</p>
                                    </div>
                                    <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full">Terlambat</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-3"><i class="fas fa-clock mr-1"></i> 1 minggu yang lalu</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold text-gray-900">Dewi Sartika mengembalikan "Sejarah Indonesia"</p>
                                        <p class="text-sm text-gray-600 mt-1">Dikembalikan tepat waktu pada 12 Oktober 2024</p>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Selesai</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-3"><i class="fas fa-clock mr-1"></i> 2 minggu yang lalu</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold text-gray-900">Ahmad Dhani meminjam "Machine Learning"</p>
                                        <p class="text-sm text-gray-600 mt-1">Dipinjam pada 5 Oktober 2024, jatuh tempo hari ini</p>
                                    </div>
                                    <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full">Jatuh Tempo</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-3"><i class="fas fa-clock mr-1"></i> 3 minggu yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Borrowers -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Top 5 Peminjam Aktif</h3>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-4 text-center hover-lift">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-white text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-1">Budi Santoso</h4>
                            <p class="text-sm text-gray-600 mb-2">5 buku</p>
                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Aktif</span>
                        </div>
                        
                        <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 rounded-xl p-4 text-center hover-lift">
                            <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-white text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-1">Siti Nurhaliza</h4>
                            <p class="text-sm text-gray-600 mb-2">4 buku</p>
                            <span class="inline-block px-3 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full">Terlambat</span>
                        </div>
                        
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-4 text-center hover-lift">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-white text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-1">Ahmad Dhani</h4>
                            <p class="text-sm text-gray-600 mb-2">3 buku</p>
                            <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full">Jatuh Tempo</span>
                        </div>
                        
                        <div class="bg-gradient-to-br from-rose-50 to-rose-100 rounded-xl p-4 text-center hover-lift">
                            <div class="w-16 h-16 bg-gradient-to-br from-rose-400 to-rose-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-white text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-1">Rudi Hartono</h4>
                            <p class="text-sm text-gray-600 mb-2">3 buku</p>
                            <span class="inline-block px-3 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full">Terlambat</span>
                        </div>
                        
                        <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-xl p-4 text-center hover-lift">
                            <div class="w-16 h-16 bg-gradient-to-br from-teal-400 to-teal-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <i class="fas fa-user text-white text-2xl"></i>
                            </div>
                            <h4 class="font-bold text-gray-900 mb-1">Dewi Sartika</h4>
                            <p class="text-sm text-gray-600 mb-2">2 buku</p>
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">On Time</span>
                        </div>
                    </div>
                </div>

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

        // Filter history
        function filterHistory(status) {
            const rows = document.querySelectorAll('#historyTableBody tr');
            rows.forEach(row => {
                const statusBadge = row.querySelector('td:nth-child(5) span');
                if (!statusBadge) return;
                
                const rowStatus = getStatusFromBadge(statusBadge);
                
                if (status === 'all' || rowStatus === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Update active filter button
            document.querySelectorAll('.flex-wrap button').forEach(btn => {
                btn.classList.remove('bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-800');
            });
            
            event.target.classList.remove('bg-gray-100', 'text-gray-800');
            event.target.classList.add('bg-blue-600', 'text-white');
        }
        
        function getStatusFromBadge(badge) {
            const text = badge.textContent.toLowerCase();
            if (text.includes('sedang dipinjam')) return 'active';
            if (text.includes('jatuh tempo')) return 'overdue';
            if (text.includes('terlambat')) return 'overdue';
            if (text.includes('dikembalikan')) return 'returned';
            return '';
        }
        
        // View loan details
        function viewLoanDetails(loanId) {
            alert('Detail peminjaman ID: ' + loanId + '\nFitur ini akan menampilkan detail lengkap peminjaman.');
        }
        
        // Send reminder
        function sendReminder(userId) {
            if (confirm('Kirim pengingat kepada user?')) {
                alert('Pengingat berhasil dikirim!');
            }
        }
        
        // Calculate fine
        function calculateFine(loanId) {
            alert('Menghitung denda untuk peminjaman ID: ' + loanId + '\nDenda: Rp 15.000');
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Set default dates for filters
            const today = new Date();
            const lastMonth = new Date();
            lastMonth.setMonth(lastMonth.getMonth() - 1);
            
            document.getElementById('dateFrom').valueAsDate = lastMonth;
            document.getElementById('dateTo').valueAsDate = today;
            
            // Add event listener for status filter
            document.getElementById('statusFilter').addEventListener('change', function(e) {
                filterHistory(e.target.value);
            });
            
            // Add event listener for user filter
            document.getElementById('userFilter').addEventListener('change', function(e) {
                // In a real app, this would filter by user
                if (e.target.value) {
                    alert('Filter user: ' + e.target.value);
                }
            });
        });
    </script>
</body>
</html>