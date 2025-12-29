<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Buku | Admin PerpusKita</title>
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
                    
                    <a href="{{ route('admin.books.index') }}" class="flex items-center space-x-3 p-4 bg-white/20 backdrop-blur-sm rounded-xl border border-white/30">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-book text-indigo-600"></i>
                        </div>
                        <span class="font-semibold text-white">Buku</span>
                        <span class="ml-auto px-2 py-1 bg-blue-400 text-xs rounded-full">{{ $totalBooks ?? 0 }}</span>
                    </a>
                    
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 p-4 hover:bg-white/15 rounded-xl transition-all duration-200 group">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-tags text-white"></i>
                        </div>
                        <span class="text-white/90">Kategori</span>
                        <span class="ml-auto px-2 py-1 bg-green-400 text-xs rounded-full">{{ App\Models\Category::count() }}</span>
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
                    <form action="{{ route('logout') }}" method="POST">
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
                                   placeholder="Cari buku, pengarang, atau kategori..."
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
                            <div class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-full font-medium">
                                <i class="fas fa-book mr-1"></i> {{ $totalBooks ?? 0 }} Buku
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
                <!-- Mobile sidebar content (sama dengan desktop) -->
                <div class="h-full flex flex-col">
                    <!-- Logo, Profile, Navigation sama dengan desktop -->
                    <!-- ... -->
                </div>
            </aside>

            <!-- Content Area -->
            <div class="p-6">
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Manajemen Buku</h1>
                        <p class="text-gray-600">Kelola koleksi buku di perpustakaan Anda</p>
                    </div>
                    
                    <div class="mt-4 md:mt-0 flex space-x-3">
                        <button onclick="openBookModal()" class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-xl hover:from-blue-600 hover:to-blue-700 hover-lift flex items-center">
                            <i class="fas fa-plus mr-2"></i> Tambah Buku
                        </button>
                        <button onclick="exportBooks()" class="px-5 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 hover-lift flex items-center">
                            <i class="fas fa-file-export mr-2"></i> Export
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

                <!-- Books Table -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                    <!-- Table Header -->
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Daftar Buku</h3>
                                <p class="text-gray-600 text-sm mt-1">Total {{ $books->total() }} buku ditemukan</p>
                            </div>
                            <div class="mt-4 md:mt-0 flex space-x-3">
                                <select id="categoryFilter" class="px-4 py-2 border border-gray-300 rounded-xl">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories ?? [] as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <select id="stockFilter" class="px-4 py-2 border border-gray-300 rounded-xl">
                                    <option value="">Semua Stok</option>
                                    <option value="available">Tersedia</option>
                                    <option value="low">Stok Sedikit</option>
                                    <option value="out">Habis</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @if($books->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">No</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Judul Buku</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Penulis</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Kategori</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Penerbit</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Tahun</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Stok</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Status</th>
                                    <th class="py-4 px-6 text-left font-semibold text-gray-900">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($books as $book)
                                <tr class="hover:bg-gray-50 transition-colors" 
                                    data-id="{{ $book->id }}"
                                    data-title="{{ $book->title }}"
                                    data-author="{{ $book->author }}"
                                    data-publisher="{{ $book->publisher }}"
                                    data-year="{{ $book->year }}"
                                    data-stock="{{ $book->stock }}"
                                    data-category="{{ $book->category_id }}">
                                    <td class="py-4 px-6">
                                        <div class="text-gray-700">{{ $loop->iteration + ($books->currentPage() - 1) * $books->perPage() }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="font-medium text-gray-900">{{ $book->title }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="text-gray-700">{{ $book->author }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full">
                                            {{ $book->category->name ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="text-gray-700">{{ $book->publisher }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="text-gray-700">{{ $book->year }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="text-gray-700 font-medium">{{ $book->stock }}</div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full {{ $book->stock_status_color }}">
                                            {{ $book->stock_status }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <button onclick="editBook({{ $book->id }}, '{{ addslashes($book->title) }}', '{{ addslashes($book->author) }}', '{{ addslashes($book->publisher) }}', {{ $book->year }}, {{ $book->stock }}, {{ $book->category_id }})" 
                                                    class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100">
                                                <i class="fas fa-edit text-sm"></i>
                                            </button>
                                            <button onclick="confirmDelete({{ $book->id }}, '{{ addslashes($book->title) }}')" 
                                                    class="w-8 h-8 flex items-center justify-center bg-red-50 text-red-600 rounded-lg hover:bg-red-100">
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
                                Menampilkan {{ $books->firstItem() }} - {{ $books->lastItem() }} dari {{ $books->total() }} buku
                            </div>
                            <div>
                                <!-- Custom Pagination -->
                                @if ($books->hasPages())
                                <div class="flex items-center space-x-2">
                                    {{-- Previous Page Link --}}
                                    @if ($books->onFirstPage())
                                        <span class="px-3 py-2 border border-gray-300 rounded-lg text-gray-400 cursor-not-allowed">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                    @else
                                        <a href="{{ $books->previousPageUrl() }}" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
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
                                                @if ($page == $books->currentPage())
                                                    <span class="px-3 py-2 bg-blue-600 text-white rounded-lg font-medium">{{ $page }}</span>
                                                @else
                                                    <a href="{{ $url }}" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">{{ $page }}</a>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($books->hasMorePages())
                                        <a href="{{ $books->nextPageUrl() }}" class="px-3 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
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
                            <i class="fas fa-book text-gray-400 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Buku</h3>
                        <p class="text-gray-600 mb-6">Mulai dengan menambahkan buku pertama Anda</p>
                        <button onclick="openBookModal()" class="px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-xl hover:from-blue-600 hover:to-blue-700 hover-lift inline-flex items-center">
                            <i class="fas fa-plus mr-2"></i> Tambah Buku Pertama
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Tambah/Edit Buku -->
    <div id="bookModal" class="fixed inset-0 z-50 hidden">
        <div class="modal-overlay absolute inset-0" onclick="closeBookModal()"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="modal-content bg-white rounded-2xl shadow-xl w-full max-w-md fade-in">
                <div class="p-6">
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 id="modalTitle" class="text-xl font-bold text-gray-900">Tambah Buku Baru</h3>
                        <button onclick="closeBookModal()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <!-- Form -->
                    <form id="bookForm" method="POST">
                        @csrf
                        <div id="formMethod" style="display: none;"></div>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="modalTitleInput" class="block text-sm font-medium text-gray-700 mb-2">
                                    Judul Buku <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="modalTitleInput"
                                       name="title"
                                       required
                                       class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Judul buku">
                            </div>
                            
                            <div>
                                <label for="modalAuthor" class="block text-sm font-medium text-gray-700 mb-2">
                                    Penulis <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       id="modalAuthor"
                                       name="author"
                                       required
                                       class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Nama penulis">
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="modalPublisher" class="block text-sm font-medium text-gray-700 mb-2">
                                        Penerbit <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           id="modalPublisher"
                                           name="publisher"
                                           required
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Nama penerbit">
                                </div>
                                
                                <div>
                                    <label for="modalYear" class="block text-sm font-medium text-gray-700 mb-2">
                                        Tahun <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" 
                                           id="modalYear"
                                           name="year"
                                           required
                                           min="1900"
                                           max="{{ date('Y') }}"
                                           class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="{{ date('Y') }}">
                                </div>
                            </div>
                            
                            <div>
                                <label for="modalCategory" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kategori <span class="text-red-500">*</span>
                                </label>
                                <select id="modalCategory"
                                        name="category_id"
                                        required
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories ?? [] as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label for="modalStock" class="block text-sm font-medium text-gray-700 mb-2">
                                    Stok <span class="text-red-500">*</span>
                                </label>
                                <input type="number" 
                                       id="modalStock"
                                       name="stock"
                                       required
                                       min="0"
                                       class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Jumlah stok">
                                <p class="mt-1 text-sm text-gray-500">Masukkan 0 jika buku habis</p>
                            </div>
                        </div>
                        
                        <div class="mt-8 flex space-x-3">
                            <button type="button" onclick="closeBookModal()" class="flex-1 px-5 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50">
                                Batal
                            </button>
                            <button type="submit" class="flex-1 px-5 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-xl hover:from-blue-600 hover:to-blue-700">
                                <span id="submitButtonText">Simpan Buku</span>
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
        let currentBookId = null;

        function openBookModal() {
            currentBookId = null;
            document.getElementById('modalTitle').textContent = 'Tambah Buku Baru';
            document.getElementById('submitButtonText').textContent = 'Simpan Buku';
            
            // Reset form fields
            document.getElementById('modalTitleInput').value = '';
            document.getElementById('modalAuthor').value = '';
            document.getElementById('modalPublisher').value = '';
            document.getElementById('modalYear').value = '';
            document.getElementById('modalCategory').value = '';
            document.getElementById('modalStock').value = '';
            
            // Set form action untuk create
            const form = document.getElementById('bookForm');
            form.action = '{{ route("admin.books.store") }}';
            form.method = 'POST';
            
            // Reset hidden method field
            document.getElementById('formMethod').innerHTML = '';
            
            document.getElementById('bookModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function editBook(id, title, author, publisher, year, stock, categoryId) {
            currentBookId = id;
            document.getElementById('modalTitle').textContent = 'Edit Buku';
            document.getElementById('submitButtonText').textContent = 'Perbarui Buku';
            
            // Set form values
            document.getElementById('modalTitleInput').value = title;
            document.getElementById('modalAuthor').value = author;
            document.getElementById('modalPublisher').value = publisher;
            document.getElementById('modalYear').value = year;
            document.getElementById('modalCategory').value = categoryId;
            document.getElementById('modalStock').value = stock;
            
            // Set form action untuk update
            const form = document.getElementById('bookForm');
            form.action = `/admin/books/${id}`;
            form.method = 'POST';
            
            // Tambahkan method field untuk PUT
            document.getElementById('formMethod').innerHTML = '<input type="hidden" name="_method" value="PUT">';
            
            document.getElementById('bookModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeBookModal() {
            document.getElementById('bookModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Confirm delete
        function confirmDelete(id, title) {
            Swal.fire({
                title: 'Hapus Buku?',
                html: `Apakah Anda yakin ingin menghapus buku <strong>"${title}"</strong>?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('deleteForm');
                    form.action = `/admin/books/${id}`;
                    form.submit();
                }
            });
        }

        // Search functionality
        document.getElementById('searchInput')?.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const searchTerm = this.value;
                if (searchTerm) {
                    window.location.href = `{{ route('admin.books.index') }}?search=${encodeURIComponent(searchTerm)}`;
                }
            }
        });

        // Filter functionality
        document.getElementById('categoryFilter')?.addEventListener('change', function() {
            const categoryId = this.value;
            const stockFilter = document.getElementById('stockFilter').value;
            applyFilters(categoryId, stockFilter);
        });

        document.getElementById('stockFilter')?.addEventListener('change', function() {
            const stockFilter = this.value;
            const categoryId = document.getElementById('categoryFilter').value;
            applyFilters(categoryId, stockFilter);
        });

        function applyFilters(categoryId, stockFilter) {
            let url = '{{ route("admin.books.index") }}';
            const params = new URLSearchParams();
            
            if (categoryId) params.append('category', categoryId);
            if (stockFilter) params.append('stock', stockFilter);
            
            if (params.toString()) {
                url += '?' + params.toString();
            }
            
            window.location.href = url;
        }

        // Export books
        function exportBooks() {
            Swal.fire({
                title: 'Export Data Buku',
                text: 'Pilih format export yang diinginkan:',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Excel',
                denyButtonText: 'PDF',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route("admin.books.index") }}?export=excel';
                } else if (result.isDenied) {
                    window.location.href = '{{ route("admin.books.index") }}?export=pdf';
                }
            });
        }

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeBookModal();
            }
        });

        // Form validation
        document.getElementById('bookForm').addEventListener('submit', function(e) {
            const yearInput = document.getElementById('modalYear');
            const currentYear = new Date().getFullYear();
            
            if (yearInput.value < 1900 || yearInput.value > currentYear) {
                e.preventDefault();
                yearInput.classList.add('border-red-500');
                yearInput.focus();
                
                Swal.fire({
                    icon: 'error',
                    title: 'Tahun tidak valid',
                    text: `Tahun harus antara 1900 dan ${currentYear}`
                });
            }
        });

        // Remove error when typing
        document.getElementById('modalYear').addEventListener('input', function() {
            this.classList.remove('border-red-500');
        });
    </script>
</body>
</html>