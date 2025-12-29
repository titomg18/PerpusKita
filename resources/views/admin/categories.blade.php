<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kategori | Admin PerpusKita</title>
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
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            max-height: 90vh;
            overflow-y: auto;
        }
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
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
                    
                    <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <span class="text-white/90">Buku</span>
                        <span class="ml-auto px-2 py-1 bg-blue-400 text-xs rounded-full">1.2K</span>
                    </a>
                    
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-tags text-indigo-600"></i>
                        </div>
                        <span class="font-semibold text-white">Kategori</span>
                        <span class="ml-auto px-2 py-1 bg-green-400 text-xs rounded-full">{{ $totalCategories ?? 0 }}</span>
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
                                   placeholder="Cari kategori..."
                                   class="w-full pl-12 pr-4 py-3 bg-gray-100 border-0 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                                   id="searchInput">
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
                                <i class="fas fa-chevron-down text-gray-400 text-sm hidden md:block"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Mobile Sidebar -->
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
                        
                        <a href="#" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i class="fas fa-book text-white"></i>
                            </div>
                            <span class="text-white/90">Buku</span>
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

            <!-- Content Area -->
            <div class="p-6">
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Manajemen Kategori</h1>
                        <p class="text-gray-600">Kelola kategori buku di perpustakaan Anda</p>
                    </div>
                    
                    <div class="mt-4 md:mt-0 flex space-x-3">
                        <button onclick="openCategoryModal()" class="px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-700 hover-lift flex items-center">
                            <i class="fas fa-plus mr-2"></i> Tambah Kategori
                        </button>
                    </div>
                </div>

                @if(session('success'))
                <div id="alert-success" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl fade-in">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                        <button onclick="closeAlert('alert-success')" class="text-green-600 hover:text-green-800">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div id="alert-error" class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl fade-in">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-exclamation text-red-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-red-800">{{ session('error') }}</p>
                        </div>
                        <button onclick="closeAlert('alert-error')" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                @endif

                <!-- Categories Table -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <!-- Table Header -->
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Daftar Kategori Buku</h3>
                                <p class="text-gray-600 text-sm mt-1">Total {{ $categories->total() }} kategori ditemukan</p>
                            </div>
                        </div>
                    </div>

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
                                <tr class="hover:bg-gray-50 transition-colors" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-description="{{ $category->description ?? '' }}">
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
                                            <button onclick="editCategory({{ $category->id }}, '{{ addslashes($category->name) }}', '{{ addslashes($category->description ?? '') }}')" class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100">
                                                <i class="fas fa-edit text-sm"></i>
                                            </button>
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
                        <button onclick="openCategoryModal()" class="px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-700 hover-lift inline-flex items-center">
                            <i class="fas fa-plus mr-2"></i> Tambah Kategori Pertama
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Tambah/Edit Kategori -->
    <div id="categoryModal" class="fixed inset-0 z-50 hidden">
        <div class="modal-overlay absolute inset-0" onclick="closeCategoryModal()"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="modal-content bg-white rounded-2xl shadow-xl w-full max-w-md fade-in">
                <div class="p-6">
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 id="modalTitle" class="text-xl font-bold text-gray-900">Tambah Kategori Baru</h3>
                        <button onclick="closeCategoryModal()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <!-- Form -->
                    <form id="categoryForm" method="POST">
                        @csrf
                        <div id="formMethod" style="display: none;"></div>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="modalName" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Kategori <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="modalName"
                                       name="name"
                                       required
                                       class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                       placeholder="Contoh: Fiksi, Sains, Teknologi">
                                <p class="mt-1 text-sm text-gray-500">Nama kategori harus unik</p>
                            </div>
                            
                            <div>
                                <label for="modalDescription" class="block text-sm font-medium text-gray-700 mb-2">
                                    Deskripsi
                                </label>
                                <textarea 
                                    id="modalDescription"
                                    name="description"
                                    rows="3"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                    placeholder="Deskripsi singkat tentang kategori ini"></textarea>
                                <p class="mt-1 text-sm text-gray-500">Maksimal 1000 karakter</p>
                            </div>
                        </div>
                        
                        <div class="mt-8 flex space-x-3">
                            <button type="button" onclick="closeCategoryModal()" class="flex-1 px-5 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50">
                                Batal
                            </button>
                            <button type="submit" class="flex-1 px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-700">
                                <span id="submitButtonText">Simpan Kategori</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

        // Close alert
        function closeAlert(alertId) {
            const alert = document.getElementById(alertId);
            if (alert) {
                alert.remove();
            }
        }

        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('[id^="alert-"]');
            alerts.forEach(alert => {
                if (alert) alert.remove();
            });
        }, 5000);

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
        let currentCategoryId = null;

        function openCategoryModal() {
            currentCategoryId = null;
            document.getElementById('modalTitle').textContent = 'Tambah Kategori Baru';
            document.getElementById('submitButtonText').textContent = 'Simpan Kategori';
            document.getElementById('modalName').value = '';
            document.getElementById('modalDescription').value = '';
            
            // Set form action untuk create
            const form = document.getElementById('categoryForm');
            form.action = '{{ route("admin.categories.store") }}';
            form.method = 'POST';
            
            // Reset hidden method field
            document.getElementById('formMethod').innerHTML = '';
            
            document.getElementById('categoryModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function editCategory(id, name, description) {
            currentCategoryId = id;
            document.getElementById('modalTitle').textContent = 'Edit Kategori';
            document.getElementById('submitButtonText').textContent = 'Perbarui Kategori';
            document.getElementById('modalName').value = name;
            document.getElementById('modalDescription').value = description;
            
            // Set form action untuk update
            const form = document.getElementById('categoryForm');
            form.action = `/admin/categories/${id}`;
            form.method = 'POST';
            
            // Tambahkan method field untuk PUT
            document.getElementById('formMethod').innerHTML = '<input type="hidden" name="_method" value="PUT">';
            
            document.getElementById('categoryModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeCategoryModal() {
            document.getElementById('categoryModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Confirm delete
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

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCategoryModal();
            }
        });

        // Form validation
        document.getElementById('categoryForm').addEventListener('submit', function(e) {
            const nameInput = document.getElementById('modalName');
            if (!nameInput.value.trim()) {
                e.preventDefault();
                nameInput.classList.add('border-red-500');
                nameInput.focus();
                
                // Show error message
                if (!nameInput.nextElementSibling?.classList.contains('text-red-500')) {
                    const errorMsg = document.createElement('p');
                    errorMsg.className = 'mt-1 text-sm text-red-500';
                    errorMsg.textContent = 'Nama kategori wajib diisi';
                    nameInput.parentNode.appendChild(errorMsg);
                }
            }
        });

        // Remove error when typing
        document.getElementById('modalName').addEventListener('input', function() {
            this.classList.remove('border-red-500');
            const errorMsg = this.parentNode.querySelector('.text-red-500');
            if (errorMsg) {
                errorMsg.remove();
            }
        });
    </script>
</body>
</html>