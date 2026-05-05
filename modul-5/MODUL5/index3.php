<?php
$artikel = [
    'html' => [
        'judul'    => 'Belajar HTML Pertama Kali',
        'tanggal'  => '10 Maret 2026',
        'isi'      => 'Waktu pertama kali belajar HTML, aku bingung kenapa harus ada tag pembuka dan penutup. Tapi setelah bikin halaman pertama dan lihat hasilnya di browser — rasanya bangga banget! Dari sinilah semua perjalanan web development dimulai.',
        'referensi'=> ['https://developer.mozilla.org', 'https://w3schools.com'],
        'color'    => '#ef4444', // Red for HTML
        'icon'     => '🔥'
    ],
    'error' => [
        'judul'    => 'Error Pertama yang Bikin Pusing',
        'tanggal'  => '5 April 2026',
        'isi'      => 'Satu titik koma hilang, satu jam nyarinya. Itulah pelajaran pertamaku tentang debugging. Error bukan musuh — itu guru paling jujur.',
        'referensi'=> ['https://stackoverflow.com', 'https://php.net'],
        'color'    => '#f59e0b', // Orange for Error
        'icon'     => '🐛'
    ],
    'php' => [
        'judul'    => 'Akhirnya Ngerti PHP!',
        'tanggal'  => '1 Mei 2026',
        'isi'      => 'Setelah berminggu-minggu belajar, akhirnya paham variabel, kondisi, dan perulangan di PHP. Membuat form terasa seperti sihir.',
        'referensi'=> ['https://php.net/manual', 'https://laracasts.com'],
        'color'    => '#3b82f6', // Blue for PHP
        'icon'     => '⚡'
    ],
    'proyek' => [
        'judul'    => 'Proyek Pertama Selesai!',
        'tanggal'  => '29 Mei 2026',
        'isi'      => 'Akhirnya berhasil deploy aplikasi CRUD pertama. Walau sederhana, ini bukti aku bisa membangun sesuatu.',
        'referensi'=> ['https://github.com', 'https://digitalocean.com'],
        'color'    => '#10b981', // Green for Project
        'icon'     => '🚀'
    ],
];

$kutipan = [
    '"Setiap expert pernah jadi beginner."',
    '"Code is like humor. If you have to explain it, it\'s bad."',
    '"Belajar coding itu marathon, bukan sprint."',
    '"Error adalah guru terbaik."',
    '"Jangan takut salah, takutlah tidak mencoba."'
];

$kutipanHari = $kutipan[array_rand($kutipan)];
$slug = $_GET['artikel'] ?? null;
$pilihan = ($slug && isset($artikel[$slug])) ? $artikel[$slug] : null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog Developer 🚀</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  background: linear-gradient(-45deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
  background-size: 400% 400%;
  animation: gradientShift 15s ease infinite;
  min-height: 100vh;
  overflow-x: hidden;
}

@keyframes gradientShift {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

.container {
  max-width: 900px;
  margin: auto;
  padding: 20px;
  position: relative;
}

/* Floating Particles */
.particle {
  position: absolute;
  background: rgba(255,255,255,0.1);
  border-radius: 50%;
  pointer-events: none;
  animation: float 6s infinite linear;
}

@keyframes float {
  0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
  10% { opacity: 1; }
  90% { opacity: 1; }
  100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
}

/* HEADER */
.header {
  text-align: center;
  margin-bottom: 30px;
  position: relative;
  z-index: 10;
}

.badge {
  display: inline-block;
  background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(255,255,255,0.7));
  color: #4c1d95;
  font-size: 12px;
  font-weight: 700;
  padding: 8px 20px;
  border-radius: 50px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.15);
  backdrop-filter: blur(10px);
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.05); }
}

