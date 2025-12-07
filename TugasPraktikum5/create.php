<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>

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

        .custom-file {
            margin-bottom: 15px;
        }

        .custom-file-label {
            background: var(--color-secondary);
            border: 2px solid var(--color-primary);
            padding: 12px;
            border-radius: 6px;
            font-weight: 600;
            color: var(--color-primary);
            text-align: center;
            transition: .3s;
            cursor: pointer;
            display: block;
        }

        .custom-file-label:hover {
            background: var(--color-accent);
            color: white;
            border-color: var(--color-accent);
        }

        .filename {
            margin-top: 5px;
            font-size: 0.9rem;
            color: var(--color-primary);
            font-weight: 600;
        }

        input[type="file"] {
            display: none;
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
        }

        button:hover {
            background: var(--color-accent);
            color: var(--color-primary);
        }

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
    <h2>Tambah Data Jajanan</h2>

    <form method="POST" enctype="multipart/form-data">
        
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Jenis:</label>
        <select name="jenis" required>
            <option value="Manis">Manis</option>
            <option value="Gurih">Gurih</option>
        </select>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" required></textarea>

        <label>Gambar:</label>
        <div class="custom-file">
            <label for="file-img" class="custom-file-label">Pilih File Gambar</label>
            <input id="file-img" type="file" name="img" accept="image/*" required onchange="previewName(this)">
            <p class="filename" id="filename">Belum memilih file...</p>
        </div>

        <button type="submit" name="simpan">SIMPAN DATA</button>
    </form>

    <a href="read.php" class="back-link">Kembali ke Halaman Utama</a>
</div>

<script>
function previewName(input) {
    const fileNameText = document.getElementById("filename");
    fileNameText.textContent = input.files.length > 0 ? input.files[0].name : "Belum memilih file...";
}
</script>

</body>
</html>


<?php
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $deskripsi = $_POST['deskripsi'];

    $namaFile = $_FILES['img']['name'];
    $tmpFile = $_FILES['img']['tmp_name'];

    $ekstensi = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileBaru = uniqid() . "." . $ekstensi;

    if (!is_dir("uploads")) {
        mkdir("uploads");
    }

    $uploadPath = "uploads/" . $namaFileBaru;

    if (move_uploaded_file($tmpFile, $uploadPath)) {

        $query = mysqli_query($koneksi,
            "INSERT INTO jajanan (nama, jenis, deskripsi, img)
             VALUES ('$nama', '$jenis', '$deskripsi', '$namaFileBaru')"
        );

        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location='read.php';</script>";
        } else {
            unlink($uploadPath);
            echo "<script>alert('Gagal menyimpan ke database!');</script>";
        }

    } else {
        echo "<script>alert('Upload gambar gagal!');</script>";
    }
}
?>
