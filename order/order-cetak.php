<?php
include '../koneksi.php';
$getRcpt = $_GET['rcpt'];
$query = mysqli_query($conn, "SELECT o.*, d.*, p.postitle, pr.namaproduk FROM `order` o 
                              JOIN detailorder d ON o.rcpt = d.rcpt 
                              JOIN pos p ON o.idstore = p.idstore
                              JOIN produk pr ON d.idproduk = pr.idproduk
                              WHERE o.rcpt = '$getRcpt'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Struk Belanjaan</title>
    <style>
        /* @page {
            size: 75mm 65mm;
            margin: 0;
        } */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .struk-container {
            width: 100%;
            height: 100%;
            border: 1px solid #ccc;
            padding: 10px;
            overflow: hidden; /* Menghindari konten terpotong */
            box-sizing: border-box;
        }

        .struk-items {
            margin-bottom: 10px;
        }

        .struk-items table {
            width: 100%;
        }

        .struk-items th{
          padding: 3px;
          text-align: center;
        }
        .struk-items td {
            padding: 3px;
            text-align: left;
        }
        hr.dashed {
          border-top: 3px dashed #000;
        }
    </style>
</head>
<body>
    <div class="struk-container">
        <div class="struk-items">
            <table>
                <tr>
                  <th colspan="3">
                    <h2>Golden Lamian <br> 
                    <?php echo $data['postitle'];?></h2> 
                    <p>Delivery: 6900700</p>
                    <h2>Order</h2>
                  </th>
                </tr>
                <tr>
                  <td colspan="3">
                    <hr class="dashed">
                  </td>
                </tr>
                <tr>
                  <td>Pax: <?php echo $data['pax'];?></td>
                </tr>
                <tr>
                  <td>POS Title: <?php echo $data['postitle'];?></td>
                </tr>
                <tr>
                  <td>Rcpt: <?php echo $data['rcpt'];?></td>
                  <td><?php echo $data['ordertime'];?></td>
                </tr>
                <?php
                  $query = "SELECT d.*, p.namaproduk, p.hargaproduk FROM `detailorder` d 
                  INNER JOIN produk p ON d.idproduk = p.idproduk
                  WHERE rcpt = '$getRcpt'";
                  $queryDetail = mysqli_query($conn, $query);
                  $productTotal = mysqli_num_rows($queryDetail);
                  $queryQtyTotal = "SELECT SUM(qtyproduk) AS totalqty FROM `detailorder` WHERE rcpt = '$getRcpt'";
                  $queryQtyTotalExec = mysqli_query($conn, $queryQtyTotal);
                  $qtyTotal = mysqli_fetch_assoc($queryQtyTotalExec)['totalqty'];
                  while ($dataProduk = mysqli_fetch_assoc($queryDetail)){
                ?>
                <tr>
                    <td><?php echo $dataProduk['qtyproduk'];?></td>
                    <td><?php echo $dataProduk['namaproduk'];?></td>
                    <td><?php echo $dataProduk['subtotal'];?></td>
                </tr>
                <?php 
                  }
                ?>
                <tr>
                  <td colspan="3">
                    <hr class="dashed">
                  </td>
                </tr>
                <tr>
                    <td></td>
                    <td>ITEMS TOTAL</td>
                    <td><?php echo $data['itemstotal'];?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Promo</td>
                    <td>( - <?php echo $data['promo'];?> )</td>
                </tr>
                <tr>
                  <td colspan="3">
                    <hr class="dashed">
                  </td>
                </tr>
                <tr>
                    <td></td>
                    <td>SUBTOTAL</td>
                    <td>( - <?php echo $data['subtotal'];?> )</td>
                </tr>
                <tr>
                  <td colspan="3">
                    <hr class="dashed">
                  </td>
                </tr>
                <tr>
                    <td></td>
                    <td>SUBTOTAL</td>
                    <td>( - <?php echo $data['subtotal'];?> )</td>
                </tr>
                <tr>
                    <td></td>
                    <td>PJK RST</td>
                    <td>( - <?php echo $data['pajak'];?> )</td>
                </tr>
                <tr>
                  <td colspan="3">
                    <hr class="dashed">
                  </td>
                </tr>
                <tr>
                    <td></td>
                    <td><h3>TOTAL</h3></td>
                    <td><h3><?php echo $data['total'];?></h3></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total Item: <?= $productTotal?></td>
                    <td>Total Qty: <?= $qtyTotal?></td>
                </tr>
                <tr>
                  <td colspan="3">
                    <hr class="dashed">
                  </td>
                </tr><tr>
                  <td colspan="3">
                    <hr class="dashed">
                  </td>
                </tr>
                <tr>
                  <th colspan="3">
                    <p>Clossed Bill</p>
                    <p>Thank you for your visit <br> Please come again</p>
                  </th>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
