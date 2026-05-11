const japaneseVocab = [
  { english: "Hello", japanese: "こんにちは", romaji: "konnichiwa", meaning: "Halo / Selamat siang. Usage: こんにちは、お元気ですか？ (Halo, apa kabar?)" },
  { english: "Goodbye", japanese: "さようなら", romaji: "sayounara", meaning: "Selamat tinggal (formal). Usage: さようなら、気をつけて (Selamat tinggal, hati-hati)." },
  { english: "Thank you", japanese: "ありがとう", romaji: "arigatou", meaning: "Terima kasih. Usage: ありがとうございます (arigatou gozaimasu - formal)." },
  { english: "Yes", japanese: "はい", romaji: "hai", meaning: "Ya. Usage: はい、そうです (Hai, betul)." },
  { english: "No", japanese: "いいえ", romaji: "iie", meaning: "Tidak. Usage: いいえ、分かりません (Tidak, saya tidak tahu)." },
  { english: "Please", japanese: "お願いします", romaji: "onegaishimasu", meaning: "Tolong. Usage: 水をお願いします (Air tolong)." },
  { english: "Sorry", japanese: "ごめんなさい", romaji: "gomen nasai", meaning: "Maaf. Usage: ごめんなさい、遅れました (Maaf, saya terlambat)." },
  { english: "Excuse me", japanese: "すみません", romaji: "sumimasen", meaning: "Permen, maaf. Usage: すみません、道を教えてください (Permen, tolong tunjukkan jalan)." },
  { english: "Good morning", japanese: "おはようございます", romaji: "ohayou gozaimasu", meaning: "Selamat pagi (formal). Usage: おはようございます、元気ですか？" },
  { english: "Good night", japanese: "おやすみなさい", romaji: "oyasumi nasai", meaning: "Selamat malam/tidur." },
  { english: "Student", japanese: "学生", romaji: "gakusei", meaning: "Pelajar/mahasiswa." },
  { english: "Teacher", japanese: "先生", romaji: "sensei", meaning: "Guru." },
  { english: "Book", japanese: "本", romaji: "hon", meaning: "Buku." },
  { english: "Water", japanese: "水", romaji: "mizu", meaning: "Air." },
  { english: "Food", japanese: "食べ物", romaji: "tabemono", meaning: "Makanan." },
  { english: "Friend", japanese: "友達", romaji: "tomodachi", meaning: "Teman." },
  { english: "Family", japanese: "家族", romaji: "kazoku", meaning: "Keluarga." },
  { english: "House", japanese: "家", romaji: "ie", meaning: "Rumah." },
  { english: "School", japanese: "学校", romaji: "gakkou", meaning: "Sekolah." },
  { english: "Japan", japanese: "日本", romaji: "nihon", meaning: "Jepang." },
  // Tambahkan 980 kosakata lagi untuk mencapai 1000. Berikut contoh batch:
  { english: "One", japanese: "一つ", romaji: "hitotsu", meaning: "Satu." },
  { english: "Two", japanese: "二つ", romaji: "futatsu", meaning: "Dua." },
  { english: "Big", japanese: "大きい", romaji: "ookii", meaning: "Besar." },
  { english: "Small", japanese: "小さい", romaji: "chiisai", meaning: "Kecil." },
  { english: "Hot", japanese: "熱い", romaji: "atsui", meaning: "Panas." },
  { english: "Cold", japanese: "冷たい", romaji: "samui", meaning: "Dingin." },
  { english: "Good", japanese: "いい", romaji: "ii", meaning: "Baik." },
  { english: "Bad", japanese: "悪い", romaji: "warui", meaning: "Buruk." },
  { english: "New", japanese: "新しい", romaji: "atarashii", meaning: "Baru." },
  { english: "Old", japanese: "古い", romaji: "furui", meaning: "Lama." },
  // ... (simulasi 1000 items dengan pattern serupa)
];

let currentVocabIndex = 0;

function initFlashcard() {
  showVocab(currentVocabIndex);
}

function showVocab(index) {
  const vocab = japaneseVocab[index];
  document.getElementById('vocab-english').textContent = vocab.english;
  document.getElementById('vocab-japanese').textContent = vocab.japanese;
  document.getElementById('vocab-romaji').textContent = vocab.romaji;
  document.getElementById('vocab-meaning').textContent = vocab.meaning;
  document.querySelector('.flashcard').dataset.index = index;
}

function nextVocab() {
  currentVocabIndex = (currentVocabIndex + 1) % japaneseVocab.length;
  showVocab(currentVocabIndex);
}

function prevVocab() {
  currentVocabIndex = (currentVocabIndex + currentVocabIndex === 0 ? japaneseVocab.length - 1 : currentVocabIndex - 1);
  showVocab(currentVocabIndex);
}

function flipCard() {
  const card = document.querySelector('.flashcard');
  card.classList.toggle('flipped');
}
