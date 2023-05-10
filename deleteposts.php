<?php
// if (isset($_POST["deleteposts"])){
//     echo"
//     <div class='modal-footer'>
//         <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
//         <button type='button' class='btn btn-primary'>Save changes</button>
//     </div>
//     ";
// }
// Quy trình xóa bản ghi sau khi đã xác nhận
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
    // Include file config.php
    $id=$_GET['id'];
    echo"id ===== $id";
    // Chuẩn bị câu lệnh delete
    include("dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    $sql = "DELETE FROM posts WHERE posts_id = '$id'";
    mysqli_query($conn,$sql);
    echo '<script language="javascript">alert("Xóa bài viết thành công!"); window.location="profile.php";</script>';
}
?>