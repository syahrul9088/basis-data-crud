<?php
// include database connection file
include_once("koneksi.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$no_id = $_POST['no_id'];
	$nama_pasien=$_POST['nama_pasien'];
	$keterangan=$_POST['keterangan'];
	$nama_dokter=$_POST['nama_dokter'];
		
	// update user data
	$result = mysqli_query($koneksi, "UPDATE pasien SET nama_pasien = '".$nama_pasien."', keterangan = '".$keterangan."', nama_dokter = '".$nama_dokter."' WHERE no_id = ".$no_id);
    
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$no_id = $_GET['no_id'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM pasien WHERE no_id=$no_id");
 
while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['nama_pasien'];
	$email = $user_data['keterangan'];
	$mobile = $user_data['nama_dokter'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./btn.css">
</head>
 
<body>
<div class="container">  
  <form id="contact" name="update_user" method="post" action="edit.php">
    <h3>Add User</h3>
    <h4><a href="index.php">Go to Home</a></h4>
    <fieldset>
      <input placeholder="Nama Pasien" type="text" name="nama_pasien" value=<?php echo $name;?> tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Keterangan" type="text" name="keterangan" value=<?php echo $name;?> tabindex="2" required>
    </fieldset>
     <fieldset>
      <input placeholder="Nama Dokter" type="text" name="nama_dokter"  value=<?php echo $name;?> tabindex="2" required>
    </fieldset>
    <input type="hidden" name="no_id" value=<?php echo $_GET['no_id'];?>>
    <fieldset>
    <input class="btn btn--secondary btn--med btn--finish"  type="submit" name="update" value="Update">
      
    </fieldset>

    
  </form>
</div>
</body>
</html>