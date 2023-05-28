<?php
$sql_so_san_pham = "select count(*) from products";
$arr_so_san_pham = mysqli_query($conn, $sql_so_san_pham);
$ket_qua = mysqli_fetch_array($arr_so_san_pham);
$so_san_pham = $ket_qua['count(*)']; // Lấy ra tổng số sản phẩm
$so_san_pham_mot_trang = 12;
$so_trang = ceil($so_san_pham / $so_san_pham_mot_trang); // làm tròn lên 1.2 thành 2
$trang = "";
// Mỗi 1 lần bấm nút chuyển trang mới sẽ có 1 giá tri trang mới được gửi từ ALL PRODUCT
if (isset($_GET['trang'])) {
    $trang = $_GET['trang'];
} else {
    $trang = 1; // mac dinh la 1
}
$bo_qua = $so_san_pham_mot_trang * ($trang - 1);

$sql1 = "select * from products limit $so_san_pham_mot_trang offset $bo_qua";
// Sử dụng offset để bỏ qua các sản phẩm đã được lấy ra ở trang trước
// Nếu trang trước là 2 thì 12*2 sản phẩm đầu tiên trong table sẽ bị bỏ qua và lấy 12 sản phẩm tiếp theo
$result = mysqli_query($conn, $sql1);

?>
<!-- Lặp lại đủ số product trong 1 trang -->
<?php foreach ($result as $data) : ?>
    <div class="products products_recommend col mx-4 mb-4">
        <a href='order_detail.php?id=<?php echo $data['product_id'] ?>'>
            <img src='./assets/img/<?php echo $data['image'] ?>' alt='' class='img_products'>
        </a>
        <div class='describe_products'>
            <div class='ratings_products'>
                <span><?php echo $data['title'] ?></span>
                <span><?php echo $data['star'] ?> <i class='fa-solid fa-star icon_star'></i></span>
                <div>
                    <span class='info_price'><?php echo $data['price'] ?>$</span>
                    <span class='oldprice'><?php echo $data['oldprice'] ?>$</span>
                </div>
            </div>
            <div class='add_like_products'>
                <i class='fa-regular fa-heart icon_heart'></i>
                <button class='btn_deal-item'><i class='fa-solid fa-plus icon_addcart'></i></button>
            </div>
        </div>
    </div>
<?php endforeach ?>