<?php 
include "koneksi.php"; 
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM jajanan WHERE id=$id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap");

        :root {
            --color-primary: #1c315e;
            --color-secondary: #fbf8f1;
            --color-accent: #8aaae5;
            --color-text-light: #f1f1f1;
            --color-text-dark: #333333;
            --shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            background-color: var(--color-secondary);
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background-color: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
        }

        h2 {
            text-align: center;
            color: var(--color-primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        label {
            font-weight: 600;
            color: var(--color-primary);
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 1rem;
            transition: .3s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--color-accent);
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            background: var(--color-primary);
            color: var(--color-text-light);
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: .3s;
            font-weight: 600;
            margin-bottom: 10px; /* Tambahkan ruang untuk tautan kembali */
        }

        button:hover {
            background: var(--color-accent);
            color: var(--color-primary);
        }
        
        /* Gaya untuk Tautan Kembali */
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 1rem;
            color: var(--color-primary);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: var(--color-accent);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Jajanan</h2>

    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $row['nama'] ?>" required>

        <label>Jenis:</label>
        <select name="jenis">
            <option value="Manis" <?= $row['jenis']=='Manis'?'selected':'' ?>>Manis</option>
            <option value="Gurih" <?= $row['jenis']=='Gurih'?'selected':'' ?>>Gurih</option>
        </select>

        <label>Deskripsi:</label>
        <textarea name="deskripsi"><?= $row['deskripsi'] ?></textarea>
        
        <button type="submit" name="update">UPDATE DATA</button>
    </form>
    
    <a href="read.php" class="back-link">
        Kembali ke Daftar Data
    </a>

</div>

</body>
</html>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $deskripsi = $_POST['deskripsi'];

    // Perhatian: Kode ini rentan terhadap serangan SQL Injection.
    // Direkomendasikan menggunakan Prepared Statements untuk keamanan.
    $update = mysqli_query($koneksi, "UPDATE jajanan SET 
        nama='$nama',
        jenis='$jenis',
        deskripsi='$deskripsi'
        WHERE id=$id");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate!'); window.location='read.php';</script>";
    } else {
        echo "<script>alert('Update gagal!');</script>";
    }
}
?>