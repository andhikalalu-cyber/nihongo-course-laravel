<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Materi Demo Gratis - FNC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4 md:py-6">
<span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-emerald-600 bg-clip-text text-transparent text-3xl lg:text-4xl font-black drop-shadow-lg">FNC</span>
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-700 hover:text-indigo-600 font-medium">Home</a>
                    <a href="/kursus" class="text-gray-700 hover:text-indigo-600 font-medium">Kursus</a>
                    <a href="/materi-demo" class="text-indigo-600 font-semibold border-b-2 border-indigo-600">Materi</a>
                    <a href="/tentang" class="text-gray-700 hover:text-indigo-600 font-medium">Tentang Kami</a>
                    <a href="/testimoni" class="text-gray-700 hover:text-indigo-600 font-medium">Testimoni</a>
                    <a href="/pendaftaran" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">Daftar</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Flashcards Interaktif -->
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-16 text-gray-900">Coba Materi Demo Gratis!</h2>

            <!-- 1000 Kosakata Flashcard -->
            <div class="text-center mb-20">
                <h3 class="text-3xl lg:text-4xl font-bold mb-8 text-indigo-600 bg-gradient-to-r from-indigo-500 to-purple-600 bg-clip-text text-transparent">📚 1000+ Flashcard Kosakata</h3>
                <p class="text-xl text-gray-700 mb-12 max-w-2xl mx-auto">Klik navigasi untuk next/previous. Flip untuk arti lengkap. Level N5-N1!</p>

                <div class="flex justify-center space-x-4 mb-8">
                    <button onclick="prevVocab()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl transition-all">
                        <i class="fas fa-chevron-left mr-2"></i> Sebelumnya
                    </button>
                    <span id="vocab-counter" class="text-2xl font-bold text-indigo-600 py-3 px-6 bg-indigo-100 rounded-full">1 / 1000</span>
                    <button onclick="nextVocab()" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full font-semibold shadow-lg hover:shadow-xl transition-all">
                        Selanjutnya <i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>

                <div id="flashcard" class="flashcard bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-2xl max-w-2xl mx-auto p-12 cursor-pointer hover:shadow-3xl hover:-rotate-1 transition-all duration-500 perspective" onclick="flipCard()">
                    <div class="card-inner relative w-full h-64 flex items-center justify-center">
                        <!-- Front -->
                        <div class="front absolute inset-0 bg-gradient-to-br from-indigo-50 to-blue-50 rounded-3xl p-8 text-center backface-hidden">
                            <h4 id="vocab-english" class="text-3xl lg:text-4xl font-bold mb-6 text-gray-800 drop-shadow-lg">Loading...</h4>
                            <p id="vocab-japanese" class="text-5xl lg:text-7xl mb-6 font-serif font-black text-indigo-900 drop-shadow-2xl">Loading...</p>
                            <p id="vocab-romaji" class="text-xl lg:text-2xl font-bold text-gray-600 tracking-wide">Loading...</p>
                        </div>
                        <!-- Back -->
                        <div class="back absolute inset-0 bg-gradient-to-br from-purple-50 to-indigo-50 rounded-3xl p-8 text-center backface-hidden rotate-y-180">
                            <p id="vocab-meaning" class="text-lg lg:text-xl text-gray-800 leading-relaxed mb-8 max-w-lg mx-auto font-medium">Loading...</p>
                            <div class="flex items-center justify-center space-x-2 text-yellow-400 text-2xl mb-6">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="text-sm text-gray-500 italic">Level N5 • JLPT Ready</p>
                        </div>
                    </div>
                </div>

