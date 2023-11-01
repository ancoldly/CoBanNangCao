<?php
include_once('../connect.php');

if (isset($_POST['Them'])) {
    $icon = $_FILES['image']['name'];
    $anhminhhoa_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($anhminhhoa_tmp, "../image/" . $icon);
    
    $theloai = $_POST['TenTL'];
    $thutu = $_POST['ThuTu'];
    $an = $_POST['AnHien'];
    
    $sl = "INSERT INTO theloai (TenTL, ThuTu, AnHien, icon) VALUES ('$theloai', '$thutu', '$an', '$icon')";
    
    if (mysqli_query($connect, $sl)) {
        echo "<script>alert('Thêm thành công');</script>";
        header("Location: theloai.php");
        exit();
    } else {
        echo 'Lỗi: ' . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>