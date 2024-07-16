<div id="main">
    <?php
        include("sidebar/sidebar.php")
    ?>
			<div class="maincontent">
                <?php
                if(isset($_GET['quanly'])){
                    $tam = $_GET['quanly'];
                }else{
                    $tam = '';
                }if($tam =='dangky'){
                    include("main/dangKy.php");
                }
                else if($tam =='dangnhap'){
                    include("main/dangNhap.php");
                }
                else if($tam == 'todolist'){
                    include("main/menu/todolist.php");
                }
                else if($tam =='thaydoimatkhau'){
                    include("main/thaydoimatkhau.php");                }
                else{
                    include("main/index.php");
                }
                ?>
			</div>
		</div>