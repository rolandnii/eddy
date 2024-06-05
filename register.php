<?php
require 'connection.php';

$register_error = '';
$register_success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    try {
        $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email,  $password_hash]);
        $register_success = 'Registration successful! You can now log in.';
    } catch (PDOException $e) {
        $register_error = 'Registration failed: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <?php if ($register_error): ?>
            <p class="error"><?= htmlspecialchars($register_error) ?></p>
        <?php endif; ?>
        <?php if ($register_success): ?>
            <p class="success"><?= htmlspecialchars($register_success) ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <div>
                <label for="register_username">Name:</label>
                <input type="text" id="register_username" name="name" required>
            </div>

            <div>
                <label for="register_username">Email:</label>
                <input type="email" id="register_username" name="email" required>
            </div>

            <div>
                <label for="register_password">Password:</label>
                <input type="password" id="register_password" name="password" required>
            </div>
            <div>
                <button type="submit" name="register">Register</button>
            </div>
        </form>
        <p>Already have an account? <a href="index.php">Login here</a>.</p>
    </div>
</body>
</html>
