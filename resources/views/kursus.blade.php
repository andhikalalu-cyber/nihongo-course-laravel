<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kursus JLPT N5-N1 - FNC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Header (reuse from home) -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4 md:py-6">
<span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-emerald-600 bg-clip-text text-transparent text-3xl lg:text-4xl font-black drop-shadow-lg">FNC</span>
<nav class="hidden lg:flex space-x-1">
                    <a href="/" class="px-3 py-2 rounded-full text-sm font-medium text-gray-700 hover:text-white hover:bg-indigo-600 transition-all">Home</a>
                    <a href="/kursus" class="px-3 py-2 rounded-full text-sm font-bold text-white bg-gradient-to-r from-indigo-500 to-purple-600 shadow-lg hover:shadow-xl hover:scale-105 transition-all">Kursus</a>
                    <a href="/materi-demo" class="px-3 py-2 rounded-full text-sm font-medium text-gray-700 hover:text-white hover:bg-emerald-500 transition-all">Materi Demo</a>
                    <a href="/tentang" class="px-3 py-2 rounded-full text-sm font-medium text-gray-700 hover:text-white hover:bg-orange-500 transition-all">Tentang Kami</a>
                    <a href="/testimoni" class="px-3 py-2 rounded-full text-sm font-medium text-gray-700 hover:text-white hover:bg-amber-500 transition-all">Testimoni</a>
                    <a href="/pendaftaran" class="px-4 py-2 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-bold rounded-full shadow-lg hover:shadow-xl hover:scale-105 hover:from-emerald-600 hover:to-emerald-700 transition-all">Daftar Sekarang</a>
                </nav>
                <div class="flex lg:hidden items-center space-x-4">
                    <i class="fas fa-bars text-2xl text-gray-700 cursor-pointer hover:text-indigo-600"></i>
                    <a href="/pendaftaran" class="px-6 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-bold rounded-full shadow-lg hover:shadow-xl transition-all">Daftar</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Kursus Levels -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4">
<div class="text-center mb-20">
                    <h2 class="text-4xl lg:text-5xl font-bold text-center mb-6 bg-gradient-to-r from-gray-900 via-gray-800 to-indigo-900 bg-clip-text text-transparent">Pilih Level JLPT Anda</h2>
                    <div class="flex items-center justify-center space-x-2 text-indigo-600 text-xl font-semibold">
                        <i class="fas fa-crown"></i>
                        <span>5 Level • Harga Terjangkau • Garansi Lulus</span>
                        <i class="fas fa-crown"></i>
                    </div>
                </div>

<div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
                @forelse($courses as $course)
                <div class="group bg-white rounded-3xl p-8 shadow-2xl hover:shadow-3xl transition-all border-4 border-transparent hover:border-indigo-500 cursor-pointer">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-gradient-to-r from-orange-400 to-orange-500 rounded-2xl mx-auto mb-6 flex items-center justify-center text-2xl font-bold text-white shadow-2xl">
                            {{ $course->level }}
                        </div>
                        <h3 class="text-2xl font-bold mb-3 text-gray-900 group-hover:text-indigo-600">{{ $course->title }}</h3>
                        <ul class="text-left mb-6 space-y-2 text-gray-700">
                            {!! nl2br(e($course->description)) !!}
                        </ul>
                        <div class="bg-gradient-to-r from-emerald-100 to-emerald-200 p-4 rounded-xl mb-6">
                            <p class="font-semibold text-emerald-800">Durasi: {{ $course->duration_months }} bulan | Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                        </div>
                        <a href="/pendaftaran" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-xl font-semibold block text-center transition-all">
                            Pilih {{ $course->level }}
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <i class="fas fa-info-circle text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-500 mb-2">Belum ada kursus</h3>
                    <p class="text-gray-400 mb-6">Tambahkan kursus melalui admin panel</p>
                    <a href="/admin/courses" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-indigo-700">
                        Kelola Kursus
                    </a>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-indigo-600 text-white text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h3 class="text-3xl font-bold mb-4">Mulai Perjalanan Jepang Anda!</h3>
            <p class="text-xl mb-8">Konsultasi gratis dengan advisor kami</p>
            <a href="/pendaftaran" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-12 py-4 rounded-full text-xl font-semibold">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
<h3 class="text-2xl lg:text-3xl font-black mb-4 bg-gradient-to-r from-indigo-600 via-purple-700 to-emerald-600 bg-clip-text text-transparent drop-shadow-xl">FNC</h3>
            <p>© 2024 Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
