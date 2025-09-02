import random

# Huruf yang diketik dengan tangan kanan di keyboard QWERTY
right_hand_letters = set("yuiophjklnm")

# Fungsi untuk membuat kata acak
def generate_right_hand_words(count, min_length=3, max_length=8):
    words = set()
    while len(words) < count:
        length = random.randint(min_length, max_length)
        word = ''.join(random.choice(list(right_hand_letters)) for _ in range(length))
        words.add(word)
    return sorted(words)

# Hasilkan 200 kosakata
right_hand_words = generate_right_hand_words(200)

# Simpan ke file TXT
with open("kosakata_tangan_kanan.txt", "w") as f:
    for word in right_hand_words:
        f.write(word + "\n")

print("File 'kosakata_tangan_kanan.txt' berhasil dibuat.")
