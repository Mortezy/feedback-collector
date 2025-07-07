<?php

require 'database.php';

// بررسی کامل ورودی‌ها (خالی نبودن، معتبر بودن ایمیل، عدد بودن امتیاز و بین ۱ تا ۵ بودن)
// ذخیره در جدول دیتابیس
// نمایش پیام موفقیت یا لیست خطاها به کاربر

print_r($_POST);

$name = htmlspecialchars($_POST['name'] ?? "");
$email = htmlspecialchars($_POST['email'] ?? "");
$rate = intval($_POST['rate'] ?? 0);
$comment = htmlspecialchars($_POST['comment'] ?? "");

//error check
$errors = [];
if (empty($name) || empty($email))
    $errors[] = "You should fill both Name and Email fields.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    $errors[] = "Invalid email format";
if ($rate > 5 || $rate < 1 || (intval($rate) != $rate))
    $errors[] = "For rating you should enter an integer number between 1 to 5";
if (!empty($errors)) {
    foreach ($errors as $error)
        echo "<p style='color:red'>$error</p>";
    exit;
}

$sql = "INSERT INTO feedbacks (name, email, rating, comment) VALUES (:name, :email, :rate, :comment)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':name' => $name,
        ':email'     => $email,
        ':rate'     => $rate,
        ':comment'     => $comment
    ]);
    echo "<br>✅ Registration successful!";
} catch (PDOException $e) {
    echo "<br>❌ Error saving data: " . $e->getMessage();
}
