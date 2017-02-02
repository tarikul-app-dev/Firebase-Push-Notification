<?php 

	if (isset($_POST["Token"])) {
		   echo "TOken Found";
		    $_uv_Number=$_POST["Number"];
			$_uv_Token=$_POST["Token"];
			 echo "$_uv_Token";
		   $conn = mysqli_connect("localhost","root","","fcmpush") or die("Error connecting");

		   $q="INSERT INTO users (Token,Number) VALUES ('$_uv_Token','$_uv_Number') ";
               
      mysqli_query($conn,$q) or die(mysqli_error($conn));

      mysqli_close($conn);

	}else{
		echo "Not Found token ";
	}


 ?>