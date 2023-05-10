<?php
$sql_so_san_pham = "select count(*) from products";
$arr_so_san_pham = mysqli_query($conn, $sql_so_san_pham);
$ket_qua = mysqli_fetch_array($arr_so_san_pham);
$so_san_pham = $ket_qua['count(*)'];
$so_san_pham_mot_trang = 12;
$so_trang = ceil($so_san_pham / $so_san_pham_mot_trang);
$trang = "";
if (isset($_GET['trang'])) {
    $trang = $_GET['trang'];
} else {
    $trang = 1;
}
$bo_qua = $so_san_pham_mot_trang * ($trang - 1);

$start = $end = "";
if (isset($_POST['start']) && isset($_POST['end'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];
    $sql1 = "select * from products";
} else {
    $sql1 = "select * from products limit $so_san_pham_mot_trang offset $bo_qua";
}
$result = mysqli_query($conn, $sql1);
//
?>
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