<!DOCTYPE html>
<html lang="en">
<head>
    <title>TABLE</title>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<tbody>
<center>
<table style="width:40%" id="customers">
    <h1>JEKMA HOSPITAL</h1>
    <tr>
        <th>No ID</th>
        <th>Nama Pasien</th>
        <th>Keterangan</th>
		<th>Nama Dokter</th>
        <th>aksi</th>
    </tr>

    <a href="add.php">Add New User</a><br/><br/>

	<?php
	    include('koneksi.php'); //memanggil file koneksi
		$result = mysqli_query($koneksi, "select * from pasien") or die(mysqli_error($koneksi));

		$no = 1;//untuk pengurutan nomor

		//melakukan perulangan
		while($row = mysqli_fetch_assoc($result)) {
	?>	

	<tr>
        <td><?= $no; ?></td>
        <td><?= $row['nama_pasien'];?></td>
        <td><?= $row['keterangan']; ?></td>
        <td><?= $row['nama_dokter']; ?></td>
        <td><a href='edit.php?no_id=<?php echo $row['no_id'];?>'>Edit</a> | <a href='delete.php?no_id=<?php echo $row['no_id'];?>'>Delete</a></td></tr>
	</tr>
	<?php $no++; } ?>
</table>
</center>
</tbody>
</body>
</html>
