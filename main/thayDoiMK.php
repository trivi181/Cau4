<?php
    session_start();
    include('config.php');
    if(isset($_POST['doimatkhau'])){
        $taikhoan = $_POST['email'];
        $matkhau_cu = md5($_POST['password_cu']);
        $matkhau_moi = md5($_POST['password_moi']);
        $sql="SELECT * FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1  ";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $sql_update= mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."' ");
            echo '<p style="color:green">Đổi mật khẩu thành công  </p>';
        }else{
            echo '<p style="color:red">("Email hoặc mật khẩu cũ không chính xác")  </p>';          
        }
    }
?>
<p style="font-family: cursive;">Đổi mật khẩu</p>
<form action="" method="POST">
    <table border="1" class="table-login" style="text-align:center; border-collapse:collapse;">
       <tr><td><input type="text" name="email" placeholder="Email" required></td> </tr>
        <tr><td><input type="text" name="password_cu" placehoLder="Mật Khẩu Cũ" required></td> </tr>
        <tr><td><input type="text" name="password_moi" placehoLder="Mật Khẩu Mới" required></td> </tr>
        <tr><td><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td> </tr>
        </table>
    </form>