<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kursus Bahasa Jepang - FNC</title>
<script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4 md:py-6">
                <div class="flex items-center">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
<span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-emerald-600 bg-clip-text text-transparent text-3xl lg:text-4xl font-black drop-shadow-lg">FNC</span>
                    </h1>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
                    <a href="/kursus" class="text-gray-700 hover:text-indigo-600 font-medium">Kursus</a>
                    <a href="/materi-demo" class="text-gray-700 hover:text-indigo-600 font-medium">Materi</a>
                    <a href="/tentang" class="text-gray-700 hover:text-indigo-600 font-medium">Tentang Kami</a>
                    <a href="/testimoni" class="text-gray-700 hover:text-indigo-600 font-medium">Testimoni</a>
                    <a href="/pendaftaran" class="text-indigo-600 font-semibold border-b-2 border-indigo-600">Daftar Sekarang</a>
                    @auth
                        <a href="/dashboard" class="text-gray-700 hover:text-indigo-600 font-medium">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-indigo-600 font-medium">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 font-medium">Daftar</a>
                    @endauth
                </nav>
                <button class="md:hidden p-2 text-gray-700">☰</button>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-6xl font-bold mb-6">
                Belajar Bahasa Jepang<br><span class="text-yellow-300">dengan Mudah & Terstruktur</span>
            </h2>
            <p class="text-xl md:text-2xl mb-8 opacity-90">Luluskan JLPT dengan instruktur berpengalaman!</p>
            <a href="/pendaftaran" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-12 py-4 rounded-full text-xl font-semibold shadow-xl hover:shadow-2xl transition-all duration-300">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- Highlight Keunggulan -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-3xl md:text-4xl font-bold text-center mb-16 text-gray-900">Keunggulan Kami</h3>
            <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Sensei Native -->
                <div class="group bg-gradient-to-br from-red-500 to-red-600 text-white p-10 rounded-3xl shadow-2xl hover:shadow-3xl hover:-translate-y-2 transition-all duration-500 hover:scale-105">
                    <div class="w-24 h-24 bg-white/20 rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:rotate-12 transition-transform duration-500">
                        <i class="fas fa-user-tie text-3xl"></i>
                    </div>
                    <h4 class="text-3xl font-bold mb-6 text-white drop-shadow-lg">Sensei Native</h4>
                    <p class="text-xl opacity-95 leading-relaxed mb-8">Guru Jepang asli JLPT N1. Pengucapan autentik + budaya otentik.</p>
                    <div class="flex items-center justify-center space-x-1 text-2xl mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>

                <!-- Materi JLPT -->
                <div class="group bg-gradient-to-br from-emerald-500 to-emerald-600 text-white p-10 rounded-3xl shadow-2xl hover:shadow-3xl hover:-translate-y-2 transition-all duration-500 hover:scale-105">
                    <div class="w-24 h-24 bg-white/20 rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:rotate-12 transition-transform duration-500">
                        <i class="fas fa-scroll text-3xl"></i>
                    </div>
                    <h4 class="text-3xl font-bold mb-6 text-white drop-shadow-lg">Materi JLPT</h4>
                    <p class="text-xl opacity-95 leading-relaxed mb-8">2,000+ soal latihan. Update setiap tes JLPT. Garansi hafalan kanji!</p>
                    <div class="flex items-center justify-center space-x-1 text-2xl mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>

                <!-- Live Class -->
                <div class="group bg-gradient-to-br from-amber-500 to-orange-600 text-white p-10 rounded-3xl shadow-2xl hover:shadow-3xl hover:-translate-y-2 transition-all duration-500 hover:scale-105">
                    <div class="w-24 h-24 bg-white/20 rounded-3xl flex items-center justify-center mx-auto mb-8 group-hover:rotate-12 transition-transform duration-500">
                        <i class="fas fa-video text-3xl"></i>
                    </div>
                    <h4 class="text-3xl font-bold mb-6 text-white drop-shadow-lg">Live Class</h4>
                    <p class="text-xl opacity-95 leading-relaxed mb-8">Kelas live 2x seminggu + rekaman 1 tahun. Speaking practice setiap minggu.</p>
                    <div class="flex items-center justify-center space-x-1 text-2xl mb-4">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-indigo-600 text-white text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h3 class="text-3xl font-bold mb-4">Siap Mulai Belajar?</h3>
            <p class="text-xl mb-8">Kelas mulai minggu ini!</p>
            <a href="/pendaftaran" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-12 py-4 rounded-full text-xl font-semibold">Daftar Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
<h3 class="text-2xl lg:text-3xl font-black mb-4 bg-gradient-to-r from-indigo-600 via-purple-700 to-emerald-600 bg-clip-text text-transparent drop-shadow-xl">FNC</h3>
            <p><strong>© 2024</strong> Semua hak dilindungi.</p>
        </div>
    </footer>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'custom-blue': '#1e40af',
                    }
                }
            }
        }
    </script>
</body>
</html>
