const grammarQuiz = [
  {
    question: "学生です",
    options: ["Guru", "Pelajar", "Dokter", "Insinyur"],
    correct: 1,
    explanation: "学生 (gakusei) = Pelajar/Mahasiswa. Usage: 私は学生です (Watashi wa gakusei desu - Saya pelajar)."
  },
  {
    question: "先生です",
    options: ["Pelajar", "Guru", "Dokter", "Nelayan"],
    correct: 1,
    explanation: "先生 (sensei) = Guru. Usage: 田中先生です (Tanaka sensei desu - Guru Tanaka)."
  },
  {
    question: "大きいです",
    options: ["Kecil", "Besar", "Panas", "Dingin"],
    correct: 1,
    explanation: "大きい (ookii) = Besar. Usage: この本は大きいです (Kono hon wa ookii desu - Buku ini besar)."
  },
  {
    question: "水です",
    options: ["Makanan", "Minuman", "Buku", "Pensil"],
    correct: 1,
    explanation: "水 (mizu) = Air. Usage: 水をお願いします (Mizu o onegaishimasu - Air tolong)."
  },
  {
    question: "友達です",
    options: ["Saudara", "Teman", "Atasan", "Anak"],
    correct: 1,
    explanation: "友達 (tomodachi) = Teman. Usage: これは私の友達です (Kore wa watashi no tomodachi desu - Ini teman saya)."
  },
  {
    question: "学校に行きます",
    options: ["Ke dokter", "Ke sekolah", "Ke pasar", "Ke rumah"],
    correct: 1,
    explanation: "学校 (gakkou) = Sekolah. 行きます (ikimasu) = Pergi."
  },
  {
    question: "ありがとうございます",
    options: ["Maaf", "Terima kasih", "Halo", "Selamat tinggal"],
    correct: 1,
    explanation: "ありがとうございます = Terima kasih (formal sopan)."
  },
  {
    question: "すみません",
    options: ["Halo", "Maaf", "Terima kasih", "Selamat pagi"],
    correct: 1,
    explanation: "すみません = Maaf/Permen (get attention)."
  },
  {
    question: "日本です",
    options: ["Korea", "China", "Jepang", "Thailand"],
    correct: 2,
    explanation: "日本 (nihon) = Jepang."
  },
  {
    question: "何ですか",
    options: ["Siapa", "Di mana", "Apa", "Kapan"],
    correct: 2,
    explanation: "何 (nani) = Apa. ですか = particle tanya sopan."
  }
  // Bisa ditambah sampai 100+ soal
];

let currentQuizIndex = 0;

function initQuiz() {
  showQuizQuestion();
}

function showQuizQuestion() {
  const q = grammarQuiz[currentQuizIndex];
  document.getElementById('quiz-question-jp').textContent = q.question;
  const buttons = ['a', 'b', 'c', 'd'].map(id => document.getElementById(`option-${id}`));
  buttons.forEach((btn, i) => {
    btn.textContent = q.options[i];
    btn.className = 'bg-blue-100 hover:bg-blue-200 p-4 rounded-xl transition-all';
  });
  document.getElementById('quiz-counter').textContent = `${currentQuizIndex + 1} / ${grammarQuiz.length}`;
  document.getElementById('quiz-feedback').classList.add('hidden');
}

function checkAnswer(answerIndex) {
  const q = grammarQuiz[currentQuizIndex];
  const feedback = document.getElementById('quiz-feedback');
  const buttons = ['a', 'b', 'c', 'd'].map(id => document.getElementById(`option-${id}`));

  if (answerIndex === q.correct) {
    feedback.innerHTML = `✅ Benar! ${q.explanation}`;
    feedback.className = 'block text-center p-6 rounded-xl font-bold text-2xl bg-green-100 border-4 border-green-400 mb-6';
    buttons.forEach((btn, i) => {
      if (i === q.correct) btn.classList.add('bg-green-400', 'text-white');
    });
  } else {
    feedback.innerHTML = `❌ Salah. Jawaban benar: ${q.options[q.correct]}<br>${q.explanation}`;
    feedback.className = 'block text-center p-6 rounded-xl font-bold text-xl bg-red-100 border-4 border-red-400 mb-6';
    buttons[q.correct].classList.add('bg-green-400', 'text-white');
    buttons[answerIndex].classList.add('bg-red-400', 'text-white');
  }

  document.getElementById('next-question').classList.remove('hidden');
}

function nextQuestion() {
  currentQuizIndex = (currentQuizIndex + 1) % grammarQuiz.length;
  showQuizQuestion();
}
