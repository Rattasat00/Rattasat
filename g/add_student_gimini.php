<?php

// Database configuration
$servername = "localhost";
$username = "root"; // Default username for XAMPP/WAMP
$password = "";     // Default password for XAMPP/WAMP
$dbname = "msu";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s_id = $_POST['s_id'];
    $s_name = $_POST['s_name'];
    $s_address = $_POST['s_address'];
    $s_gpax = $_POST['s_gpax'];
    $f_id = $_POST['f_id'];

    // SQL to insert new student data
    $sql = "INSERT INTO student (s_id, s_name, s_address, s_gpax, f_id) VALUES (?, ?, ?, ?, ?)";
    
    // Prepare and bind
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssdi", $s_id, $s_name, $s_address, $s_gpax, $f_id);
        
        // Execute the statement
        if ($stmt->execute()) {
            $message = "<div class='alert alert-success' role='alert'>บันทึกข้อมูลนิสิตเรียบร้อยแล้ว!</div>";
        } else {
            $message = "<div class='alert alert-danger' role='alert'>เกิดข้อผิดพลาด: " . $stmt->error . "</div>";
        }
        $stmt->close();
    } else {
        $message = "<div class='alert alert-danger' role='alert'>ไม่สามารถเตรียมคำสั่ง SQL ได้: " . $conn->error . "</div>";
    }
}

// Fetch faculty data from the database
$faculty_result = $conn->query("SELECT f_id, f_name FROM faculty ORDER BY f_id ASC");

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลนิสิต</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">ฟอร์มเพิ่มข้อมูลนิสิต</h2>
                <?php echo $message; ?>
                <form action="add_student.php" method="POST">
                    <div class="mb-3">
                        <label for="s_id" class="form-label">รหัสนิสิต</label>
                        <input type="text" class="form-control rounded-3" id="s_id" name="s_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="s_name" class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control rounded-3" id="s_name" name="s_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="s_address" class="form-label">ที่อยู่</label>
                        <textarea class="form-control rounded-3" id="s_address" name="s_address" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="s_gpax" class="form-label">เกรดเฉลี่ย (GPAX)</label>
                        <input type="number" step="0.01" class="form-control rounded-3" id="s_gpax" name="s_gpax" required>
                    </div>
                    <div class="mb-3">
                        <label for="f_id" class="form-label">คณะ</label>
                        <select class="form-select rounded-3" id="f_id" name="f_id" required>
                            <option value="">-- เลือกคณะ --</option>
                            <?php
                            // Loop through the query result and create options
                            if ($faculty_result->num_rows > 0) {
                                while($row = $faculty_result->fetch_assoc()) {
                                    echo "<option value='" . $row["f_id"] . "'>" . $row["f_name"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>ไม่พบข้อมูลคณะ</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded-3">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php
// Close the database connection
$conn->close();
?>