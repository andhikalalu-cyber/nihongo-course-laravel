<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Kursus Jepang - FNC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex justify-between items-center py-4 md:py-6">
                    <a href="/" class="text-2xl md:text-3xl font-bold text-gray-900">
                        <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-emerald-600 bg-clip-text text-transparent text-3xl lg:text-4xl font-black drop-shadow-lg">FNC</span>
                    </a>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
                    <a href="/kursus" class="text-gray-700 hover:text-indigo-600 font-medium">Kursus</a>
                    <a href="/materi-demo" class="text-gray-700 hover:text-indigo-600 font-medium">Materi</a>
                    <a href="/tentang" class="text-gray-700 hover:text-indigo-600 font-medium">Tentang Kami</a>
                    <a href="/testimoni" class="text-gray-700 hover:text-indigo-600 font-medium">Testimoni</a>
                    <a href="/pendaftaran" class="text-indigo-600 font-semibold border-b-2 border-indigo-600">Pendaftaran</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Form Pendaftaran -->
    <section class="py-20">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white rounded-3xl shadow-2xl p-12">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4 text-gray-900">Daftar Kursus Jepang</h2>
                    <p class="text-xl text-gray-700">Isi form, mulai belajar besok!</p>
                </div>

<form action="{{ route('pendaftaran.store') }}" method="POST" class="space-y-6">
                    @csrf

                    @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" required class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" required class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Whatsapp</label>
                        <input type="tel" name="whatsapp" placeholder="081234567890" required class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Level yang Dipilih</label>
                        <select name="level" required class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                            <option value="">Pilih level...</option>
                            <option value="N5">N5 - Pemula (2 bulan)</option>
                            <option value="N4">N4 - Dasar (3 bulan)</option>
                            <option value="N3">N3 - Menengah (4 bulan)</option>
                            <option value="N2">N2 - Lanjutan (5 bulan)</option>
                            <option value="N1">N1 - Master (6 bulan)</option>
                        </select>
                    </div>

                    <!-- Payment Options -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Metode Pembayaran</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <label class="flex items-center p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-indigo-400 hover:bg-indigo-50 cursor-pointer transition-all">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Gopay_logo.png" class="w-12 h-12 mr-3" alt="GoPay">
                                <span class="font-semibold text-gray-700">GoPay</span>
                                <input type="radio" name="payment" value="gopay" class="sr-only">
                            </label>
                            <label class="flex items-center p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-indigo-400 hover:bg-indigo-50 cursor-pointer transition-all">
                                <img src="https://seeklogo.com/images/D/dana-logo-EED4D2A1AF-seeklogo.com.png" class="w-12 h-12 mr-3" alt="DANA">
                                <span class="font-semibold text-gray-700">DANA</span>
                                <input type="radio" name="payment" value="dana" class="sr-only">
                            </label>
                            <label class="flex items-center p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-indigo-400 hover:bg-indigo-50 cursor-pointer transition-all">
                                <span class="w-12 h-12 mr-3 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">BCA</span>
                                <span class="font-semibold text-gray-700">BCA</span>
                                <input type="radio" name="payment" value="bca" class="sr-only">
                            </label>
                            <label class="flex items-center p-4 border-2 border-dashed border-gray-300 rounded-xl hover:border-indigo-400 hover:bg-indigo-50 cursor-pointer transition-all">
                                <img src="https://www.freeiconspng.com/uploads/ovolo-icon-29.png" class="w-12 h-12 mr-3" alt="OVO">
                                <span class="font-semibold text-gray-700">OVO</span>
                                <input type="radio" name="payment" value="ovo" class="sr-only">
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white py-6 px-8 rounded-2xl text-xl font-bold shadow-xl hover:shadow-2xl transition-all duration-300">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Kirim Pendaftaran
                    </button>
                </form>

                <div class="mt-12 p-6 bg-gradient-to-r from-emerald-50 to-emerald-100 rounded-2xl border-2 border-emerald-200">
<h4 class="font-bold text-emerald-800 mb-2">Konfirmasi Pendaftaran:</h4>
                    <ul class="text-emerald-700 space-y-1">
                        <li>• Balasan WA dalam 30 menit</li>
                        <li>• Tes placement gratis</li>
                        <li>• Kelas mulai minggu ini</li>
                        <li>• Garansi uang kembali</li>
                    </ul>
                </div>
            </div>
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

