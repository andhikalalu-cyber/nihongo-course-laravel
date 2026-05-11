<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni Siswa - FNC</title>
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
                    <a href="/tentang" class="text-gray-700 hover:text-indigo-600 font-medium">Tentang Kami</a>
                    <a href="/testimoni" class="text-indigo-600 font-semibold border-b-2 border-indigo-600">Testimoni</a>
                    <a href="/pendaftaran" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">Daftar</a>
                </nav>
                <button class="md:hidden p-2 text-gray-700">☰</button>
            </div>
        </div>
    </header>

    <!-- Testimoni Section -->
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900">Apa Kata Siswa Kami?</h2>

            <!-- Rating Overall -->
            <div class="text-center mb-16">
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-star text-yellow-400 text-5xl"></i>
                    <i class="fas fa-star text-yellow-400 text-5xl"></i>
                    <i class="fas fa-star text-yellow-400 text-5xl"></i>
                    <i class="fas fa-star text-yellow-400 text-5xl"></i>
                    <i class="fas fa-star text-yellow-400 text-5xl"></i>
                </div>
                <p class="text-3xl font-bold text-gray-900">4.9/5 (127 ulasan)</p>
            </div>

            <!-- Testimoni Cards -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($testimonials as $testimonial)
                <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all">
                    <div class="flex items-center mb-4">
                        <img src="{{ $testimonial->avatar ?? 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=100&h=100&fit=crop&round' }}" alt="{{ $testimonial->name }}" class="w-16 h-16 rounded-full mr-4 object-cover">
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $testimonial->name }}</h4>
                            <p class="text-indigo-600">{{ $testimonial->level ?? 'Alumni' }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4 italic">"{{ $testimonial->message }}"</p>
                    <div class="flex">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star text-yellow-400"></i>
                        @endfor
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <i class="fas fa-quote-left text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-500 mb-2">Belum ada testimoni</h3>
                    <p class="text-gray-400 mb-6">Tambahkan testimoni melalui admin /admin/testimonials</p>
                    <a href="/admin/testimonials" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-indigo-700">
                        Kelola Testimoni
                    </a>
                </div>
                @endforelse
            </div>

            <!-- CTA Button -->
            <div class="text-center mt-20">
                <a href="/pendaftaran" class="bg-indigo-600 hover:bg-indigo-700 text-white px-12 py-4 rounded-full text-xl font-semibold shadow-xl hover:shadow-2xl transition-all">
                    Gabung Ribuan Siswa Lainnya!
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-2xl lg:text-3xl font-black mb-4 bg-gradient-to-r from-indigo-600 via-purple-700 to-emerald-600 bg-clip-text text-transparent drop-shadow-xl">FNC</h3>
            <p>© 2024 Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
