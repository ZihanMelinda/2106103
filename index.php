<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Praktik Dokter</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .kotak {
            width: 30%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-input {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .tombol {
            text-align: center;
            margin-top: 10px;
        }

        .btn-simpan, .btn-batal {
            padding: 10px 20px;
            margin-right: 5px;
            background-color: salmon;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="kotak">
        <h1>Jadwal praktik Dokter</h1>
        <form action="index.php" method="post">
            <label for="nama_dokter">Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-input" maxlength="100" required>

            <label for="hari_praktik">Hari Praktik</label>
            <input type="text" name="hari_praktik" class="form-input" maxlength="100" required>

            <label for="jam_praktik">Jam Praktik</label>
            <input type="time" name="jam_praktik" class="form-input" required>

            <div class="tombol">
                <input type="submit" name="submit" value="Simpan" class="btn-simpan">
                <input type="reset" name="reset" value="Batal" class="btn-batal">
            </div>
        </form>
    </div>

    <?php
    include('koneksi.php');

    if(isset($_POST['submit'])){
        $nama_dokter = $_POST['nama_dokter'];
        $hari_praktik = $_POST['hari_praktik'];
        $jam_praktik = $_POST['jam_praktik'];

        $nama_dokter = mysqli_real_escape_string($koneksi, $nama_dokter);
        $hari_praktik = mysqli_real_escape_string($koneksi, $hari_praktik);
        $jam_praktik = mysqli_real_escape_string($koneksi, $jam_praktik);

        $query = "INSERT INTO jadwal_dokter (nama_dokter, hari_praktik, jam_praktik) VALUES ('$nama_dokter', '$hari_praktik', '$jam_praktik')";

        if (mysqli_query($koneksi, $query)) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }

    $sql_tampil = "SELECT * FROM jadwal_dokter";
    $result_tampil = mysqli_query($koneksi, $sql_tampil);

    echo "<h2>Data Dokter</h2>";
    echo "<table border='1'>
            <tr>
                <th>Nama Dokter</th>
                <th>Hari Praktik</th>
                <th>Jam Praktik</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result_tampil)) {
        echo "<tr>
                <td>{$row['nama_dokter']}</td>
                <td>{$row['hari_praktik']}</td>
                <td>{$row['jam_praktik']}</td>
              </tr>";
    }

    echo "</table>";

    include('koneksi.php');
    ?>
</body>
</html>
