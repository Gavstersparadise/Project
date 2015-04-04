<?php
require ('C:\xampp\htdocs\Final\application\libraries\PHPMailer-master\PHPMailerAutoload.php');



$this -> load -> helper('path');

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif', 'jpeg', "zip", "txt", "docx", 'jpeg', 'pdf');

if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {//checking thats its not null

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	$filename = pathinfo($_FILES['upl']['name'], PATHINFO_FILENAME);

	$fullname = $_FILES['upl']['name'];

	$upload_folder = 'uploads/';

	if (!in_array(strtolower($extension), $allowed)) {// checks to see if the extensions are allowed as detailed above
		echo '{"status":"error"}';
		exit ;
	}

	if (move_uploaded_file($_FILES['upl']['tmp_name'], $upload_folder . $_FILES['upl']['name'])) {

		$sql = "INSERT INTO gav (hey, extension, userLad)  VALUES ('$filename', '$extension', '$gargle')";
		$this -> db -> query($sql);

		$path_of_uploaded_file = $upload_folder . $fullname;
		//holds the path where its saved and the file itself

		$m = new PHPMailer;
		$m -> isSMTP();
		$m -> SMTPAuth = true;
		//	$m->SMTPDebug=2;
		$m -> Host = 'smtp.gmail.com';
		$m -> Username = 'gavstersparadise@gmail.com';
		$m -> Password = 'gav101xzaq123';
		$m -> SMTPSecure = 'ssl';
		$m -> Port = 465;

		$m -> From = 'gavstersparadise@gmail.com';
		$m -> FromName = 'Gavin Murphy';
		$m -> addAddress('gavin_murphy1@hotmail.com', 'Gavin Murphy');

		$m -> isHTML(TRUE);

		$m -> addAttachment($path_of_uploaded_file, 'Sent from uploads');

		$m -> Subject = "Upload being sent";
		$m -> Body = "<P>This was sent from $currentUser </p><P> Please respond if theres any problems</P>";
		$m -> AltBody = "this is the body";
		$m -> send();

	}
}
