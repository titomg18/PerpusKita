<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Denda | PerpusKita</title>
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
                    
                    <a href="/history" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-history text-white"></i>
                        </div>
                        <span class="text-white/90">Riwayat</span>
                    </a>
                    
                    <a href="/fines" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-money-bill-alt text-indigo-600"></i>
                        </div>
                        <span class="font-semibold text-white">Denda</span>
                        <span class="ml-auto px-2 py-1 bg-yellow-400 text-xs rounded-full">Rp 75K</span>
                    </a>
                    
                    @if(auth()->user()->role === 'admin')
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
                    
                    <!-- Search -->
                    <div class="flex-1 max-w-2xl mx-4">
                        <div class="relative">
                            <input type="text" 
                                   placeholder="Cari berdasarkan nama atau ID denda..."
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
                                <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                            </button>
                            <!-- Notification Dropdown -->
                            <div class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl border border-gray-200 hidden group-hover:block z-50">
                                <div class="p-4 border-b border-gray-200">
                                    <h3 class="font-bold text-gray-800">Notifikasi</h3>
                                </div>
                                <div class="max-h-96 overflow-y-auto">
                                    <!-- Notification Items -->
                                </div>
                            </div>
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
                        
                        <a href="/fines" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                <i class="fas fa-money-bill-alt text-indigo-600"></i>
                            </div>
                            <span class="font-semibold text-white">Denda</span>
                            <span class="ml-auto px-2 py-1 bg-yellow-400 text-xs rounded-full">Rp 75K</span>
                        </a>
                        
                        <!-- Navigation items lainnya -->
                        
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
                <!-- Header dan Statistik Denda -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Manajemen Denda</h1>
                        <p class="text-gray-600 mt-2">Kelola dan lacak semua denda peminjaman buku terlambat</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <button onclick="openPaymentModal()" class="px-6 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transition-all duration-200 flex items-center">
                            <i class="fas fa-credit-card mr-2"></i> Bayar Denda
                        </button>
                    </div>
                </div>

                <!-- Statistik Denda -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Denda</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">Rp 350K</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-rose-100 to-rose-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-money-bill-wave text-rose-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>
                                <span class="text-gray-500">Periode bulan ini</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Belum Dibayar</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">Rp 75K</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-100 to-amber-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-clock text-amber-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-exclamation-triangle text-amber-500 mr-2"></i>
                                <span class="text-amber-600 font-semibold">3 denda</span>
                                <span class="text-gray-500 ml-2">menunggu pembayaran</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Sudah Dibayar</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">Rp 275K</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-arrow-up text-green-500 mr-2"></i>
                                <span class="text-green-600 font-semibold">78%</span>
                                <span class="text-gray-500 ml-2">dari total denda</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Rata-rata Denda</p>
                                <p class="text-3xl font-bold text-gray-900 mt-2">Rp 25K</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-100 to-purple-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="flex items-center text-sm">
                                <i class="fas fa-book text-blue-500 mr-2"></i>
                                <span class="text-blue-600 font-semibold">14 buku</span>
                                <span class="text-gray-500 ml-2">terlambat bulan ini</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Denda -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-8">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <h3 class="text-xl font-bold text-gray-900">Daftar Denda</h3>
                            <div class="mt-4 md:mt-0 flex space-x-3">
                                <div class="relative">
                                    <select class="pl-10 pr-4 py-2 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 appearance-none">
                                        <option>Semua Status</option>
                                        <option>Belum Dibayar</option>
                                        <option>Sudah Dibayar</option>
                                        <option>Dibatalkan</option>
                                    </select>
                                    <i class="fas fa-filter absolute left-3 top-2.5 text-gray-400"></i>
                                </div>
                                <div class="relative">
                                    <select class="pl-10 pr-4 py-2 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 appearance-none">
                                        <option>30 Hari Terakhir</option>
                                        <option>7 Hari Terakhir</option>
                                        <option>Bulan Ini</option>
                                        <option>Bulan Lalu</option>
                                    </select>
                                    <i class="fas fa-calendar-alt absolute left-3 top-2.5 text-gray-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">ID Denda</th>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Judul Buku</th>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal Jatuh Tempo</th>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Keterlambatan</th>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Jumlah Denda</th>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                                    <th class="py-4 px-6 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Baris 1 -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-rose-100 to-rose-200 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-exclamation text-rose-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">F-0012</p>
                                                <p class="text-xs text-gray-500">12 Mar 2024</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="font-medium text-gray-900">Machine Learning for Beginners</p>
                                        <p class="text-sm text-gray-600">Oleh: Andrew Ng</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-900">15 Maret 2024</p>
                                        <p class="text-xs text-gray-500">Jatuh tempo</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-900">5 Hari</p>
                                        <p class="text-xs text-gray-500">Rp 5.000/hari</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="font-bold text-gray-900">Rp 25.000</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full inline-flex items-center">
                                            <i class="fas fa-clock mr-1"></i> Belum Dibayar
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <button onclick="openPaymentModal()" class="px-3 py-1 bg-emerald-100 text-emerald-800 text-xs font-semibold rounded-lg hover:bg-emerald-200 transition-colors">
                                                Bayar
                                            </button>
                                            <button class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-lg hover:bg-blue-200 transition-colors">
                                                Detail
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Baris 2 -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-green-100 to-green-200 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">F-0011</p>
                                                <p class="text-xs text-gray-500">5 Mar 2024</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="font-medium text-gray-900">Web Development with Laravel</p>
                                        <p class="text-sm text-gray-600">Oleh: Taylor Otwell</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-900">1 Maret 2024</p>
                                        <p class="text-xs text-gray-500">Jatuh tempo</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-900">7 Hari</p>
                                        <p class="text-xs text-gray-500">Rp 5.000/hari</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="font-bold text-gray-900">Rp 35.000</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full inline-flex items-center">
                                            <i class="fas fa-check mr-1"></i> Sudah Dibayar
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <button class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-lg hover:bg-blue-200 transition-colors">
                                                Detail
                                            </button>
                                            <button class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-semibold rounded-lg hover:bg-gray-200 transition-colors">
                                                Invoice
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Baris 3 -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-rose-100 to-rose-200 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-exclamation text-rose-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">F-0010</p>
                                                <p class="text-xs text-gray-500">28 Feb 2024</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="font-medium text-gray-900">Data Science Handbook</p>
                                        <p class="text-sm text-gray-600">Oleh: Jake VanderPlas</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-900">25 Februari 2024</p>
                                        <p class="text-xs text-gray-500">Jatuh tempo</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-900">10 Hari</p>
                                        <p class="text-xs text-gray-500">Rp 5.000/hari</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="font-bold text-gray-900">Rp 50.000</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-full inline-flex items-center">
                                            <i class="fas fa-clock mr-1"></i> Belum Dibayar
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <button onclick="openPaymentModal()" class="px-3 py-1 bg-emerald-100 text-emerald-800 text-xs font-semibold rounded-lg hover:bg-emerald-200 transition-colors">
                                                Bayar
                                            </button>
                                            <button class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-lg hover:bg-blue-200 transition-colors">
                                                Detail
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Baris 4 -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-green-100 to-green-200 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-check text-green-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-gray-900">F-0009</p>
                                                <p class="text-xs text-gray-500">20 Feb 2024</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="font-medium text-gray-900">Mobile App Development</p>
                                        <p class="text-sm text-gray-600">Oleh: Chris Smith</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-900">15 Februari 2024</p>
                                        <p class="text-xs text-gray-500">Jatuh tempo</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="text-gray-900">3 Hari</p>
                                        <p class="text-xs text-gray-500">Rp 5.000/hari</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="font-bold text-gray-900">Rp 15.000</p>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-bold rounded-full inline-flex items-center">
                                            <i class="fas fa-check mr-1"></i> Sudah Dibayar
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <button class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-semibold rounded-lg hover:bg-blue-200 transition-colors">
                                                Detail
                                            </button>
                                            <button class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-semibold rounded-lg hover:bg-gray-200 transition-colors">
                                                Invoice
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600">Menampilkan 4 dari 12 denda</p>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 bg-gray-100 text-gray-800 text-sm font-semibold rounded-lg hover:bg-gray-200 transition-colors">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="px-3 py-1 bg-blue-600 text-white text-sm font-semibold rounded-lg">1</button>
                                <button class="px-3 py-1 bg-gray-100 text-gray-800 text-sm font-semibold rounded-lg hover:bg-gray-200 transition-colors">2</button>
                                <button class="px-3 py-1 bg-gray-100 text-gray-800 text-sm font-semibold rounded-lg hover:bg-gray-200 transition-colors">3</button>
                                <button class="px-3 py-1 bg-gray-100 text-gray-800 text-sm font-semibold rounded-lg hover:bg-gray-200 transition-colors">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Kebijakan Denda -->
                <div class="grid lg:grid-cols-2 gap-8 mb-8">
                    <!-- Kebijakan Denda -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-info-circle text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Kebijakan Denda</h3>
                                <p class="text-gray-600">Ketentuan dan peraturan denda</p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-clock text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Tarif Denda</p>
                                        <p class="text-sm text-gray-600">Rp 5.000 per hari keterlambatan</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-4 bg-gradient-to-r from-emerald-50 to-emerald-100 rounded-xl">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-calendar-alt text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Masa Tenggang</p>
                                        <p class="text-sm text-gray-600">3 hari setelah jatuh tempo tanpa denda</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-4 bg-gradient-to-r from-amber-50 to-amber-100 rounded-xl">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-amber-600 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-exclamation-triangle text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Peringatan</p>
                                        <p class="text-sm text-gray-600">Notifikasi dikirim 2 hari sebelum jatuh tempo</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-4 bg-gradient-to-r from-rose-50 to-rose-100 rounded-xl">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-rose-600 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-ban text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Pembatasan</p>
                                        <p class="text-sm text-gray-600">Tidak bisa meminjam jika ada denda belum dibayar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Metode Pembayaran -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-credit-card text-emerald-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Metode Pembayaran</h3>
                                <p class="text-gray-600">Cara membayar denda Anda</p>
                            </div>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="p-5 border border-gray-200 rounded-xl hover:border-blue-400 transition-colors hover-lift">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-university text-blue-600 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-bold text-gray-900">Transfer Bank</p>
                                        <p class="text-sm text-gray-600">BCA: 123-456-7890 (PerpusKita)</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-full">Rekomendasi</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-5 border border-gray-200 rounded-xl hover:border-emerald-400 transition-colors hover-lift">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-mobile-alt text-emerald-600 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-bold text-gray-900">E-Wallet</p>
                                        <p class="text-sm text-gray-600">DANA, OVO, GoPay, LinkAja</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-5 border border-gray-200 rounded-xl hover:border-purple-400 transition-colors hover-lift">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-money-bill-alt text-purple-600 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-bold text-gray-900">Tunai di Perpustakaan</p>
                                        <p class="text-sm text-gray-600">Bayar langsung di kantor admin</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-8 p-5 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl">
                                <p class="text-sm text-gray-700 mb-3"><i class="fas fa-info-circle text-blue-600 mr-2"></i> Setelah melakukan pembayaran, harap konfirmasi melalui WhatsApp admin atau email dengan melampirkan bukti transfer.</p>
                                <div class="flex items-center text-sm">
                                    <i class="fas fa-phone text-emerald-600 mr-2"></i>
                                    <span class="font-semibold text-gray-900 mr-2">WhatsApp Admin:</span>
                                    <span class="text-gray-700">0812-3456-7890</span>
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

    <!-- Modal Pembayaran -->
    <div id="paymentModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md">
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-gray-900">Bayar Denda</h3>
                    <button onclick="closePaymentModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <div class="p-6">
                <div class="mb-6 p-4 bg-gradient-to-r from-amber-50 to-amber-100 rounded-xl">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-600">Total Denda</p>
                            <p class="text-2xl font-bold text-gray-900">Rp 75.000</p>
                        </div>
                        <div class="w-12 h-12 bg-amber-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-money-bill-wave text-white text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Pilih Metode Pembayaran</label>
                    <div class="space-y-3">
                        <div class="flex items-center p-3 border border-gray-200 rounded-xl hover:border-blue-400 cursor-pointer">
                            <input type="radio" name="paymentMethod" id="bank" class="mr-3" checked>
                            <label for="bank" class="flex-1 cursor-pointer">
                                <p class="font-semibold text-gray-900">Transfer Bank</p>
                                <p class="text-sm text-gray-600">BCA, Mandiri, BRI, BNI</p>
                            </label>
                            <i class="fas fa-university text-blue-600"></i>
                        </div>
                        
                        <div class="flex items-center p-3 border border-gray-200 rounded-xl hover:border-emerald-400 cursor-pointer">
                            <input type="radio" name="paymentMethod" id="ewallet" class="mr-3">
                            <label for="ewallet" class="flex-1 cursor-pointer">
                                <p class="font-semibold text-gray-900">E-Wallet</p>
                                <p class="text-sm text-gray-600">DANA, OVO, GoPay</p>
                            </label>
                            <i class="fas fa-mobile-alt text-emerald-600"></i>
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Pilih Denda yang Akan Dibayar</label>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                            <div class="flex items-center">
                                <input type="checkbox" id="fine1" class="mr-3" checked>
                                <label for="fine1" class="cursor-pointer">
                                    <p class="font-semibold text-gray-900">F-0012</p>
                                    <p class="text-sm text-gray-600">Machine Learning for Beginners</p>
                                </label>
                            </div>
                            <span class="font-bold text-gray-900">Rp 25.000</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                            <div class="flex items-center">
                                <input type="checkbox" id="fine2" class="mr-3">
                                <label for="fine2" class="cursor-pointer">
                                    <p class="font-semibold text-gray-900">F-0010</p>
                                    <p class="text-sm text-gray-600">Data Science Handbook</p>
                                </label>
                            </div>
                            <span class="font-bold text-gray-900">Rp 50.000</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex space-x-3">
                    <button onclick="closePaymentModal()" class="flex-1 px-4 py-3 bg-gray-100 text-gray-800 font-semibold rounded-xl hover:bg-gray-200 transition-colors">
                        Batal
                    </button>
                    <button onclick="processPayment()" class="flex-1 px-4 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold rounded-xl hover:from-emerald-600 hover:to-emerald-700 transition-all">
                        Bayar Sekarang
                    </button>
                </div>
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

        // Payment Modal Functions
        function openPaymentModal() {
            document.getElementById('paymentModal').classList.remove('hidden');
        }

        function closePaymentModal() {
            document.getElementById('paymentModal').classList.add('hidden');
        }

        function processPayment() {
            alert('Pembayaran berhasil diproses! Anda akan diarahkan ke halaman pembayaran.');
            closePaymentModal();
        }

        // Close modal when clicking outside
        document.getElementById('paymentModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePaymentModal();
            }
        });

        // Toggle table row selection
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const row = this.closest('tr');
                if (this.checked) {
                    row.classList.add('bg-blue-50');
                } else {
                    row.classList.remove('bg-blue-50');
                }
            });
        });
    </script>
</body>
</html>