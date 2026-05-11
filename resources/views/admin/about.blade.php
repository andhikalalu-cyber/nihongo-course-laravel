<!DOCTYPE html>
<html>
<head>
    <title>Kelola Instruktur - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<nav class="bg-indigo-600 text-white p-4">
    <div class="max-w-7xl mx-auto flex justify-between">
        <h1 class="text-2xl font-bold">Instruktur Management</h1>
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
        <h2 class="text-3xl font-bold">Instruktur About</h2>
        <button onclick="showForm()" class="bg-green-600 text-white px-6 py-2 rounded-xl hover:bg-green-700">+ Tambah Sensei</button>
    </div>

@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-lg">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="bg-red-500 text-white p-4 rounded-lg mb-6 shadow-lg">
        <strong>Error:</strong>
        <ul class="mt-2">
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- List -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-left">Nama Sensei</th>
                    <th class="p-4 text-left">Deskripsi</th>
                    <th class="p-4 text-left">Image</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($instructors as $instructor)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-4 font-semibold">{{ $instructor->title }}</td>
                    <td class="p-4 max-w-md truncate" title="{{ $instructor->content }}">{{ Str::limit($instructor->content, 80) }}</td>
                    <td class="p-4">
                        @if($instructor->image)
                            <img src="{{ $instructor->image }}" class="w-12 h-12 rounded-full object-cover">
                        @else
                            No Image
                        @endif
                    </td>
                    <td class="p-4 text-right">
                        <button onclick="editAbout({{ $instructor->id }})" class="text-blue-600 hover:underline mr-4">Edit</button>
                        <form method="POST" action="{{ route('admin.about.destroy', $instructor->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-gray-500">Belum ada instruktur. Tambah yang pertama!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Form -->
    <div id="about-form" class="bg-white rounded-xl shadow-lg p-8 hidden">
        <h3 id="form-title" class="text-2xl font-bold mb-6">Tambah Instruktur</h3>
        <form method="POST" action="{{ route('admin.about.store') }}" id="aboutForm">
            @csrf
            <input type="hidden" name="id" id="about_id">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold mb-2">Nama Sensei</label>
                    <input type="text" name="title" id="title" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2">URL Gambar</label>
                    <input type="url" name="image" id="image" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Deskripsi/Pengalaman</label>
                <textarea name="content" id="content" rows="5" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-indigo-500" required></textarea>
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
    document.getElementById('about-form').classList.remove('hidden');
    document.getElementById('form-title').textContent = 'Tambah Instruktur';
    document.getElementById('aboutForm').reset();
    document.getElementById('aboutForm').action = '{{ route("admin.about.store") }}';
}

function hideForm() {
    document.getElementById('about-form').classList.add('hidden');
}

function editAbout(id) {
    showForm();
    document.getElementById('form-title').textContent = 'Edit Instruktur';
    document.getElementById('about_id').value = id;
    document.getElementById('aboutForm').action = `{{ route('admin.about.update', ':id') }}`.replace(':id', id);
    document.getElementById('_method').value = 'PUT'; // if added
    // TODO: AJAX populate fields
    alert('Edit: Add AJAX for data load');
}
</script>
</body>
</html>

