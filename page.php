<?php
    session_start();
    include "conn.php";
    include "includes/templates/header.php";
    $id = $_SESSION["id"];
    if (isset($_SESSION['email'])){
    	if(isset($_POST['post'])){
    		$post = $_POST["post"];
    		$id = $_SESSION["id"];
    		$sql ="INSERT INTO posts (subject,userid) VALUES (:post,:id)";
    		$stmt =$conn->prepare($sql);
    		$stmt->execute(array(':post' => $post,':id'=>$id));
    		header("location:index.php");
    	}
?>
<!---start header ----->
<div class="pgheader">

	<div class="pghcontainer">

		   <!--start right (icon+search)--->
			<div class="right">
				<form>
					<div class="l1"><button type="submit"> <i class="fas fa-search"></i></button><input placeholder="بحث.." dir="rtl" type="search" name=""></div>
					<div class="r1"><i class="fab fa-facebook-f"></i></div>
				</form>
			</div>
		   <!---end right ------>





		<!----start left (profile + home + create + friends requests + messages + notifications+ settings)-->
			<div class="left">
				<div>

					<div style="cursor:pointer;border: 5px solid; border-color: #1a2947 transparent transparent transparent;" id="tra"></div>
				</div>

				<p style="display: inline;margin-right:10px;margin-left:5px;color: #3b5ca0">|</p><div>
					<div><i style="cursor:pointer;color: #1a2947;font-size: 21px;margin-right: 5px;" class="fas fa-bell"></i></div>
					<div><i style="cursor:pointer;color: #1a2947;font-size: 21px;margin-right: 5px;" class="fab fa-facebook-messenger"></i></div>
					<div><i style="cursor:pointer;color: #1a2947;font-size: 21px;margin-right: 5px;" class="fas fa-user-friends"></i></div>
				</div>


				<p style="display: inline;margin-right:10px;color: #3b5ca0;">|</p><div style="width: 25px;width: 40px;
margin-right: -10px;cursor:pointer;
margin-left: 5px;" class="aft">انشاء</div>
				<p  style="display: inline;margin-right:10px;margin-left:10px;color: #3b5ca0">|</p><div style="cursor:pointer;width: 88px;" class="aft">الصفحة الرئيسية</div>
				<p style="display: inline;margin-left:6px;margin-right: -10px;color: #3b5ca0">|</p><div class="profile aft">
					<a style="color: white;text-decoration: none;font-size: 18px;" href="profile.php?id=<?php echo $id ?>">
						 <img src="layout/images/profile.jpg"/>
						 <label style="cursor: pointer;"><?php echo $_SESSION["firstname"]?></label>
					 </a> 
				</div>

			</div>
			<!----end left-->
	</div>
</div>
<!----end header----->







<!------start body------>
<div class="pgbody">
	<div class="fixedright">
		<div style="width: 100%;" class="profile aft">
			 <img src="layout/images/profile.jpg"/>
			 <label style="cursor: pointer;"><?php echo $_SESSION["firstname"]." ".$_SESSION["lastname"]?></label> 
		</div>
	</div>
	<div class="fixedleft">ssssss</div>
	<div class="content">
		<div class="post">
			<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
				<div class="create">إنشاء منشور</div>
				<div style="position: relative; overflow:hidden; background-color: white;min-height: 160px; " class="text">	
					<img style="position: absolute;top: 10px;right: 10px; display: inline;float: right;width: 40px;
					height: 40px;
					border-radius: 50%;" src="layout/images/profile.jpg">
					<textarea name="post" placeholder="<?php echo $_SESSION['firstname'] . ',';?>بما تفكر " style="width:70%;float:left;padding:24px 70px;font-size: 20px; resize: none; width: 100%;min-height: 200px;border:none;"></textarea>
				</div>
				<div class="upld">
					<p>حمل ملفاتك الان  </p>
					<button style="cursor: pointer;margin-top: 20px; width: 100%;padding:5px;background-color: #4267b2;
border-color: #4267b2;border:1px solid;color: white;" type="submit">نشر</button>
				</div>
			</form>
		</div>









	</div>
</div>
<!------end body------->
<div class="logout hide">
	<form action="logout.php">
		<input type="submit" value="logout" name="">
	</form>
</div>



<?php

	}else{
		header("location:index.php");
	}
?>
<script type="text/javascript">
	var win = document.getElementsByClassName("logout")[0];
var toggle = document.getElementById("tra");

toggle.onclick = function(){
	win.classList.toggle("hide");
	if(win.classList.contains("hide")){
	toggle.style.borderColor = "#1a2947 transparent transparent transparent";
    }else{
	toggle.style.borderColor = "white transparent transparent transparent";
}
}

</script>
<?php include "includes/templates/footer.php";?>