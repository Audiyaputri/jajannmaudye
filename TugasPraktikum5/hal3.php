<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM jajanan WHERE jenis='Gurih'");
if (!$data) {
    die("QUERY ERROR: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jajanan Gurih</title>

<style>
/* ==== SAME CSS AS HALAMAN UTAMA ==== */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap");

:root {
    --color-primary: #1c315e;
    --color-secondary: #fbf8f1;
    --color-accent: #8aaae5;
    --color-text-light: #f1f1f1;
    --color-text-dark: #333333;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Poppins", sans-serif;
    line-height: 1.6;
    background-color: var(--color-secondary);
    color: var(--color-text-dark);
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    padding: 20px;
}

.page-container {
    width: 90%;
    max-width: 1200px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    border-radius: 12px;
    overflow: hidden;
}

.header {
    background-color: var(--color-primary);
    color: var(--color-text-light);
    padding: 20px 40px;
    text-align: center;
    border-bottom: 5px solid var(--color-accent);
}
.header h1 {
    font-weight: 700;
    letter-spacing: 2px;
    margin: 0;
    font-size: 2em;
}

/* Layout kiri-kanan */
.content-container {
    display: flex;
    min-height: 600px;
}

/* NAV kiri */
.kolom1 {
    flex: 0 0 250px;
    background-color: #f0ead6;
    padding: 30px 20px;
    border-right: 1px solid #e0e0e0;
}

.kolom1 h2 {
    color: var(--color-primary);
    font-size: 1.3em;
    border-bottom: 2px solid var(--color-accent);
    padding-bottom: 10px;
    margin-bottom: 20px;
    font-weight: 600;
}

.kolom1 ul { list-style: none; }
.kolom1 li { margin-bottom: 5px; }

.kolom1 a {
    display: block;
    text-decoration: none;
    color: var(--color-text-dark);
    padding: 10px 15px;
    border-radius: 8px;
    transition: all 0.3s ease;
}
.kolom1 a:hover {
    background-color: var(--color-primary);
    color: var(--color-text-light);
    transform: translateX(5px);
}

/* CARD */
.card-wrapper {
    flex-grow: 1;
    padding: 40px;
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.card {
    text-align: center;
    padding: 25px;
    background: linear-gradient(145deg, #fff6e8, #e6efff);
    border-radius: 20px;
    border: 3px solid var(--color-accent);
    width: 220px;
    height: 350px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 15px rgba(0,0,0,0.12);
    cursor: pointer;
}

.card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 15px;
    border: 2px solid var(--color-accent);
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 18px 35px rgba(0,0,0,0.18);
}

/* Text */
.card-title {
    font-weight: 700;
    color: var(--color-primary);
    margin-top: 10px;
    font-size: 1.2em;
}
.card-desc {
    margin-top: 10px;
    text-align: center;
    color: var(--color-text-dark);
}

/* FOOTER */
.footer {
    background-color: var(--color-primary);
    color: var(--color-text-light);
    padding: 15px;
    text-align: center;
    font-size: 0.9em;
}

@media (max-width: 768px) {
  body {
    padding: 10px;
  }

  .page-container {
    width: 100%;
    border-radius: 0;
    box-shadow: none;
  }

  .header h1 {
    font-size: 1.5em;
  }

  .content-container {
    flex-direction: column;
    min-height: auto;
  }

  .kolom1 {
    flex: 1 1 100%;
    border-right: none;
    border-bottom: 1px solid #e0e0e0;
    padding: 20px;
  }

  .kolom1 h2 {
    text-align: center;
    border-bottom: none;
    padding-bottom: 0;
    margin-bottom: 10px;
  }

  .kolom1 nav ul {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 5px;
  }

  .kolom1 li {
    margin-bottom: 0;
  }

  .kolom1 a {
    padding: 8px 12px;
    font-size: 0.9em;
    text-align: center;
  }

  .kolom1 a:hover {
    transform: none;
  }

  .card-container {
    padding: 20px;
  }

  .card {
    max-width: 80%;
    padding: 15px;
  }
}

@media (max-width: 480px) {
  .kolom1 nav ul {
    flex-direction: column;
    align-items: stretch;
  }

  .kolom1 li {
    margin-bottom: 5px;
  }

  .kolom1 a {
    padding: 10px;
  }
}
</style>
</head>

<body>

<div class="page-container">

<header class="header">
    <h1>JAJANAN GURIH</h1>
</header>

<div class="content-container">

    <!-- NAV KIRI -->
    <aside class="kolom1">
        <h2>Navigasi Utama</h2>
        <nav>
        <ul>
            <li><a href="hal1.html">Home</a></li>
            <li><a href="hal2.php">Jajanan Manis</a></li>
            <li><a href="hal3.php">Jajanan Gurih</a></li>
            <li><a href="read.php">Add Menu (CRUD)</a></li>
        </ul>
        </nav>
    </aside>

    <!-- CARD -->
    <div class="card-wrapper">
        <?php while ($row = mysqli_fetch_assoc($data)): ?>
        <div class="card">
            <img src="uploads/<?php echo $row['img']; ?>">
            <div class="card-title"><?php echo $row['nama']; ?></div>
            <div class="card-desc"><?php echo $row['deskripsi']; ?></div>
        </div>
        <?php endwhile; ?>
    </div>

</div>

<footer class="footer">
<p>Hak Cipta © 2025 Jajann.maudye | Tugas Praktikum V Web Dasar</p>
</footer>

</div>

</body>
</html>
