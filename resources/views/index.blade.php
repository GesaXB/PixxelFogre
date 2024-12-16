<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixxel Forge</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="assets/img/image.png" type="image/x-icon">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Pixxel Forge</h1>
                <p>Creative Agency</p>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Layanan</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
            <button class="contact-button">Hubungi Kami</button>
        </nav>
    </header>
    <main class="main">
        <section class="hero">
            <h2>Buat Design, <br> Sambil Rebahan?</h2>
            <p>Cari infonya di sini aja.</p>
            <div class="search-box">
                <input type="text" placeholder="Cari Design Kami">
                <button>Cari</button>
            </div>
        </section>
        <section class="gambar">
            <img src="assets/img/image.png" alt="Logo Pixxel Forge">
        </section>
    </main>
    <h1 class="about">About</h1>
    <section class="about-section">
        <div class="images">
            <div class="image-box"><img src="assets/img/pp4.jpg" alt="Gambar 1"></div>
            <div class="image-box"><img src="assets/img/pp5.jpg" alt="Gambar 2"></div>
            <div class="image-box"><img src="assets/img/pp2.jpg" alt="Gambar 3"></div>
        </div>
        <div class="about-text">
            <h2>About Company</h2>
            <p>
                <strong>Pixel Forge</strong> adalah agency kreatif yang berfokus pada desain digital dan solusi visual inovatif. 
                Kami menggabungkan seni dan teknologi untuk menciptakan karya-karya visual yang memukau, mulai dari desain grafis 
                hingga pengembangan UI/UX yang intuitif. Di Pixel Forge, setiap pixel dihargai, dan setiap ide diproses dengan keterampilan tinggi, 
                menjadikannya lebih dari sekadar desain — kami membentuk pengalaman digital yang memikat dan efektif.
            </p>
        </div>
    </section>
      @livewire('projek-list')
  </section>
</body>
</html>
