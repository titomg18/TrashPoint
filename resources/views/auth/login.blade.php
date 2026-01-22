<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TrashPoint</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .logo-color {
            color: #10b981;
        }
        .btn-primary {
            background: linear-gradient(to right, #10b981, #34d399);
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #0da271, #2bb184);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-r from-green-50 to-emerald-50"></div>
    
    <div class="w-full max-w-md z-10">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-br from-emerald-500 to-green-600 text-white mb-4 shadow-lg">
                <i class="fas fa-recycle text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Trash<span class="logo-color">Point</span></h1>
            <p class="text-gray-600 mt-2">Sistem Pengelolaan Bank Sampah Digital</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Masuk ke Akun Anda</h2>

            <!-- Pesan error -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">{{ $errors->first() }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Pesan sukses -->
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <!-- Email Input -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="email">
                        <i class="fas fa-envelope mr-2 text-emerald-600"></i>Alamat Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" required 
                               class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200"
                               placeholder="nama@email.com">
                    </div>
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-medium mb-2" for="password">
                        <i class="fas fa-lock mr-2 text-emerald-600"></i>Kata Sandi
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-key text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" required 
                               class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200"
                               placeholder="••••••••">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <button type="button" id="togglePassword" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Ingat saya
                        </label>
                    </div>
                    <a href="#" class="text-sm font-medium text-emerald-600 hover:text-emerald-500 transition duration-200">
                        Lupa kata sandi?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full btn-primary text-white font-semibold py-3 px-4 rounded-lg hover:shadow-lg transition duration-200 transform hover:-translate-y-0.5">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </button>
            </form>

            <!-- Divider -->
            <div class="mt-8 mb-6 flex items-center">
                <div class="flex-1 border-t border-gray-300"></div>
                <div class="px-4 text-gray-500 text-sm">atau</div>
                <div class="flex-1 border-t border-gray-300"></div>
            </div>

            <!-- Register Link -->
            <div class="text-center">
                <p class="text-gray-600">
                    Belum punya akun?
                    <a href="{{ url('/register') }}" class="font-semibold text-emerald-600 hover:text-emerald-500 transition duration-200">
                        Daftar Sekarang
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-gray-500 text-sm">
                &copy; 2023 TrashPoint. Seluruh hak cipta dilindungi.
            </p>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle eye icon
            const eyeIcon = this.querySelector('i');
            if (type === 'text') {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>