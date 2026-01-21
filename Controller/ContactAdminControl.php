<?php
session_start();
require_once "../Model/adminModel.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    $userId  = $_SESSION['id'] ?? null;

    if ($subject === "" || $message === "") {
        header("Location: ../View/Company_View/contactadmin.php?msg=All fields are required");
        exit;
    }

    $adminModel = new AdminModel();
    $flag = $adminModel->saveMessage($userId, $subject, $message);

    if ($flag) {
        header("Location: ../View/Company_View/customerhome.php?msg=Message sent successfully");
    } else {
        header("Location: ../View/Company_View/customerhome.php?msg=Failed to send message");
    }
    exit;
}
