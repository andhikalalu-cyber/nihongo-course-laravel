<!DOCTYPE html>
<html>
<head>
    <title>Edit Testimoni - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<nav class="bg-indigo-600 text-white p-4">
    <div class="max-w-7xl mx-auto flex justify-between">
        <h1 class="text-2xl font-bold">Testimoni Management</h1>
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
        <h2 class="text-3xl font-bold">Ulasan Siswa</h2>
        <button onclick="showForm()" class="bg-green-600 text-white px-6 py-2 rounded-xl hover:bg-green-700">+ Tambah Testimoni</button>
    </div>

    <!-- List Testimonials -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Level</th>
                    <th class="p-4 text-left">Rating</th>
                    <th class="p-4 text-left">Review</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-4 font-semibold">{{ $testimonial->name }}</td>
                    <td class="p-4 badge badge-primary">{{ $testimonial->level }}</td>
                    <td class="p-4">
                        <div class="flex">
@for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star text-yellow-400"></i>
                                @endfor
                            <span class="ml-1 text-sm text-gray-500">({{ $testimonial->rating }}/5)</span>
                        </div>
                    </td>
                    <td class="p-4 max-w-md truncate">{{ Str::limit($testimonial->review, 100) }}</td>
                    <td class="p-4 text-right">
                        <button onclick="editTestimonial({{ $testimonial->id }})" class="text-blue-600 hover:underline mr-4">Edit</button>
                        <form method="POST" action="/admin/testimonials/{{ $testimonial->id }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-500">Belum ada testimoni. Tambah yang pertama!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Form Tambah/Edit -->
    <div id="testimonial-form" class="bg-white rounded-xl shadow-lg p-8 hidden">
        <h3 id="form-title" class="text-2xl font-bold mb-6">Tambah Testimoni</h3>
        <form method="POST" action="/admin/testimonials" id="testimonialForm">
            @csrf
            <input type="hidden" name="id" id="testimonial_id">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold mb-2">Nama Siswa</label>
                    <input type="text" name="name" id="name" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">Level</label>
                    <input type="text" name="level" id="level" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Rating (1-5)</label>
                <input type="number" name="rating" id="rating" min="1" max="5" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Review</label>
                <textarea name="review" id="review" rows="5" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500"></textarea>
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
    document.getElementById('testimonial-form').classList.remove('hidden');
    document.getElementById('form-title').textContent = 'Tambah Testimoni';
    document.getElementById('testimonialForm').action = '/admin/testimonials';
    document.getElementById('testimonialForm').reset();
}

function hideForm() {
    document.getElementById('testimonial-form').classList.add('hidden');
}

function editTestimonial(id) {
    showForm();
    document.getElementById('form-title').textContent = 'Edit Testimoni';
    document.getElementById('testimonial_id').value = id;
    document.getElementById('testimonialForm').action = `/admin/testimonials/${id}?_method=PUT`;
}
</script>
</body>
</html>
