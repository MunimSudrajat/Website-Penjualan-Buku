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
            header('Location: ../index.php');
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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #001f54;
            font-family: 'Poppins', sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 25px rgba(255, 255, 255, 0.15);
        }

        .btn-login {
            background: #1e40af;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #1d4ed8;
        }

        .toggle-icon {
            position: absolute;
            right: 12px;
            top: 42px;
            cursor: pointer;
            font-size: 1.2rem;
            color: #cbd5e1;
            transition: color 0.2s ease;
        }

        .toggle-icon:hover {
            color: #ffffff;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen text-white">

    <div class="login-container p-8 rounded-2xl shadow-xl w-96 animate-fadein">
        <h1 class="text-3xl font-bold mb-6 text-center text-white tracking-wide">
            BOOKStore
        </h1>

        <?php if ($error): ?>
            <div class="bg-red-600/80 text-white p-3 rounded-lg mb-4 text-center text-sm">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="text-sm mb-1 block text-gray-300">Username</label>
                <input type="text" name="username" placeholder="Masukkan username"
                    required class="w-full p-3 rounded-lg bg-white/15 text-white placeholder-gray-300 focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="relative">
                <label class="text-sm mb-1 block text-gray-300">Password</label>
                <input type="password" name="password" id="password"
                    placeholder="Masukkan password" required
                    class="w-full p-3 rounded-lg bg-white/15 text-white placeholder-gray-300 focus:ring-2 focus:ring-blue-400 pr-10">

                <!-- Toggle Password Icon -->
                <i id="togglePassword" class="bi bi-eye-slash toggle-icon"></i>
            </div>

            <button type="submit" class="btn-login w-full py-3 rounded-lg font-semibold text-white">
                Login
            </button>
        </form>

        <a href="../index.php" class="block mt-6 text-center text-sm text-gray-300 hover:text-white transition">
            ← Kembali ke Beranda
        </a>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const isHidden = passwordField.type === 'password';
            passwordField.type = isHidden ? 'text' : 'password';
            togglePassword.classList.toggle('bi-eye');
            togglePassword.classList.toggle('bi-eye-slash');
        });
    </script>

    <style>
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

        .animate-fadein {
            animation: fadein 0.8s ease forwards;
        }
    </style>
</body>

</html>