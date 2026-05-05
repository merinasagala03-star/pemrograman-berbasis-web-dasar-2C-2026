<?php
$timeline = [
    ["tahun"=>"2025","kegiatan"=>"Masuk kuliah"],
    ["tahun"=>"2025","kegiatan"=>"Belajar HTML"],
    ["tahun"=>"2026","kegiatan"=>"Belajar CSS & JS"],
    ["tahun"=>"2026","kegiatan"=>"Project pertama"],
    ["tahun"=>"2026","kegiatan"=>"Belajar PHP"]
];

function highlight($tahun) {
    return $tahun == "2026" ? "text-pink-600 font-bold" : "text-gray-700";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="https://cdn.tailwindcss.com"></script>
<title>Timeline</title>

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #ec4899, #6366f1);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* CARD */
.card {
    width: 100%;
    max-width: 600px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    padding: 25px;
    border-radius: 18px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.25);
    animation: fadeIn 0.5s ease;
}

/* ANIMATION */
@keyframes fadeIn {
    from {opacity:0; transform: translateY(20px);}
    to {opacity:1; transform: translateY(0);}
}

/* ITEM */
.item {
    display: flex;
    gap: 10px;
    padding: 10px;
    border-radius: 12px;
    transition: 0.3s;
    opacity: 0;
    transform: translateY(20px);
}

.item:hover {
    background: #fce7f3;
    transform: scale(1.02);
}

/* DOT */
.dot {
    width: 10px;
    height: 10px;
    background: #ec4899;
    border-radius: 50%;
    margin-top: 6px;
    position: relative;
}

.dot::after {
    content: "";
    position: absolute;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: rgba(236,72,153,0.3);
    top: -4px;
    left: -4px;
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0% {transform: scale(1); opacity: 1;}
    100% {transform: scale(1.8); opacity: 0;}
}

/* LINE */
.line {
    border-left: 3px solid #ec4899;
    padding-left: 15px;
}

/* TITLE */
h2 {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #be185d;
}
</style>
</head>

<body>

<div class="card">

<h2>🚀 Timeline Belajar Coding</h2>

<p class="text-gray-600 text-sm mb-4">
Perjalanan belajar dari nol hingga mulai membangun project nyata.
</p>

<div class="line">

<?php foreach ($timeline as $i => $data) { ?>

<div class="item" style="animation-delay: <?= $i * 0.15 ?>s;">
    <div class="dot"></div>
    <div>
        <span class="text-xs text-gray-400"><?= $data['tahun'] ?></span>
        <p class="<?= highlight($data['tahun']) ?>">
            <?= $data['kegiatan'] ?>
        </p>
    </div>
</div>

<?php } ?>

</div>

<p class="mt-4 text-xs text-gray-400 italic text-center">
Perjalanan masih panjang 🚀
</p>

<div class="mt-4 flex justify-between text-sm">
    <a href="index.php" class="text-pink-600">← Kembali</a>
    <a href="index3.php" class="text-indigo-600">Ke Blog →</a>
</div>

</div>

<!-- JS ANIMATION START -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".item");
    items.forEach((el, i) => {
        setTimeout(() => {
            el.style.opacity = "1";
            el.style.transform = "translateY(0)";
        }, i * 150);
    });
});
</script>

</body>
</html>