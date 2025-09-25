<?php
include("connectdb.php");

// ตรวจสอบการ submit ฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $s_id = $_POST['s_id'];
    $s_name = $_POST['s_name'];
    $s_address = $_POST['s_address'];
    $s_gpax = $_POST['s_gpax'];
    $f_id = $_POST['f_id'];

    $sql = "INSERT INTO student (s_id, s_name, s_address, s_gpax, f_id) 
            VALUES ('$s_id', '$s_name', '$s_address', '$s_gpax', '$f_id')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success text-center'>เพิ่มข้อมูลนิสิตเรียบร้อยแล้ว</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>เกิดข้อผิดพลาด: " . mysqli_error($conn) . "</div>";
    }
}

// ดึงข้อมูลคณะ
$faculties = mysqli_query($conn, "SELECT * FROM faculty ORDER BY f_name ASC");
?>

<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <title>เพิ่มข้อมูลนิสิต</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">ฟอร์มเพิ่มข้อมูลนิสิต</h4>
    </div>
    <div class="card-body">
      <form method="post" action="">
        <div class="mb-3">
          <label class="form-label">รหัสนิสิต</label>
          <input type="text" name="s_id" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">ชื่อนิสิต</label>
          <input type="text" name="s_name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">ที่อยู่</label>
          <textarea name="s_address" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">GPAX</label>
          <input type="number" step="0.01" name="s_gpax" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">คณะ</label>
          <select name="f_id" class="form-select" required>
            <option value="">-- เลือกคณะ --</option>
            <?php while($row = mysqli_fetch_assoc($faculties)) { ?>
              <option value="<?= $row['f_id']; ?>"><?= $row['f_name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
          <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
