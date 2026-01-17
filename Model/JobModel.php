<?php
require_once "dbconnect.php";

class JobModel {
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->openConnection();
    }

    public function insertJob($jobtitle, $companyname, $jobdescription, $commission, $contactemail, $deadline, $filename) {
        $stmt = $this->conn->prepare(
            "INSERT INTO jobs (jobtitle, companyname, jobdescription, commission, contactemail, applicationdeadline, jobfile)
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->bind_param("sssdsss", $jobtitle, $companyname, $jobdescription, $commission, $contactemail, $deadline, $filename);

        if ($stmt->execute()) {
            return ["success" => true, "message" => "Job posted successfully"];
        } else {
            return ["success" => false, "message" => "Database insert failed: " . $stmt->error];
        }
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
