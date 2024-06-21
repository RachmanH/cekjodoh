<?php
include './database/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $your_name = $_POST['your_name'];

    // Query untuk mendapatkan salah satu nama secara acak
    $sql = "SELECT nama FROM tb_jodoh ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mengambil hasil
        $row = $result->fetch_assoc();
        $random_name = $row['nama'];
    } else {
        echo "Tidak ada nama yang ditemukan.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Random Name</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-custom text-white text-center">
                        Cek Jodoh Anda
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group">
                                <label for="your_name">Nama Anda</label>
                                <input type="text" class="form-control" id="your_name" name="your_name" required>
                            </div>
                            <button type="submit" class="btn btn-custom btn-block">Cari Jodoh</button>
                        </form>
                    </div>
                </div>
                <?php if ($random_name): ?>
                <div class="card mt-3">
                    <div class="card-body text-center">
                        <p>Nama Anda: <strong><?php echo htmlspecialchars($your_name); ?></strong></p>
                        <p>Nama Jodoh Anda: <strong><?php echo htmlspecialchars($random_name); ?></strong></p>
                        <div class="container">
                        <p>&copy; 2024 Mamen Website. All rights reserved.</p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
