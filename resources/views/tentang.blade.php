<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruktur & Visi - FNC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4 md:py-6">
                <div class="flex items-center">
                    <a href="/" class="text-2xl md:text-3xl font-bold text-gray-900">
                        <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-emerald-600 bg-clip-text text-transparent text-3xl lg:text-4xl font-black drop-shadow-lg">FNC</span>
                    </a>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
                    <a href="/kursus" class="text-gray-700 hover:text-indigo-600 font-medium">Kursus</a>
                    <a href="/materi-demo" class="text-gray-700 hover:text-indigo-600 font-medium">Materi</a>
                    <a href="/tentang" class="text-indigo-600 font-semibold border-b-2 border-indigo-600">Tentang Kami</a>
                    <a href="/testimoni" class="text-gray-700 hover:text-indigo-600 font-medium">Testimoni</a>
                    <a href="/pendaftaran" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">Daftar</a>
                </nav>
                <button class="md:hidden p-2 text-gray-700">☰</button>
            </div>
        </div>
    </header>

    <!-- Profil Instruktur -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900">Instruktur Kami</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12">
                @forelse($instructors as $instructor)
                    <div class="text-center">
                        <img src="{{ $instructor->image }}" alt="{{ $instructor->title }}" class="w-48 h-48 rounded-full mx-auto mb-6 shadow-2xl">
                        <h3 class="text-2xl font-bold mb-3 text-gray-900">{{ $instructor->title }}</h3>
                        <p class="text-indigo-600 font-semibold mb-4">JLPT N1 | Instruktur Berpengalaman</p>
                        <p class="text-gray-700 mb-6">{{ $instructor->content }}</p>
                        <div class="flex justify-center space-x-2 text-yellow-400 text-2xl">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-xl">Belum ada instruktur. <a href="/admin/about" class="text-indigo-600 font-semibold">Tambahkan di Admin</a></p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="py-20 bg-indigo-50">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-12 text-gray-900">Visi & Misi Kami</h2>
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-3xl font-bold mb-6 text-indigo-600">Visi</h3>
                    <p class="text-xl text-gray-700 leading-relaxed">Menjadi platform belajar bahasa Jepang #1 di Indonesia dengan tingkat kelulusan JLPT 95%+.</p>
                </div>
                <div>
                    <h3 class="text-3xl font-bold mb-6 text-indigo-600">Misi</h3>
                    <ul class="text-left space-y-3 text-xl text-gray-700 max-w-2xl mx-auto">
                        <li><i class="fas fa-book text-indigo-600"></i> Materi lengkap & update JLPT terbaru</li>
                        <li><i class="fas fa-user-tie text-indigo-600"></i> Guru native certified</li>
                        <li><i class="fas fa-laptop text-indigo-600"></i> Platform interaktif 24/7</li>
                        <li><i class="fas fa-bullseye text-indigo-600"></i> Target lulus JLPT pasti</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-indigo-600 text-white text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h3 class="text-3xl font-bold mb-4">Siap Belajar Bersama Sensei Terbaik?</h3>
            <a href="/pendaftaran" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-12 py-4 rounded-full text-xl font-semibold shadow-xl">
                Mulai Kelas Sekarang
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
