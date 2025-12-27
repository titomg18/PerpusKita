<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if(isset($category) && request()->routeIs('admin.categories.edit'))
            Edit Kategori | Admin PerpusKita
        @elseif(request()->routeIs('admin.categories.create'))
            Tambah Kategori | Admin PerpusKita
        @else
            Manajemen Kategori | Admin PerpusKita
        @endif
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-tachometer-alt text-white"></i>
                        </div>
                        <span class="text-white/90">Dashboard</span>
                    </a>
                    
                    <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <span class="text-white/90">Buku</span>
                    </a>
                    
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 p-4 @if(request()->routeIs('admin.categories.index') || request()->routeIs('admin.categories.create') || request()->routeIs('admin.categories.edit')) bg-white/20 backdrop-blur-sm border border-white/30 @else hover:bg-white/15 @endif rounded-xl transition-all duration-200">
                        <div class="w-8 h-8 @if(request()->routeIs('admin.categories.index') || request()->routeIs('admin.categories.create') || request()->routeIs('admin.categories.edit')) bg-white rounded-lg @else bg-white/20 @endif flex items-center justify-center">
                            <i class="fas fa-tags @if(request()->routeIs('admin.categories.index') || request()->routeIs('admin.categories.create') || request()->routeIs('admin.categories.edit')) text-indigo-600 @else text-white @endif"></i>
                        </div>
                        <span class="@if(request()->routeIs('admin.categories.index') || request()->routeIs('admin.categories.create') || request()->routeIs('admin.categories.edit')) font-semibold text-white @else text-white/90 @endif">Kategori</span>
                        <span class="ml-auto px-2 py-1 bg-green-400 text-xs rounded-full">{{ $totalCategories ?? 0 }}</span>
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
            @if(request()->routeIs('admin.categories.create') || (isset($category) && request()->routeIs('admin.categories.edit')))
                <!-- CREATE/EDIT PAGE -->
                <!-- Top Bar untuk Create/Edit -->
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
                                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
                                            <i class="fas fa-home mr-2"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                                            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
                                                Kategori
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <i class="fas fa-chevron-right text-gray-400 mx-2 text-xs"></i>
                                            <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2">
                                                @if(isset($category))
                                                    Edit Kategori
                                                @else
                                                    Tambah Kategori
                                                @endif
                                            </span>
                                        </div>
                                    </li>
                                </ol>
                            </nav>
                            <h1 class="text-2xl font-bold text-gray-900 mt-2">
                                @if(isset($category))
                                    Edit Kategori: {{ $category->name }}
                                @else
                                    Tambah Kategori Baru
                                @endif
                            </h1>
                        </div>
                        
                        <!-- Right Actions -->
                        <div class="flex items-center space-x-4">
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
                                </button>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Mobile Sidebar -->
                <div id="mobileSidebar" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden" onclick="toggleSidebar()"></div>
                <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-gradient-to-br from-indigo-800 to-purple-800 text-white z-50 transform -translate-x-full lg:hidden transition-transform duration-300 p-6">
                    <div class="h-full flex flex-col">
                        <!-- Mobile sidebar content (sama dengan sidebar desktop) -->
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
                            
                            <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-tags text-indigo-600"></i>
                                </div>
                                <span class="font-semibold text-white">Kategori</span>
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

                <!-- Content Area untuk Create/Edit -->
                <div class="p-6">
                    @if(session('success'))
                    <div id="alert-success" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-check text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-green-800">{{ session('success') }}</p>
                            </div>
                            <button onclick="document.getElementById('alert-success').remove()" class="text-green-600 hover:text-green-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @endif

                    @if($errors->any())
                    <div id="alert-error" class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-exclamation text-red-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-red-800 mb-2">Terdapat kesalahan dalam pengisian form:</p>
                                <ul class="list-disc list-inside text-sm text-red-700">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <button onclick="document.getElementById('alert-error').remove()" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @endif

                    <!-- Form Section -->
                    <div class="max-w-2xl mx-auto">
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                            <div class="mb-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br @if(isset($category)) from-blue-100 to-blue-50 @else from-green-100 to-green-50 @endif rounded-xl flex items-center justify-center">
                                        <i class="fas @if(isset($category)) fa-edit text-blue-600 @else fa-plus text-green-600 @endif"></i>
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-bold text-gray-900">
                                            @if(isset($category))
                                                Form Edit Kategori
                                            @else
                                                Form Tambah Kategori
                                            @endif
                                        </h2>
                                        <p class="text-gray-600">
                                            @if(isset($category))
                                                Terakhir diperbarui: {{ $category->updated_at->format('d M Y H:i') }}
                                            @else
                                                Isi form di bawah untuk menambahkan kategori baru
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <form action="@if(isset($category)) {{ route('admin.categories.update', $category) }} @else {{ route('admin.categories.store') }} @endif" method="POST">
                                @if(isset($category))
                                    @method('PUT')
                                @endif
                                @csrf
                                
                                <div class="space-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                            Nama Kategori <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" 
                                               id="name"
                                               name="name"
                                               value="{{ old('name', $category->name ?? '') }}"
                                               required
                                               class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                               placeholder="Contoh: Fiksi, Sains, Teknologi">
                                        <p class="mt-1 text-sm text-gray-500">Nama kategori harus unik</p>
                                    </div>
                                    
                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                            Deskripsi
                                        </label>
                                        <textarea 
                                            id="description"
                                            name="description"
                                            rows="4"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                            placeholder="Deskripsi singkat tentang kategori ini">{{ old('description', $category->description ?? '') }}</textarea>
                                        <p class="mt-1 text-sm text-gray-500">Maksimal 1000 karakter</p>
                                    </div>
                                </div>
                                
                                <div class="mt-8 flex space-x-3">
                                    <a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50">
                                        Batal
                                    </a>
                                    <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-700">
                                        @if(isset($category))
                                            Perbarui Kategori
                                        @else
                                            Simpan Kategori
                                        @endif
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <!-- INDEX PAGE -->
                <!-- Top Bar untuk Index -->
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
                                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600">
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
                            </div>
                            
                            <!-- Quick Stats -->
                            <div class="hidden md:flex items-center space-x-3 text-sm">
                                <div class="px-3 py-1.5 bg-green-50 text-green-700 rounded-full font-medium">
                                    <i class="fas fa-tags mr-1"></i> {{ $totalCategories ?? 0 }} Kategori
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
                                </button>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Mobile Sidebar untuk Index -->
                <div id="mobileSidebar" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden" onclick="toggleSidebar()"></div>
                <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-gradient-to-br from-indigo-800 to-purple-800 text-white z-50 transform -translate-x-full lg:hidden transition-transform duration-300 p-6">
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
                            
                            <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                                    <i class="fas fa-tags text-indigo-600"></i>
                                </div>
                                <span class="font-semibold text-white">Kategori</span>
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

                <!-- Content Area untuk Index -->
                <div class="p-6">
                    @if(session('success'))
                    <div id="alert-success" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-check text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-green-800">{{ session('success') }}</p>
                            </div>
                            <button onclick="document.getElementById('alert-success').remove()" class="text-green-600 hover:text-green-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @endif

                    @if(session('error'))
                    <div id="alert-error" class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-exclamation text-red-600"></i>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-red-800">{{ session('error') }}</p>
                            </div>
                            <button onclick="document.getElementById('alert-error').remove()" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    @endif

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
                            <a href="{{ route('admin.categories.create') }}" class="px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-700 hover-lift flex items-center">
                                <i class="fas fa-plus mr-2"></i> Tambah Kategori
                            </a>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 hover-lift">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-tags text-green-600"></i>
                                </div>
                                <div>
                                    <p class="text-gray-500 text-sm">Total Kategori</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ $totalCategories }}</p>
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
                                    @php
                                        $newThisMonth = \App\Models\Category::whereMonth('created_at', now()->month)->count();
                                    @endphp
                                    <p class="text-2xl font-bold text-gray-900">{{ $newThisMonth }}</p>
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
                                    <p class="text-gray-600 text-sm mt-1">Total {{ $categories->total() }} kategori ditemukan</p>
                                </div>
                                <div class="mt-3 md:mt-0 flex space-x-3">
                                    <div class="relative">
                                        <input type="text" 
                                               id="searchInput"
                                               placeholder="Cari kategori..."
                                               class="pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent w-full md:w-64">
                                        <i class="fas fa-search absolute left-3.5 top-3 text-gray-400"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Categories Table -->
                        @if($categories->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="py-4 px-6 text-left font-semibold text-gray-900">No</th>
                                        <th class="py-4 px-6 text-left font-semibold text-gray-900">Nama Kategori</th>
                                        <th class="py-4 px-6 text-left font-semibold text-gray-900">Deskripsi</th>
                                        <th class="py-4 px-6 text-left font-semibold text-gray-900">Tanggal Dibuat</th>
                                        <th class="py-4 px-6 text-left font-semibold text-gray-900">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($categories as $category)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-4 px-6">
                                            <div class="text-gray-700">{{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}</div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="font-medium text-gray-900">{{ $category->name }}</div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="text-gray-700 max-w-xs truncate">{{ $category->description ?? '-' }}</div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="text-sm text-gray-700">{{ $category->created_at->format('d M Y') }}</div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.categories.edit', $category) }}" class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100">
                                                    <i class="fas fa-edit text-sm"></i>
                                                </a>
                                                <button onclick="confirmDelete({{ $category->id }}, '{{ addslashes($category->name) }}')" class="w-8 h-8 flex items-center justify-center bg-red-50 text-red-600 rounded-lg hover:bg-red-100">
                                                    <i class="fas fa-trash-alt text-sm"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Table Footer dengan Pagination -->
                        <div class="p-6 border-t border-gray-200">
                            <div class="flex flex-col md:flex-row justify-between items-center">
                                <div class="text-sm text-gray-700 mb-4 md:mb-0">
                                    Menampilkan {{ $categories->firstItem() }} - {{ $categories->lastItem() }} dari {{ $categories->total() }} kategori
                                </div>
                                <div>
                                    <!-- Custom Pagination -->
                                    @if ($categories->hasPages())
                                    <div class="flex items-center space-x-2">
                                        {{-- Previous Page Link --}}
                                        @if ($categories->onFirstPage())
                                            <span class="px-3 py-2 border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                                                <i class="fas fa-chevron-left"></i>
                                            </span>
                                        @else
                                            <a href="{{ $categories->previousPageUrl() }}" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($elements as $element)
                                            {{-- "Three Dots" Separator --}}
                                            @if (is_string($element))
                                                <span class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700">{{ $element }}</span>
                                            @endif

                                            {{-- Array Of Links --}}
                                            @if (is_array($element))
                                                @foreach ($element as $page => $url)
                                                    @if ($page == $categories->currentPage())
                                                        <span class="px-3 py-2 bg-green-600 text-white rounded-lg font-medium">{{ $page }}</span>
                                                    @else
                                                        <a href="{{ $url }}" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">{{ $page }}</a>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($categories->hasMorePages())
                                            <a href="{{ $categories->nextPageUrl() }}" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        @else
                                            <span class="px-3 py-2 border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                                                <i class="fas fa-chevron-right"></i>
                                            </span>
                                        @endif
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @else
                        <!-- Empty State -->
                        <div class="p-12 text-center">
                            <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-tags text-gray-400 text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Kategori</h3>
                            <p class="text-gray-600 mb-6">Mulai dengan menambahkan kategori pertama Anda</p>
                            <a href="{{ route('admin.categories.create') }}" class="px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-700 hover-lift inline-flex items-center">
                                <i class="fas fa-plus mr-2"></i> Tambah Kategori Pertama
                            </a>
                        </div>
                        @endif
                    </div>

                    <!-- Footer untuk Index -->
                    <footer class="mt-12 pt-8 border-t border-gray-200">
                        <div class="flex flex-col md:flex-row justify-between items-center">
                            <div class="mb-4 md:mb-0">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-br from-green-600 to-emerald-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-tags text-white text-sm"></i>
                                    </div>
                                    <span class="font-bold text-gray-900">Manajemen Kategori</span>
                                </div>
                                <p class="text-gray-600 text-sm mt-2">Total {{ $totalCategories }} kategori</p>
                            </div>
                            <div class="flex space-x-6">
                                <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-green-600 text-sm">Dashboard</a>
                                <a href="#" class="text-gray-600 hover:text-green-600 text-sm">Bantuan</a>
                            </div>
                            <div class="mt-4 md:mt-0">
                                <p class="text-gray-500 text-sm">© {{ date('Y') }} PerpusKita. Hak cipta dilindungi.</p>
                            </div>
                        </div>
                    </footer>
                </div>
            @endif
        </main>
    </div>

    <!-- Delete Form -->
    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- JavaScript -->
    <script>
        // Toggle mobile sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileSidebar');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Confirm delete (hanya untuk index page)
        @if(request()->routeIs('admin.categories.index'))
        function confirmDelete(id, name) {
            Swal.fire({
                title: 'Hapus Kategori?',
                html: `Apakah Anda yakin ingin menghapus kategori <strong>"${name}"</strong>?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('deleteForm');
                    form.action = `/admin/categories/${id}`;
                    form.submit();
                }
            });
        }

        // Search functionality
        document.getElementById('searchInput')?.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const searchTerm = this.value;
                if (searchTerm) {
                    window.location.href = `{{ route('admin.categories.index') }}?search=${encodeURIComponent(searchTerm)}`;
                }
            }
        });
        @endif

        // Auto-hide mobile sidebar on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('mobileSidebar');
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('[id^="alert-"]');
            alerts.forEach(alert => {
                if (alert) alert.remove();
            });
        }, 5000);
    </script>
</body>
</html>