<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
	
<?php
 
require'./fpdf.php'; // load fpdf class
require '../config/koneksi.php'; // load koneksi database
$connect = connect();
 
class PDF extends FPDF {
 
    // memberikan warna pada table
    function FancyTable($header, $data) {
        // warna, lebar dan font bold
        $this->SetFillColor(206, 206, 206);
        $this->SetTextColor(30, 30, 30);
        $this->SetDrawColor(89, 89, 89);
        $this->SetLineWidth(.2);
        $this->SetFont('', 'B');
        // Header
        $w = array(40, 50, 50, 30);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // warna line
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Parsing Data
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row['nama'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row['email'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row['alamat'], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row['umur'], 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // tutup line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
 
}
 
$pdf = new PDF();
// tentukan header kolom
$header = array('Nama', 'Email', 'Alamat', 'Umur');
// Data loading
$sql = "SELECT * FROM tb_anggota ORDER BY anggota_id DESC";
 
$data = array();
if ($result = mysqli_query($connect, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}
$pdf->SetFont('Arial', '', 11);
$pdf->AddPage();
$pdf->FancyTable($header, $data);
$pdf->Output();
?>

    <table class="kotak-cart">
                <thead>
                    <tr class="kotak-judul">
                        <th>Nama<br>Kereta</th>
                        <th>Harga<br>per Tiket</th>
                        <th>Jumlah<br>Tiket</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                            include '../config/koneksi.php';
                            $trans = $_GET['idTrans'];
                            $sql = "SELECT * FROM detailtransaksi where id_trans = $trans";
                            $query = mysqli_query($db, $sql);
                            
                            
                            while($cart = mysqli_fetch_array($query)){
                            if($cart) {
                                echo "<tr style='text-align:center; height:60px;'>";
                                $st1=mysqli_query($db, "SELECT nama_kr from jadwal where id_jd=$cart[1]");
                                $nmst1 = mysqli_fetch_array($st1);
                                echo "<td>" . $nmst1['nama_kr'] . "</td>";
                                echo "<td>" . $cart[2] . "</td>";
                                echo "<td>" . $cart[3] . "</td>";
                                echo "<td>" . $cart[4] . "</td>";
                                echo "</tr>";
                            }else {
                                echo "
                                <tr>
                                    <td>
                                         Your Cart is Empty :( <br>
                                         start looking for train tickets for your trip.
                                        <br><br>
                                    </td>
                                </tr>
                                 ";
                            }
                            }
                            ?>
                </tbody>
                <br>
            </table>
            <table class="kotak-cart">
                <p>Data Penumpang</p>
                <tr class="kotak-judul">
                        <th>Nama Penumpang</th>
                        <th>No. Identitas</th>
                </tr>
                
                <?php
                                $trans = $_GET['idTrans'];
                                $sql = "SELECT * FROM penumpang where id_trans = $trans";
                                $query = mysqli_query($db, $sql);
                                // if($cart>0) {
                                while($cart = mysqli_fetch_array($query)){
                                if($cart){
                                echo "<tr style='text-align:center; height:60px;'>";
                                echo "<td>" . $cart['nama'] . "</td>";
                                echo "<td>" . $cart['no_identitas'] . "</td>";
                                echo "</tr>";
                                }    
                            }
                ?>
            </table>
    <script>
		window.print();
	</script>
</body>
</html>