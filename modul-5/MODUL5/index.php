<?php
function tampilkanData($data) {
    echo "<div class='mt-8 overflow-hidden bg-gradient-to-r from-purple-50 to-indigo-50 rounded-3xl p-8 border border-white/50 shadow-2xl'>";
    echo "<div class='grid md:grid-cols-2 gap-6'>";
    foreach ($data as $key => $value) {
        $icon = match(strtolower($key)) {
            'nama' => '👤',
            'email' => '✉️',
            'whatsapp' => '📱',
            'framework' => '⚙️',
            'tools' => '🛠️',
            'minat' => '🎯',
            'skill' => '⭐',
            default => '📝'
        };
        echo "<div class='group flex items-center space-x-4 p-4 bg-white/70 backdrop-blur-sm rounded-2xl hover:bg-white hover:shadow-xl transition-all duration-300 border border-white/30 hover:-translate-y-1'>
                <div class='text-2xl p-3 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl shadow-lg group-hover:scale-110 transition-transform'>{$icon}</div>
                <div>
                    <div class='font-semibold text-gray-700 text-sm uppercase tracking-wide'>{$key}</div>
                    <div class='text-lg font-bold text-gray-900 mt-1 line-clamp-2'>{$value}</div>
                </div>
              </div>";
    }
    echo "</div></div>";
}