.header h1 {
  color: white;
  font-size: 3rem;
  font-weight: 800;
  margin-top: 15px;
  text-shadow: 0 10px 30px rgba(0,0,0,0.3);
  background: linear-gradient(135deg, #fff, #f0f0f0);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

/* QUOTE */
.quote {
  background: rgba(255,255,255,0.15);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255,255,255,0.2);
  color: white;
  padding: 25px 30px;
  border-radius: 25px;
  text-align: center;
  margin-bottom: 30px;
  font-size: 1.1rem;
  font-style: italic;
  box-shadow: 0 20px 40px rgba(0,0,0,0.1);
  position: relative;
  overflow: hidden;
}

.quote::before {
  content: '"';
  font-size: 4rem;
  position: absolute;
  top: -10px;
  left: 20px;
  opacity: 0.3;
  font-family: serif;
}

.quote::after {
  content: '"';
  font-size: 4rem;
  position: absolute;
  bottom: -20px;
  right: 20px;
  opacity: 0.3;
  font-family: serif;
}

/* MAIN CARD */
.card {
  background: rgba(255,255,255,0.95);
  backdrop-filter: blur(25px);
  border-radius: 30px;
  box-shadow: 
    0 25px 50px rgba(0,0,0,0.2),
    0 0 0 1px rgba(255,255,255,0.3);
  overflow: hidden;
  animation: slideUp 0.6s ease-out;
  border: 1px solid rgba(255,255,255,0.2);
}

@keyframes slideUp {
  from { opacity: 0; transform: translateY(50px); }
  to { opacity: 1; transform: translateY(0); }
}

/* LIST */
.list {
  padding: 0;
}

.list a {
  display: flex;
  align-items: center;
  padding: 20px 25px;
  text-decoration: none;
  color: #374151;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  border-bottom: 1px solid rgba(0,0,0,0.05);
  position: relative;
  overflow: hidden;
}

.list a::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 5px;
  background: transparent;
  transition: all 0.3s ease;
}

