<?php
include "../../config/koneksi.php";
        $idTrans = $_GET['id_trans'];
        $sql = "UPDATE headtransaksi SET status='Complet' where id_trans = $idTrans";
       
        $query = mysqli_query($db, $sql);
        $cart = mysqli_fetch_array($query);

 		if ($query) {
             header('Location:./cart.php?status=sukses');
		}else {
            header('Location:./cart.php?status=gagal');	
		}

?>