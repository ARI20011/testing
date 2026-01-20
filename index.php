<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke login.php dengan pesan
    $_SESSION['login_message'] = "Anda harus login terlebih dahulu!";
    header("Location: login.php");
    exit();
}

// Ambil data session
$username = $_SESSION['username'];

// Proses logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            font-size: 28px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .user-info strong {
            font-size: 16px;
        }
        .logout-btn {
            background: white;
            color: #667eea;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.2s;
        }
        .logout-btn:hover {
            transform: translateY(-2px);
        }
        .content {
            padding: 40px;
        }
        .welcome-section {
            background: #f5f5f5;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            border-left: 5px solid #667eea;
        }
        .welcome-section h2 {
            color: #333;
            margin-bottom: 15px;
        }
        .welcome-section p {
            color: #666;
            line-height: 1.6;
            font-size: 16px;
        }
        .card {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #764ba2;
        }
        .card h3 {
            color: #333;
            margin-bottom: 10px;
        }
        .card p {
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="user-info">
                <strong>Halo, <?php echo htmlspecialchars($username); ?>!</strong>
                <a href="?logout=true" class="logout-btn">Logout</a>
            </div>
        </div>

        <div class="content">
            <div class="welcome-section">
                <h2>Selamat Datang! 👋</h2>
                <p>
                    Anda telah berhasil login ke sistem. Halaman ini hanya bisa diakses oleh pengguna yang sudah login.
                    <br><br>
                    Data login Anda tersimpan dalam session, yang berarti Anda dapat menavigasi ke halaman lain tanpa perlu login ulang 
                    (selama session masih aktif).
                </p>
            </div>

            <h3 style="color: #333; margin-bottom: 20px;">Informasi Pengguna</h3>

            <div class="card">
                <h3>Username</h3>
                <p><?php echo htmlspecialchars($username); ?></p>
            </div>

            <div class="card">
                <h3>Status Login</h3>
                <p>✓ Anda berhasil login pada session ini</p>
            </div>

            <div class="card">
                <h3>Session ID</h3>
                <p><?php echo session_id(); ?></p>
            </div>

            <div class="card">
                <h3>Waktu Saat Ini</h3>
                <p><?php echo date('d-m-Y H:i:s'); ?></p>
            </div>

            <hr style="margin: 30px 0; border: none; border-top: 2px solid #eee;">

            <h3 style="color: #333; margin-bottom: 20px;">Fitur Login</h3>

            <div class="card">
                <h3>Bagaimana Sistem Login Ini Bekerja?</h3>
                <p>
                    1. User mengisi form login di login.php<br>
                    2. Data divalidasi (username: admin, password: 12345)<br>
                    3. Jika benar, data disimpan dalam $_SESSION<br>
                    4. User diarahkan ke index.php<br>
                    5. index.php mengecek session, jika ada maka konten ditampilkan<br>
                    6. Jika belum login, user dikembalikan ke login.php<br>
                    7. Klik "Logout" untuk menghapus session dan keluar
                </p>
            </div>
        </div>
    </div>
</body>
</html>
