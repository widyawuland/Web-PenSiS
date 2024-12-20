<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Awal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/bg.jpg');
            background-size: cover;
            background-position: center start;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333;
        }
        .header {
            background-color: rgba(0, 123, 255, 0.8);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .container h1 {
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Website PenSiS</h1>
        <p>Untuk mengakses fitur lengkap, silakan pilih Login atau Register</p>
        <a href="/login" class="btn">Login</a>
        <a href="/register" class="btn">Register</a>

        <div class="footer">
            <p>© 2024 Kelompok 7. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>
