<?php
    session_start();
    if( session_destroy()){
        echo "
		<script>alert('anda harus login terlebih dahulu');
		window.location='../login/index.php'
        </script>";
    };   
?>  