const button = document.getElementById('btn-info');
button.addEventListener("click", function showinfo() {
    const x = document.getElementById('info');
    if (x.style.display == 'none'){
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
});
    
    const themeToggle = document.getElementById("theme-toggle");
    const body = document.body;

    // Add event listener to the theme toggle switch
    themeToggle.addEventListener("change", () => {
        if (themeToggle.checked) {
            // Enable dark mode
            body.classList.add("dark-mode");
        } else {
            // Disable dark mode
            body.classList.remove("dark-mode");
        }
    }
);

    // Check user's preference from previous session (if any)
    const isDarkMode = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    if (isDarkMode) {
        themeToggle.checked = true;
        body.classList.add("dark-mode");
    }

    
    // Function untuk mengubah style header pada dark mode
    function setHeaderStylesDarkMode() {
        const header = document.querySelector("header");
        header.style.backgroundColor = "#222";
        header.style.color = "#fff";
    }

    // Function untuk mengubah style footer pada dark mode
    function setFooterStylesDarkMode() {
        const footer = document.querySelector("footer");
        footer.style.backgroundColor = "#333";
        footer.style.color = "#fff";
    }

    // Function untuk mengembalikan style header ke mode terang
    function resetHeaderStyles() {
        const header = document.querySelector("header");
        header.style.backgroundColor = ""; // Menghapus latar belakang yang diberikan oleh dark mode
        header.style.color = ""; // Menghapus warna teks yang diberikan oleh dark mode
    }

    // Function untuk mengembalikan style footer ke mode terang
    function resetFooterStyles() {
        const footer = document.querySelector("footer");
        footer.style.backgroundColor = ""; // Menghapus latar belakang yang diberikan oleh dark mode
        footer.style.color = ""; // Menghapus warna teks yang diberikan oleh dark mode
    }

    // Event listener untuk mengubah style header dan footer saat dark mode diaktifkan
    themeToggle.addEventListener("change", () => {
        if (themeToggle.checked) {
            // Enable dark mode
            body.classList.add("dark-mode");
            setHeaderStylesDarkMode();
            setFooterStylesDarkMode();
        } else {
            // Disable dark mode
            body.classList.remove("dark-mode");
            resetHeaderStyles();
            resetFooterStyles();
        }
    });

    // Check user's preference from previous session (if any)
    if (isDarkMode) {
        themeToggle.checked = true;
        body.classList.add("dark-mode");
        setHeaderStylesDarkMode();
        setFooterStylesDarkMode();
    }

// Mengambil semua elemen dengan kelas 'container'
const judul = document.getElementsByClassName(container);

// Mengubah warna teks dari setiap elemen dengan kelas 'container' menjadi merah
for (let i = 0; i < judul.length; i++) {
    judul[i].style.color = 'yellow';
}

// Temukan elemen dengan ID "elemen"
var elemen = document.getElementById('elemen');

// Mengganti class elemen
elemen.className = 'highlighted';

// Temukan elemen <main>
var mainElement = document.querySelector('main');

// Buat elemen div baru
var newDiv = document.createElement('div');
newDiv.textContent = 'Halo, Selamat datang di MM Advertising!';

// Tambahkan elemen div ke dalam <main>
mainElement.appendChild(newDiv);

// Fungsi untuk membuat item
async function createItem() {
    const nama = document.getElementById('nama').value;
    const jenis = document.getElementById('jenis').value;
    const harga = document.getElementById('harga').value;

    const response = await fetch('Proses.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `nama=${nama}&jenis=${jenis}&harga=${harga}`,
    });

    if (response.ok) {
        document.getElementById('nama').value = '';
        document.getElementById('jenis').value = '';
        document.getElementById('harga').value = '';
        fetchItems(); // Fungsi untuk memuat ulang data setelah item dibuat
    }
}


