<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | PerpusKita</title>
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
                    <a href="#" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-tachometer-alt text-indigo-600"></i>
                        </div>
                        <span class="font-semibold text-white">Dashboard</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <span class="text-white/90">Buku</span>
                        <span class="ml-auto px-2 py-1 bg-blue-400 text-xs rounded-full">1.2K</span>
                    </a>
                    
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-tags text-white"></i>
                        </div>
                        <span class="text-white/90">Kategori</span>
                        <span class="ml-auto px-2 py-1 bg-green-400 text-xs rounded-full">24</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <span class="text-white/90">Peminjam</span>
                        <span class="ml-auto px-2 py-1 bg-purple-400 text-xs rounded-full">86</span>
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
                        <div class="relative">
                            <input type="text" 
                                   placeholder="Cari data buku, pengguna, atau transaksi..."
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
                                <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">8</span>
                            </button>
                            <!-- Notification Dropdown -->
                            <div class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl border border-gray-200 hidden group-hover:block z-50">
                                <div class="p-4 border-b border-gray-200">
                                    <h3 class="font-bold text-gray-800">Notifikasi Admin</h3>
                                </div>
                                <div class="max-h-96 overflow-y-auto">
                                    <!-- Notification Items -->
                                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-exclamation text-red-600 text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-sm">Peminjaman terlambat</p>
                                                <p class="text-xs text-gray-600">5 buku belum dikembalikan</p>
                                            </div>
                                            <span class="text-xs text-gray-500">2 jam lalu</span>
                                        </div>
                                    </div>
                                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-book text-blue-600 text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-sm">Buku baru ditambahkan</p>
                                                <p class="text-xs text-gray-600">"Machine Learning Advanced"</p>
                                            </div>
                                            <span class="text-xs text-gray-500">5 jam lalu</span>
                                        </div>
                                    </div>
                                    <div class="p-4 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-money-bill text-yellow-600 text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-sm">Denda dibayar</p>
                                                <p class="text-xs text-gray-600">Rp 125.000 oleh Andi</p>
                                            </div>
                                            <span class="text-xs text-gray-500">1 hari lalu</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Stats -->
                        <div class="hidden md:flex items-center space-x-3 text-sm">
                            <div class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-full font-medium">
                                <i class="fas fa-users mr-1"></i> 86 Pengguna
                            </div>
                            <div class="px-3 py-1.5 bg-green-50 text-green-700 rounded-full font-medium">
                                <i class="fas fa-book mr-1"></i> 1,254 Buku
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
                        <a href="#" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                <i class="fas fa-tachometer-alt text-indigo-600"></i>
                            </div>
                            <span class="font-semibold text-white">Dashboard</span>
                        </a>
                        
                        <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
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
                        
                        <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <span class="text-white/90">Peminjam</span>
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
                <div class="gradient-card rounded-2xl p-8 text-white mb-8 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 opacity-20">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full"></div>
                        <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full"></div>
                    </div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-start">
                            <div>
                                <h1 class="text-4xl font-bold mb-3">Dashboard Admin, <span class="bg-gradient-to-r from-yellow-300 to-teal-300 bg-clip-text text-transparent">{{ auth()->user()->name }}</span>! 👨‍💼</h1>
                                <p class="text-blue-100 text-lg max-w-2xl">Selamat datang di panel administrator. Anda dapat mengelola seluruh data perpustakaan dari sini.</p>
                            </div>
                            <div class="hidden md:block">
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                                    <i class="fas fa-user-cog text-white text-5xl"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-6">
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm">👥 86 pengguna terdaftar</span>
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm">📚 1,254 total buku</span>
                            <span class="px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm">💰 Rp 850.000 denda terkumpul</span>
                        </div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Pengguna</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">86</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-blue-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-arrow-up text-green-500 mr-2"></i>
                                <span class="text-green-600 font-semibold">+8%</span>
                                <span class="text-gray-500 ml-2">dari bulan lalu</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Buku</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">1,254</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-book text-emerald-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-plus-circle text-green-500 mr-2"></i>
                                <span class="text-green-600 font-semibold">24 buku baru</span>
                                <span class="text-gray-500 ml-2">bulan ini</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Peminjaman Aktif</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">42</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-100 to-amber-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-hand-holding text-amber-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                                <span class="text-red-600 font-semibold">5 terlambat</span>
                                <span class="text-gray-500 ml-2">perlu penanganan</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Denda</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">Rp 850K</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-100 to-purple-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-money-bill-wave text-purple-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span class="text-green-600 font-semibold">Rp 350K</span>
                                <span class="text-gray-500 ml-2">telah dibayar</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions & Recent Activity -->
                <div class="grid lg:grid-cols-2 gap-8 mb-8">
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-900">Aksi Cepat Admin</h3>
                            <span class="text-sm text-gray-500">Fitur utama</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="#" class="flex items-center p-5 bg-gradient-to-r from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 rounded-xl transition-all duration-300 group hover-lift">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-plus-circle text-white text-xl"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">Tambah Buku</p>
                                    <p class="text-sm text-gray-600">Tambah buku baru</p>
                                </div>
                            </a>
                            
                            <a href="#" class="flex items-center p-5 bg-gradient-to-r from-emerald-50 to-emerald-100 hover:from-emerald-100 hover:to-emerald-200 rounded-xl transition-all duration-300 group hover-lift">
                                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-user-plus text-white text-xl"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">Tambah User</p>
                                    <p class="text-sm text-gray-600">Buat akun baru</p>
                                </div>
                            </a>
                            
                            <a href="#" class="flex items-center p-5 bg-gradient-to-r from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-xl transition-all duration-300 group hover-lift">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-file-alt text-white text-xl"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">Generate Laporan</p>
                                    <p class="text-sm text-gray-600">Buat laporan bulanan</p>
                                </div>
                            </a>
                            
                            <a href="#" class="flex items-center p-5 bg-gradient-to-r from-amber-50 to-amber-100 hover:from-amber-100 hover:to-amber-200 rounded-xl transition-all duration-300 group hover-lift">
                                <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-cog text-white text-xl"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">Pengaturan Sistem</p>
                                    <p class="text-sm text-gray-600">Konfigurasi aplikasi</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-900">Aktifitas Sistem</h3>
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center">
                                Lihat semua <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover-lift">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-500 to-teal-400 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-user-plus text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">User Baru Terdaftar</p>
                                    <p class="text-sm text-gray-600">Budi Santoso mendaftar sebagai anggota</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">30 menit lalu</p>
                                    <span class="inline-block mt-1 px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">
                                        Baru
                                    </span>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover-lift">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-red-500 to-orange-400 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">Peringatan Jatuh Tempo</p>
                                    <p class="text-sm text-gray-600">5 buku terlambat lebih dari 7 hari</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">2 jam lalu</p>
                                    <span class="inline-block mt-1 px-3 py-1 bg-red-100 text-red-800 text-xs font-bold rounded-full">
                                        Penting
                                    </span>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover-lift">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-400 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-book-medical text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900">Buku Baru Ditambahkan</p>
                                    <p class="text-sm text-gray-600">"Machine Learning Advanced" oleh Budi</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500">5 jam lalu</p>
                                    <span class="inline-block mt-1 px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">
                                        Update
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Users -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Pengguna Terbaru</h3>
                            <p class="text-gray-600">Pengguna yang baru mendaftar</p>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold">Lihat semua →</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="text-left py-3 px-4 text-gray-700 font-semibold">Nama</th>
                                    <th class="text-left py-3 px-4 text-gray-700 font-semibold">Email</th>
                                    <th class="text-left py-3 px-4 text-gray-700 font-semibold">Role</th>
                                    <th class="text-left py-3 px-4 text-gray-700 font-semibold">Tanggal Daftar</th>
                                    <th class="text-left py-3 px-4 text-gray-700 font-semibold">Status</th>
                                    <th class="text-left py-3 px-4 text-gray-700 font-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-white text-xs"></i>
                                            </div>
                                            <span class="font-medium">Budi Santoso</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">budi@example.com</td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Anggota</span>
                                    </td>
                                    <td class="py-3 px-4">28 Mar 2024</td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Aktif</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</button>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-white text-xs"></i>
                                            </div>
                                            <span class="font-medium">Siti Rahayu</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">siti@example.com</td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 bg-purple-100 text-purple-800 text-xs font-bold rounded-full">Anggota</span>
                                    </td>
                                    <td class="py-3 px-4">27 Mar 2024</td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Aktif</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-amber-400 to-amber-600 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-white text-xs"></i>
                                            </div>
                                            <span class="font-medium">Andi Wijaya</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">andi@example.com</td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-full">Staff</span>
                                    </td>
                                    <td class="py-3 px-4">26 Mar 2024</td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full">Aktif</span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                            <p class="text-gray-600 text-sm mt-2">Panel Administrator Sistem Perpustakaan</p>
                        </div>
                        <div class="flex space-x-6">
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Dashboard</a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Pengaturan</a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Bantuan</a>
                            <a href="#" class="text-gray-600 hover:text-blue-600 text-sm">Log Aktivitas</a>
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
    </script>
</body>
</html>