<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku | PerpusKita</title>
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
                    
                    <a href="/books" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <span class="text-white/90">Data Buku</span>
                    </a>
                    
                    <a href="/loans" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-exchange-alt text-indigo-600"></i>
                        </div>
                        <span class="font-semibold text-white">Peminjaman</span>
                        <span class="ml-auto px-2 py-1 bg-red-400 text-xs rounded-full" id="activeLoansCount">3</span>
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
                            <h1 class="text-2xl font-bold text-gray-900">Peminjaman Buku</h1>
                            <div class="ml-4 flex items-center text-sm text-gray-600">
                                <a href="/dashboard" class="hover:text-blue-600">Dashboard</a>
                                <i class="fas fa-chevron-right mx-2 text-xs"></i>
                                <span class="text-blue-600 font-semibold">Peminjaman</span>
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
                        
                        <a href="/loans" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                <i class="fas fa-exchange-alt text-indigo-600"></i>
                            </div>
                            <span class="font-semibold text-white">Peminjaman</span>
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
                <div class="mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">Riwayat Peminjaman Buku</h2>
                        <p class="text-gray-600 mt-2">Lihat buku yang sedang dan telah Anda pinjam</p>
                    </div>
                </div>

                @php
                    use Carbon\Carbon;
                    $active = $loans->where('status', 'dipinjam')->count();
                    $requesting = $loans->where('status', 'request_return')->count();
                    $returned = $loans->where('status', 'dikembalikan')->count();
                    $overdue = $loans->filter(function($l){
                        if (!$l->due_date) return false;
                        return $l->status === 'dipinjam' && $l->due_date->lt(Carbon::now());
                    })->count();
                    $total = $loans->count();
                @endphp

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-blue-100 text-sm">Sedang Dipinjam</p>
                                <p class="text-3xl font-bold mt-2">{{ $active }}</p>
                            </div>
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="fas fa-book-open text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl p-6 text-white hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-emerald-100 text-sm">Permintaan Kembali</p>
                                <p class="text-3xl font-bold mt-2">{{ $requesting }}</p>
                            </div>
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="fas fa-clock text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl p-6 text-white hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-amber-100 text-sm">Terlambat</p>
                                <p class="text-3xl font-bold mt-2">{{ $overdue }}</p>
                            </div>
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-purple-100 text-sm">Total Dipinjam</p>
                                <p class="text-3xl font-bold mt-2">{{ $total }}</p>
                            </div>
                            <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <i class="fas fa-history text-white text-2xl"></i>
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
                                <option value="due_soon">Jatuh Tempo</option>
                                <option value="overdue">Terlambat</option>
                                <option value="returned">Sudah Dikembalikan</option>
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
                        
                        <!-- Search -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Cari Buku</label>
                            <div class="relative">
                                <input type="text" 
                                       id="searchLoans"
                                       placeholder="Judul atau penulis..."
                                       class="w-full pl-12 pr-4 py-3 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200">
                                <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Filter Badges -->
                    <div class="flex flex-wrap gap-2 mt-6">
                        <button onclick="filterLoans('all')" class="px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium flex items-center">
                            Semua <span class="ml-2 bg-blue-200 text-blue-800 px-2 py-0.5 rounded-full text-xs">42</span>
                        </button>
                        <button onclick="filterLoans('active')" class="px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-medium flex items-center">
                            Sedang Dipinjam <span class="ml-2 bg-emerald-200 text-emerald-800 px-2 py-0.5 rounded-full text-xs">3</span>
                        </button>
                        <button onclick="filterLoans('due_soon')" class="px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-medium flex items-center">
                            Jatuh Tempo <span class="ml-2 bg-amber-200 text-amber-800 px-2 py-0.5 rounded-full text-xs">2</span>
                        </button>
                        <button onclick="filterLoans('overdue')" class="px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm font-medium flex items-center">
                            Terlambat <span class="ml-2 bg-red-200 text-red-800 px-2 py-0.5 rounded-full text-xs">1</span>
                        </button>
                        <button onclick="filterLoans('returned')" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-full text-sm font-medium flex items-center">
                            Dikembalikan <span class="ml-2 bg-gray-200 text-gray-800 px-2 py-0.5 rounded-full text-xs">36</span>
                        </button>
                    </div>
                </div>

                <!-- Loans Table -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-8">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-4 px-6 text-left">
                                        <div class="flex items-center">
                                            <span class="text-sm font-semibold text-gray-700">Buku</span>
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Tanggal Pinjam</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Batas Kembali</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Tanggal Kembali</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Status</th>
                                    <th class="py-4 px-6 text-left text-sm font-semibold text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200" id="loansTableBody">
                                @forelse($loans as $loan)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="w-12 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                                <i class="fas fa-book text-white"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $loan->book->title ?? '-' }}</p>
                                                <p class="text-sm text-gray-500">{{ $loan->book->author ?? '-' }}</p>
                                                <p class="text-xs text-gray-400">Penerbit: {{ $loan->book->publisher ?? '-' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div>
                                            <p class="text-gray-900 font-medium">{{ $loan->loan_date?->format('d F Y') ?? '-' }}</p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div>
                                            <p class="text-gray-900 font-medium">{{ $loan->due_date?->format('d F Y') ?? '-' }}</p>
                                            @if($loan->due_date && $loan->status === 'dipinjam')
                                                @php
                                                    $diff = $loan->due_date->diffInDays(now(), false);
                                                @endphp
                                                <p class="text-sm {{ $loan->due_date->lt(now()) ? 'text-red-600' : 'text-amber-600 font-medium' }}">{{ $loan->due_date->lt(now()) ? 'Terlambat ' . $loan->due_date->diffForHumans() : $loan->due_date->diffForHumans() }}</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-600">{{ $loan->return_date?->format('d F Y') ?? '-' }}</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($loan->status === 'dipinjam')
                                            <span class="px-3 py-1 bg-emerald-100 text-emerald-800 text-xs font-semibold rounded-full">Sedang Dipinjam</span>
                                        @elseif($loan->status === 'request_return')
                                            <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-semibold rounded-full">Menunggu Persetujuan</span>
                                        @elseif($loan->status === 'dikembalikan')
                                            <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-semibold rounded-full">Dikembalikan</span>
                                        @else
                                            <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-semibold rounded-full">{{ $loan->status }}</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        @if(auth()->user()->role !== 'admin')
                                            @if($loan->status === 'dipinjam')
                                                <form action="{{ route('loans.requestReturn', $loan->id) }}" method="POST" onsubmit="return confirm('Kirim permintaan pengembalian?');">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-2 bg-emerald-100 text-emerald-700 hover:bg-emerald-200 rounded-lg text-sm font-medium transition-colors">Kembalikan</button>
                                                </form>
                                            @elseif($loan->status === 'request_return')
                                                <button class="px-4 py-2 bg-amber-100 text-amber-800 rounded-lg text-sm font-medium" disabled>Menunggu Persetujuan</button>
                                            @else
                                                <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-medium" disabled>Selesai</button>
                                            @endif
                                        @else
                                            {{-- Admin controls: approve/reject when request_return --}}
                                            @if($loan->status === 'request_return')
                                                <div class="flex items-center space-x-2">
                                                    <form action="{{ route('admin.loans.approveReturn', $loan->id) }}" method="POST">
                                                        @csrf
                                                        <button class="px-3 py-2 bg-green-600 text-white rounded-md text-sm">Setujui</button>
                                                    </form>
                                                    <form action="{{ route('admin.loans.rejectReturn', $loan->id) }}" method="POST">
                                                        @csrf
                                                        <button class="px-3 py-2 bg-red-600 text-white rounded-md text-sm">Tolak</button>
                                                    </form>
                                                </div>
                                            @else
                                                <span class="text-sm text-gray-600">-</span>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="py-6 px-6 text-center text-gray-500">Belum ada peminjaman.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Table Footer -->
                    <div class="px-6 py-4 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center">
                        <div class="text-sm text-gray-600 mb-4 md:mb-0">
                            Menampilkan <span class="font-semibold">1-4</span> dari <span class="font-semibold">42</span> peminjaman
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
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Timeline Peminjaman Terbaru</h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold text-gray-900">Buku "Pemrograman Laravel" dipinjam</p>
                                        <p class="text-sm text-gray-600 mt-1">Anda meminjam buku ini pada 15 Oktober 2024</p>
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
                                        <p class="font-semibold text-gray-900">Buku "Data Science" hampir jatuh tempo</p>
                                        <p class="text-sm text-gray-600 mt-1">Batas pengembalian: 26 Oktober 2024 (3 hari lagi)</p>
                                    </div>
                                    <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full">Peringatan</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-3"><i class="fas fa-clock mr-1"></i> 1 minggu yang lalu</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold text-gray-900">Buku "Machine Learning" dikembalikan</p>
                                        <p class="text-sm text-gray-600 mt-1">Dikembalikan tepat waktu pada 22 September 2024</p>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Selesai</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-3"><i class="fas fa-clock mr-1"></i> 1 bulan yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Returns -->
                <div class="bg-gradient-to-r from-amber-50 to-amber-100 rounded-2xl p-6 mb-8 border border-amber-200">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Peringatan Jatuh Tempo</h3>
                            <p class="text-gray-700">Anda memiliki buku yang harus segera dikembalikan</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white/80 backdrop-blur-sm rounded-xl p-4 border border-amber-200">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-semibold text-gray-900">Data Science Fundamentals</p>
                                    <p class="text-sm text-gray-600 mt-1">Batas: 26 Oktober 2024</p>
                                </div>
                                <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full">3 hari lagi</span>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-book mr-2"></i>
                                    <span>Jane Smith</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white/80 backdrop-blur-sm rounded-xl p-4 border border-amber-200">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-semibold text-gray-900">Sejarah Peradaban Dunia</p>
                                    <p class="text-sm text-gray-600 mt-1">Batas: 4 Oktober 2024</p>
                                </div>
                                <span class="px-3 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full">Terlambat 21 hari</span>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-exclamation-circle mr-2 text-red-500"></i>
                                    <span class="text-red-600">Denda: Rp 10.500</span>
                                </div>
                            </div>
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

        // Filter loans
        function filterLoans(status) {
            const rows = document.querySelectorAll('#loansTableBody tr');
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
            if (text.includes('jatuh tempo')) return 'due_soon';
            if (text.includes('terlambat')) return 'overdue';
            if (text.includes('dikembalikan')) return 'returned';
            return '';
        }
        
        // Update loan counts (simulated)
        function updateLoanCounts() {
            // In real app, this would fetch from API
            const activeCount = Math.floor(Math.random() * 5) + 1;
            const dueCount = Math.floor(Math.random() * 3) + 1;
            const overdueCount = Math.floor(Math.random() * 2);
            const totalCount = 36 + activeCount + dueCount + overdueCount;
            
            document.getElementById('activeLoans').textContent = activeCount;
            document.getElementById('dueSoon').textContent = dueCount;
            document.getElementById('overdue').textContent = overdueCount;
            document.getElementById('totalLoans').textContent = totalCount;
            document.getElementById('activeLoansCount').textContent = activeCount;
        }
        
        // Loan actions
        function extendLoan(loanId) {
            if (confirm('Apakah Anda yakin ingin memperpanjang peminjaman buku ini?')) {
                alert('Peminjaman berhasil diperpanjang 7 hari!');
                updateLoanCounts();
            }
        }
        
        function showReturnInfo(loanId) {
            alert('Buku ini harus dikembalikan sebelum 26 Oktober 2024. Silakan hubungi petugas perpustakaan untuk pengembalian.');
        }
        
        function payFine(loanId) {
            if (confirm('Apakah Anda yakin ingin membayar denda untuk buku ini?')) {
                alert('Pembayaran denda berhasil! Silakan hubungi petugas untuk proses pengembalian buku.');
                updateLoanCounts();
            }
        }
        
        function viewDetails(loanId) {
            alert('Detail peminjaman akan ditampilkan di sini. ID: ' + loanId);
        }
        
        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateLoanCounts();
            
            // Set default dates for filters
            const today = new Date();
            const lastMonth = new Date();
            lastMonth.setMonth(lastMonth.getMonth() - 1);
            
            document.getElementById('dateFrom').valueAsDate = lastMonth;
            document.getElementById('dateTo').valueAsDate = today;
            
            // Add event listeners for search and filter
            document.getElementById('searchLoans').addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('#loansTableBody tr');
                
                rows.forEach(row => {
                    const bookTitle = row.querySelector('td:nth-child(1) p:nth-child(1)').textContent.toLowerCase();
                    const author = row.querySelector('td:nth-child(1) p:nth-child(2)').textContent.toLowerCase();
                    
                    if (bookTitle.includes(searchTerm) || author.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
            
            // Add event listener for status filter
            document.getElementById('statusFilter').addEventListener('change', function(e) {
                filterLoans(e.target.value);
            });
        });
    </script>
</body>
</html>