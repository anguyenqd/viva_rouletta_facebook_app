<?php
include ("database.php");

if (isset($_POST['email'])) {

	if ($_FILES['image_score']['name'] != NULL) {
		$name = $_FILES['image_score']['name'];
		move_uploaded_file($_FILES['image_score']['tmp_name'], "../upload/" . $name);
		echo "<h1>Sent image successful</h1>";
		echo "<img src='../upload/" . $name . "'>";

		$url = '../upload/' . $name;

		$username = "dante";
		$passsword = "123456";
		$nickname = "dante nguyen";
		$birthdate = "1990-10-8";
		$gender = "1";
		$phone = "012345678";
		$language = "vn";
		$language = "vn";
		$address = "vn";

		$db = new database();
		$conn = $db -> connectToDB();
		$email = trim($_POST['email']);
		//insert to database
		//insert user table
		$sql = "INSERT INTO `kb_viva_rouletta_fb`.`user` ( 
				`username`, `email`, `password`, `nickname`, `birthday`, 
				`gender`, `phonenumber`, `language`, `country`, `address`) 
				VALUES ('" . $username . "', 
						'" . $email . "', 
						'" . $passsword . "','" . $nickname . "', '" . $birthdate . "', 
						" . $gender . ", 
						'" . $phone . "', 
						'" . $language . "', 
						'" . $language . "', 
						'" . $address . "')";

		$result = mysql_query($sql,$conn);
		$new_user_id = mysql_insert_id();

		//Insert image table

		$sql2 = "INSERT INTO `kb_viva_rouletta_fb`.`user_images` ( 
				`user_id`, `image_url`) 
				VALUES ('" . $new_user_id . "', 
						'" . $url . "')";

		$result2 = mysql_query($sql2,$conn);

		echo $result2;

	}
}
?>