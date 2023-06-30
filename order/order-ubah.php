<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM `order` where rcpt = '$_GET[rcpt]'");
$data = mysqli_fetch_array($query);
$dataPos = mysqli_query($conn, "SELECT idstore, postitle from pos");
while($arrayDataPos = mysqli_fetch_array($dataPos)){
  $idStore = $arrayDataPos['idstore'];
  $posTitle = $arrayDataPos['postitle'];
  $posOptions .= "<option value='$idStore'>$posTitle</option>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
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
                <div class="mt-5 ml-72 mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="#" method="POST">
                      <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Receipt</label
                            >
                            <div class="mt-1">
                                <input
                                    name="rcpt"
                                    type="text"
                                    value="<?php echo $data['rcpt'];?>"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                                />
                            </div>
                        </div>
                        <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >POS Location</label>
                            <div class="mt-1">
                                <select name="idstore" required class="block w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2">
                                 <?php echo $posOptions; ?>
                                </select> 
                            </div>
                        </div>
                        <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Order Time</label
                            >
                            <div class="mt-1">
                                <input
                                    id="username"
                                    name="ordertime"
                                    type="datetime-local"
                                    value="<?php echo $data['ordertime'];?>"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                                />
                            </div>
                        </div>
                        <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Total Person</label
                            >
                            <div class="mt-1">
                                <input
                                    id="username"
                                    name="pax"
                                    type="text"
                                    value="<?php echo $data['pax'];?>"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                                />
                            </div>
                        </div>
                        <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Items Total</label
                            >
                            <div class="mt-1">
                                <input
                                    id="username"
                                    name="itemstotal"
                                    type="text"
                                    value="<?php echo $data['itemstotal'];?>"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                                />
                            </div>
                        </div>
                        <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Discount</label
                            >
                            <div class="mt-1">
                                <input
                                    id="username"
                                    name="promo"
                                    type="text"
                                    value="<?php echo $data['promo'];?>"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                                />
                            </div>
                        </div>
                        <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Tax</label
                            >
                            <div class="mt-1">
                                <input
                                    id="username"
                                    name="pajak"
                                    type="text"
                                    value="<?php echo $data['pajak'];?>"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                                />
                            </div>
                        </div>
                        <div class="flex mt-4">
                            <button
                                type="submit"
                                name="proses"
                                class="flex w-40 justify-center rounded-md bg-red-600 px-3 py-1.5 mr-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-400"
                            >
                                Submit
                            </button>
                            <a href="order.php">
                                <input 
                                type="button" 
                                class="flex w-40 justify-center rounded-md bg-slate-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-slate-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-400"
                                value="Back">
                            </a>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php

if (isset($_POST['proses'])){
    include '../koneksi.php';
    $rcpt = $_POST['rcpt'];
    $idstore = $_POST['idstore'];
    $ordertime = $_POST['ordertime'];
    $itemstotal = $_POST['itemstotal'];
    $promo = $_POST['promo'];
    $pax = $_POST['pax'];
    $pajak = $_POST['pajak'];
    $total = $itemstotal - $promo + $pajak;

    mysqli_query($conn, "UPDATE `order` SET idstore='$idstore', ordertime='$ordertime', pax='$pax', itemstotal='$itemstotal', promo='$promo', pajak='$pajak', total='$total'  WHERE rcpt='$rcpt'");
    echo "<script type='text/javascript'>alert('Data Berhasil Diedit'); window.location.href = 'order.php';</script>";
}
?>