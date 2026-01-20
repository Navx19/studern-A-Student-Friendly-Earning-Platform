<?php
session_start();
require_once "../Model/ApplicationModel.php";

header("Content-Type: application/json");

if (!isset($_SESSION['userId'])) {
    echo json_encode(["success" => false, "message" => "User not logged in"]);
    exit;
}

$customerId = $_SESSION['userId'];

$model = new ApplicationsModel();
$applications = $model->getApplicationsByCustomer($customerId);

echo json_encode(["success" => true, "data" => $applications]);