<p class="mt-12 text-xl text-gray-700 max-w-3xl mx-auto">1000 kosakata full - Hiragana, Katakana, Kanji N5-N1. Akses unlimited di kelas premium!</p>
            </div>

            <!-- Quiz Demo -->
            <div class="text-center mb-20">
                <h3 class="text-3xl font-bold mb-8 text-indigo-600">Quiz Grammar</h3>
                <div id="quiz-container" class="bg-white rounded-2xl shadow-2xl max-w-3xl mx-auto p-12">
                    <div class="text-center mb-12">
                        <h3 class="text-3xl lg:text-4xl font-bold mb-4 bg-gradient-to-r from-emerald-500 to-teal-600 bg-clip-text text-transparent">Quiz Grammar JLPT</h3>
                        <p class="text-xl text-gray-700 mb-8 max-w-2xl mx-auto">10+ soal grammar N5. Feedback lengkap + penjelasan!</p>
                        <span id="quiz-counter" class="text-2xl font-bold text-emerald-600 py-2 px-6 bg-emerald-100 rounded-full">1 / 10</span>
                    </div>

                    <div id="quiz-question" class="mb-12 text-center">
                        <h4 class="text-2xl lg:text-3xl font-bold mb-8 text-gray-900">Pilih terjemahan yang benar:</h4>
                        <p id="quiz-question-jp" class="text-5xl lg:text-7xl mb-12 font-serif font-black text-indigo-900 drop-shadow-2xl animate-pulse">Loading...</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mb-12">
                        <button id="option-a" onclick="checkAnswer(0)" class="option-btn bg-gradient-to-r from-blue-400 to-blue-500 text-white p-8 rounded-2xl text-xl font-bold shadow-xl hover:shadow-2xl hover:scale-105 hover:from-blue-500 hover:to-blue-600 transition-all duration-300">A. Loading...</button>
                        <button id="option-b" onclick="checkAnswer(1)" class="option-btn bg-gradient-to-r from-emerald-400 to-emerald-500 text-white p-8 rounded-2xl text-xl font-bold shadow-xl hover:shadow-2xl hover:scale-105 hover:from-emerald-500 hover:to-emerald-600 transition-all duration-300">B. Loading...</button>
                        <button id="option-c" onclick="checkAnswer(2)" class="option-btn bg-gradient-to-r from-orange-400 to-orange-500 text-white p-8 rounded-2xl text-xl font-bold shadow-xl hover:shadow-2xl hover:scale-105 hover:from-orange-500 hover:to-orange-600 transition-all duration-300">C. Loading...</button>
                        <button id="option-d" onclick="checkAnswer(3)" class="option-btn bg-gradient-to-r from-red-400 to-red-500 text-white p-8 rounded-2xl text-xl font-bold shadow-xl hover:shadow-2xl hover:scale-105 hover:from-red-500 hover:to-red-600 transition-all duration-300">D. Loading...</button>
                    </div>

                    <div id="quiz-feedback" class="hidden"></div>
                    <button id="next-question" onclick="nextQuestion()" class="mt-8 mx-auto block bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white px-12 py-4 rounded-2xl text-xl font-bold shadow-xl hover:shadow-2xl transition-all duration-300 hidden">
                        <i class="fas fa-arrow-right mr-2"></i> Soal Selanjutnya
                    </button>
                </div>
            </div>

            <!-- Video Demo -->
            <div class="text-center">
                <h3 class="text-3xl font-bold mb-8 text-indigo-600">Video Kelas Sample</h3>
                <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-4xl mx-auto">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen class="rounded-xl"></iframe>
                    <p class="mt-6 text-xl text-gray-700">Kelas online live 2x seminggu + recording tersedia 24/7!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-indigo-600 text-white text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h3 class="text-3xl font-bold mb-4">Suka Materi Demo?</h3>
            <p class="text-xl mb-8">Akses unlimited di kelas premium!</p>
            <a href="/pendaftaran" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-12 py-4 rounded-full text-xl font-semibold">
                Mulai Belajar Sekarang
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

<script src="/js/vocab.js"></script>
    <script src="/js/grammarQuiz.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initFlashcard();
            document.getElementById('vocab-counter').textContent = `${currentVocabIndex + 1} / ${japaneseVocab.length}`;
            initQuiz();
        });
    </script>
    <style>
        .perspective { perspective: 1000px; }
        .card-inner { transform-style: preserve-3d; transition: transform 0.6s; transform-style: preserve-3d; }
        .flashcard.flipped .card-inner { transform: rotateY(180deg); }
        .backface-hidden { backface-visibility: hidden; }
        .rotate-y-180 { transform: rotateY(180deg); }
    </style>
</body>
</html>
