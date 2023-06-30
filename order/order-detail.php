<?php
include '../koneksi.php';
$getRcpt = $_GET['rcpt'];
$query = mysqli_query($conn, "SELECT o.*, s.postitle FROM `order` o JOIN pos s ON o.idstore = s.idstore WHERE rcpt = '$getRcpt'");
$data = mysqli_fetch_array($query);
$dataPos = mysqli_query($conn, "SELECT idstore, postitle from pos");
while($arrayDataPos = mysqli_fetch_array($dataPos)){
  $idStore = $arrayDataPos['idstore'];
  $posTitle = $arrayDataPos['postitle'];
  $posOptions .= "<option value='$idStore'>$posTitle</option>";
}
// PAGINATION
$dataPerPage = 10;
$totalData = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM detailorder"));
$totalPage = ceil($totalData / $dataPerPage);
$currentPage = (isset($_GET["page"]))? $_GET["page"] : 1;

// totalPage = 2, firstData = 5
$firstData = ($currentPage - 1) * $dataPerPage;

// FOR SHOWING OF RESULT
$lastPageItemCount = $totalData % $dataPerPage;
$lastPageEnd = $offset + $lastPageItemCount;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- SIDEBAR COMPONENT -->
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
        <div class="flex">
            <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
            <div class="flex p-4 h-auto border-b">
                <div class="w-24 block">
                    <img src="../assets/images/logo-golam.png" alt="">
                </div>
            </div>
            <div class="overflow-y-auto overflow-x-hidden flex-grow">
            <ul class="flex flex-col py-4 space-y-1">
                <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                </div>
                </li>
                <li>
                <a href="../home.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-red-500 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                </a>
                </li>
                
                <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500">Data List</div>
                </div>
                </li>
                <li>
                <a href="../produk/produk.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-red-500 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Product</span>
                </a>
                </li>
                <li>
                <a href="../pos/pos.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-red-500 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Position of Store</span>
                </a>
                </li>
                <li>
                <a href="../order/order.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-red-500 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Order</span>
                </a>
                </li>
                
                <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500">Settings</div>
                </div>
                </li>
                <li>
                    <a href="../index.php" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-red-500 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
                    </a>
                </li>
            </ul>
            </div>
            </div>
    <!-- FORM CONTENT -->
            <div class="flex flex-grow">
                <div class="mt-5 ml-72 mx-auto w-auto">
                    <table class="w-full text-sm text-left text-gray-500 mb-4">
                        <!-- Konten tabel di sini -->
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs text-red-700 bg-gray-200">
                                    Receipt
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 border-bw-full">
                                    <?php echo $data['rcpt'];?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs text-red-700 bg-gray-200">
                                    POS Location
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 border-bw-full">
                                    <?php echo $data['postitle'];?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs text-red-700 bg-gray-200">
                                    Pax
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 border-bw-full">
                                    <?php echo $data['pax'];?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs text-red-700 bg-gray-200">
                                    Order Time
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 border-bw-full">
                                    <?php echo $data['ordertime'];?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs text-red-700 bg-gray-200">
                                    Items Total
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 border-bw-full">
                                    <?php echo $data['itemstotal'];?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs text-red-700 bg-gray-200">
                                    Discount
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 border-bw-full">
                                    <?php echo $data['promo'];?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs text-red-700 bg-gray-200">
                                    Tax
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 border-bw-full">
                                    <?php echo $data['pajak'];?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs text-red-700 bg-gray-200">
                                    Total
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-100 border-bw-full">
                                    <?php echo $data['total'];?>
                                </td>
                            </tr>
                    </table>
                    <div class="flex">
                            <a 
                                href="order-detail-tambah.php?rcpt=<?php echo $data['rcpt'];?>"
                                type="submit"
                                name="proses"

                                class="flex w-fit justify-center rounded-md bg-red-600 px-3 py-1.5 mb-5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-400"
                            >
                                Add Order Details
                            </a>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500">
                        <!-- Konten tabel di sini -->
                            <thead class="text-xs text-red-700 bg-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Product Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT d.*, p.namaproduk, p.hargaproduk FROM `detailorder` d 
                                INNER JOIN produk p ON d.idproduk = p.idproduk
                                WHERE rcpt = '$getRcpt'";
                                $queryDetail = mysqli_query($conn, $query);
                                while ($data=mysqli_fetch_assoc($queryDetail)){
                            ?>
                            <tr class="bg-gray-100 border-b hover:bg-gray-300 w-full">
                            
                                <td class="px-6 py-4">
                                    <?php echo $data['namaproduk'];?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $data['hargaproduk'];?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $data['qtyproduk'];?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $data['subtotal'];?>
                                </td>
                                <td class="px-6 py-4">
                                    
                                    <a href="#.php?idstore=<?php echo $data['rcpt#'];?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                </td>
                            </tr>
                            <?php 
                                }
                            ?>
                        </tbody> 
                    </table>
                    <!-- PAGINATION SECTION -->
                    <div class="flex items-center justify-between border-t border-gray-200 px-4 pt-6 sm:px-6">
                        <div class="flex flex-1 justify-between sm:hidden">
                            <?php if ($currentPage > 1) : ?>
                            <a href="?page=<?= $currentPage - 1; ?>" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                            <?php endif; ?>
                            <?php if ($currentPage < $totalPages) : ?>
                            <a href="?page=<?= $currentPage + 1; ?>" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                            <?php endif; ?>
                        </div>
                        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                            <div>
                            <p class="text-sm text-gray-700">
                                Showing
                                <span class="font-medium"><?= $firstData + 1?></span>
                                to
                                <span class="font-medium">
                                <?php if ($currentPage == $totalPage): ?>
                                    <?= $firstData + $lastPageItemCount; ?>
                                <?php else : ?>
                                    <?= $firstData + $dataPerPage; ?>
                                <?php endif; ?>
                                </span>
                                of
                                <span class="font-medium"><?= $totalData ?></span>
                                results
                            </p>
                            </div>
                            <div>
                                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                <?php if ($currentPage > 1) : ?>
                                    <a href="?page=<?= $currentPage - 1; ?>" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                    </svg>
                                    </a>
                                <?php endif; ?>
                                    <?php for($i = 1; $i <= $totalPage; $i++) :?>
                                    <?php if($i == $currentPage) :?>
                                    <a href="?page=<?= $i; ?>" aria-current="page" class="relative z-10 inline-flex items-center bg-red-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><?= $i; ?></a>
                                    <?php else:?>
                                    <a href="?page=<?= $i; ?>" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"><?= $i; ?></a>
                                    <?php endif;?>
                                    <?php endfor; ?>
                                    <?php if ($currentPage < $totalPage) : ?>
                                    <a href="?page=<?= $currentPage + 1; ?>" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                    </svg>
                                    </a>
                                    <?php endif; ?>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>