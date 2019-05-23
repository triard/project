<?php
include "../config/koneksi.php";
    session_start();
    $id = $_SESSION['id'];
    $idTrans = $_POST['idTrans'];  
    $uploadedfile = $_FILES['uploadedfile']['name'];
 	$tmp = $_FILES['uploadedfile']['tmp_name'];
 	$fotobaru = date('dmYHis').$uploadedfile; 
 	$path = "./bukti-transfer/".$fotobaru; 

 	if(move_uploaded_file($tmp, $path)) {
         $sqli = "UPDATE headtransaksi SET status='Proses', bukti='$fotobaru' where id_user = $id and id_trans=$idTrans";
        $query = mysqli_query($db, $sqli);
        $cart = mysqli_fetch_array($query);

 		if ($query) {
             header('Location:./riwayat-transaksi.php?status=sukses');
		}else {
            header('Location:./riwayat-transaksi.php?status=gagal');	
		}
 	}

?>