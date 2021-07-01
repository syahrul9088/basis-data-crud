<html>
<head>
	  <meta charset="UTF-8">
  <title>Add User</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./btn.css">

</head>
 
<body>
	
	<br/><br/>
 
	<div class="container">  
  <form id="contact" action="add.php" method="post" name="form1">
    <h3>Form Add User</h3>
    <h4><a href="index.php">Go to Home</a></h4>
    <fieldset>
      <input placeholder="Nama Pasien" type="text" name="nama_pasien" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Keterangan" type="text" name="keterangan" tabindex="2" required>
    </fieldset>
     <fieldset>
      <input placeholder="Nama Dokter" type="text" name="nama_dokter" tabindex="2" required>
    </fieldset>
    <fieldset>
	<input class="btn btn--secondary btn--med btn--finish"  type="submit" name="Submit" value="Add">
    </fieldset>
    
  </form>
</div>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nama_pasien = $_POST['nama_pasien'];
		$keterangan = $_POST['keterangan'];
		$nama_dokter = $_POST['nama_dokter'];
		
		// include database connection file
		include_once("koneksi.php");
				
		// Insert user data into table
		$result = mysqli_query($koneksi, "INSERT INTO pasien(nama_pasien, keterangan, nama_dokter) VALUES('$nama_pasien','$keterangan','$nama_dokter')");
		
		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
        header('Location: index.php');
	}
	?>
</body>
</html>