<!DOCTYPE html>
<html>
<head>
    <title>Admin - Nihongo Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<nav class="bg-indigo-600 text-white p-4">
    <div class="max-w-7xl mx-auto flex justify-between">
        <h1 class="text-2xl font-bold">Admin Panel</h1>
        <a href="/dashboard" class="hover:underline">Siswa Dashboard</a>
    </div>
</nav>

<div class="max-w-7xl mx-auto py-8 px-4">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold">Kelola Konten</h2>
        <div>
            <span class="bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold">ADMIN: {{ Auth::user()->email }}</span>
        </div>
    </div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="/admin/courses" class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition">
            <h3 class="text-2xl font-bold mb-2">📚 Kursus</h3>
            <p class="text-2xl font-bold text-green-600">{{ $courses->count() }}</p>
            <p class="text-sm text-gray-600 mt-2">Kelola N5-N1</p>
        </a>
        <a href="/admin/testimonials" class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition">
            <h3 class="text-2xl font-bold mb-2">💬 Testimoni</h3>
            <p class="text-2xl font-bold text-green-600">{{ $testimonials->count() }}</p>
            <p class="text-sm text-gray-600 mt-2">Kelola ulasan</p>
        </a>
        <a href="/admin/about" class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition">
            <h3 class="text-2xl font-bold mb-2">👩‍🏫 Instruktur</h3>
            <p class="text-2xl font-bold text-green-600">{{ $instructors->count() }}</p>
            <p class="text-sm text-gray-600 mt-2">Kelola Tentang Kami</p>
        </a>
    </div>
</div>
<a href="/admin" class="fixed bottom-6 right-6 bg-indigo-600 text-white p-4 rounded-full shadow-lg hover:bg-indigo-700 transition z-50 text-2xl" title="Admin Dashboard">
    🛠�E�E</a>
</body>
</html>