.list a:hover {
  background: linear-gradient(135deg, #fdf2f8, #fce7f3);
  transform: translateX(10px);
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  color: #1f2937;
}

.list a:hover::before {
  width: 5px;
  background: var(--article-color, #ec4899);
}

.active {
  background: linear-gradient(135deg, #ede9fe, #f3e8ff) !important;
  color: var(--article-color, #6366f1) !important;
  font-weight: 700;
  box-shadow: inset 0 2px 10px rgba(99, 102, 241, 0.2);
}

.active::before {
  width: 6px !important;
  background: var(--article-color, #6366f1) !important;
}

/* ARTICLE */
.article {
  padding: 40px;
  background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
}

.article-header {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 25px;
}

.icon-large {
  font-size: 2.5rem;
  background: linear-gradient(135deg, var(--article-color), rgba(0,0,0,0.1));
  width: 70px;
  height: 70px;
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.date {
  color: #6b7280;
  font-size: 0.95rem;
  font-weight: 600;
  background: rgba(99, 102, 241, 0.1);
  padding: 8px 16px;
  border-radius: 20px;
  border: 1px solid rgba(99, 102, 241, 0.2);
}

.article h3 {
  color: #1f2937;
  font-size: 2rem;
  font-weight: 800;
  margin-bottom: 20px;
  line-height: 1.2;
}

.article-content {
  color: #4b5563;
  line-height: 1.8;
  font-size: 1.1rem;
  margin-bottom: 30px;
}

.referensi {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
}

.tag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 0.85rem;
  font-weight: 600;
  background: linear-gradient(135deg, #f8fafc, #f1f5f9);
  color: #475569;
  padding: 10px 18px;
  border-radius: 25px;
  border: 1px solid rgba(0,0,0,0.05);
  transition: all 0.3s ease;
  text-decoration: none;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.tag:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.15);
  color: white;
  background: var(--article-color, #ec4899);
}

/* EMPTY STATE */
.empty {
  text-align: center;
  padding: 80px 40px;
  color: #9ca3af;
}

.empty-icon {
  font-size: 6rem;
  margin-bottom: 20px;
  opacity: 0.5;
}

.empty h3 {
  font-size: 1.5rem;
  margin-bottom: 10px;
  color: #6b7280;
}

.empty p {
  font-size: 1.1rem;
}

/* NAV */
.nav {
  display: flex;
  justify-content: space-between;
  padding: 25px;
  margin-top: 20px;
}

.nav a {
  display: flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  font-weight: 700;
  color: white;
  padding: 15px 25px;
  border-radius: 20px;
  background: linear-gradient(135deg, rgba(255,255,255,0.2), rgba(255,255,255,0.1));
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,0.2);
  transition: all 0.3s ease;
  box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.nav a:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 20px 40px rgba(0,0,0,0.2);
  background: linear-gradient(135deg, rgba(255,255,255,0.3), rgba(255,255,255,0.2));
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .container { padding: 15px; }
  .header h1 { font-size: 2rem; }
  .article { padding: 25px; }
  .nav { flex-direction: column; gap: 15px; }
  .article-header { flex-direction: column; text-align: center; }
}

/* SCROLLBAR */
::-webkit-scrollbar {
  width: 8px;
}
::-webkit-scrollbar-track {
  background: rgba(255,255,255,0.1);
}
::-webkit-scrollbar-thumb {
  background: rgba(255,255,255,0.3);
  border-radius: 4px;
}
</style>

</head>

<body>
<!-- Floating Particles -->
<?php for($i = 0; $i < 15; $i++): ?>
<div class="particle" style="
  left: <?= rand(0, 100) ?>%;
  animation-delay: <?= rand(0, 60) ?>s;
  animation-duration: <?= rand(8, 15) ?>s;
  width: <?= rand(4, 12) ?>px;
  height: <?= rand(4, 12) ?>px;
"></div>
<?php endfor; ?>

<div class="container">

<!-- HEADER -->
<div class="header">
  <span class="badge">
    <i class="fas fa-graduation-cap"></i> Praktikum PHP Blog
  </span>
  <h1>Blog Developer <i class="fas fa-rocket"></i></h1>
</div>

<!-- QUOTE -->
<div class="quote">
  <i class="fas fa-quote-left"></i>
  <?= htmlspecialchars($kutipanHari) ?>
</div>

<!-- CARD -->
<div class="card">

<!-- LIST -->
<div class="list">
<?php foreach ($artikel as $key => $art): ?>
  <a href="?artikel=<?= $key ?>" 
     class="<?= $slug === $key ? 'active' : '' ?>"
     style="--article-color: <?= $art['color'] ?>">
    <i class="fas fa-circle" style="color: <?= $art['color'] ?>; margin-right: 12px; font-size: 0.6rem;"></i>
    <?= htmlspecialchars($art['judul']) ?>
    <i class="fas fa-chevron-right" style="margin-left: auto; opacity: 0.5;"></i>
  </a>
<?php endforeach; ?>
</div>

<!-- DETAIL -->
<?php if ($pilihan): ?>
<div class="article" style="--article-color: <?= $pilihan['color'] ?>">
  <div class="article-header">
    <div class="icon-large" style="background: linear-gradient(135deg, <?= $pilihan['color'] ?>, <?= $pilihan['color'] ?>80);">
      <?= $pilihan['icon'] ?>
    </div>
    <div>
      <div class="date"><?= $pilihan['tanggal'] ?></div>
    </div>
  </div>

  <h3><?= htmlspecialchars($pilihan['judul']) ?></h3>

  <div class="article-content">
    <?= nl2br(htmlspecialchars($pilihan['isi'])) ?>
  </div>

  <p style="color: #6b7280; font-weight: 600; margin-bottom: 15px;">
    <i class="fas fa-bookmark"></i> Referensi:
  </p>
  <div class="referensi">
    <?php foreach ($pilihan['referensi'] as $ref): ?>
      <a href="<?= htmlspecialchars($ref) ?>" target="_blank" class="tag">
        <i class="fas fa-external-link-alt"></i>
        <?= htmlspecialchars(parse_url($ref, PHP_URL_HOST)) ?>
      </a>
    <?php endforeach; ?>
  </div>
</div>
<?php else: ?>
<div class="empty">
  <div class="empty-icon">
    <i class="fas fa-book-open"></i>
  </div>
  <h3>Pilih Artikel</h3>
  <p>Klik salah satu artikel di atas untuk membaca cerita perjalanan developer 🚀</p>
</div>
<?php endif; ?>

</div>

<!-- NAV -->
<div class="nav">
  <a href="index.php">
    <i class="fas fa-user"></i> Profil
  </a>
  <a href="index2.php">
    <i class="fas fa-stream"></i> Timeline
  </a>
</div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Smooth hover animations
  const links = document.querySelectorAll('.list a');
  links.forEach(link => {
    link.addEventListener('mouseenter', function() {
      this.style.transform = 'translateX(10px) scale(1.02)';
    });
    link.addEventListener('mouseleave', function() {
      this.style.transform = 'translateX(0) scale(1)';
    });
  });
});
</script>

</body>
</html>