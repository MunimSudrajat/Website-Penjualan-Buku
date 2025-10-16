<?php
session_start();
include 'user.php';

// Jika user sudah login, langsung lempar ke beranda
if (isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    foreach ($users as $u) {
        if ($u['username'] === $username && $u['password'] === $password) {
            $_SESSION['username'] = $u['username'];
            header('Location:Dashboard.php');
            exit;
        }
    }

    $error = 'Username atau password salah!';
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | BOOKStore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .login-container:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .login-container h1 {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.05em;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #000;
        }

        .form-label {
            font-weight: 500;
            color: #343a40;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
            padding: 0.75rem;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: #000;
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.1);
            color: #000;
        }

        .form-control::placeholder {
            color: #6c757d;
        }

        .btn-login {
            background-color: #000;
            border-color: #000;
            color: #fff;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: #333;
            border-color: #333;
            color: #fff;
        }

        .login-footer {
            margin-top: 1.5rem;
            text-align: center;
        }

        .login-footer a {
            color: #6c757d;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s ease;
        }

        .login-footer a:hover {
            color: #000;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 38px;
            cursor: pointer;
            font-size: 1rem;
            color: #6c757d;
            transition: color 0.2s ease;
            border: none;
            background: none;
            padding: 0;
        }

        .toggle-password:hover {
            color: #000;
        }

        .password-wrapper {
            position: relative;
        }

        .alert-danger {
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }

        .animate-fadein {
            animation: fadein 0.8s ease forwards;
        }

        @keyframes fadein {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="login-container p-5 rounded-3 animate-fadein" style="width: 100%; max-width: 384px;">
        <h1>BOOKStore</h1>

        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" 
                    placeholder="Masukkan username" required>
            </div>

            <div class="mb-4 password-wrapper">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Masukkan password" required>
                <button type="button" class="toggle-password" id="togglePassword" 
                    tabindex="-1">
                    <i class="bi bi-eye-slash"></i>
                </button>
            </div>

            <button type="submit" class="btn btn-login">Login</button>
        </form>

        <div class="login-footer">
            <a href="../index.php">← Kembali ke Beranda</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const isHidden = passwordField.type === 'password';
            passwordField.type = isHidden ? 'text' : 'password';
            
            const icon = togglePassword.querySelector('i');
            icon.classList.toggle('bi-eye');
            icon.classList.toggle('bi-eye-slash');
        });
    </script>
</body>

</html>