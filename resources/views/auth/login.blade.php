<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PerpusKita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-purple-50">
    <!-- Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
        <div class="absolute top-10 left-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 floating-element"></div>
        <div class="absolute bottom-10 right-10 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 floating-element" style="animation-delay: 2s"></div>
        <div class="absolute top-1/2 left-1/4 w-48 h-48 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-10 floating-element" style="animation-delay: 1s"></div>
    </div>
    
    <!-- Main Container -->
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-4xl mx-auto">
            <div class="login-card rounded-3xl overflow-hidden">
                <div class="grid md:grid-cols-2 min-h-[600px]">
                    <!-- Left Column - Form -->
                    <div class="p-8 md:p-10 flex flex-col">
                        <!-- Logo -->
                        <div class="flex items-center space-x-3 mb-8">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-book text-white text-xl"></i>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">PerpusKita</h1>
                                <p class="text-sm text-gray-600">Sistem Perpustakaan Digital</p>
                            </div>
                        </div>

                        <!-- Welcome Text -->
                        <div class="mb-8">
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Kembali! 👋</h2>
                            <p class="text-gray-600">Masuk untuk melanjutkan petualangan membaca Anda</p>
                        </div>

                        <!-- Messages -->
                        @if(session('error'))
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                                <p class="text-red-700 font-medium">{{ session('error') }}</p>
                            </div>
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle text-emerald-500 mr-3"></i>
                                <p class="text-emerald-700 font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="/login" class="space-y-6 flex-1 flex flex-col justify-between">
                            @csrf
                            
                            <div class="space-y-6">
                                <!-- Email Input -->
                                <div class="space-y-2">
                                    <label class="text-sm font-semibold text-gray-700">Email</label>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-envelope text-gray-400 group-hover:text-indigo-500 transition-colors"></i>
                                        </div>
                                        <input type="email" name="email" required
                                               class="w-full pl-10 pr-4 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 hover:border-indigo-300"
                                               placeholder="nama@email.com">
                                    </div>
                                </div>

                                <!-- Password Input -->
                                <div class="space-y-2">
                                    <div class="flex justify-between items-center">
                                        <label class="text-sm font-semibold text-gray-700">Password</label>
                                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                            Lupa password?
                                        </a>
                                    </div>
                                    <div class="relative group">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400 group-hover:text-indigo-500 transition-colors"></i>
                                        </div>
                                        <input type="password" name="password" required id="password"
                                               class="w-full pl-10 pr-12 py-3.5 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 hover:border-indigo-300"
                                               placeholder="Masukkan password">
                                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <i class="fas fa-eye text-gray-400 hover:text-indigo-500 transition-colors"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Remember Me -->
                                <div class="flex items-center">
                                    <input type="checkbox" id="remember" name="remember"
                                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="remember" class="ml-2 text-gray-700 font-medium">Ingat saya</label>
                                </div>
                            </div>

                            <!-- Login Button and Links -->
                            <div class="space-y-6">
                                <!-- Login Button -->
                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl active:scale-[0.98]">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke Dashboard
                                </button>

                                <!-- Divider -->
                                <div class="relative my-4">
                                    <div class="absolute inset-0 flex items-center">
                                        <div class="w-full border-t border-gray-200"></div>
                                    </div>
                                    <div class="relative flex justify-center text-sm">
                                        <span class="px-4 bg-white text-gray-500 font-medium">atau lanjutkan dengan</span>
                                    </div>
                                </div>

                                <!-- Social Login -->
                                <div class="grid grid-cols-2 gap-3">
                                    <button type="button"
                                            class="flex items-center justify-center py-3 px-4 border-2 border-gray-200 rounded-xl hover:border-gray-300 hover:bg-gray-50 transition duration-200">
                                        <i class="fab fa-google text-red-500 mr-2"></i>
                                        <span class="font-semibold">Google</span>
                                    </button>
                                    <button type="button"
                                            class="flex items-center justify-center py-3 px-4 border-2 border-gray-200 rounded-xl hover:border-gray-300 hover:bg-gray-50 transition duration-200">
                                        <i class="fab fa-microsoft text-blue-500 mr-2"></i>
                                        <span class="font-semibold">Microsoft</span>
                                    </button>
                                </div>

                                <!-- Register Link -->
                                <div class="text-center pt-4">
                                    <p class="text-gray-600">
                                        Belum punya akun?
                                        <a href="/register" class="text-indigo-600 hover:text-indigo-800 font-bold ml-2 group">
                                            Daftar sekarang
                                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Right Column - Illustration -->
                    <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-8 md:p-10 hidden md:flex flex-col justify-between">
                        <div class="flex-1 flex flex-col justify-center">
                            <!-- Book Illustration -->
                            <div class="text-center mb-10">
                                <div class="w-32 h-32 mx-auto bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-6 border-4 border-white/30">
                                    <i class="fas fa-book-reader text-white text-6xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-white mb-3">Jelajahi Dunia Buku</h3>
                                <p class="text-indigo-100">Akses ribuan buku digital kapan saja, di mana saja</p>
                            </div>

                            <!-- Features -->
                            <div class="space-y-6 max-w-md mx-auto">
                                <div class="flex items-center space-x-4 p-4 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20">
                                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-bolt text-indigo-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Akses Cepat</h4>
                                        <p class="text-indigo-100 text-sm">Pinjam buku dalam hitungan detik</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4 p-4 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20">
                                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-history text-indigo-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Riwayat Digital</h4>
                                        <p class="text-indigo-100 text-sm">Lacak semua peminjaman Anda</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-4 p-4 bg-white/10 backdrop-blur-sm rounded-xl border border-white/20">
                                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-bell text-indigo-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white">Notifikasi Real-time</h4>
                                        <p class="text-indigo-100 text-sm">Dapatkan update langsung</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="text-center text-indigo-100 pt-6 border-t border-white/20">
                            <p class="text-sm">© 2024 PerpusKita. Semua hak dilindungi.</p>
                            <div class="flex justify-center space-x-4 mt-2 text-xs">
                                <a href="#" class="hover:text-white transition-colors">Privacy</a>
                                <a href="#" class="hover:text-white transition-colors">Terms</a>
                                <a href="#" class="hover:text-white transition-colors">Help</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('#password + button i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.className = 'fas fa-eye-slash text-gray-400 hover:text-indigo-500 transition-colors';
            } else {
                passwordInput.type = 'password';
                eyeIcon.className = 'fas fa-eye text-gray-400 hover:text-indigo-500 transition-colors';
            }
        }

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = this.querySelector('input[name="email"]');
            const password = this.querySelector('input[name="password"]');
            
            if (!email.value || !password.value) {
                e.preventDefault();
                if (!email.value) {
                    email.classList.add('border-red-500');
                    email.focus();
                }
                if (!password.value) {
                    password.classList.add('border-red-500');
                    if (email.value) password.focus();
                }
            }
        });

        // Remove red border when user starts typing
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('border-red-500');
            });
        });
    </script>
</body>
</html>