<?php
include("header.php") ?>
<div class='container_search'>
    <?php
    if (isset($_REQUEST['ok'])) {
        // $search = addslashes($_GET['search']);
        $search = $_GET['search'];
        if (empty($search)) 
        {
          echo "Bạn chưa nhập thông tin";
        } 
        else 
        {
          $query = "SELECT * FROM products WHERE title LIKE '%$search%';";
          // var_dump($query); echo"<br/>";
          $sql = mysqli_query($conn,$query);
          $num = mysqli_num_rows($sql);
          if($num > 0)
          {
              while($data = mysqli_fetch_assoc($sql)){
                  echo "
                      <div class='products products_search'>
                          <a href='order_detail.php?id={$data['product_id']}'>
                              <img src='./assets/img/{$data['image']}' alt='' class='img_products'>
                          </a>
                          <div class='describe_products'>
                              <div class='ratings_products'>
                                  <span>{$data['title']}</span>
                                  <span>{$data['star']} <i class='fa-solid fa-star icon_star'></i></span>
                                  <div>
                                      <span class='info_price'>{$data['price']}$</span>
                                      <span class='oldprice'>{$data['oldprice']}$</span>
                                  </div>
                              </div>
                              <div class='add_like_products'>
                                  <i class='fa-regular fa-heart icon_heart'></i>
                                  <button class='btn_deal-item'><i class='fa-solid fa-plus icon_addcart'></i></button>
                              </div>
                          </div>
                      </div>
                  ";
              }
          }
          else{
              echo "Không có kết quả";
          }
        }
    }
    ?>
</div>
<?php include("footer.php") ?>
