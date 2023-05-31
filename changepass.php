<?php
include "header.php";
if (isset($_POST["submit"])) {
    $password = $_POST['password'];
    $sql = "UPDATE users SET password = '$password' WHERE user_id = '{$_SESSION['user_id']}'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Đổi mật khẩu thành công!');</script>";
    } else {
        echo "<script>alert('Đổi mật khẩu thất bại!');</script>";
    }
}
?>
<style>
    .main_change{
        width: fit-content;
        height: auto;
        margin: 150px auto
    }
    .changepass {
        width: fit-content;
        height: auto;
        margin: 50px auto;
        display: flex;
    }

    .input_newpass {
        width: 600px;
        height: 50px;
        border: solid 1px #72af5c;
        border-radius: 10px;
        padding: 8px;
    }

    .input_newpass:focus {
        outline: #72af5c;
    }

    .input-group {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        font-size: 20px;
        top: 15px;
        right: 10px;
        cursor: pointer;
    }

    .btn_sb_pass {
        width: fit-content;
        height: 50px;
        border: solid 1px #72af5c;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
        padding: 8px 20px;
    }
</style>

        <div class="container__profile">
            <div class="container__title">
                <div class="container__title__item">
                    <a href="profile.php?id=<?php echo $_SESSION['user_id'] ?>" class="container__profile__title">Bài viết của bạn</a>
                </div>
                <div class="container__title__item">
                    <a href="./order_info.php?id=<?php echo $_SESSION['user_id'] ?>" class="container__profile__title">Đơn hàng của bạn</a>
                </div>
                <div class="container__title__item">
                    <a href="changepass.php?id=<?php echo $_SESSION['user_id'] ?>" class="container__profile__title">Đổi mật khẩu</a>
                </div>
            </div>
            <div class="info__order__table">
                <div class="main_change">
                    <form action="changepass.php" method="POST">
                        <div class="changepass">
                            <div class="input-group">
                                <input type="password" name="password" class="input_newpass">
                                <i class="toggle-password fas fa-eye"></i>
                            </div>
                            <div>
                                <button type='submit' name="submit" class="btn_sb_pass"> OK </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                const togglePassword = document.querySelector('.toggle-password');
                const passwordInput = document.querySelector('.input_newpass');

                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.classList.toggle('fa-eye-slash');
                });
            </script>
        </div>
<?php include "footer.php" ?>