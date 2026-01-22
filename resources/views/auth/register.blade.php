<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TrashPoint</title>
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
        .password-strength {
            height: 4px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-r from-green-50 to-emerald-50"></div>
    
    <div class="w-full max-w-lg z-10">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-br from-emerald-500 to-green-600 text-white mb-4 shadow-lg">
                <i class="fas fa-recycle text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Trash<span class="logo-color">Point</span></h1>
            <p class="text-gray-600 mt-2">Bergabung dengan komunitas pengelolaan sampah</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Buat Akun Baru</h2>

            <!-- Error validasi -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan dalam pengisian form</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ url('/register') }}" id="registerForm">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Input -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="name">
                            <i class="fas fa-user mr-2 text-emerald-600"></i>Nama Lengkap
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-id-card text-gray-400"></i>
                            </div>
                            <input type="text" id="name" name="name" required 
                                   class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200"
                                   placeholder="Nama lengkap">
                        </div>
                    </div>

                    <!-- Email Input -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="email">
                            <i class="fas fa-envelope mr-2 text-emerald-600"></i>Alamat Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-at text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" required 
                                   class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200"
                                   placeholder="nama@email.com">
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="mb-4">
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
                        
                        <!-- Password strength indicator -->
                        <div class="mt-2">
                            <div class="flex justify-between mb-1">
                                <span class="text-xs text-gray-500">Kekuatan kata sandi</span>
                                <span id="password-strength-text" class="text-xs font-medium"></span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div id="password-strength-bar" class="password-strength h-1.5 rounded-full bg-red-500 w-0"></div>
                            </div>
                        </div>
                        
                        <ul class="mt-2 text-xs text-gray-500 space-y-1">
                            <li id="length-check" class="flex items-center">
                                <i class="fas fa-times text-red-500 mr-1 w-4"></i> Minimal 8 karakter
                            </li>
                            <li id="uppercase-check" class="flex items-center">
                                <i class="fas fa-times text-red-500 mr-1 w-4"></i> Mengandung huruf besar
                            </li>
                            <li id="number-check" class="flex items-center">
                                <i class="fas fa-times text-red-500 mr-1 w-4"></i> Mengandung angka
                            </li>
                        </ul>
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-medium mb-2" for="password_confirmation">
                            <i class="fas fa-lock mr-2 text-emerald-600"></i>Konfirmasi Kata Sandi
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-key text-gray-400"></i>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation" required 
                                   class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition duration-200"
                                   placeholder="••••••••">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="toggleConfirmPassword" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div id="password-match" class="mt-2 text-xs"></div>
                    </div>
                </div>

                <!-- Terms & Conditions -->
                <div class="mb-6">
                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required 
                               class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            Saya menyetujui 
                            <a href="#" class="text-emerald-600 hover:text-emerald-500 font-medium">syarat dan ketentuan</a>
                            serta 
                            <a href="#" class="text-emerald-600 hover:text-emerald-500 font-medium">kebijakan privasi</a>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="submitBtn"
                        class="w-full btn-primary text-white font-semibold py-3 px-4 rounded-lg hover:shadow-lg transition duration-200 transform hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:transform-none">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                </button>
            </form>

            <!-- Divider -->
            <div class="mt-8 mb-6 flex items-center">
                <div class="flex-1 border-t border-gray-300"></div>
                <div class="px-4 text-gray-500 text-sm">Sudah punya akun?</div>
                <div class="flex-1 border-t border-gray-300"></div>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <a href="{{ url('/login') }}" class="inline-flex items-center font-semibold text-emerald-600 hover:text-emerald-500 transition duration-200">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke Akun
                </a>
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
            
            const eyeIcon = this.querySelector('i');
            if (type === 'text') {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
        
        // Toggle confirm password visibility
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password_confirmation');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            const eyeIcon = this.querySelector('i');
            if (type === 'text') {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
        
        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('password-strength-bar');
            const strengthText = document.getElementById('password-strength-text');
            const lengthCheck = document.getElementById('length-check');
            const uppercaseCheck = document.getElementById('uppercase-check');
            const numberCheck = document.getElementById('number-check');
            
            let strength = 0;
            let criteriaMet = 0;
            
            // Check length
            if (password.length >= 8) {
                strength += 25;
                criteriaMet++;
                lengthCheck.innerHTML = '<i class="fas fa-check text-green-500 mr-1 w-4"></i> Minimal 8 karakter';
            } else {
                lengthCheck.innerHTML = '<i class="fas fa-times text-red-500 mr-1 w-4"></i> Minimal 8 karakter';
            }
            
            // Check uppercase
            if (/[A-Z]/.test(password)) {
                strength += 25;
                criteriaMet++;
                uppercaseCheck.innerHTML = '<i class="fas fa-check text-green-500 mr-1 w-4"></i> Mengandung huruf besar';
            } else {
                uppercaseCheck.innerHTML = '<i class="fas fa-times text-red-500 mr-1 w-4"></i> Mengandung huruf besar';
            }
            
            // Check number
            if (/[0-9]/.test(password)) {
                strength += 25;
                criteriaMet++;
                numberCheck.innerHTML = '<i class="fas fa-check text-green-500 mr-1 w-4"></i> Mengandung angka';
            } else {
                numberCheck.innerHTML = '<i class="fas fa-times text-red-500 mr-1 w-4"></i> Mengandung angka';
            }
            
            // Check special character
            if (/[^A-Za-z0-9]/.test(password)) {
                strength += 25;
                criteriaMet++;
            }
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            
            // Update strength text and color
            if (password.length === 0) {
                strengthBar.style.backgroundColor = '#ef4444';
                strengthText.textContent = '';
                strengthBar.style.width = '0%';
            } else if (strength < 50) {
                strengthBar.style.backgroundColor = '#ef4444';
                strengthText.textContent = 'Lemah';
                strengthText.className = 'text-xs font-medium text-red-500';
            } else if (strength < 75) {
                strengthBar.style.backgroundColor = '#f59e0b';
                strengthText.textContent = 'Cukup';
                strengthText.className = 'text-xs font-medium text-yellow-500';
            } else {
                strengthBar.style.backgroundColor = '#10b981';
                strengthText.textContent = 'Kuat';
                strengthText.className = 'text-xs font-medium text-green-500';
            }
            
            // Check password match
            checkPasswordMatch();
        });
        
        // Check password match
        document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);
        
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchDiv = document.getElementById('password-match');
            const submitBtn = document.getElementById('submitBtn');
            
            if (confirmPassword.length === 0) {
                matchDiv.textContent = '';
                matchDiv.className = 'mt-2 text-xs';
                submitBtn.disabled = true;
            } else if (password === confirmPassword) {
                matchDiv.innerHTML = '<i class="fas fa-check text-green-500 mr-1"></i> Kata sandi cocok';
                matchDiv.className = 'mt-2 text-xs text-green-600';
                submitBtn.disabled = false;
            } else {
                matchDiv.innerHTML = '<i class="fas fa-times text-red-500 mr-1"></i> Kata sandi tidak cocok';
                matchDiv.className = 'mt-2 text-xs text-red-600';
                submitBtn.disabled = true;
            }
        }
    </script>
</body>
</html>