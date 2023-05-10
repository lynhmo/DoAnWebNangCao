<?php
if (isset($_POST['btn_submit1'])) {
    //
    $title = $_POST["title"];
    $content = $_POST["post_content"];
    $is_public = 0;
    if (isset($_POST["is_public"])) {
        $is_public = $_POST["is_public"];
    }
    $user_id = $_SESSION["user_id"];
    // Upload ảnh
    $image = $_FILES["imageUpload"]['name'];
    $errors = array();
    $file_name = $_FILES["imageUpload"]["name"];
    $file_size = $_FILES["imageUpload"]["size"];
    $file_tmp = $_FILES["imageUpload"]["tmp_name"];
    $file_type = $_FILES["imageUpload"]["type"];
    $file_ext = strtolower(end(explode('.', $_FILES["imageUpload"]["name"])));

    $expensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'Kích thước file không được lớn hơn 2MB';
    }
    $target = "assets/photo/" . basename($file_name);
    $sql = "INSERT INTO posts( title, content, image,user_id, is_public, createdate, updatedate ) VALUES ( '$title', '$content', '$image', '$user_id', '$is_public' , now(), now())";
    if (mysqli_query($conn, $sql) && move_uploaded_file($file_tmp, $target) && empty($errors) == true) {
        echo '<script language="javascript">
    alert("Đăng bài viết thành công!");
</script>';
    } else {
        echo '<script language="javascript">
    alert("Có lỗi trong quá trình xử lý");
</script>';
    }
}
