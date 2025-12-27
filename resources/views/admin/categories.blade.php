<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kategori | Admin PerpusKita</title>
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
        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .category-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Layout dengan sidebar -->
    <div class="flex min-h-screen">
        <!-- Sidebar (sama dengan dashboard) -->
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
                    <a href="/admin/dashboard" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-tachometer-alt text-white"></i>
                        </div>
                        <span class="text-white/90">Dashboard</span>
                    </a>
                    
                    <a href="/admin/books" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <span class="text-white/90">Buku</span>
                        <span class="ml-auto px-2 py-1 bg-blue-400 text-xs rounded-full">1.2K</span>
                    </a>
                    
                    <a href="/admin/categories" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-tags text-indigo-600"></i>
                        </div>
                        <span class="font-semibold text-white">Kategori</span>
                        <span class="ml-auto px-2 py-1 bg-green-400 text-xs rounded-full">24</span>
                    </a>
                    
                    <a href="/admin/borrowers" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <span class="text-white/90">Peminjam</span>
                        <span class="ml-auto px-2 py-1 bg-purple-400 text-xs rounded-full">86</span>
                    </a>
                    
                    <a href="/admin/fines" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-money-bill-alt text-white"></i>
                        </div>
                        <span class="text-white/90">Denda</span>
                        <span class="ml-auto px-2 py-1 bg-yellow-400 text-xs rounded-full">Rp 850K</span>
                    </a>
                    
                    <!-- Separator -->
                    <div class="pt-6 mt-6 border-t border-white/30">
                        <p class="text-xs text-white/70 uppercase tracking-wider mb-4">Admin Tools</p>
                        
                        <a href="/admin/users" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-users-cog text-white"></i>
                            </div>
                            <span class="text-white/90">Manajemen User</span>
                        </a>
                        
                        <a href="/admin/reports" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-chart-bar text-white"></i>
                            </div>
                            <span class="text-white/90">Laporan & Analytics</span>
                        </a>
                        
                        <a href="/admin/settings" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
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
                    
                    <!-- Breadcrumb -->
                    <div class="flex-1 mx-4">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <a href="/admin/dashboard" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
                                        <i class="fas fa-home mr-2"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                                        <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2">Kategori</span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="text-2xl font-bold text-gray-900 mt-2">Manajemen Kategori Buku</h1>
                    </div>
                    
                    <!-- Right Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <div class="relative group">
                            <button class="relative p-2 text-gray-600 hover:text-blue-600">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                            </button>
                            <div class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl border border-gray-200 hidden group-hover:block z-50">
                                <div class="p-4 border-b border-gray-200">
                                    <h3 class="font-bold text-gray-800">Notifikasi Kategori</h3>
                                </div>
                                <div class="max-h-96 overflow-y-auto">
                                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-tags text-blue-600 text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-sm">Kategori baru ditambahkan</p>
                                                <p class="text-xs text-gray-600">"Kecerdasan Buatan" oleh Admin</p>
                                            </div>
                                            <span class="text-xs text-gray-500">1 jam lalu</span>
                                        </div>
                                    </div>
                                    <div class="p-4 border-b border-gray-100 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                                                <i class="fas fa-exclamation text-yellow-600 text-sm"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="font-medium text-sm">Kategori tanpa buku</p>
                                                <p class="text-xs text-gray-600">3 kategori tidak memiliki buku</p>
                                            </div>
                                            <span class="text-xs text-gray-500">1 hari lalu</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Stats -->
                        <div class="hidden md:flex items-center space-x-3 text-sm">
                            <div class="px-3 py-1.5 bg-green-50 text-green-700 rounded-full font-medium">
                                <i class="fas fa-tags mr-1"></i> 24 Kategori
                            </div>
                            <div class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-full font-medium">
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

            <!-- Mobile Sidebar (sama dengan dashboard) -->
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
                        <a href="/admin/dashboard" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-tachometer-alt text-white"></i>
                            </div>
                            <span class="text-white/90">Dashboard</span>
                        </a>
                        
                        <a href="/admin/books" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-book text-white"></i>
                            </div>
                            <span class="text-white/90">Buku</span>
                        </a>
                        
                        <a href="/admin/categories" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                <i class="fas fa-tags text-indigo-600"></i>
                            </div>
                            <span class="font-semibold text-white">Kategori</span>
                        </a>
                        
                        <a href="/admin/borrowers" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <span class="text-white/90">Peminjam</span>
                        </a>
                        
                        <div class="pt-6 mt-6 border-t border-white/30">
                            <p class="text-xs text-white/70 uppercase tracking-wider mb-4">Admin Tools</p>
                            
                            <a href="/admin/users" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i class="fas fa-users-cog text-white"></i>
                                </div>
                                <span class="text-white/90">Manajemen User</span>
                            </a>
                            
                            <a href="/admin/reports" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
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
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                    <div>
                        <div class="flex items-center space-x-3">
                            <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-tags text-green-600 text-2xl"></i>
                            </div>
                            <div>
                                <h2 class="text-3xl font-bold text-gray-900">Manajemen Kategori</h2>
                                <p class="text-gray-600">Kelola kategori buku di perpustakaan Anda</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 md:mt-0 flex space-x-3">
                        <button onclick="exportCategories()" class="px-4 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 hover-lift flex items-center">
                            <i class="fas fa-file-export mr-2"></i> Ekspor
                        </button>
                        <button onclick="openAddCategoryModal()" class="px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-700 hover-lift flex items-center">
                            <i class="fas fa-plus mr-2"></i> Tambah Kategori
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-tags text-green-600"></i>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Total Kategori</p>
                                <p class="text-2xl font-bold text-gray-900">24</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-book text-blue-600"></i>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Kategori dengan Buku Terbanyak</p>
                                <p class="text-2xl font-bold text-gray-900">Fiksi (312)</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-yellow-100 to-yellow-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-exclamation text-yellow-600"></i>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Kategori Tanpa Buku</p>
                                <p class="text-2xl font-bold text-gray-900">3</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-purple-50 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-plus-circle text-purple-600"></i>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Ditambahkan Bulan Ini</p>
                                <p class="text-2xl font-bold text-gray-900">5</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <!-- Table Header -->
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Daftar Kategori Buku</h3>
                                <p class="text-gray-600 text-sm mt-1">Kelola dan atur kategori buku perpustakaan</p>
                            </div>
                            <div class="mt-3 md:mt-0 flex space-x-3">
                                <div class="relative">
                                    <input type="text" 
                                           placeholder="Cari kategori..."
                                           class="pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent w-full md:w-64">
                                    <i class="fas fa-search absolute left-3.5 top-3 text-gray-400"></i>
                                </div>
                                <button class="px-4 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 flex items-center">
                                    <i class="fas fa-filter mr-2"></i> Filter
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-4 px-6 text-left">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                            <span class="ml-3 font-semibold text-gray-900">Nama Kategori</span>
                                        </div>
                                    </th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Jumlah Buku</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Deskripsi</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Status</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Tanggal Dibuat</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($categories as $category)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{ $category->name }}</div>
                                                <div class="text-sm text-gray-500">Kode: {{ $category->code }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <span class="font-bold text-gray-900">{{ $category->book_count }}</span>
                                            <span class="ml-2 text-sm text-gray-500">buku</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="text-gray-700 max-w-xs truncate">{{ $category->description }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        @if($category->is_active)
                                        <span class="category-badge bg-green-100 text-green-800">Aktif</span>
                                        @else
                                        <span class="category-badge bg-red-100 text-red-800">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="text-sm text-gray-700">{{ $category->created_at->format('d M Y') }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <button onclick="editCategory({{ $category->id }})" class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100">
                                                <i class="fas fa-edit text-sm"></i>
                                            </button>
                                            <button onclick="deleteCategory({{ $category->id }})" class="w-8 h-8 flex items-center justify-center bg-red-50 text-red-600 rounded-lg hover:bg-red-100">
                                                <i class="fas fa-trash-alt text-sm"></i>
                                            </button>
                                            <button class="w-8 h-8 flex items-center justify-center bg-gray-50 text-gray-600 rounded-lg hover:bg-gray-100">
                                                <i class="fas fa-eye text-sm"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Table Footer -->
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <div class="text-sm text-gray-700 mb-4 md:mb-0">
                                Menampilkan <span class="font-bold">1-10</span> dari <span class="font-bold">24</span> kategori
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="px-3 py-2 bg-green-600 text-white rounded-lg font-medium">1</button>
                                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">2</button>
                                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">3</button>
                                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty State (conditional) -->
                @if(count($categories) === 0)
                <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-200 p-12 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-tags text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Kategori</h3>
                    <p class="text-gray-600 mb-6">Mulai dengan menambahkan kategori pertama Anda</p>
                    <button onclick="openAddCategoryModal()" class="px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-700 hover-lift inline-flex items-center">
                        <i class="fas fa-plus mr-2"></i> Tambah Kategori Pertama
                    </button>
                </div>
                @endif

                <!-- Popular Categories -->
                <div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Kategori Populer</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-bold text-gray-900">Fiksi</p>
                                    <p class="text-sm text-gray-600">312 buku</p>
                                </div>
                                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-book-open text-blue-600"></i>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-bold text-gray-900">Sains</p>
                                    <p class="text-sm text-gray-600">198 buku</p>
                                </div>
                                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-flask text-green-600"></i>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-bold text-gray-900">Teknologi</p>
                                    <p class="text-sm text-gray-600">156 buku</p>
                                </div>
                                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-laptop-code text-purple-600"></i>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-bold text-gray-900">Sejarah</p>
                                    <p class="text-sm text-gray-600">124 buku</p>
                                </div>
                                <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-landmark text-amber-600"></i>
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
                                <div class="w-8 h-8 bg-gradient-to-br from-green-600 to-emerald-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-tags text-white text-sm"></i>
                                </div>
                                <span class="font-bold text-gray-900">Manajemen Kategori</span>
                            </div>
                            <p class="text-gray-600 text-sm mt-2">Total 24 kategori • 1,254 buku terkategorisasi</p>
                        </div>
                        <div class="flex space-x-6">
                            <a href="/admin/dashboard" class="text-gray-600 hover:text-green-600 text-sm">Dashboard</a>
                            <a href="/admin/books" class="text-gray-600 hover:text-green-600 text-sm">Buku</a>
                            <a href="#" class="text-gray-600 hover:text-green-600 text-sm">Bantuan</a>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <p class="text-gray-500 text-sm">© 2024 PerpusKita. Hak cipta dilindungi.</p>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
    </div>

    <!-- Add Category Modal -->
    <div id="addCategoryModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-md">
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold text-gray-900">Tambah Kategori Baru</h3>
                    <button onclick="closeAddCategoryModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <form id="categoryForm" class="p-6">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori *</label>
                        <input type="text" 
                               required
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Contoh: Fiksi, Sains, Teknologi">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kode Kategori</label>
                        <input type="text" 
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Contoh: FIK, SNS, TEK">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea 
                            rows="3"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Deskripsi singkat tentang kategori ini"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="status" value="active" checked class="mr-2 text-green-600 focus:ring-green-500">
                                <span class="text-gray-700">Aktif</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="status" value="inactive" class="mr-2 text-green-600 focus:ring-green-500">
                                <span class="text-gray-700">Nonaktif</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-end space-x-3">
                    <button type="button" onclick="closeAddCategoryModal()" class="px-5 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-700">
                        Simpan Kategori
                    </button>
                </div>
            </form>
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

        // Modal functions
        function openAddCategoryModal() {
            document.getElementById('addCategoryModal').classList.remove('hidden');
            document.getElementById('addCategoryModal').classList.add('flex');
        }

        function closeAddCategoryModal() {
            document.getElementById('addCategoryModal').classList.add('hidden');
            document.getElementById('addCategoryModal').classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('addCategoryModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeAddCategoryModal();
            }
        });

        // Handle form submission
        document.getElementById('categoryForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would typically send data to server
            alert('Kategori berhasil ditambahkan!');
            closeAddCategoryModal();
            // Refresh page or update table
        });

        // Export categories
        function exportCategories() {
            alert('Mengekspor data kategori...');
            // Implement export functionality
        }

        // Edit category
        function editCategory(id) {
            alert(`Mengedit kategori dengan ID: ${id}`);
            // Open edit modal with category data
        }

        // Delete category
        function deleteCategory(id) {
            if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
                alert(`Menghapus kategori dengan ID: ${id}`);
                // Implement delete functionality
            }
        }

        // Search functionality
        const searchInput = document.querySelector('input[placeholder="Cari kategori..."]');
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            // Implement live search
            console.log('Searching for:', searchTerm);
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
    </script>
</body>
</html>