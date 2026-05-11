<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FNC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-cherry-blossom-100 via-white to-indigo-50 min-h-screen font-notosansjp">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white/80 backdrop-blur-md rounded-2xl shadow-2xl border border-white/50">
            <!-- Header -->
            <div class="text-center py-12">
                <div class="mx-auto h-20 w-20 rounded-2xl bg-gradient-to-r from-red-400 to-pink-500 flex items-center justify-center shadow-lg mb-6">
                    <i class="fas fa-language text-white text-3xl"></i>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">
                    ようこそ (Welcome)
                </h2>
                <p class="text-gray-600 text-lg max-w-sm mx-auto leading-relaxed">
                    Masuk ke dashboard kursus bahasa Jepang Anda
                </p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6 px-8 pb-12">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-envelope w-5 text-indigo-500 me-2"></i>
                        Email
                    </label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 bg-white/50 backdrop-blur-sm @error('email') border-red-300 focus:ring-red-500 @enderror">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-lock w-5 text-indigo-500 me-2"></i>
                        Kata Sandi
                    </label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 bg-white/50 backdrop-blur-sm @error('password') border-red-300 focus:ring-red-500 @enderror">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                        <span class="ms-2 text-sm text-gray-600">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500 font-medium">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-lg font-bold rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:ring-indigo-500 text-white shadow-xl hover:shadow-2xl transform hover:-translate-y-0.5 transition-all duration-200">
                        <span class="absolute inset-y-0 left-0 flex items-center justify-center w-10">
                            <i class="fas fa-sign-in-alt group-hover:rotate-90 transition-transform"></i>
                        </span>
                        <span class="truncate ms-3">Masuk ke Kelas</span>
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="px-8 pb-8 text-center text-xs text-gray-500 space-y-2">
                <div class="flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-indigo-500 me-1"></i>
                    <span>FNC - Belajar Jepang Terstruktur</span>
                </div>
                <div>© {{ date('Y') }} Semua hak dilindungi</div>
            </div>
        </div>
    </div>

    <!-- Custom CSS -->
    <style>
        .cherry-blossom-100 { background: linear-gradient(135deg, #fdf2f8 0%, #fef7ff 50%, #f0f9ff 100%); }
        .font-notosansjp { font-family: 'Noto Sans JP', sans-serif; }
    </style>
</body>
</html>
