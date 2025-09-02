
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Typing - Latihan Mengetik</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Courier New', monospace;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .mode-selector {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            padding: 30px;
            background: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
        }

        .mode-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
        }

        .mode-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .mode-card.active {
            border-color: #007bff;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
        }

        .mode-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .mode-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        .mode-description {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.4;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
        }

        .stat-item {
            text-align: center;
            padding: 10px;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #495057;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 5px;
        }

        .typing-area {
            padding: 40px;
        }

        .text-display {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            font-size: 1.4rem;
            line-height: 2;
            border: 2px solid #e9ecef;
            min-height: 150px;
            font-family: 'Courier New', monospace;
        }

        .text-display.code-mode {
            background: #1e1e1e;
            color: #f0f0f0;
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
        }

        .word {
            display: inline-block;
            margin-right: 8px;
            margin-bottom: 8px;
            padding: 2px 4px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .word.current {
            background-color: #fff3cd;
            border: 2px solid #ffc107;
        }

        .word.completed {
            color: #6c757d;
            opacity: 0.6;
        }

        .word.error {
            background-color: #f8d7da;
            color: #721c24;
            font-weight: bold;
            border: 2px solid #dc3545;
        }

        .char {
            transition: all 0.1s ease;
        }

        .char.correct {
            color: #28a745;
            background-color: #d4edda;
        }

        .char.incorrect {
            color: #dc3545;
            background-color: #f8d7da;
            font-weight: bold;
        }

        .input-area {
            position: relative;
        }

        #typingInput {
            width: 100%;
            padding: 20px;
            font-size: 1.2rem;
            border: 3px solid #dee2e6;
            border-radius: 10px;
            outline: none;
            font-family: 'Courier New', monospace;
            transition: border-color 0.3s ease;
        }

        #typingInput:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .controls {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffc107, #e0a800);
            color: #212529;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e9ecef;
            border-radius: 4px;
            margin: 20px 0;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #28a745, #20c997);
            width: 0%;
            transition: width 0.3s ease;
        }

        .completion-message {
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border-radius: 10px;
            margin-top: 20px;
            display: none;
        }

        .completion-message h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .accuracy-display {
            margin-top: 15px;
            font-size: 1.1rem;
        }

        .hand-indicator {
            display: none;
            text-align: center;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .hand-indicator.left-hand {
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: white;
        }

        .hand-indicator.right-hand {
            background: linear-gradient(135deg, #4ecdc4, #44a08d);
            color: white;
        }

        .hand-indicator.right-index {
            background: linear-gradient(135deg, #ff9a9e, #fecfef);
            color: #333;
        }

        .hand-indicator.right-middle {
            background: linear-gradient(135deg, #a8edea, #fed6e3);
            color: #333;
        }

        .hand-indicator.right-ring {
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            color: #333;
        }

        .hand-indicator.right-pinky {
            background: linear-gradient(135deg, #ff8a80, #ff5722);
            color: white;
        }

        .english-word {
            font-weight: bold;
            color: #007bff;
        }

        .translation {
            color: #6c757d;
            font-style: italic;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .word.current {
            animation: pulse 1s infinite;
        }

        @media (max-width: 768px) {
            .mode-selector {
                grid-template-columns: 1fr;
            }
            
            .stats {
                flex-wrap: wrap;
                gap: 10px;
            }
            
            .controls {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⌨️ Belajar Typing</h1>
            <p>Platform pembelajaran mengetik dengan berbagai mode latihan</p>
        </div>

        <div class="mode-selector">
            <div class="mode-card" onclick="selectMode('basic')" id="mode-basic">
                <div class="mode-icon">📝</div>
                <div class="mode-title">Kata Dasar</div>
                <div class="mode-description">Latihan dengan kata-kata Indonesia sehari-hari</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('code')" id="mode-code">
                <div class="mode-icon">💻</div>
                <div class="mode-title">Kode Programming</div>
                <div class="mode-description">Latihan mengetik potongan kode</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('english')" id="mode-english">
                <div class="mode-icon">🇺🇸</div>
                <div class="mode-title">Bahasa Inggris</div>
                <div class="mode-description">Kosakata Inggris dengan terjemahan</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('lefthand')" id="mode-lefthand">
                <div class="mode-icon">👈</div>
                <div class="mode-title">Tangan Kiri</div>
                <div class="mode-description">Khusus huruf tangan kiri (Q,W,E,R,T,A,S,D,F,G,Z,X,C,V,B)</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('righthand')" id="mode-righthand">
                <div class="mode-icon">👉</div>
                <div class="mode-title">Tangan Kanan</div>
                <div class="mode-description">Khusus huruf tangan kanan (Y,U,I,O,P,H,J,K,L,N,M)</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('rightindex')" id="mode-rightindex">
                <div class="mode-icon">👆</div>
                <div class="mode-title">Jari Telunjuk Kanan</div>
                <div class="mode-description">Huruf Y, U, H, J, N, M</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('rightmiddle')" id="mode-rightmiddle">
                <div class="mode-icon">🖕</div>
                <div class="mode-title">Jari Tengah Kanan</div>
                <div class="mode-description">Huruf I, K</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('rightring')" id="mode-rightring">
                <div class="mode-icon">💍</div>
                <div class="mode-title">Jari Manis Kanan</div>
                <div class="mode-description">Huruf O, L</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('rightpinky')" id="mode-rightpinky">
                <div class="mode-icon">🤙</div>
                <div class="mode-title">Jari Kelingking Kanan</div>
                <div class="mode-description">Huruf P</div>
            </div>
        </div>

        <div class="stats">
            <div class="stat-item">
                <div class="stat-value" id="wpm">0</div>
                <div class="stat-label">WPM</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="accuracy">100%</div>
                <div class="stat-label">Akurasi</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="time">0</div>
                <div class="stat-label">Detik</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="progress">0/30</div>
                <div class="stat-label">Progress</div>
            </div>
        </div>

        <div class="progress-bar">
            <div class="progress-fill" id="progressFill"></div>
        </div>

        <div class="typing-area">
            <div class="hand-indicator" id="handIndicator"></div>
            
            <div class="text-display" id="textDisplay"></div>
            
            <div class="input-area">
                <input type="text" id="typingInput" placeholder="Mulai mengetik di sini..." autocomplete="off" spellcheck="false">
            </div>

            <div class="controls">
                <button class="btn btn-primary" onclick="startNewTest()">🔄 Tes Baru</button>
                <button class="btn btn-success" onclick="startEasyMode()">😊 Mode Mudah</button>
                <button class="btn btn-warning" onclick="startHardMode()">🔥 Mode Sulit</button>
            </div>

            <div class="completion-message" id="completionMessage">
                <h2>🎉 Selamat! Tes Selesai!</h2>
                <div class="accuracy-display" id="finalStats"></div>
            </div>
        </div>
    </div>

    <script>
        // Word lists - dapat dipindah ke file terpisah
        const wordLists = {
            basic: [
                "dan", "ini", "itu", "ada", "dia", "kamu", "saya", "kami", "mereka", "yang",
                "dari", "untuk", "dengan", "pada", "dalam", "akan", "sudah", "telah", "bisa", "dapat",
                "tidak", "juga", "hanya", "masih", "lebih", "sangat", "paling", "cukup", "agak", "tapi",
                "atau", "jika", "kalau", "ketika", "saat", "waktu", "hari", "tahun", "bulan", "minggu",
                "buat", "ambil", "kasih", "taruh", "lihat", "dengar", "bicara", "jalan", "lari", "naik",
                "turun", "masuk", "keluar", "datang", "pergi", "pulang", "tidur", "bangun", "makan", "minum",
                "kerja", "main", "baca", "tulis", "hitung", "pikir", "ingat", "lupa", "tahu", "kenal",
                "rumah", "mobil", "motor", "sepeda", "jalan", "toko", "pasar", "sekolah", "kantor", "hotel",
                "meja", "kursi", "tempat", "tidur", "lemari", "pintu", "jendela", "lantai", "atap", "dinding",
                "buku", "pensil", "pulpen", "kertas", "komputer", "telepon", "televisi", "radio", "jam", "kunci"
            ],
            
            code: [
                "function", "return", "const", "let", "var", "if", "else", "for", "while", "array",
                "console.log()", "document.getElementById()", "addEventListener", "querySelector",
                "parseInt()", "toString()", "JSON.parse()", "JSON.stringify()", "setTimeout",
                "class MyClass {", "constructor()", "this.property", "import React from",
                "export default", "async function", "await fetch()", "try { } catch",
                "== === != !==", "&& || !", "++ -- += -=", "=> function", "...spread",
                "{ key: value }", "[1, 2, 3, 4]", "new Date()", "Math.random()",
                ".map() .filter()", ".forEach() .reduce()", ".includes() .indexOf()",
                "getElementById", "createElement", "appendChild", "removeChild",
                "style.display", "className", "innerHTML", "textContent",
                "onclick onload", "keydown keyup", "mouseenter mouseleave",
                "padding margin", "border-radius", "background-color", "font-size",
                "#container .class", "position: absolute", "display: flex", "justify-content"
            ],
            
            english: [
                "hello:halo", "world:dunia", "computer:komputer", "keyboard:papan ketik", "mouse:tetikus",
                "screen:layar", "internet:internet", "website:situs web", "email:email", "password:kata sandi",
                "user:pengguna", "admin:administrator", "login:masuk", "logout:keluar", "register:daftar",
                "home:beranda", "about:tentang", "contact:kontak", "service:layanan", "product:produk",
                "price:harga", "buy:beli", "sell:jual", "search:cari", "find:temukan",
                "create:buat", "delete:hapus", "edit:ubah", "save:simpan", "cancel:batal",
                "open:buka", "close:tutup", "start:mulai", "stop:berhenti", "pause:jeda",
                "play:putar", "next:selanjutnya", "previous:sebelumnya", "first:pertama", "last:terakhir",
                "name:nama", "age:usia", "address:alamat", "phone:telepon", "family:keluarga",
                "friend:teman", "school:sekolah", "work:kerja", "office:kantor", "meeting:rapat",
                "time:waktu", "date:tanggal", "year:tahun", "month:bulan", "week:minggu",
                "today:hari ini", "tomorrow:besok", "yesterday:kemarin", "morning:pagi", "afternoon:siang",
                "evening:sore", "night:malam", "water:air", "food:makanan", "drink:minuman"
            ],
            
            lefthand: [
                "cat", "rat", "bat", "fat", "sat", "at", "as", "are", "car", "far",
                "bar", "tar", "war", "ear", "wear", "bear", "fear", "dear", "gear", "tear",
                "west", "best", "test", "rest", "nest", "fest", "guest", "chest", "quest",
                "water", "after", "later", "faster", "master", "matter", "better", "letter",
                "great", "bread", "break", "treat", "create", "breath", "threat", "sweat",
                "cart", "part", "start", "heart", "smart", "chart", "apart", "artist",
                "face", "race", "place", "trace", "space", "grace", "brace", "embrace",
                "cast", "fast", "last", "past", "vast", "blast", "coast", "beast",
                "read", "head", "dead", "lead", "bread", "thread", "spread", "dread",
                "tree", "free", "three", "agree", "degree", "freeze", "breeze", "cheese"
            ],
            
            righthand: [
                "you", "him", "joy", "boy", "toy", "oil", "boil", "coil", "foil", "soil",
                "moon", "soon", "noon", "spoon", "bloom", "boom", "room", "zoom", "groom",
                "pull", "full", "bull", "null", "skull", "dull", "hull", "mull", "cull",
                "join", "coin", "pain", "main", "rain", "gain", "train", "brain", "plain",
                "look", "book", "took", "cook", "hook", "brook", "crook", "shook", "nook",
                "loop", "hoop", "troop", "group", "scoop", "droop", "snoop", "stoop",
                "jump", "bump", "dump", "pump", "lump", "hump", "trump", "stump", "thump",
                "lion", "iron", "upon", "union", "onion", "melon", "lemon", "demon",
                "play", "pray", "gray", "clay", "fray", "spray", "stray", "delay", "relay",
                "milk", "silk", "bulk", "hulk", "sulk", "skulk", "mulch", "gulch", "lunch"
            ],
            
            rightindex: [
                "you", "yum", "yes", "yet", "yay", "yoga", "young", "youth", "your", "year",
                "hum", "huh", "hey", "him", "his", "hit", "hot", "hat", "hut", "hug",
                "huge", "hunt", "hurt", "hung", "hull", "hulk", "human", "humor", "humid",
                "jump", "just", "july", "june", "jury", "junk", "join", "joke", "jazz",
                "noon", "noun", "nine", "nice", "near", "neck", "need", "neat", "nest",
                "nuts", "null", "numb", "name", "navy", "nail", "news", "next", "node",
                "mum", "mud", "mug", "man", "map", "mat", "max", "may", "mix", "mom",
                "menu", "mind", "mine", "milk", "mild", "mint", "myth", "mood", "moon",
                "much", "must", "mute", "math", "mesh", "meat", "meet", "mega", "memo"
            ],
            
            rightmiddle: [
                "kit", "key", "kid", "kin", "king", "kind", "keep", "keen", "kick", "kill",
                "kite", "knee", "knew", "know", "knot", "kiwi", "keys", "kept", "kids",
                "inch", "info", "into", "idea", "item", "iron", "icon", "idle", "idol",
                "isle", "issue", "image", "inner", "input", "index", "indie", "ideal"
            ],
            
            rightring: [
                "old", "our", "oil", "owl", "oak", "oat", "odd", "off", "one", "own",
                "open", "oral", "oval", "over", "once", "only", "onto", "opus", "okra",
                "loop", "look", "love", "lose", "lost", "long", "load", "loan", "lock",
                "loud", "low", "lot", "log", "lab", "lap", "law", "lay", "led", "leg",
                "let", "lie", "lid", "lip", "lit", "live", "link", "line", "lime", "lion"
            ],
            
            rightpinky: [
                "pop", "put", "pen", "pan", "pat", "pay", "paw", "pod", "pub", "pup",
                "pile", "pine", "pink", "pipe", "pull", "pump", "punk", "pure", "push",
                "page", "pain", "pair", "pale", "palm", "park", "part", "pass", "past",
                "path", "peak", "peer", "pick", "pile", "plan", "play", "plot", "plus",
                "poem", "poet", "pool", "poor", "port", "post", "pour", "pray", "prep"
            ]
        };

        // Global variables
        let currentMode = 'basic';
        let currentWords = [];
        let currentWordIndex = 0;
        let currentCharIndex = 0;
        let startTime = null;
        let totalTypedChars = 0;
        let correctChars = 0;
        let testActive = false;
        let timer = null;

        function selectMode(mode) {
            // Remove active class from all mode cards
            document.querySelectorAll('.mode-card').forEach(card => {
                card.classList.remove('active');
            });
            
            // Add active class to selected mode
            document.getElementById(`mode-${mode}`).classList.add('active');
            
            currentMode = mode;
            
            // Update display based on mode
            const textDisplay = document.getElementById('textDisplay');
            const handIndicator = document.getElementById('handIndicator');
            
            // Reset classes
            textDisplay.classList.remove('code-mode');
            handIndicator.style.display = 'none';
            handIndicator.classList.remove('left-hand', 'right-hand');
            
            // Apply mode-specific styling
            if (mode === 'code') {
                textDisplay.classList.add('code-mode');
            } else if (mode === 'lefthand') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('left-hand');
                handIndicator.textContent = '👈 Mode Tangan Kiri - Gunakan huruf: Q,W,E,R,T,A,S,D,F,G,Z,X,C,V,B';
            } else if (mode === 'righthand') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('right-hand');
                handIndicator.textContent = '👉 Mode Tangan Kanan - Gunakan huruf: Y,U,I,O,P,H,J,K,L,N,M';
            } else if (mode === 'rightindex') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('right-index');
                handIndicator.textContent = '👆 Mode Jari Telunjuk Kanan - Gunakan huruf: Y, U, H, J, N, M';
            } else if (mode === 'rightmiddle') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('right-middle');
                handIndicator.textContent = '🖕 Mode Jari Tengah Kanan - Gunakan huruf: I, K';
            } else if (mode === 'rightring') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('right-ring');
                handIndicator.textContent = '💍 Mode Jari Manis Kanan - Gunakan huruf: O, L';
            } else if (mode === 'rightpinky') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('right-pinky');
                handIndicator.textContent = '🤙 Mode Jari Kelingking Kanan - Gunakan huruf: P';
            }
            
            startNewTest();
        }

        function getRandomWords(count = 30) {
            const words = wordLists[currentMode] || wordLists.basic;
            const shuffled = [...words].sort(() => 0.5 - Math.random());
            return shuffled.slice(0, count);
        }

        function displayText() {
            const textDisplay = document.getElementById('textDisplay');
            textDisplay.innerHTML = '';
            
            currentWords.forEach((word, wordIndex) => {
                const wordSpan = document.createElement('span');
                wordSpan.className = 'word';
                wordSpan.id = `word-${wordIndex}`;
                
                if (wordIndex === currentWordIndex) {
                    wordSpan.classList.add('current');
                } else if (wordIndex < currentWordIndex) {
                    wordSpan.classList.add('completed');
                }
                
                // Handle English mode with translations
                if (currentMode === 'english' && word.includes(':')) {
                    const [englishWord, translation] = word.split(':');
                    
                    const englishSpan = document.createElement('span');
                    englishSpan.className = 'english-word';
                    englishWord.split('').forEach((char, charIndex) => {
                        const charSpan = document.createElement('span');
                        charSpan.className = 'char';
                        charSpan.textContent = char;
                        charSpan.id = `char-${wordIndex}-${charIndex}`;
                        englishSpan.appendChild(charSpan);
                    });
                    
                    const translationSpan = document.createElement('span');
                    translationSpan.className = 'translation';
                    translationSpan.textContent = ` (${translation})`;
                    
                    wordSpan.appendChild(englishSpan);
                    wordSpan.appendChild(translationSpan);
                } else {
                    word.split('').forEach((char, charIndex) => {
                        const charSpan = document.createElement('span');
                        charSpan.className = 'char';
                        charSpan.textContent = char;
                        charSpan.id = `char-${wordIndex}-${charIndex}`;
                        wordSpan.appendChild(charSpan);
                    });
                }
                
                textDisplay.appendChild(wordSpan);
            });
        }

        function updateProgress() {
            const progress = Math.round((currentWordIndex / currentWords.length) * 100);
            document.getElementById('progressFill').style.width = `${progress}%`;
            document.getElementById('progress').textContent = `${currentWordIndex}/${currentWords.length}`;
        }

        function calculateWPM() {
            if (!startTime) return 0;
            const timeElapsed = (Date.now() - startTime) / 1000 / 60;
            const wordsTyped = currentWordIndex + (currentCharIndex > 0 ? 1 : 0);
            return Math.round(wordsTyped / timeElapsed) || 0;
        }

        function calculateAccuracy() {
            if (totalTypedChars === 0) return 100;
            return Math.round((correctChars / totalTypedChars) * 100);
        }

        function updateStats() {
            if (!testActive) return;
            
            const timeElapsed = startTime ? Math.round((Date.now() - startTime) / 1000) : 0;
            document.getElementById('time').textContent = timeElapsed;
            document.getElementById('wpm').textContent = calculateWPM();
            document.getElementById('accuracy').textContent = calculateAccuracy() + '%';
            updateProgress();
        }

        function getCurrentWord() {
            let word = currentWords[currentWordIndex];
            if (currentMode === 'english' && word.includes(':')) {
                word = word.split(':')[0]; // Only the English word for typing
            }
            return word;
        }

        function handleInput(event) {
            const input = event.target;
            const inputValue = input.value;
            
            if (!testActive) {
                startTime = Date.now();
                testActive = true;
                timer = setInterval(updateStats, 100);
            }

            const currentWord = getCurrentWord();
            const currentWordElement = document.getElementById(`word-${currentWordIndex}`);
            
            if (inputValue.endsWith(' ') && inputValue.trim() === currentWord) {
                currentWordElement.classList.remove('current', 'error');
                currentWordElement.classList.add('completed');
                
                input.value = '';
                currentWordIndex++;
                currentCharIndex = 0;
                
                if (currentWordIndex < currentWords.length) {
                    const nextWordElement = document.getElementById(`word-${currentWordIndex}`);
                    nextWordElement.classList.add('current');
                } else {
                    completeTest();
                    return;
                }
            } else {
                currentWordElement.classList.remove('error');
                
                for (let i = 0; i < currentWord.length; i++) {
                    const charElement = document.getElementById(`char-${currentWordIndex}-${i}`);
                    if (charElement) {
                        charElement.classList.remove('correct', 'incorrect');
                    }
                }
                
                const typedWord = inputValue.replace(/ $/, '');
                let hasError = false;
                
                for (let i = 0; i < Math.max(typedWord.length, currentWord.length); i++) {
                    const charElement = document.getElementById(`char-${currentWordIndex}-${i}`);
                    
                    if (i < typedWord.length && charElement) {
                        if (i < currentWord.length && typedWord[i] === currentWord[i]) {
                            charElement.classList.add('correct');
                            if (!charElement.dataset.counted) {
                                correctChars++;
                                totalTypedChars++;
                                charElement.dataset.counted = 'true';
                            }
                        } else {
                            charElement.classList.add('incorrect');
                            hasError = true;
                            if (!charElement.dataset.counted) {
                                totalTypedChars++;
                                charElement.dataset.counted = 'true';
                            }
                        }
                    } else if (charElement) {
                        charElement.dataset.counted = '';
                    }
                }
                
                if (hasError || typedWord.length > currentWord.length) {
                    currentWordElement.classList.add('error');
                }
                
                currentCharIndex = typedWord.length;
            }
            
            updateStats();
        }

        function completeTest() {
            testActive = false;
            clearInterval(timer);
            
            const finalTime = Math.round((Date.now() - startTime) / 1000);
            const finalWPM = calculateWPM();
            const finalAccuracy = calculateAccuracy();
            
            document.getElementById('completionMessage').style.display = 'block';
            document.getElementById('finalStats').innerHTML = `
                <p><strong>Mode:</strong> ${getModeTitle()}</p>
                <p><strong>Waktu:</strong> ${finalTime} detik</p>
                <p><strong>Kecepatan:</strong> ${finalWPM} WPM</p>
                <p><strong>Akurasi:</strong> ${finalAccuracy}%</p>
                <p><strong>Kata Selesai:</strong> ${currentWords.length}</p>
            `;
            
            document.getElementById('typingInput').disabled = true;
        }

        function getModeTitle() {
            const titles = {
                'basic': 'Kata Dasar',
                'code': 'Kode Programming',
                'english': 'Bahasa Inggris',
                'lefthand': 'Tangan Kiri',
                'righthand': 'Tangan Kanan'
            };
            return titles[currentMode] || 'Unknown';
        }

        function resetTest() {
            currentWordIndex = 0;
            currentCharIndex = 0;
            startTime = null;
            totalTypedChars = 0;
            correctChars = 0;
            testActive = false;
            
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
            
            document.getElementById('typingInput').value = '';
            document.getElementById('typingInput').disabled = false;
            document.getElementById('completionMessage').style.display = 'none';
            
            document.querySelectorAll('.char').forEach(char => {
                char.dataset.counted = '';
                char.classList.remove('correct', 'incorrect');
            });
            
            document.getElementById('wpm').textContent = '0';
            document.getElementById('accuracy').textContent = '100%';
            document.getElementById('time').textContent = '0';
            document.getElementById('progressFill').style.width = '0%';
        }

        function startNewTest() {
            resetTest();
            currentWords = getRandomWords(30);
            displayText();
            updateProgress();
            document.getElementById('typingInput').focus();
        }

        function startEasyMode() {
            resetTest();
            let easyWords;
            
            if (currentMode === 'basic') {
                easyWords = wordLists.basic.filter(word => word.length <= 4);
                currentWords = easyWords.sort(() => 0.5 - Math.random()).slice(0, 25);
            } else if (currentMode === 'code') {
                easyWords = wordLists.code.filter(word => word.length <= 10);
                currentWords = easyWords.sort(() => 0.5 - Math.random()).slice(0, 20);
            } else if (currentMode === 'english') {
                easyWords = wordLists.english.filter(word => word.split(':')[0].length <= 5);
                currentWords = easyWords.sort(() => 0.5 - Math.random()).slice(0, 25);
            } else {
                easyWords = wordLists[currentMode].filter(word => word.length <= 4);
                currentWords = easyWords.sort(() => 0.5 - Math.random()).slice(0, 25);
            }
            
            displayText();
            updateProgress();
            document.getElementById('typingInput').focus();
        }

        function startHardMode() {
            resetTest();
            let hardWords;
            
            if (currentMode === 'basic') {
                hardWords = wordLists.basic.filter(word => word.length >= 6);
                currentWords = [...hardWords, ...getRandomWords(20)].slice(0, 40);
            } else if (currentMode === 'code') {
                hardWords = wordLists.code.filter(word => word.length >= 12);
                currentWords = [...hardWords, ...getRandomWords(15)].slice(0, 35);
            } else if (currentMode === 'english') {
                hardWords = wordLists.english.filter(word => word.split(':')[0].length >= 7);
                currentWords = [...hardWords, ...getRandomWords(20)].slice(0, 35);
            } else {
                hardWords = wordLists[currentMode].filter(word => word.length >= 6);
                currentWords = [...hardWords, ...getRandomWords(15)].slice(0, 40);
            }
            
            displayText();
            updateProgress();
            document.getElementById('typingInput').focus();
        }

        // Event listeners
        document.getElementById('typingInput').addEventListener('input', handleInput);
        
        document.getElementById('typingInput').addEventListener('keydown', function(e) {
            if (e.code === 'Space' && e.target === this) {
                e.stopPropagation();
            }
        });

        document.getElementById('textDisplay').addEventListener('click', function() {
            document.getElementById('typingInput').focus();
        });

        // Initialize
        window.addEventListener('load', function() {
            selectMode('basic');
        });

        // Function to load external word lists (for future use)
        async function loadWordList(filename) {
            try {
                const response = await fetch(filename);
                const text = await response.text();
                return text.split('\n').filter(word => word.trim() !== '');
            } catch (error) {
                console.error('Error loading word list:', error);
                return [];
            }
        }

        // Example usage for loading external files:
        // loadWordList('wordlists/basic.txt').then(words => {
        //     wordLists.basic = words;
        // });
    </script>
</body>
</html>
                '
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Typing - Latihan Mengetik</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Courier New', monospace;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .mode-selector {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            padding: 30px;
            background: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
        }

        .mode-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
        }

        .mode-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .mode-card.active {
            border-color: #007bff;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
        }

        .mode-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .mode-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        .mode-description {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.4;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
        }

        .stat-item {
            text-align: center;
            padding: 10px;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #495057;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 5px;
        }

        .typing-area {
            padding: 40px;
        }

        .text-display {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            font-size: 1.4rem;
            line-height: 2;
            border: 2px solid #e9ecef;
            min-height: 150px;
            font-family: 'Courier New', monospace;
        }

        .text-display.code-mode {
            background: #1e1e1e;
            color: #f0f0f0;
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
        }

        .word {
            display: inline-block;
            margin-right: 8px;
            margin-bottom: 8px;
            padding: 2px 4px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .word.current {
            background-color: #fff3cd;
            border: 2px solid #ffc107;
        }

        .word.completed {
            color: #6c757d;
            opacity: 0.6;
        }

        .word.error {
            background-color: #f8d7da;
            color: #721c24;
            font-weight: bold;
            border: 2px solid #dc3545;
        }

        .char {
            transition: all 0.1s ease;
        }

        .char.correct {
            color: #28a745;
            background-color: #d4edda;
        }

        .char.incorrect {
            color: #dc3545;
            background-color: #f8d7da;
            font-weight: bold;
        }

        .input-area {
            position: relative;
        }

        #typingInput {
            width: 100%;
            padding: 20px;
            font-size: 1.2rem;
            border: 3px solid #dee2e6;
            border-radius: 10px;
            outline: none;
            font-family: 'Courier New', monospace;
            transition: border-color 0.3s ease;
        }

        #typingInput:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .controls {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffc107, #e0a800);
            color: #212529;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e9ecef;
            border-radius: 4px;
            margin: 20px 0;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #28a745, #20c997);
            width: 0%;
            transition: width 0.3s ease;
        }

        .completion-message {
            text-align: center;
            padding: 30px;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border-radius: 10px;
            margin-top: 20px;
            display: none;
        }

        .completion-message h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .accuracy-display {
            margin-top: 15px;
            font-size: 1.1rem;
        }

        .hand-indicator {
            display: none;
            text-align: center;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .hand-indicator.left-hand {
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: white;
        }

        .hand-indicator.right-hand {
            background: linear-gradient(135deg, #4ecdc4, #44a08d);
            color: white;
        }

        .hand-indicator.right-index {
            background: linear-gradient(135deg, #ff9a9e, #fecfef);
            color: #333;
        }

        .hand-indicator.right-middle {
            background: linear-gradient(135deg, #a8edea, #fed6e3);
            color: #333;
        }

        .hand-indicator.right-ring {
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            color: #333;
        }

        .hand-indicator.right-pinky {
            background: linear-gradient(135deg, #ff8a80, #ff5722);
            color: white;
        }

        .english-word {
            font-weight: bold;
            color: #007bff;
        }

        .translation {
            color: #6c757d;
            font-style: italic;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .word.current {
            animation: pulse 1s infinite;
        }

        @media (max-width: 768px) {
            .mode-selector {
                grid-template-columns: 1fr;
            }
            
            .stats {
                flex-wrap: wrap;
                gap: 10px;
            }
            
            .controls {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>⌨️ Belajar Typing</h1>
            <p>Platform pembelajaran mengetik dengan berbagai mode latihan</p>
        </div>

        <div class="mode-selector">
            <div class="mode-card" onclick="selectMode('basic')" id="mode-basic">
                <div class="mode-icon">📝</div>
                <div class="mode-title">Kata Dasar</div>
                <div class="mode-description">Latihan dengan kata-kata Indonesia sehari-hari</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('code')" id="mode-code">
                <div class="mode-icon">💻</div>
                <div class="mode-title">Kode Programming</div>
                <div class="mode-description">Latihan mengetik potongan kode</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('english')" id="mode-english">
                <div class="mode-icon">🇺🇸</div>
                <div class="mode-title">Bahasa Inggris</div>
                <div class="mode-description">Kosakata Inggris dengan terjemahan</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('lefthand')" id="mode-lefthand">
                <div class="mode-icon">👈</div>
                <div class="mode-title">Tangan Kiri</div>
                <div class="mode-description">Khusus huruf tangan kiri (Q,W,E,R,T,A,S,D,F,G,Z,X,C,V,B)</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('righthand')" id="mode-righthand">
                <div class="mode-icon">👉</div>
                <div class="mode-title">Tangan Kanan</div>
                <div class="mode-description">Khusus huruf tangan kanan (Y,U,I,O,P,H,J,K,L,N,M)</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('rightindex')" id="mode-rightindex">
                <div class="mode-icon">👆</div>
                <div class="mode-title">Jari Telunjuk Kanan</div>
                <div class="mode-description">Huruf Y, U, H, J, N, M</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('rightmiddle')" id="mode-rightmiddle">
                <div class="mode-icon">🖕</div>
                <div class="mode-title">Jari Tengah Kanan</div>
                <div class="mode-description">Huruf I, K</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('rightring')" id="mode-rightring">
                <div class="mode-icon">💍</div>
                <div class="mode-title">Jari Manis Kanan</div>
                <div class="mode-description">Huruf O, L</div>
            </div>
            
            <div class="mode-card" onclick="selectMode('rightpinky')" id="mode-rightpinky">
                <div class="mode-icon">🤙</div>
                <div class="mode-title">Jari Kelingking Kanan</div>
                <div class="mode-description">Huruf P</div>
            </div>
        </div>

        <div class="stats">
            <div class="stat-item">
                <div class="stat-value" id="wpm">0</div>
                <div class="stat-label">WPM</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="accuracy">100%</div>
                <div class="stat-label">Akurasi</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="time">0</div>
                <div class="stat-label">Detik</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="progress">0/30</div>
                <div class="stat-label">Progress</div>
            </div>
        </div>

        <div class="progress-bar">
            <div class="progress-fill" id="progressFill"></div>
        </div>

        <div class="typing-area">
            <div class="hand-indicator" id="handIndicator"></div>
            
            <div class="text-display" id="textDisplay"></div>
            
            <div class="input-area">
                <input type="text" id="typingInput" placeholder="Mulai mengetik di sini..." autocomplete="off" spellcheck="false">
            </div>

            <div class="controls">
                <button class="btn btn-primary" onclick="startNewTest()">🔄 Tes Baru</button>
                <button class="btn btn-success" onclick="startEasyMode()">😊 Mode Mudah</button>
                <button class="btn btn-warning" onclick="startHardMode()">🔥 Mode Sulit</button>
            </div>

            <div class="completion-message" id="completionMessage">
                <h2>🎉 Selamat! Tes Selesai!</h2>
                <div class="accuracy-display" id="finalStats"></div>
            </div>
        </div>
    </div>

    <script>
        // Word lists - dapat dipindah ke file terpisah
        const wordLists = {
            basic: [
                "dan", "ini", "itu", "ada", "dia", "kamu", "saya", "kami", "mereka", "yang",
                "dari", "untuk", "dengan", "pada", "dalam", "akan", "sudah", "telah", "bisa", "dapat",
                "tidak", "juga", "hanya", "masih", "lebih", "sangat", "paling", "cukup", "agak", "tapi",
                "atau", "jika", "kalau", "ketika", "saat", "waktu", "hari", "tahun", "bulan", "minggu",
                "buat", "ambil", "kasih", "taruh", "lihat", "dengar", "bicara", "jalan", "lari", "naik",
                "turun", "masuk", "keluar", "datang", "pergi", "pulang", "tidur", "bangun", "makan", "minum",
                "kerja", "main", "baca", "tulis", "hitung", "pikir", "ingat", "lupa", "tahu", "kenal",
                "rumah", "mobil", "motor", "sepeda", "jalan", "toko", "pasar", "sekolah", "kantor", "hotel",
                "meja", "kursi", "tempat", "tidur", "lemari", "pintu", "jendela", "lantai", "atap", "dinding",
                "buku", "pensil", "pulpen", "kertas", "komputer", "telepon", "televisi", "radio", "jam", "kunci"
            ],
            
            code: [
                "function", "return", "const", "let", "var", "if", "else", "for", "while", "array",
                "console.log()", "document.getElementById()", "addEventListener", "querySelector",
                "parseInt()", "toString()", "JSON.parse()", "JSON.stringify()", "setTimeout",
                "class MyClass {", "constructor()", "this.property", "import React from",
                "export default", "async function", "await fetch()", "try { } catch",
                "== === != !==", "&& || !", "++ -- += -=", "=> function", "...spread",
                "{ key: value }", "[1, 2, 3, 4]", "new Date()", "Math.random()",
                ".map() .filter()", ".forEach() .reduce()", ".includes() .indexOf()",
                "getElementById", "createElement", "appendChild", "removeChild",
                "style.display", "className", "innerHTML", "textContent",
                "onclick onload", "keydown keyup", "mouseenter mouseleave",
                "padding margin", "border-radius", "background-color", "font-size",
                "#container .class", "position: absolute", "display: flex", "justify-content"
            ],
            
            english: [
                "hello:halo", "world:dunia", "computer:komputer", "keyboard:papan ketik", "mouse:tetikus",
                "screen:layar", "internet:internet", "website:situs web", "email:email", "password:kata sandi",
                "user:pengguna", "admin:administrator", "login:masuk", "logout:keluar", "register:daftar",
                "home:beranda", "about:tentang", "contact:kontak", "service:layanan", "product:produk",
                "price:harga", "buy:beli", "sell:jual", "search:cari", "find:temukan",
                "create:buat", "delete:hapus", "edit:ubah", "save:simpan", "cancel:batal",
                "open:buka", "close:tutup", "start:mulai", "stop:berhenti", "pause:jeda",
                "play:putar", "next:selanjutnya", "previous:sebelumnya", "first:pertama", "last:terakhir",
                "name:nama", "age:usia", "address:alamat", "phone:telepon", "family:keluarga",
                "friend:teman", "school:sekolah", "work:kerja", "office:kantor", "meeting:rapat",
                "time:waktu", "date:tanggal", "year:tahun", "month:bulan", "week:minggu",
                "today:hari ini", "tomorrow:besok", "yesterday:kemarin", "morning:pagi", "afternoon:siang",
                "evening:sore", "night:malam", "water:air", "food:makanan", "drink:minuman"
            ],
            
            lefthand: [
                "cat", "rat", "bat", "fat", "sat", "at", "as", "are", "car", "far",
                "bar", "tar", "war", "ear", "wear", "bear", "fear", "dear", "gear", "tear",
                "west", "best", "test", "rest", "nest", "fest", "guest", "chest", "quest",
                "water", "after", "later", "faster", "master", "matter", "better", "letter",
                "great", "bread", "break", "treat", "create", "breath", "threat", "sweat",
                "cart", "part", "start", "heart", "smart", "chart", "apart", "artist",
                "face", "race", "place", "trace", "space", "grace", "brace", "embrace",
                "cast", "fast", "last", "past", "vast", "blast", "coast", "beast",
                "read", "head", "dead", "lead", "bread", "thread", "spread", "dread",
                "tree", "free", "three", "agree", "degree", "freeze", "breeze", "cheese"
            ],
            
            righthand: [
                "you", "him", "joy", "boy", "toy", "oil", "boil", "coil", "foil", "soil",
                "moon", "soon", "noon", "spoon", "bloom", "boom", "room", "zoom", "groom",
                "pull", "full", "bull", "null", "skull", "dull", "hull", "mull", "cull",
                "join", "coin", "pain", "main", "rain", "gain", "train", "brain", "plain",
                "look", "book", "took", "cook", "hook", "brook", "crook", "shook", "nook",
                "loop", "hoop", "troop", "group", "scoop", "droop", "snoop", "stoop",
                "jump", "bump", "dump", "pump", "lump", "hump", "trump", "stump", "thump",
                "lion", "iron", "upon", "union", "onion", "melon", "lemon", "demon",
                "play", "pray", "gray", "clay", "fray", "spray", "stray", "delay", "relay",
                "milk", "silk", "bulk", "hulk", "sulk", "skulk", "mulch", "gulch", "lunch"
            ],
            
            rightindex: [
                "you", "yum", "yes", "yet", "yay", "yoga", "young", "youth", "your", "year",
                "hum", "huh", "hey", "him", "his", "hit", "hot", "hat", "hut", "hug",
                "huge", "hunt", "hurt", "hung", "hull", "hulk", "human", "humor", "humid",
                "jump", "just", "july", "june", "jury", "junk", "join", "joke", "jazz",
                "noon", "noun", "nine", "nice", "near", "neck", "need", "neat", "nest",
                "nuts", "null", "numb", "name", "navy", "nail", "news", "next", "node",
                "mum", "mud", "mug", "man", "map", "mat", "max", "may", "mix", "mom",
                "menu", "mind", "mine", "milk", "mild", "mint", "myth", "mood", "moon",
                "much", "must", "mute", "math", "mesh", "meat", "meet", "mega", "memo"
            ],
            
            rightmiddle: [
                "kit", "key", "kid", "kin", "king", "kind", "keep", "keen", "kick", "kill",
                "kite", "knee", "knew", "know", "knot", "kiwi", "keys", "kept", "kids",
                "inch", "info", "into", "idea", "item", "iron", "icon", "idle", "idol",
                "isle", "issue", "image", "inner", "input", "index", "indie", "ideal"
            ],
            
            rightring: [
                "old", "our", "oil", "owl", "oak", "oat", "odd", "off", "one", "own",
                "open", "oral", "oval", "over", "once", "only", "onto", "opus", "okra",
                "loop", "look", "love", "lose", "lost", "long", "load", "loan", "lock",
                "loud", "low", "lot", "log", "lab", "lap", "law", "lay", "led", "leg",
                "let", "lie", "lid", "lip", "lit", "live", "link", "line", "lime", "lion"
            ],
            
            rightpinky: [
                "pop", "put", "pen", "pan", "pat", "pay", "paw", "pod", "pub", "pup",
                "pile", "pine", "pink", "pipe", "pull", "pump", "punk", "pure", "push",
                "page", "pain", "pair", "pale", "palm", "park", "part", "pass", "past",
                "path", "peak", "peer", "pick", "pile", "plan", "play", "plot", "plus",
                "poem", "poet", "pool", "poor", "port", "post", "pour", "pray", "prep"
            ]
        };

        // Global variables
        let currentMode = 'basic';
        let currentWords = [];
        let currentWordIndex = 0;
        let currentCharIndex = 0;
        let startTime = null;
        let totalTypedChars = 0;
        let correctChars = 0;
        let testActive = false;
        let timer = null;

        function selectMode(mode) {
            // Remove active class from all mode cards
            document.querySelectorAll('.mode-card').forEach(card => {
                card.classList.remove('active');
            });
            
            // Add active class to selected mode
            document.getElementById(`mode-${mode}`).classList.add('active');
            
            currentMode = mode;
            
            // Update display based on mode
            const textDisplay = document.getElementById('textDisplay');
            const handIndicator = document.getElementById('handIndicator');
            
            // Reset classes
            textDisplay.classList.remove('code-mode');
            handIndicator.style.display = 'none';
            handIndicator.classList.remove('left-hand', 'right-hand');
            
            // Apply mode-specific styling
            if (mode === 'code') {
                textDisplay.classList.add('code-mode');
            } else if (mode === 'lefthand') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('left-hand');
                handIndicator.textContent = '👈 Mode Tangan Kiri - Gunakan huruf: Q,W,E,R,T,A,S,D,F,G,Z,X,C,V,B';
            } else if (mode === 'righthand') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('right-hand');
                handIndicator.textContent = '👉 Mode Tangan Kanan - Gunakan huruf: Y,U,I,O,P,H,J,K,L,N,M';
            } else if (mode === 'rightindex') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('right-index');
                handIndicator.textContent = '👆 Mode Jari Telunjuk Kanan - Gunakan huruf: Y, U, H, J, N, M';
            } else if (mode === 'rightmiddle') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('right-middle');
                handIndicator.textContent = '🖕 Mode Jari Tengah Kanan - Gunakan huruf: I, K';
            } else if (mode === 'rightring') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('right-ring');
                handIndicator.textContent = '💍 Mode Jari Manis Kanan - Gunakan huruf: O, L';
            } else if (mode === 'rightpinky') {
                handIndicator.style.display = 'block';
                handIndicator.classList.add('right-pinky');
                handIndicator.textContent = '🤙 Mode Jari Kelingking Kanan - Gunakan huruf: P';
            }
            
            startNewTest();
        }

        function getRandomWords(count = 30) {
            const words = wordLists[currentMode] || wordLists.basic;
            const shuffled = [...words].sort(() => 0.5 - Math.random());
            return shuffled.slice(0, count);
        }

        function displayText() {
            const textDisplay = document.getElementById('textDisplay');
            textDisplay.innerHTML = '';
            
            currentWords.forEach((word, wordIndex) => {
                const wordSpan = document.createElement('span');
                wordSpan.className = 'word';
                wordSpan.id = `word-${wordIndex}`;
                
                if (wordIndex === currentWordIndex) {
                    wordSpan.classList.add('current');
                } else if (wordIndex < currentWordIndex) {
                    wordSpan.classList.add('completed');
                }
                
                // Handle English mode with translations
                if (currentMode === 'english' && word.includes(':')) {
                    const [englishWord, translation] = word.split(':');
                    
                    const englishSpan = document.createElement('span');
                    englishSpan.className = 'english-word';
                    englishWord.split('').forEach((char, charIndex) => {
                        const charSpan = document.createElement('span');
                        charSpan.className = 'char';
                        charSpan.textContent = char;
                        charSpan.id = `char-${wordIndex}-${charIndex}`;
                        englishSpan.appendChild(charSpan);
                    });
                    
                    const translationSpan = document.createElement('span');
                    translationSpan.className = 'translation';
                    translationSpan.textContent = ` (${translation})`;
                    
                    wordSpan.appendChild(englishSpan);
                    wordSpan.appendChild(translationSpan);
                } else {
                    word.split('').forEach((char, charIndex) => {
                        const charSpan = document.createElement('span');
                        charSpan.className = 'char';
                        charSpan.textContent = char;
                        charSpan.id = `char-${wordIndex}-${charIndex}`;
                        wordSpan.appendChild(charSpan);
                    });
                }
                
                textDisplay.appendChild(wordSpan);
            });
        }

        function updateProgress() {
            const progress = Math.round((currentWordIndex / currentWords.length) * 100);
            document.getElementById('progressFill').style.width = `${progress}%`;
            document.getElementById('progress').textContent = `${currentWordIndex}/${currentWords.length}`;
        }

        function calculateWPM() {
            if (!startTime) return 0;
            const timeElapsed = (Date.now() - startTime) / 1000 / 60;
            const wordsTyped = currentWordIndex + (currentCharIndex > 0 ? 1 : 0);
            return Math.round(wordsTyped / timeElapsed) || 0;
        }

        function calculateAccuracy() {
            if (totalTypedChars === 0) return 100;
            return Math.round((correctChars / totalTypedChars) * 100);
        }

        function updateStats() {
            if (!testActive) return;
            
            const timeElapsed = startTime ? Math.round((Date.now() - startTime) / 1000) : 0;
            document.getElementById('time').textContent = timeElapsed;
            document.getElementById('wpm').textContent = calculateWPM();
            document.getElementById('accuracy').textContent = calculateAccuracy() + '%';
            updateProgress();
        }

        function getCurrentWord() {
            let word = currentWords[currentWordIndex];
            if (currentMode === 'english' && word.includes(':')) {
                word = word.split(':')[0]; // Only the English word for typing
            }
            return word;
        }

        function handleInput(event) {
            const input = event.target;
            const inputValue = input.value;
            
            if (!testActive) {
                startTime = Date.now();
                testActive = true;
                timer = setInterval(updateStats, 100);
            }

            const currentWord = getCurrentWord();
            const currentWordElement = document.getElementById(`word-${currentWordIndex}`);
            
            if (inputValue.endsWith(' ') && inputValue.trim() === currentWord) {
                currentWordElement.classList.remove('current', 'error');
                currentWordElement.classList.add('completed');
                
                input.value = '';
                currentWordIndex++;
                currentCharIndex = 0;
                
                if (currentWordIndex < currentWords.length) {
                    const nextWordElement = document.getElementById(`word-${currentWordIndex}`);
                    nextWordElement.classList.add('current');
                } else {
                    completeTest();
                    return;
                }
            } else {
                currentWordElement.classList.remove('error');
                
                for (let i = 0; i < currentWord.length; i++) {
                    const charElement = document.getElementById(`char-${currentWordIndex}-${i}`);
                    if (charElement) {
                        charElement.classList.remove('correct', 'incorrect');
                    }
                }
                
                const typedWord = inputValue.replace(/ $/, '');
                let hasError = false;
                
                for (let i = 0; i < Math.max(typedWord.length, currentWord.length); i++) {
                    const charElement = document.getElementById(`char-${currentWordIndex}-${i}`);
                    
                    if (i < typedWord.length && charElement) {
                        if (i < currentWord.length && typedWord[i] === currentWord[i]) {
                            charElement.classList.add('correct');
                            if (!charElement.dataset.counted) {
                                correctChars++;
                                totalTypedChars++;
                                charElement.dataset.counted = 'true';
                            }
                        } else {
                            charElement.classList.add('incorrect');
                            hasError = true;
                            if (!charElement.dataset.counted) {
                                totalTypedChars++;
                                charElement.dataset.counted = 'true';
                            }
                        }
                    } else if (charElement) {
                        charElement.dataset.counted = '';
                    }
                }
                
                if (hasError || typedWord.length > currentWord.length) {
                    currentWordElement.classList.add('error');
                }
                
                currentCharIndex = typedWord.length;
            }
            
            updateStats();
        }

        function completeTest() {
            testActive = false;
            clearInterval(timer);
            
            const finalTime = Math.round((Date.now() - startTime) / 1000);
            const finalWPM = calculateWPM();
            const finalAccuracy = calculateAccuracy();
            
            document.getElementById('completionMessage').style.display = 'block';
            document.getElementById('finalStats').innerHTML = `
                <p><strong>Mode:</strong> ${getModeTitle()}</p>
                <p><strong>Waktu:</strong> ${finalTime} detik</p>
                <p><strong>Kecepatan:</strong> ${finalWPM} WPM</p>
                <p><strong>Akurasi:</strong> ${finalAccuracy}%</p>
                <p><strong>Kata Selesai:</strong> ${currentWords.length}</p>
            `;
            
            document.getElementById('typingInput').disabled = true;
        }

        function getModeTitle() {
            const titles = {
                'basic': 'Kata Dasar',
                'code': 'Kode Programming',
                'english': 'Bahasa Inggris',
                'lefthand': 'Tangan Kiri',
                'righthand': 'Tangan Kanan'
            };
            return titles[currentMode] || 'Unknown';
        }

        function resetTest() {
            currentWordIndex = 0;
            currentCharIndex = 0;
            startTime = null;
            totalTypedChars = 0;
            correctChars = 0;
            testActive = false;
            
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
            
            document.getElementById('typingInput').value = '';
            document.getElementById('typingInput').disabled = false;
            document.getElementById('completionMessage').style.display = 'none';
            
            document.querySelectorAll('.char').forEach(char => {
                char.dataset.counted = '';
                char.classList.remove('correct', 'incorrect');
            });
            
            document.getElementById('wpm').textContent = '0';
            document.getElementById('accuracy').textContent = '100%';
            document.getElementById('time').textContent = '0';
            document.getElementById('progressFill').style.width = '0%';
        }

        function startNewTest() {
            resetTest();
            currentWords = getRandomWords(30);
            displayText();
            updateProgress();
            document.getElementById('typingInput').focus();
        }

        function startEasyMode() {
            resetTest();
            let easyWords;
            
            if (currentMode === 'basic') {
                easyWords = wordLists.basic.filter(word => word.length <= 4);
                currentWords = easyWords.sort(() => 0.5 - Math.random()).slice(0, 25);
            } else if (currentMode === 'code') {
                easyWords = wordLists.code.filter(word => word.length <= 10);
                currentWords = easyWords.sort(() => 0.5 - Math.random()).slice(0, 20);
            } else if (currentMode === 'english') {
                easyWords = wordLists.english.filter(word => word.split(':')[0].length <= 5);
                currentWords = easyWords.sort(() => 0.5 - Math.random()).slice(0, 25);
            } else {
                easyWords = wordLists[currentMode].filter(word => word.length <= 4);
                currentWords = easyWords.sort(() => 0.5 - Math.random()).slice(0, 25);
            }
            
            displayText();
            updateProgress();
            document.getElementById('typingInput').focus();
        }

        function startHardMode() {
            resetTest();
            let hardWords;
            
            if (currentMode === 'basic') {
                hardWords = wordLists.basic.filter(word => word.length >= 6);
                currentWords = [...hardWords, ...getRandomWords(20)].slice(0, 40);
            } else if (currentMode === 'code') {
                hardWords = wordLists.code.filter(word => word.length >= 12);
                currentWords = [...hardWords, ...getRandomWords(15)].slice(0, 35);
            } else if (currentMode === 'english') {
                hardWords = wordLists.english.filter(word => word.split(':')[0].length >= 7);
                currentWords = [...hardWords, ...getRandomWords(20)].slice(0, 35);
            } else {
                hardWords = wordLists[currentMode].filter(word => word.length >= 6);
                currentWords = [...hardWords, ...getRandomWords(15)].slice(0, 40);
            }
            
            displayText();
            updateProgress();
            document.getElementById('typingInput').focus();
        }

        // Event listeners
        document.getElementById('typingInput').addEventListener('input', handleInput);
        
        document.getElementById('typingInput').addEventListener('keydown', function(e) {
            if (e.code === 'Space' && e.target === this) {
                e.stopPropagation();
            }
        });

        document.getElementById('textDisplay').addEventListener('click', function() {
            document.getElementById('typingInput').focus();
        });

        // Initialize
        window.addEventListener('load', function() {
            selectMode('basic');
        });

        // Function to load external word lists (for future use)
        async function loadWordList(filename) {
            try {
                const response = await fetch(filename);
                const text = await response.text();
                return text.split('\n').filter(word => word.trim() !== '');
            } catch (error) {
                console.error('Error loading word list:', error);
                return [];
            }
        }

        // Example usage for loading external files:
        // loadWordList('wordlists/basic.txt').then(words => {
        //     wordLists.basic = words;
        // });
    </script>
</body>
</html>
               
