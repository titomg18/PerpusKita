<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Denda | PerpusKita Admin</title>
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
        .chart-color-1 { background-color: #3b82f6; }
        .chart-color-2 { background-color: #10b981; }
        .chart-color-3 { background-color: #f59e0b; }
        .chart-color-4 { background-color: #ef4444; }
        .chart-color-5 { background-color: #8b5cf6; }
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
                    
                    <a href="{{ route('admin.loans.index') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <span class="text-white/90">Peminjam</span>
                    </a>
                    
                    <a href="{{ route('admin.fines.index') }}" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-money-bill-alt text-indigo-600"></i>
                        </div>
                        <span class="font-semibold text-white">Denda</span>
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
                        <div class="relative">
                            <input type="text" 
                                   placeholder="Cari berdasarkan nama peminjam, buku, atau ID transaksi..."
                                   class="w-full pl-12 pr-4 py-3 bg-gray-100 border-0 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200">
                            <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <!-- Right Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <div class="relative group">
                            <button class="relative p-2 text-gray-600 hover:text-blue-600">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">5</span>
                            </button>
                            <!-- Notification Dropdown -->
                            <div class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl border border-gray-200 hidden group-hover:block z-50">
                                <div class="p-4 border-b border-gray-200">
                                    <h3 class="font-bold text-gray-800">Notifikasi Denda</h3>
                                </div>
                                <div class="max-h-96 overflow-y-auto">
                                    <!-- Notification Items -->
                                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-exclamation text-red-600 text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-sm">Denda belum dibayar</p>
                                                <p class="text-xs text-gray-600">Budi Santoso belum membayar denda Rp 50.000</p>
                                            </div>
                                            <span class="text-xs text-gray-500">1 jam lalu</span>
                                        </div>
                                    </div>
                                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-clock text-yellow-600 text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-sm">Denda mendekati jatuh tempo</p>
                                                <p class="text-xs text-gray-600">3 denda akan jatuh tempo besok</p>
                                            </div>
                                            <span class="text-xs text-gray-500">3 jam lalu</span>
                                        </div>
                                    </div>
                                    <div class="p-4 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-check text-green-600 text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-sm">Denda dibayar lunas</p>
                                                <p class="text-xs text-gray-600">Siti Rahayu membayar Rp 75.000</p>
                                            </div>
                                            <span class="text-xs text-gray-500">1 hari lalu</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Stats -->
                        <div class="hidden md:flex items-center space-x-3 text-sm">
                            <div class="px-3 py-1.5 bg-yellow-50 text-yellow-700 rounded-full font-medium">
                                <i class="fas fa-money-bill-wave mr-1"></i> Rp 850K Denda
                            </div>
                            <div class="px-3 py-1.5 bg-red-50 text-red-700 rounded-full font-medium">
                                <i class="fas fa-clock mr-1"></i> 12 Belum Bayar
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
                        
                        <a href="{{ route('admin.loans.index') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <span class="text-white/90">Peminjam</span>
                        </a>
                        
                        <a href="{{ route('admin.fines.index') }}" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                <i class="fas fa-money-bill-alt text-indigo-600"></i>
                            </div>
                            <span class="font-semibold text-white">Denda</span>
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
                <!-- Welcome Banner untuk Denda -->
                <div class="gradient-card rounded-2xl p-8 text-white mb-8 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 opacity-20">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full"></div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full"></div>
                    </div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-start">
                            <div>
                                <h1 class="text-4xl font-bold mb-3">Manajemen Denda, <span class="bg-gradient-to-r from-yellow-300 to-teal-300 bg-clip-text text-transparent">{{ auth()->user()->name }}</span>! 💰</h1>
                                <p class="text-blue-100 text-lg max-w-2xl">Kelola semua transaksi denda peminjaman buku yang terlambat dan pantai status pembayaran.</p>
                            </div>
                            <div class="hidden md:block">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                    <i class="fas fa-money-bill-wave text-white text-5xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-6">
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm">💰 Rp 850.000 total denda</span>
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm">✅ 58% telah dibayar lunas</span>
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm">⏰ 12 transaksi belum dibayar</span>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid Khusus Denda -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Denda</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">Rp 850K</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-yellow-100 to-yellow-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-money-bill-wave text-yellow-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-arrow-up text-green-500 mr-2"></i>
                                <span class="text-green-600 font-semibold">+12%</span>
                                <span class="text-gray-500 ml-2">dari bulan lalu</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Denda Dibayar</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">Rp 495K</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <span class="text-green-600 font-semibold">58%</span>
                                <span class="text-gray-500 ml-2">dari total denda</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Belum Dibayar</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">Rp 355K</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-red-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <span class="text-red-600 font-semibold">12 transaksi</span>
                                <span class="text-gray-500 ml-2">perlu penagihan</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Rata-rata Denda</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">Rp 42.5K</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-chart-line text-blue-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-minus-circle text-red-500 mr-2"></i>
                                <span class="text-red-600 font-semibold">-5%</span>
                                <span class="text-gray-500 ml-2">dari bulan lalu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Konten Utama Manajemen Denda -->
                <div class="grid lg:grid-cols-1 gap-8 mb-8">
                    <!-- Data Transaksi Denda -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Data Transaksi Denda</h3>
                                <p class="text-gray-600 mt-2">Kelola semua transaksi denda peminjaman buku yang terlambat</p>
                            </div>
                            <div class="flex space-x-3 mt-4 md:mt-0">
                                <button class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold hover:opacity-90 transition-all duration-200 flex items-center">
                                    <i class="fas fa-file-export mr-2"></i> Ekspor Laporan
                                </button>
                                <button class="px-5 py-2.5 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-xl font-semibold hover:opacity-90 transition-all duration-200 flex items-center">
                                    <i class="fas fa-plus-circle mr-2"></i> Tambah Denda
                                </button>
                            </div>
                        </div>

                        <!-- Filter -->
                        <div class="mb-6">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <div class="flex flex-wrap gap-3">
                                    <select class="bg-gray-100 border-0 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 text-sm">
                                        <option>Semua Status</option>
                                        <option>Belum Dibayar</option>
                                        <option>Sudah Dibayar</option>
                                        <option>Ditangguhkan</option>
                                    </select>
                                    <select class="bg-gray-100 border-0 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 text-sm">
                                        <option>Bulan Ini</option>
                                        <option>30 Hari Terakhir</option>
                                        <option>Bulan Lalu</option>
                                        <option>Semua Waktu</option>
                                    </select>
                                    <button class="px-4 py-2.5 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700 transition-all duration-200 text-sm">
                                        <i class="fas fa-filter mr-2"></i> Terapkan Filter
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Tabel Denda -->
                        <div class="overflow-x-auto rounded-xl border border-gray-200">
                            <table class="w-full">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <th class="text-left py-4 px-6 text-gray-700 font-bold">ID Denda</th>
                                        <th class="text-left py-4 px-6 text-gray-700 font-bold">Peminjam</th>
                                        <th class="text-left py-4 px-6 text-gray-700 font-bold">Buku</th>
                                        <th class="text-left py-4 px-6 text-gray-700 font-bold">Jumlah</th>
                                        <th class="text-left py-4 px-6 text-gray-700 font-bold">Tanggal</th>
                                        <th class="text-left py-4 px-6 text-gray-700 font-bold">Status</th>
                                        <th class="text-left py-4 px-6 text-gray-700 font-bold">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @forelse($fines as $fine)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-4 px-6 font-medium">{{ 'DND-' . $fine->id }}</td>
                                        <td class="py-4 px-6">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center mr-3">
                                                    <i class="fas fa-user text-white text-xs"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium">{{ $fine->loan->user->name ?? '-' }}</p>
                                                    <p class="text-xs text-gray-500">ID: {{ $fine->loan->user->id ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <p class="font-medium">{{ $fine->loan->book->title ?? '-' }}</p>
                                            <p class="text-xs text-gray-500">ISBN: {{ $fine->loan->book->isbn ?? '-' }}</p>
                                        </td>
                                        <td class="py-4 px-6">
                                            <p class="font-bold {{ $fine->status === 'dibayar' ? 'text-green-600' : 'text-red-600' }}">Rp {{ number_format($fine->fine_amount,0,',','.') }}</p>
                                            <p class="text-xs text-gray-500">Telat {{ $fine->days_late }} hari</p>
                                        </td>
                                        <td class="py-4 px-6">
                                            <p>{{ $fine->created_at->format('d M Y') }}</p>
                                            <p class="text-xs text-gray-500">Jatuh tempo: {{ optional($fine->loan->due_date)->format('d M Y') ?? '-' }}</p>
                                        </td>
                                        <td class="py-4 px-6">
                                            @if($fine->status === 'dibayar')
                                                <span class="px-3 py-1.5 bg-green-100 text-green-800 text-xs font-bold rounded-full">Lunas</span>
                                            @elseif($fine->status === 'ditangguhkan')
                                                <span class="px-3 py-1.5 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full">Ditangguhkan</span>
                                            @else
                                                <span class="px-3 py-1.5 bg-red-100 text-red-800 text-xs font-bold rounded-full">Belum Bayar</span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex space-x-2">
                                                @if($fine->status !== 'dibayar')
                                                <form action="{{ route('admin.fines.pay', $fine->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="w-8 h-8 bg-green-100 text-green-700 rounded-lg flex items-center justify-center hover:bg-green-200" title="Tandai Lunas">
                                                        <i class="fas fa-check text-xs"></i>
                                                    </button>
                                                </form>
                                                @endif

                                                <button onclick="window.location='{{ route('admin.loans.index') }}#loan-{{ $fine->loan_id }}'" class="w-8 h-8 bg-blue-100 text-blue-700 rounded-lg flex items-center justify-center hover:bg-blue-200" title="Lihat Peminjaman">
                                                    <i class="fas fa-eye text-xs"></i>
                                                </button>

                                                <form action="{{ route('admin.fines.destroy', $fine->id) }}" method="POST" onsubmit="return confirm('Hapus data denda ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-8 h-8 bg-red-100 text-red-700 rounded-lg flex items-center justify-center hover:bg-red-200" title="Hapus">
                                                        <i class="fas fa-trash text-xs"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-6 text-gray-500">Belum ada data denda.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="flex justify-between items-center mt-6">
                            <p class="text-gray-600 text-sm">Menampilkan {{ $fines->count() }} dari {{ $fines->total() }} transaksi denda</p>
                            <div class="flex space-x-2">
                                @if ($fines->previousPageUrl())
                                <a href="{{ $fines->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                @endif
                                
                                @for ($i = 1; $i <= $fines->lastPage(); $i++)
                                <a href="{{ $fines->url($i) }}" class="w-10 h-10 flex items-center justify-center {{ $fines->currentPage() == $i ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} rounded-lg">
                                    {{ $i }}
                                </a>
                                @endfor
                                
                                @if ($fines->nextPageUrl())
                                <a href="{{ $fines->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user-shield text-white text-sm"></i>
                                </div>
                                <span class="font-bold text-gray-900">PerpusKita Admin v2.1</span>
                            </div>
                            <p class="text-gray-600 text-sm mt-2">Manajemen Denda Sistem Perpustakaan</p>
                        </div>
                        <div class="flex space-x-6">
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-blue-600 text-sm">Dashboard</a>
                            <a href="{{ route('admin.fines.index') }}" class="text-gray-600 hover:text-blue-600 text-sm">Denda</a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Laporan Denda</a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Pengaturan</a>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <p class="text-gray-500 text-sm">© 2024 PerpusKita. Hak cipta dilindungi.</p>
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

        // Mark paid fines
        document.querySelectorAll('.fa-check').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const statusCell = row.querySelector('td:nth-child(6)');
                const amountCell = row.querySelector('td:nth-child(4) p');
                
                statusCell.innerHTML = '<span class="px-3 py-1.5 bg-green-100 text-green-800 text-xs font-bold rounded-full">Lunas</span>';
                amountCell.classList.remove('text-red-600');
                amountCell.classList.add('text-green-600');
                
                // Show confirmation
                alert('Denda telah ditandai sebagai LUNAS');
            });
        });
    </script>
</body>
</html>