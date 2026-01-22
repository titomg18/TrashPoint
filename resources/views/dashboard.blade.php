<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TrashPoint</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
        }
        .sidebar {
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -100%;
                z-index: 50;
            }
            .sidebar.active {
                left: 0;
            }
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 40;
            }
            .overlay.active {
                display: block;
            }
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
        .stats-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .nav-link.active {
            background-color: #d1fae5;
            color: #047857;
        }
        .content-page {
            display: none;
        }
        .content-page.active {
            display: block;
        }
        .page-title {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Mobile overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Sidebar -->
    <div class="sidebar bg-white w-64 min-h-screen shadow-lg fixed md:relative z-30" id="sidebar">
        <!-- Logo -->
        <div class="p-6 border-b">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-500 to-green-600 text-white flex items-center justify-center mr-3">
                    <i class="fas fa-recycle"></i>
                </div>
                <h1 class="text-xl font-bold text-gray-800">Trash<span class="logo-color">Point</span></h1>
            </div>
            <p class="text-sm text-gray-600 mt-2">Mari berusaha sama menuju lingkungan yang bersih dan sehat</p>
        </div>

        <!-- User Profile -->
        <div class="p-6 border-b">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-400 to-green-500 text-white flex items-center justify-center text-lg font-bold">
                    T
                </div>
                <div class="ml-4">
                    <h2 class="font-semibold text-gray-800">tito</h2>
                    <div class="flex items-center">
                        <span class="px-2 py-1 text-xs bg-emerald-100 text-emerald-800 rounded-full">Pengguna</span>
                        <span class="ml-2 text-xs text-gray-500">Member</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="#" data-page="dashboard" class="flex items-center p-3 rounded-lg nav-link active">
                        <i class="fas fa-home mr-3 text-emerald-600"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-page="setor-sampah" class="flex items-center p-3 rounded-lg nav-link hover:bg-emerald-50 hover:text-emerald-700 transition duration-200">
                        <i class="fas fa-trash-alt mr-3 text-gray-500"></i>
                        <span>Setor Sampah</span>
                        <span class="ml-auto bg-emerald-100 text-emerald-800 text-xs px-2 py-1 rounded-full">Baru</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-page="poin-saya" class="flex items-center p-3 rounded-lg nav-link hover:bg-emerald-50 hover:text-emerald-700 transition duration-200">
                        <i class="fas fa-coins mr-3 text-gray-500"></i>
                        <span>Poin Saya</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-page="riwayat-transaksi" class="flex items-center p-3 rounded-lg nav-link hover:bg-emerald-50 hover:text-emerald-700 transition duration-200">
                        <i class="fas fa-history mr-3 text-gray-500"></i>
                        <span>Riwayat Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-page="laporan-bulanan" class="flex items-center p-3 rounded-lg nav-link hover:bg-emerald-50 hover:text-emerald-700 transition duration-200">
                        <i class="fas fa-chart-bar mr-3 text-gray-500"></i>
                        <span>Laporan Bulanan</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-page="tukar-poin" class="flex items-center p-3 rounded-lg nav-link hover:bg-emerald-50 hover:text-emerald-700 transition duration-200">
                        <i class="fas fa-exchange-alt mr-3 text-gray-500"></i>
                        <span>Tukar Poin</span>
                    </a>
                </li>
                <li>
                    <a href="#" data-page="profil-saya" class="flex items-center p-3 rounded-lg nav-link hover:bg-emerald-50 hover:text-emerald-700 transition duration-200">
                        <i class="fas fa-user-circle mr-3 text-gray-500"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>
                <li class="pt-8 border-t mt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center p-3 rounded-lg w-full text-left hover:bg-red-50 hover:text-red-700 transition duration-200">
                            <i class="fas fa-sign-out-alt mr-3 text-gray-500"></i>
                            <span>Keluar</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="md:ml-64">
        <!-- Header -->
        <header class="bg-white shadow-sm py-4 px-6 sticky top-0 z-20">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <button id="menuToggle" class="md:hidden text-gray-700 mr-4">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 id="pageTitle" class="text-xl font-semibold text-gray-800 page-title">Dashboard</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-600 hover:text-emerald-600 transition duration-200">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    
                    <!-- Quick Actions -->
                    <button id="quickSetorSampah" class="btn-primary text-white px-4 py-2 rounded-lg font-medium flex items-center">
                        <i class="fas fa-plus mr-2"></i> Setor Sampah
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="p-6">
            <!-- Dashboard Page -->
            <div id="dashboard" class="content-page active">
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-emerald-500 to-green-600 rounded-2xl p-6 text-white mb-8 shadow-lg">
                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold">Selamat datang, tito!</h3>
                            <p class="mt-2 opacity-90">Mari berusaha sama menuju lingkungan yang bersih dan sehat dengan mengelola sampah dengan bijak</p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <div class="flex items-center bg-white bg-opacity-20 rounded-lg px-4 py-2">
                                <i class="fas fa-recycle text-2xl mr-3"></i>
                                <div>
                                    <p class="text-sm opacity-90">Total sampah disetor</p>
                                    <p class="text-xl font-bold">245.5 kg</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Poin Card -->
                    <div class="stats-card bg-white rounded-xl p-6 shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Poin</p>
                                <p class="text-3xl font-bold text-gray-800 mt-1">1,850</p>
                            </div>
                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-500 text-white flex items-center justify-center">
                                <i class="fas fa-coins text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-green-600">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span class="text-sm font-medium">+125 poin (30 hari terakhir)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Sampah Card -->
                    <div class="stats-card bg-white rounded-xl p-6 shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Sampah Disetor</p>
                                <p class="text-3xl font-bold text-gray-800 mt-1">45.5 kg</p>
                            </div>
                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-emerald-400 to-green-500 text-white flex items-center justify-center">
                                <i class="fas fa-trash-alt text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-green-600">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span class="text-sm font-medium">+12.3 kg (bulan ini)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Transaksi Card -->
                    <div class="stats-card bg-white rounded-xl p-6 shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Total Transaksi</p>
                                <p class="text-3xl font-bold text-gray-800 mt-1">24</p>
                            </div>
                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-400 to-blue-500 text-white flex items-center justify-center">
                                <i class="fas fa-exchange-alt text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-green-600">
                                <i class="fas fa-arrow-up mr-1"></i>
                                <span class="text-sm font-medium">+3 transaksi (bulan ini)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tukar Poin Card -->
                    <div class="stats-card bg-white rounded-xl p-6 shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Poin Ditukar</p>
                                <p class="text-3xl font-bold text-gray-800 mt-1">650</p>
                            </div>
                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-purple-400 to-purple-500 text-white flex items-center justify-center">
                                <i class="fas fa-gift text-2xl"></i>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-blue-600">
                                <i class="fas fa-sync-alt mr-1"></i>
                                <span class="text-sm font-medium">Tukarkan poin Anda</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts and Recent Activity -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Chart Section -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Statistik Sampah (6 bulan terakhir)</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-emerald-100 text-emerald-800 rounded-lg">Kg</button>
                                <button class="px-3 py-1 text-sm bg-gray-100 text-gray-800 rounded-lg">Poin</button>
                            </div>
                        </div>
                        <div class="h-80">
                            <canvas id="wasteChart"></canvas>
                        </div>
                    </div>

                    <!-- Recent Transactions -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Transaksi Terbaru</h3>
                            <a href="#" class="text-emerald-600 hover:text-emerald-700 font-medium text-sm flex items-center">
                                Lihat semua <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </a>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Transaction Item -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center mr-3">
                                        <i class="fas fa-trash-alt"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Setor Sampah Plastik</p>
                                        <p class="text-sm text-gray-500">12 Nov 2023, 14:30</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-emerald-700">+85 Poin</p>
                                    <p class="text-sm text-gray-500">5.2 kg</p>
                                </div>
                            </div>

                            <!-- Transaction Item -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center mr-3">
                                        <i class="fas fa-exchange-alt"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Tukar Poin - Voucher</p>
                                        <p class="text-sm text-gray-500">10 Nov 2023, 09:15</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-red-600">-200 Poin</p>
                                    <p class="text-sm text-gray-500">Voucher Belanja</p>
                                </div>
                            </div>

                            <!-- Transaction Item -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center mr-3">
                                        <i class="fas fa-trash-alt"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Setor Sampah Kertas</p>
                                        <p class="text-sm text-gray-500">5 Nov 2023, 16:45</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-emerald-700">+40 Poin</p>
                                    <p class="text-sm text-gray-500">3.8 kg</p>
                                </div>
                            </div>

                            <!-- Transaction Item -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-800 flex items-center justify-center mr-3">
                                        <i class="fas fa-gift"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Bonus Loyalitas</p>
                                        <p class="text-sm text-gray-500">1 Nov 2023, 00:00</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-emerald-700">+50 Poin</p>
                                    <p class="text-sm text-gray-500">Bonus bulanan</p>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="mt-8 pt-6 border-t">
                            <h4 class="font-medium text-gray-800 mb-4">Aksi Cepat</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <a href="#" class="bg-emerald-50 text-emerald-700 p-4 rounded-lg text-center hover:bg-emerald-100 transition duration-200">
                                    <i class="fas fa-trash-alt text-xl mb-2"></i>
                                    <p class="font-medium">Setor Sampah</p>
                                </a>
                                <a href="#" class="bg-blue-50 text-blue-700 p-4 rounded-lg text-center hover:bg-blue-100 transition duration-200">
                                    <i class="fas fa-exchange-alt text-xl mb-2"></i>
                                    <p class="font-medium">Tukar Poin</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Monthly Report -->
                <div class="mt-8 bg-white rounded-xl shadow-md p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Laporan Bulanan</h3>
                            <p class="text-gray-500 text-sm">Ringkasan performa pengelolaan sampah bulan November 2023</p>
                        </div>
                        <button class="btn-primary text-white px-4 py-2 rounded-lg font-medium flex items-center">
                            <i class="fas fa-download mr-2"></i> Unduh Laporan
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-gradient-to-br from-emerald-50 to-green-50 p-5 rounded-xl">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-800 flex items-center justify-center mr-3">
                                    <i class="fas fa-weight"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Total Berat</p>
                                    <p class="text-2xl font-bold text-gray-800">12.3 kg</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Sampah yang berhasil disetor bulan ini</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-5 rounded-xl">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center mr-3">
                                    <i class="fas fa-coins"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Poin Diperoleh</p>
                                    <p class="text-2xl font-bold text-gray-800">205</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Poin yang terkumpul dari setoran sampah</p>
                        </div>
                        
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-5 rounded-xl">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 rounded-full bg-purple-100 text-purple-800 flex items-center justify-center mr-3">
                                    <i class="fas fa-leaf"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Dampak Lingkungan</p>
                                    <p class="text-2xl font-bold text-gray-800">28 pohon</p>
                                </div>
                            </div>
                            <p class="text-sm text-gray-600">Setara dengan menyelamatkan 28 pohon</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Setor Sampah Page -->
            <div id="setor-sampah" class="content-page">
                <!-- Konten Setor Sampah -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Setor Sampah</h3>
                    <!-- Form setor sampah akan diisi di sini -->
                    <p class="text-gray-600">Halaman untuk menyetor sampah akan ditampilkan di sini.</p>
                </div>
            </div>

            <!-- Halaman lainnya tetap sama seperti sebelumnya -->
            <!-- Poin Saya Page, Riwayat Transaksi, Laporan Bulanan, Tukar Poin, Profil Saya -->
        </main>

        <!-- Footer -->
        <footer class="p-6 border-t bg-white">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-500 to-green-600 text-white flex items-center justify-center mr-2">
                            <i class="fas fa-recycle text-sm"></i>
                        </div>
                        <h1 class="text-lg font-bold text-gray-800">Trash<span class="logo-color">Point</span></h1>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">Sistem Pengelolaan Bank Sampah Digital</p>
                </div>
                <div class="text-gray-600 text-sm">
                    <p>&copy; 2023 TrashPoint. Seluruh hak cipta dilindungi.</p>
                    <p class="mt-1">Versi 1.0.0</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });
        
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
        
        // Chart.js implementation for Dashboard
        const ctx = document.getElementById('wasteChart').getContext('2d');
        const wasteChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
                datasets: [{
                    label: 'Sampah Plastik (kg)',
                    data: [8.2, 7.5, 9.1, 8.8, 10.2, 12.3],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Sampah Kertas (kg)',
                    data: [5.1, 6.2, 5.8, 7.1, 6.5, 8.2],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Sampah Lainnya (kg)',
                    data: [3.2, 2.8, 3.5, 4.1, 3.8, 4.5],
                    borderColor: '#8b5cf6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        },
                        ticks: {
                            callback: function(value) {
                                return value + ' kg';
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        
        // Page Navigation System
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const pageId = this.getAttribute('data-page');
                
                // Skip if this is a logout link
                if (this.closest('form')) {
                    return;
                }
                
                // Update active nav link
                document.querySelectorAll('.nav-link').forEach(item => {
                    item.classList.remove('active', 'bg-emerald-100', 'text-emerald-800');
                    item.classList.add('hover:bg-emerald-50', 'hover:text-emerald-700');
                    
                    // Reset icons color for inactive items
                    const icon = item.querySelector('i');
                    if (icon) {
                        icon.classList.remove('text-emerald-600');
                        icon.classList.add('text-gray-500');
                    }
                });
                
                this.classList.add('active', 'bg-emerald-100', 'text-emerald-800');
                this.classList.remove('hover:bg-emerald-50', 'hover:text-emerald-700');
                
                // Set icon color for active item
                const activeIcon = this.querySelector('i');
                if (activeIcon) {
                    activeIcon.classList.remove('text-gray-500');
                    activeIcon.classList.add('text-emerald-600');
                }
                
                // Update page title
                const pageTitle = this.querySelector('span').textContent;
                document.getElementById('pageTitle').textContent = pageTitle;
                document.title = pageTitle + ' - TrashPoint';
                
                // Hide all pages
                document.querySelectorAll('.content-page').forEach(page => {
                    page.classList.remove('active');
                });
                
                // Show selected page
                document.getElementById(pageId).classList.add('active');
                
                // Close mobile menu if open
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            });
        });
        
        // Quick action button - Setor Sampah
        document.getElementById('quickSetorSampah').addEventListener('click', function() {
            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(item => {
                item.classList.remove('active', 'bg-emerald-100', 'text-emerald-800');
                item.classList.add('hover:bg-emerald-50', 'hover:text-emerald-700');
                
                const icon = item.querySelector('i');
                if (icon) {
                    icon.classList.remove('text-emerald-600');
                    icon.classList.add('text-gray-500');
                }
            });
            
            // Set Setor Sampah as active
            const setorSampahLink = document.querySelector('[data-page="setor-sampah"]');
            setorSampahLink.classList.add('active', 'bg-emerald-100', 'text-emerald-800');
            setorSampahLink.classList.remove('hover:bg-emerald-50', 'hover:text-emerald-700');
            
            const setorSampahIcon = setorSampahLink.querySelector('i');
            setorSampahIcon.classList.remove('text-gray-500');
            setorSampahIcon.classList.add('text-emerald-600');
            
            // Update page title
            document.getElementById('pageTitle').textContent = 'Setor Sampah';
            document.title = 'Setor Sampah - TrashPoint';
            
            // Hide all pages and show Setor Sampah page
            document.querySelectorAll('.content-page').forEach(page => {
                page.classList.remove('active');
            });
            document.getElementById('setor-sampah').classList.add('active');
        });
    </script>
</body>
</html>