<?php include "./header.php" ?>
<style>
    .center {
        text-align: center;
    }

    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
        margin: 0 4px;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
        border: 1px solid #4CAF50;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
</style>
<div id="body">
    <!-- <div class="container" style="margin-top: 30px;">
        <p style="margin-left: 43px;
                                margin-bottom: 10px;">GIÁ</p>
        <form method="POST" action="./component/product_chamsocda.php" style="width: 70%;margin: auto;">
            <div class="form-group" style="display:flex;justify-content: space-between;width: 100%;">
                <input type="text" class="form-control" placeholder="Nhập giá" name="start" style="width:80px;height: 40px;font-size: 13px;">
                <div style="font-size: 18px;font-weight: bold;">-</div>
                <input type="text" class="form-control" placeholder="Nhập giá" name="end" style="width:80px;height: 40px;font-size: 13px;">
            </div>
            <button type="submit" class="btn btn-default" style="width: 100%;">áp dụng</button>
        </form>
    </div> -->
    <div class="container mx-auto">
        <div class="row row-cols-5 justify-content-center">
            <?php
            include 'ProductBlock.php';
            ?>
        </div>
    </div>

    <br>
    <br>
    <div class="container">
        <ul class="pagination" style="display: flex;justify-content: center;margin-top: -50px">
            <?php $current_page = isset($_GET['trang']) ? (int) $_GET['trang'] : 1; //toan tu 3 ngoi de lay ra trang hien tai
            ?>
            <?php for ($i = 1; $i <= $so_trang; $i++) { ?>
                <li style="height: 20px;">
                    <a href="?trang=<?php echo $i ?>" <?php if ($i == $current_page) echo 'class="active"' ?>>
                        <?php echo $i ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<style>
    .active {
        background-color: #397224;
        color: white;
    }
</style>
<?php include "./footer.php" ?>