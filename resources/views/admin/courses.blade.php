<!DOCTYPE html>
<html>
<head>
    <title>Edit Kursus - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<nav class="bg-indigo-600 text-white p-4">
    <div class="max-w-7xl mx-auto flex justify-between">
        <h1 class="text-2xl font-bold">Kursus Management</h1>
        <div>
            <a href="/admin" class="mr-4 hover:underline">Dashboard</a>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto py-8 px-4">

    <div class="flex justify-between mb-8">
        <h2 class="text-3xl font-bold">Kursus Levels</h2>
        <button onclick="showForm()" class="bg-green-600 text-white px-6 py-2 rounded-xl hover:bg-green-700">+ Tambah Level</button>
    </div>

@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-lg">
        <i class="fas fa-check mr-2"></i>{{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded-lg mb-6 shadow-lg">
        <strong>Perbaiki error:</strong>
        <ul class="mt-2">
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <!-- List Courses -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-left">Level</th>
                    <th class="p-4 text-left">Judul</th>
                    <th class="p-4 text-left">Harga</th>
                    <th class="p-4 text-left">Durasi</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-4 font-mono text-lg">{{ $course->level }}</td>
                    <td class="p-4">{{ $course->title }}</td>
                    <td class="p-4 font-bold text-green-600">Rp {{ number_format($course->price, 0, ',', '.') }}</td>
                    <td class="p-4">{{ $course->duration_months }} bulan</td>
                    <td class="p-4 text-right">
                        <button onclick="editCourse({{ $course->id }})" class="text-blue-600 hover:underline mr-4">Edit</button>
<form method="POST" action="{{ route('admin.courses.destroy', $course->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-500">Belum ada kursus. Tambah yang pertama!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Form Tambah/Edit -->
    <div id="course-form" class="bg-white rounded-xl shadow-lg p-8 hidden">
        <h3 id="form-title" class="text-2xl font-bold mb-6">Tambah Kursus</h3>
<form method="POST" action="{{ route('admin.courses.store') }}" id="courseForm">

            @csrf
            <input type="hidden" name="id" id="course_id">
            <input type="hidden" name="_method" id="_method">


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold mb-2">Level (N1-N5)</label>
                    <input type="text" name="level" id="level" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Judul</label>
                    <input type="text" name="title" id="title" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold mb-2">Durasi (bulan)</label>
                    <input type="number" name="duration_months" id="duration_months" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Harga (Rp)</label>
                    <input type="number" name="price" id="price" step="0.01" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Deskripsi</label>
                <textarea name="description" id="description" rows="4" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-xl hover:bg-indigo-700 font-semibold">Simpan</button>
                <button type="button" onclick="hideForm()" class="bg-gray-500 text-white px-8 py-3 rounded-xl hover:bg-gray-600 font-semibold">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function showForm() {
    document.getElementById('course-form').classList.remove('hidden');
    document.getElementById('form-title').textContent = 'Tambah Kursus';
    document.getElementById('courseForm').action = '/admin/courses';
    // Reset form
    document.getElementById('courseForm').reset();
}

function hideForm() {
    document.getElementById('course-form').classList.add('hidden');
}


function editCourse(id) {
    // Note: Add AJAX fetch for real data populate
    // For now alert and show
    alert('Edit mode - populate data needed (add AJAX)');
    showForm();
    document.getElementById('form-title').textContent = 'Edit Kursus';
    document.getElementById('course_id').value = id;
    document.getElementById('courseForm').action = `{{ route('admin.courses.update', ':id') }}`.replace(':id', id);
    document.getElementById('_method').value = 'PUT';
}

</script>
</body>
</html>

