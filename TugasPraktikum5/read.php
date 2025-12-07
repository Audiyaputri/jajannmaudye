<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jajanan</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap");

        :root {
            --color-primary: #1c315e;
            --color-secondary: #fbf8f1;
            --color-accent: #8aaae5;
            --color-text-light: #f1f1f1;
            --color-text-dark: #333333;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-secondary);
            color: var(--color-text-dark);
            padding: 2rem;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            background-color: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
        }

        h2 {
            color: var(--color-primary);
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 700;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-add {
            background-color: var(--color-primary);
            color: var(--color-text-light);
            margin-bottom: 1rem;
        }

        .btn-add:hover {
            background-color: var(--color-accent);
            color: var(--color-primary);
        }

        .btn-back {
            background-color: var(--color-text-dark);
            color: var(--color-text-light);
            margin-top: 1.5rem;
        }

        .btn-back:hover {
            background-color: #555;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: white;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--color-primary);
            color: var(--color-text-light);
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .col-aksi {
            white-space: nowrap;
            width: 1%;
            text-align: center;
        }

        .action-link {
            text-decoration: none;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.8rem;
            display: inline-block;
            margin: 0 4px;
        }

        .edit {
            color: var(--color-primary);
            background-color: #eef2ff;
        }
        
        .edit:hover {
            background-color: var(--color-primary);
            color: white;
        }

        .delete {
            color: #d9534f;
            background-color: #fce8e8;
        }

        .delete:hover {
            background-color: #d9534f;
            color: white;
        }
        
    </style>
</head>
<body>

<div class="container">
    <h2>Data Jajanan</h2>
    
    <a href="create.php" class="btn btn-add">+ Tambah Data Baru</a>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $data = mysqli_query($koneksi, "SELECT * FROM jajanan ORDER BY id DESC");
                if(mysqli_num_rows($data) > 0):
                    while ($row = mysqli_fetch_assoc($data)) :
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['jenis'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td class="col-aksi">
                        <a href="update.php?id=<?= $row['id'] ?>" class="action-link edit">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')" class="action-link delete">Hapus</a>
                    </td>
                </tr>
                <?php 
                    endwhile; 
                else:
                ?>
                <tr>
                    <td colspan="5" style="text-align:center; padding: 20px;">Belum ada data jajanan.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <a href="hal1.html" class="btn btn-back">Kembali ke Home</a>
</div>

</body>
</html>