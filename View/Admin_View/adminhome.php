<!DOCTYPE html>
<html>
<head>
    <title>studern Admin Dashboard</title>
    <link rel="stylesheet" href="Css/adminhome.css">
</head>
<body>

    <div class="header">
        <h2>studern </h2>
        <h3> Admin Dashboard</h3>
        <div class="header-links">
            <a href="../../Controller/admin/manageStudents.php">Manage Students</a>
            <a href="../../Controller/admin/manageCompanies.php">Manage Companies</a>
            <a href="../../Controller/admin/manageProjects.php">Manage Projects</a>
            <a href="../../Controller/admin/systemActivity.php">FeedBack and Requests</a>
            <a href="../logout.php" class="logout">Logout</a>
        </div>
    </div>

    <div class="main-content">
        <div class="stats-grid">
            <div class="stat-card"><h4>Total Students</h4><div class="number"><?php echo $stats['totalStudents']; ?></div></div>
            <div class="stat-card"><h4>Total Companies</h4><div class="number"><?php echo $stats['totalCompanies']; ?></div></div>
            <div class="stat-card"><h4>Projects Posted</h4><div class="number"><?php echo $stats['totalProjects']; ?></div></div>
            <div class="stat-card"><h4>Applications Submitted</h4><div class="number"><?php echo $stats['totalApplications']; ?></div></div>
        </div>

        <div class="section">
            <h3>Recent Student Registrations</h3>
            <table>
                <tr>
                    <th>ID</th><th>Name</th><th>Email</th>
                </tr>
                <?php
                if ($recentStudents && mysqli_num_rows($recentStudents) > 0) {
                    while ($student = mysqli_fetch_assoc($recentStudents)) {
                        echo "<tr>
                            <td>{$student['id']}</td>
                            <td>{$student['name']}</td>
                            <td>{$student['email']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No students found</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="section">
            <h3>Recent Company Registrations</h3>
            <table>
                <tr>
                    <th>ID</th><th>Name</th><th>Email</th>
                </tr>
                <?php
                if ($recentCompanies && mysqli_num_rows($recentCompanies) > 0) {
                    while ($company = mysqli_fetch_assoc($recentCompanies)) {
                        echo "<tr>
                            <td>{$company['id']}</td>
                            <td>{$company['name']}</td>
                            <td>{$company['email']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No companies found</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="section">
            <h3>Recent Projects Posted</h3>
            <table>
                <tr>
                    <th>Project ID</th><th>Title</th><th>Company</th><th>Description</th><th>Commission</th>
                </tr>
                <?php
                if ($recentProjects && mysqli_num_rows($recentProjects) > 0) {
                    while ($proj = mysqli_fetch_assoc($recentProjects)) {
                        echo "<tr>
                            <td>{$proj['id']}</td>
                            <td>{$proj['jobtitle']}</td>
                            <td>{$proj['companyname']}</td>
                            <td>{$proj['jobdescription']}</td>
                            <td>{$proj['commission']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No projects found</td></tr>";
                }
                ?>
            </table>
        </div>

    </div>

</body>
</html>
