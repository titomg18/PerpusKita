<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | PerpusKita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }
        .register-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }
        .password-strength {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s ease;
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
<body class="bg-gradient-to-br from-indigo-50 to-purple-50 py-8">
    <div class="absolute top-10 left-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 floating-element"></div>
    <div class="absolute bottom-10 right-10 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 floating-element" style="animation-delay: 2s"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-2xl w-full mx-auto">
            <div class="register-card rounded-3xl overflow-hidden">
                <!-- Header dengan gradient ungu -->
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-8 text-center relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-full opacity-10">
                        <div class="absolute top-10 left-10 w-40 h-40 bg-white rounded-full"></div>
                        <div class="absolute bottom-10 right-10 w-60 h-60 bg-white rounded-full"></div>
                    </div>
                    <div class="relative">
                        <div class="flex justify-center mb-6">
                            <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center border-4 border-white/30">
                                <i class="fas fa-user-plus text-white text-5xl"></i>
                            </div>
                        </div>
                        <h1 class="text-4xl font-bold text-white mb-3">Bergabung dengan Kami</h1>
                        <p class="text-purple-100 font-medium text-lg">Mulai petualangan membaca Anda hari ini</p>
                    </div>
                </div>
                
                <!-- Form Register -->
                <div class="p-8">
                    @if ($errors->any())
                    <div class="mb-8 bg-red-50 border border-red-200 rounded-xl p-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-red-500 text-2xl mt-1 mr-4"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-red-800 text-lg mb-3">Perlu Perbaikan</h3>
                                <ul class="list-disc list-inside text-red-700 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    <form method="POST" action="/register" id="registerForm">
                        @csrf
                        
                        <!-- Semua field sekarang dalam satu kolom -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-3" for="name">
                                    <i class="fas fa-user mr-2 text-indigo-500"></i>Nama Lengkap
                                </label>
                                <div class="relative group">
                                    <input type="text" name="name" id="name" required
                                           class="w-full px-5 py-4 pl-14 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 group-hover:border-indigo-300"
                                           placeholder="Nama lengkap Anda">
                                    <div class="absolute left-5 top-4 text-gray-400 group-hover:text-indigo-500 transition-colors">
                                        <i class="fas fa-id-card text-lg"></i>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-3" for="email">
                                    <i class="fas fa-envelope mr-2 text-indigo-500"></i>Email
                                </label>
                                <div class="relative group">
                                    <input type="email" name="email" id="email" required
                                           class="w-full px-5 py-4 pl-14 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 group-hover:border-indigo-300"
                                           placeholder="email@example.com">
                                    <div class="absolute left-5 top-4 text-gray-400 group-hover:text-indigo-500 transition-colors">
                                        <i class="fas fa-at text-lg"></i>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-3" for="password">
                                    <i class="fas fa-lock mr-2 text-indigo-500"></i>Password
                                </label>
                                <div class="relative group">
                                    <input type="password" name="password" id="password" required
                                           class="w-full px-5 py-4 pl-14 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 group-hover:border-indigo-300"
                                           placeholder="Minimal 8 karakter"
                                           onkeyup="checkPasswordStrength()">
                                    <div class="absolute left-5 top-4 text-gray-400 group-hover:text-indigo-500 transition-colors">
                                        <i class="fas fa-key text-lg"></i>
                                    </div>
                                    <button type="button" class="absolute right-5 top-4 text-gray-400 hover:text-indigo-500" onclick="togglePassword('password')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <div class="flex justify-between mb-1">
                                        <span class="text-sm font-medium text-gray-600">Kekuatan password</span>
                                        <span class="text-sm font-medium text-gray-600" id="strengthText">Lemah</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div id="passwordStrength" class="password-strength bg-red-500 rounded-full h-2" style="width: 25%"></div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-semibold mb-3" for="password_confirmation">
                                    <i class="fas fa-lock mr-2 text-indigo-500"></i>Konfirmasi Password
                                </label>
                                <div class="relative group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" required
                                           class="w-full px-5 py-4 pl-14 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 group-hover:border-indigo-300"
                                           placeholder="Ketik ulang password">
                                    <div class="absolute left-5 top-4 text-gray-400 group-hover:text-indigo-500 transition-colors">
                                        <i class="fas fa-check-circle text-lg"></i>
                                    </div>
                                    <button type="button" class="absolute right-5 top-4 text-gray-400 hover:text-indigo-500" onclick="togglePassword('password_confirmation')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="mt-2" id="passwordMatch"></div>
                            </div>
                        </div>

                        <div class="mt-8 space-y-6">
                            <div class="flex items-start">
                                <input type="checkbox" id="terms" name="terms" required
                                       class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded-lg mt-1">
                                <label for="terms" class="ml-3 text-gray-700">
                                    Saya menyetujui 
                                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-semibold">Syarat & Ketentuan</a>
                                    dan 
                                    <a href="#" class="text-indigo-600 hover:text-indigo-800 font-semibold">Kebijakan Privasi</a>
                                    dari PerpusKita
                                </label>
                            </div>

                            <div class="flex items-start">
                                <input type="checkbox" id="newsletter" name="newsletter"
                                       class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded-lg mt-1">
                                <label for="newsletter" class="ml-3 text-gray-700">
                                    Saya ingin menerima newsletter dan update terbaru dari PerpusKita
                                </label>
                            </div>

                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl active:scale-95">
                                <i class="fas fa-user-plus mr-3"></i>Buat Akun Sekarang
                            </button>

                            <div class="text-center">
                                <p class="text-gray-600 font-medium">
                                    Sudah punya akun?
                                    <a href="/login" class="text-indigo-600 hover:text-indigo-800 font-bold ml-2 group">
                                        Masuk di sini
                                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </form>
                    <!-- Bagian Keuntungan Bergabung telah dihapus -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const eyeIcon = document.querySelector(`#${fieldId} + button i`);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.className = 'fas fa-eye-slash text-gray-400 hover:text-indigo-500 transition-colors';
            } else {
                passwordInput.type = 'password';
                eyeIcon.className = 'fas fa-eye text-gray-400 hover:text-indigo-500 transition-colors';
            }
        }

        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('passwordStrength');
            const strengthText = document.getElementById('strengthText');
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchDiv = document.getElementById('passwordMatch');
            
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            if (password.length > 0) {
                if (confirmPassword.length > 0) {
                    if (password === confirmPassword) {
                        matchDiv.innerHTML = '<p class="text-green-600 text-sm font-medium"><i class="fas fa-check-circle mr-1"></i>Password cocok</p>';
                    } else {
                        matchDiv.innerHTML = '<p class="text-red-600 text-sm font-medium"><i class="fas fa-times-circle mr-1"></i>Password tidak cocok</p>';
                    }
                }
            } else {
                matchDiv.innerHTML = '';
            }
            
            switch(strength) {
                case 0:
                    strengthBar.style.width = '0%';
                    strengthBar.className = 'password-strength bg-gray-300 rounded-full h-2';
                    strengthText.textContent = 'Masukkan password';
                    strengthText.className = 'text-sm font-medium text-gray-600';
                    break;
                case 1:
                    strengthBar.style.width = '25%';
                    strengthBar.className = 'password-strength bg-red-500 rounded-full h-2';
                    strengthText.textContent = 'Lemah';
                    strengthText.className = 'text-sm font-medium text-red-600';
                    break;
                case 2:
                    strengthBar.style.width = '50%';
                    strengthBar.className = 'password-strength bg-yellow-500 rounded-full h-2';
                    strengthText.textContent = 'Cukup';
                    strengthText.className = 'text-sm font-medium text-yellow-600';
                    break;
                case 3:
                    strengthBar.style.width = '75%';
                    strengthBar.className = 'password-strength bg-blue-500 rounded-full h-2';
                    strengthText.textContent = 'Baik';
                    strengthText.className = 'text-sm font-medium text-blue-600';
                    break;
                case 4:
                    strengthBar.style.width = '100%';
                    strengthBar.className = 'password-strength bg-green-500 rounded-full h-2';
                    strengthText.textContent = 'Sangat Baik';
                    strengthText.className = 'text-sm font-medium text-green-600';
                    break;
            }
        }
    </script>
</body>
</html>