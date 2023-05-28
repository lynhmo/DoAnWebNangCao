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
    <div class="container mx-auto">
        <div class="row row-cols-5 justify-content-center">
            <?php
            include 'ProductBlock.php'; // Hien thi tung các cục product ra man hinh
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
                    <!-- Nếu $i == $current_page thì class="active" của thẻ <a> sẽ được tô màu-->
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