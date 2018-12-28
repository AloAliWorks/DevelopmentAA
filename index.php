<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Aloali.com</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate1.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style1.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<!-- <div class="top">
			<h1 id="title" class="hidden"><span id="logo"><span> Alo ALi </span></span></h1>
		</div> -->
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Đăng nhập</h2>
			</div>
			<label for="username">Tên đăng nhập</label>
			<br/>
			<input type="text" id="username" value=<?php echo isset($_COOKIE["tendangnhap"])? $_COOKIE["tendangnhap"] : ""; ?>>
			<br/>
			<label for="password">Mật khẩu</label>
			<br/>
			<input type="password" id="password" value=<?php echo isset($_COOKIE["matkhau"])? $_COOKIE["matkhau"] : ""; ?>>
			<br/>
			<button type="submit" id="dangnhap">Đăng nhập</button>
			<br/>
			<input type="checkbox" id="nhotaikhoan" />
			<label for="nhotaikhoan">Nhớ tài khoản</label>
			<input type="hidden" id="url" value=<?php echo "http://$_SERVER[HTTP_HOST]/aloaliqb/"; ?> />
			<!-- <a href="#"><p class="small">Forgot your password?</p></a> -->
		</div>
	</div>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
    	$("body").delegate('#dangnhap', 'click', function() {
			username = $("#username").val();
			password = $("#password").val();
			nhotaikhoan = $("#nhotaikhoan").is(":checked");
			duongdan = $("#url").val();
			$.ajax({
				url : "html/page_product/function.php",
				type : "POST",  //GET
				data : {
					action : "Kiemtrathongtindangnhap_Ajax",
					username: username,
					password: password,
					nhotaikhoan: nhotaikhoan,
				},
				success:function(data){
					if(data == 0){
						alert("Mật khẩu không phù hợp");
					}else if(data == 1 ){
						alert("Tài khoản hoặc mật khẩu không chính xác !");
					} else if(data ==2){
						window.location.replace(duongdan + "html/index.php");
					}
				}
			});
		});
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>