$pesan = "";
$hasil = [];
$pengalaman = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama'] ?? '');
    $id = trim($_POST['id'] ?? '');
    $ttl = trim($_POST['ttl'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $wa = trim($_POST['wa'] ?? '');
    $framework = trim($_POST['framework'] ?? '');
    $pengalaman = trim($_POST['pengalaman'] ?? '');
    $tools = $_POST['tools'] ?? [];
    $minat = $_POST['minat'] ?? '';
    $skill = $_POST['skill'] ?? '';

    // VALIDASI YANG LEBIH BAGUS
    $errors = [];
    
    if (empty($nama)) $errors[] = "Nama wajib diisi";
    if (empty($id)) $errors[] = "ID Developer wajib diisi";
    if (empty($ttl)) $errors[] = "Kota/Tgl Lahir wajib diisi";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid";
    if (empty($wa) || strlen($wa) < 10 || !ctype_digit($wa)) $errors[] = "Nomor WA minimal 10 digit angka";
    if (empty($framework)) $errors[] = "Framework wajib diisi";
    if (empty($pengalaman)) $errors[] = "Pengalaman wajib diisi";
    if (empty($minat)) $errors[] = "Minat wajib dipilih";
    if (empty($skill)) $errors[] = "Skill level wajib dipilih";

    if (empty($errors)) {
        $frameworkArray = array_map('trim', explode(",", $framework));
        
        if (count($frameworkArray) > 2) {
            $pesan = "🎉 Skill Anda cukup luas di bidang development! Mantap!";
        }

        $hasil = [
            "Nama Lengkap" => $nama,
            "ID Developer" => $id,
            "Kota/Tgl Lahir" => $ttl,
            "Email" => $email,
            "No WhatsApp" => "0" . $wa,
            "Framework" => implode(" • ", $frameworkArray),
            "Tools" => !empty($tools) ? implode(" • ", $tools) : "Belum ada",
            "Minat" => $minat,
            "Skill Level" => $skill
        ];
    } else {
        $pesan = implode("<br>", $errors);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Developer 🚀</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg {
            background: linear-gradient(-45deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .input-focus { 
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }
        .skill-bar {
            background: linear-gradient(90deg, #10b981, #f59e0b, #ef4444);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
    </style>
</head>

<body class="min-h-screen gradient-bg p-4 md:p-8">
    <!-- Floating Particles -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden z-0">
        <?php for($i = 0; $i < 20; $i++): ?>
        <div class="particle absolute bg-white/20 rounded-full" style="
            left: <?= rand(0, 100) ?>%;
            animation: float <?= rand(10, 20) ?>s infinite linear;
            width: <?= rand(8, 20) ?>px;
            height: <?= rand(8, 20) ?>px;
            animation-delay: <?= rand(0, 10) ?>s;
        "></div>
        <?php endfor; ?>
    </div>
    
    <style>
        .particle {
            animation: float 20s infinite linear;
        }
        @keyframes float {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
        }
    </style>

    <div class="max-w-4xl mx-auto relative z-10">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-xl px-8 py-4 rounded-3xl border border-white/30 shadow-2xl mb-8">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-pink-500 rounded-3xl flex items-center justify-center shadow-xl">
                    <i class="fas fa-user-astronaut text-2xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-4xl md:text-5xl font-black bg-gradient-to-r from-white to-gray-200 bg-clip-text text-transparent">
                        Developer Profile
                    </h1>
                    <p class="text-white/80 font-medium mt-1">Buat profil interaktif kamu!</p>
                </div>
            </div>
        </div>

        <!-- Main Card -->
        <div class="glass-card rounded-4xl shadow-2xl p-8 md:p-12">
            
            <!-- Form -->
            <form method="POST" class="space-y-6">
                
                <!-- Personal Info Row -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-user text-purple-500"></i>
                            Nama Lengkap
                        </label>
                        <input required 
                               class="w-full p-4 border-2 border-gray-200 rounded-2xl focus:border-purple-400 focus:outline-none transition-all duration-300 text-lg font-medium glass-input hover:shadow-md" 
                               type="text" 
                               name="nama" 
                               placeholder="Masukkan nama lengkap kamu"
                               value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-id-badge text-blue-500"></i>
                            ID Developer
                        </label>
                        <input required 
                               class="w-full p-4 border-2 border-gray-200 rounded-2xl focus:border-blue-400 focus:outline-none transition-all duration-300 text-lg font-medium glass-input hover:shadow-md" 
                               type="text" 
                               name="id" 
                               placeholder="Contoh: DEV001"
                               value="<?= htmlspecialchars($_POST['id'] ?? '') ?>">
                    </div>
                </div>

                <!-- Contact Row -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-map-marker-alt text-green-500"></i>
                            Kota/Tgl Lahir
                        </label>
                        <input required 
                               class="w-full p-4 border-2 border-gray-200 rounded-2xl focus:border-green-400 focus:outline-none transition-all duration-300 text-lg font-medium glass-input hover:shadow-md" 
                               type="text" 
                               name="ttl" 
                               placeholder="Jakarta, 15 Mei 2000"
                               value="<?= htmlspecialchars($_POST['ttl'] ?? '') ?>">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-envelope text-orange-500"></i>
                            Email
                        </label>
                        <input required 
                               class="w-full p-4 border-2 border-gray-200 rounded-2xl focus:border-orange-400 focus:outline-none transition-all duration-300 text-lg font-medium glass-input hover:shadow-md" 
                               type="email" 
                               name="email" 
                               placeholder="developer@email.com"
                               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    </div>
                </div>

                <!-- Contact & Framework -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fab fa-whatsapp text-green-600"></i>
                            No WhatsApp
                        </label>
                        <input required 
                               class="w-full p-4 border-2 border-gray-200 rounded-2xl focus:border-green-500 focus:outline-none transition-all duration-300 text-lg font-medium glass-input hover:shadow-md" 
                               type="tel" 
                               name="wa" 
                               placeholder="628xxxxxxxxx"
                               pattern="[0-9]{10,}"
                               value="<?= htmlspecialchars($_POST['wa'] ?? '') ?>">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-cogs text-indigo-500"></i>
                            Framework (pisah koma)
                        </label>
                        <input required 
                               class="w-full p-4 border-2 border-gray-200 rounded-2xl focus:border-indigo-400 focus:outline-none transition-all duration-300 text-lg font-medium glass-input hover:shadow-md" 
                               type="text" 
                               name="framework" 
                               placeholder="Laravel, Vue.js, Tailwind"
                               value="<?= htmlspecialchars($_POST['framework'] ?? '') ?>">
                    </div>
                </div>

                <!-- Experience -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                        <i class="fas fa-briefcase text-yellow-500"></i>
                        Pengalaman
                    </label>
                    <textarea required 
                              rows="4"
                              class="w-full p-4 border-2 border-gray-200 rounded-2xl focus:border-yellow-400 focus:outline-none transition-all duration-300 text-lg font-medium resize-vertical glass-input hover:shadow-md" 
                              name="pengalaman" 
                              placeholder="Ceritakan pengalaman development kamu..."><?= htmlspecialchars($pengalaman) ?></textarea>
                </div>

                <!-- Tools -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                        <i class="fas fa-tools text-gray-600"></i>
                        Tools & Software
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <label class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-xl hover:border-purple-300 hover:bg-purple-50 cursor-pointer transition-all group">
                            <input type="checkbox" name="tools[]" value="VS Code" class="w-5 h-5 text-purple-600 rounded">
                            <i class="fab fa-visual-studio-code text-2xl text-gray-700 group-hover:text-purple-500"></i>
                            <span class="font-medium">VS Code</span>
                        </label>
                        <label class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-xl hover:border-green-300 hover:bg-green-50 cursor-pointer transition-all group">
                            <input type="checkbox" name="tools[]" value="GitHub" class="w-5 h-5 text-green-600 rounded">
                            <i class="fab fa-github text-2xl text-gray-700 group-hover:text-green-500"></i>
                            <span class="font-medium">GitHub</span>
                        </label>
                        <label class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-xl hover:border-pink-300 hover:bg-pink-50 cursor-pointer transition-all group">
                            <input type="checkbox" name="tools[]" value="Figma" class="w-5 h-5 text-pink-600 rounded">
                            <i class="fab fa-figma text-2xl text-gray-700 group-hover:text-pink-500"></i>
                            <span class="font-medium">Figma</span>
                        </label>
                        <label class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-xl hover:border-orange-300 hover:bg-orange-50 cursor-pointer transition-all group">
                            <input type="checkbox" name="tools[]" value="Postman" class="w-5 h-5 text-orange-600 rounded">
                            <i class="fas fa-paper-plane text-2xl text-gray-700 group-hover:text-orange-500"></i>
                            <span class="font-medium">Postman</span>
                        </label>
                    </div>
                </div>

                <!-- Minat & Skill -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                            <i class="fas fa-heart text-red-500"></i>
                            Bidang Minat
                        </label>
                        <div class="space-y-3">
                            <label class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 hover:border-blue-300 transition-all">
                                <input required type="radio" name="minat" value="Frontend" class="w-5 h-5 text-blue-600 bg-blue-100 border-blue-300">
                                <div>
                                    <i class="fas fa-paint-brush text-2xl text-blue-500"></i>
                                    <span class="font-semibold ml-2">Frontend</span>
                                </div>
                            </label>
                            <label class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:border-green-300 transition-all">
                                <input type="radio" name="minat" value="Backend" class="w-5 h-5 text-green-600 bg-green-100 border-green-300">
                                <div>
                                    <i class="fas fa-server text-2xl text-green-500"></i>
                                    <span class="font-semibold ml-2">Backend</span>
                                </div>
                            </label>
                            <label class="flex items-center gap-3 p-4 border-2 border-gray-200 rounded-2xl cursor-pointer hover:bg-gradient-to-r hover:from-purple-50 hover:to-violet-50 hover:border-purple-300 transition-all">
                                <input type="radio" name="minat" value="Fullstack" class="w-5 h-5 text-purple-600 bg-purple-100 border-purple-300">
                                <div>
                                    <i class="fas fa-laptop-code text-2xl text-purple-500"></i>
                                    <span class="font-semibold ml-2">Fullstack</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-4 flex items-center gap-2">
                            <i class="fas fa-star text-yellow-500"></i>
                            Skill Level
                        </label>
                        <select required name="skill" class="w-full p-6 border-2 border-gray-200 rounded-3xl focus:border-yellow-400 focus:outline-none transition-all duration-300 text-lg font-semibold bg-gradient-to-r from-yellow-50 to-orange-50 hover:shadow-xl cursor-pointer">
                            <option value="">Pilih Level Skill</option>
                            <option value="Dasar" <?= ($_POST['skill'] ?? '') == 'Dasar' ? 'selected' : '' ?>>🟢 Dasar</option>
                            <option value="Cukup" <?= ($_POST['skill'] ?? '') == 'Cukup' ? 'selected' : '' ?>>🟡 Cukup</option>
                            <option value="Profesional" <?= ($_POST['skill'] ?? '') == 'Profesional' ? 'selected' : '' ?>>🟠 Profesional</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-8">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-bold py-6 px-8 rounded-3xl text-xl shadow-2xl hover:shadow-3xl hover:-translate-y-2 transition-all duration-300 flex items-center justify-center gap-3 group">
                        <i class="fas fa-rocket"></i>
                        <span>🚀 Generate My Profile</span>
                        <div class="w-8 h-8 bg-white/20 rounded-2xl group-hover:rotate-180 transition-transform"></div>
                    </button>
                </div>
            </form>

            <!-- Messages -->
            <?php if ($pesan): ?>
            <div class="mt-8 p-6 rounded-3xl border-4 <?= strpos($pesan, 'Skill Anda') !== false ? 'border-green-300 bg-gradient-to-r from-green-50 to-emerald-50' : 'border-red-300 bg-gradient-to-r from-rose-50 to-red-50' ?>">
                <div class="flex items-center gap-3">
                    <i class="fas <?= strpos($pesan, 'Skill Anda') !== false ? 'fa-trophy text-2xl text-green-500' : 'fa-exclamation-triangle text-2xl text-red-500' ?>"></i>
                    <div class="text-lg font-semibold <?= strpos($pesan, 'Skill Anda') !== false ? 'text-green-800' : 'text-red-800' ?>">
                        <?= $pesan ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Results -->
            <?php if ($hasil): ?>
                <?= tampilkanData($hasil) ?>
                
                <?php if ($pengalaman): ?>
                <div class="mt-8 p-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-3xl border border-blue-200">
                    <h3 class="text-xl font-bold mb-4 flex items-center gap-3 text-gray-800">
                        <i class="fas fa-quote-left text-2xl"></i>
                        Pengalaman
                    </h3>
                    <p class="text-lg leading-relaxed text-gray-700 italic">
                        <?= nl2br(htmlspecialchars($pengalaman)) ?>
                    </p>
                </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Navigation -->
            <div class="mt-12 pt-8 border-t-2 border-gray-100 text-center">
                <a href="timeline.php" 
                   class="inline-flex items-center gap-3 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-semibold py-4 px-8 rounded-3xl shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 text-lg">
                    <i class="fas fa-chart-line"></i>
                </a>
            </div>
        </div>
    </div>

    <script>
        // Auto-format WA number
        document.querySelector('input[name="wa"]').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '');
            if (this.value.startsWith('0')) {
                this.value = this.value.substring(1);
            }
            if (this.value.length > 13) {
                this.value = this.value.substring(0, 13);
            }
        });

        // Smooth scroll and animations
        document.querySelectorAll('input, select, textarea').forEach(el => {
            el.addEventListener('focus', function() {
                this.parentElement.classList.add('input-focus');
            });
            el.addEventListener('blur', function() {
                this.parentElement.classList.remove('input-focus');
            });
        });
    </script>
</body>
</html>