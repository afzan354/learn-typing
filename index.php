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
            max-width: 1000px;
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

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .word.current {
            animation: pulse 1s infinite;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>?? Belajar Typing</h1>
            <p>Latihan mengetik dengan 200 kata pendek - Tingkatkan kecepatan dan akurasi Anda!</p>
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
                <div class="stat-label">Kata</div>
            </div>
        </div>

        <div class="progress-bar">
            <div class="progress-fill" id="progressFill"></div>
        </div>

        <div class="typing-area">
            <div class="text-display" id="textDisplay"></div>
            
            <div class="input-area">
                <input type="text" id="typingInput" placeholder="Mulai mengetik di sini..." autocomplete="off" spellcheck="false">
            </div>

            <div class="controls">
                <button class="btn btn-primary" onclick="startNewTest()">?? Tes Baru</button>
                <button class="btn btn-success" onclick="startEasyMode()">?? Mode Mudah</button>
                <button class="btn btn-warning" onclick="startHardMode()">?? Mode Sulit</button>
            </div>

            <div class="completion-message" id="completionMessage">
                <h2>?? Selamat! Tes Selesai!</h2>
                <div class="accuracy-display" id="finalStats"></div>
            </div>
        </div>
    </div>

    <script>
        const words200 = [
            // Kata-kata umum sehari-hari
            "dan", "ini", "itu", "ada", "dia", "kamu", "saya", "kami", "mereka", "yang",
            "dari", "untuk", "dengan", "pada", "dalam", "akan", "sudah", "telah", "bisa", "dapat",
            "tidak", "juga", "hanya", "masih", "lebih", "sangat", "paling", "cukup", "agak", "tapi",
            "atau", "jika", "kalau", "ketika", "saat", "waktu", "hari", "tahun", "bulan", "minggu",
            
            // Kata kerja
            "buat", "ambil", "kasih", "taruh", "lihat", "dengar", "bicara", "jalan", "lari", "naik",
            "turun", "masuk", "keluar", "datang", "pergi", "pulang", "tidur", "bangun", "makan", "minum",
            "kerja", "main", "baca", "tulis", "hitung", "pikir", "ingat", "lupa", "tahu", "kenal",
            
            // Benda-benda
            "rumah", "mobil", "motor", "sepeda", "jalan", "toko", "pasar", "sekolah", "kantor", "hotel",
            "meja", "kursi", "tempat", "tidur", "lemari", "pintu", "jendela", "lantai", "atap", "dinding",
            "buku", "pensil", "pulpen", "kertas", "komputer", "telepon", "televisi", "radio", "jam", "kunci",
            
            // Makanan & minuman
            "nasi", "roti", "mie", "sayur", "buah", "daging", "ikan", "ayam", "telur", "susu",
            "air", "teh", "kopi", "jus", "gula", "garam", "cabai", "bawang", "tomat", "wortel",
            
            // Warna & sifat
            "merah", "biru", "hijau", "kuning", "hitam", "putih", "coklat", "pink", "ungu", "orange",
            "besar", "kecil", "tinggi", "rendah", "panjang", "pendek", "lebar", "sempit", "tebal", "tipis",
            "baru", "lama", "muda", "tua", "cepat", "lambat", "keras", "lembut", "panas", "dingin",
            
            // Angka & ukuran
            "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh",
            "ratus", "ribu", "juta", "meter", "kilo", "gram", "liter", "detik", "menit", "jam",
            
            // Kata sifat emosi
            "senang", "sedih", "marah", "takut", "kaget", "heran", "bosan", "capek", "sakit", "sehat",
            "baik", "buruk", "bagus", "jelek", "cantik", "ganteng", "lucu", "aneh", "unik", "biasa",
            
            // Keluarga & orang
            "ayah", "ibu", "anak", "kakak", "adik", "nenek", "kakek", "paman", "bibi", "sepupu",
            "teman", "guru", "dokter", "petani", "sopir", "pilot", "polisi", "tentara", "chef", "artis",
            
            // Cuaca & alam
            "hujan", "panas", "dingin", "angin", "mendung", "cerah", "laut", "gunung", "hutan", "sawah",
            "sungai", "danau", "pantai", "pasir", "batu", "tanah", "rumput", "pohon", "bunga", "daun"
        ];

        let currentWords = [];
        let currentWordIndex = 0;
        let currentCharIndex = 0;
        let startTime = null;
        let totalTypedChars = 0;
        let correctChars = 0;
        let testActive = false;
        let timer = null;

        function getRandomWords(count = 30) {
            const shuffled = [...words200].sort(() => 0.5 - Math.random());
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
                
                word.split('').forEach((char, charIndex) => {
                    const charSpan = document.createElement('span');
                    charSpan.className = 'char';
                    charSpan.textContent = char;
                    charSpan.id = `char-${wordIndex}-${charIndex}`;
                    wordSpan.appendChild(charSpan);
                });
                
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
            const timeElapsed = (Date.now() - startTime) / 1000 / 60; // in minutes
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

        function handleInput(event) {
            const input = event.target;
            const inputValue = input.value;
            
            if (!testActive) {
                startTime = Date.now();
                testActive = true;
                timer = setInterval(updateStats, 100);
            }

            const currentWord = currentWords[currentWordIndex];
            const currentWordElement = document.getElementById(`word-${currentWordIndex}`);
            
            // Check if word is completed with space
            if (inputValue.endsWith(' ') && inputValue.trim() === currentWord) {
                // Word completed correctly
                currentWordElement.classList.remove('current', 'error');
                currentWordElement.classList.add('completed');
                
                // Clear input and move to next word
                input.value = '';
                currentWordIndex++;
                currentCharIndex = 0;
                
                if (currentWordIndex < currentWords.length) {
                    const nextWordElement = document.getElementById(`word-${currentWordIndex}`);
                    nextWordElement.classList.add('current');
                } else {
                    // Test completed
                    completeTest();
                    return;
                }
            } else {
                // Reset word styling
                currentWordElement.classList.remove('error');
                
                // Clear previous character styling
                for (let i = 0; i < currentWord.length; i++) {
                    const charElement = document.getElementById(`char-${currentWordIndex}-${i}`);
                    charElement.classList.remove('correct', 'incorrect');
                }
                
                // Check each character (without counting space)
                const typedWord = inputValue.replace(/ $/, ''); // Remove trailing space for comparison
                let hasError = false;
                
                for (let i = 0; i < Math.max(typedWord.length, currentWord.length); i++) {
                    const charElement = document.getElementById(`char-${currentWordIndex}-${i}`);
                    
                    if (i < typedWord.length) {
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
                <p><strong>Waktu:</strong> ${finalTime} detik</p>
                <p><strong>Kecepatan:</strong> ${finalWPM} WPM</p>
                <p><strong>Akurasi:</strong> ${finalAccuracy}%</p>
                <p><strong>Kata Selesai:</strong> ${currentWords.length}</p>
            `;
            
            document.getElementById('typingInput').disabled = true;
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
            
            // Reset all character counters
            document.querySelectorAll('.char').forEach(char => {
                char.dataset.counted = '';
                char.classList.remove('correct', 'incorrect');
            });
            
            // Reset stats display
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
            // Easy mode: shorter words
            const easyWords = words200.filter(word => word.length <= 4);
            currentWords = easyWords.sort(() => 0.5 - Math.random()).slice(0, 25);
            displayText();
            updateProgress();
            document.getElementById('typingInput').focus();
        }

        function startHardMode() {
            resetTest();
            // Hard mode: longer words and more words
            const hardWords = words200.filter(word => word.length >= 5);
            currentWords = [...hardWords, ...getRandomWords(20)].slice(0, 40);
            displayText();
            updateProgress();
            document.getElementById('typingInput').focus();
        }

        // Event listeners
        document.getElementById('typingInput').addEventListener('input', handleInput);
        
        // Allow space but prevent page scrolling
        document.getElementById('typingInput').addEventListener('keydown', function(e) {
            if (e.code === 'Space' && e.target === this) {
                // Don't prevent default - allow space to be typed
                e.stopPropagation();
            }
        });

        // Focus input when clicking on text display
        document.getElementById('textDisplay').addEventListener('click', function() {
            document.getElementById('typingInput').focus();
        });

        // Initialize with first test
        window.addEventListener('load', function() {
            startNewTest();
        });
    </script>
</body>
</html>