<?php
    include '../koneksi.php';
    // PAGINATION
    $dataPerPage = 5;
    $totalData = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM produk"));
    $totalPage = ceil($totalData / $dataPerPage);
    $currentPage = (isset($_GET["page"]))? $_GET["page"] : 1;

    // totalPage = 2, firstData = 5
    $firstData = ($currentPage - 1) * $dataPerPage;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Product</title>
</head>
<body>
        <div
            class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000 p-2 w-[300px] overflow-y-auto text-center bg-gray-100 shadow h-screen flex-none"
        >
            <div class="text-gray-950 text-xl">
                <div class="p-2.5 mt-1 flex items-center rounded-md">
                    <img
                        class="px-2 py-1 rounded-md w-auto h-20"
                        src="../assets/images/logo-golam.png"
                    ></img>
                </div>
                <hr class="my-2 text-stone-950" />

                <div>
                    
                    <div
                        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-red-500"
                    >
                        <i class="bi bi-box-arrow-in-right"></i>
                        <a class="text-[15px] ml-4 text-gray-900 font-semibold" href="../home.php">Home</a>
                    </div>
                </div>
                <div class=" leading-7 text-left text-sm font-semibold mt-2 w-4/5 mx-auto inline-block" id="submenu">
                    <h1 class="text-red-700 cursor-pointer p-2 hover:text-red-400 rounded-md mt-1"><a href="produk.php">Produk</a></h1>
                    <h1 class="cursor-pointer p-2 hover:text-red-400 rounded-md mt-1"><a href="../pos/pos.php">POS</a></h1>
                    <h1 class="cursor-pointer p-2 hover:text-red-400 rounded-md mt-1"><a href="../order/order.php">Order</a></h1>
                </div>
                <hr class="my-4 text-gray-600" />
                    <div
                        onclick="location.href='index.php'"
                        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-red-500"
                    >
                        <i class="bi bi-box-arrow-in-right"></i>
                        <a class="text-[15px] ml-4 text-gray-900 font-semibold" href="../index.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-col">
            <div class="-ml-64 sm:rounded-lg">
                <div class="ml-20 mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="#" method="POST">
                        <!-- Konten form di sini -->
                        <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Product ID</label
                            >
                            <div class="mt-1">
                                <input
                                    id="username"
                                    name="idproduk"
                                    type="text"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                                />
                            </div>
                        </div>
                        <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Product Name</label
                            >
                            <div class="mt-1">
                                <input
                                    id="username"
                                    name="namaproduk"
                                    type="text"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                                />
                            </div>
                        </div>
                        <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Price</label
                            >
                            <div class="mt-1">
                                <input
                                    id="username"
                                    name="hargaproduk"
                                    type="text"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                                />
                            </div>
                        </div>
                        <div>
                            <button
                                type="submit"
                                name="proses"
                                class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-400"
                            >
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="pt-10 pb-10 mx-80 w-2/3">
                <table class="w-full text-sm text-left text-gray-500">
                    <!-- Konten tabel di sini -->
                        <thead class="text-xs text-red-700 bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Product ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM produk LIMIT $firstData, $dataPerPage");
                            while ($data=mysqli_fetch_array($query)){
                        ?>
                        <tr class="bg-gray-100 border-b hover:bg-gray-300 w-full">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?php echo $data['idproduk'];?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $data['namaproduk'];?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $data['hargaproduk'];?>
                            </td>
                            <td class="px-6 py-4">
                                <a href="produk-ubah.php?idproduk=<?php echo $data['idproduk'];?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="produk-hapus.php?idproduk=<?php echo $data['idproduk'];?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="return confirm('Konfirmasi Hapus?')">Delete</a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody> 
                </table>
                <!-- Page Navigation -->

                <?php for($i = 1; $i <= $totalPage; $i++) :?>
                    <?php if($i == $currentPage) :?>
                        <a href="?page=<?= $i; ?>" class="text-red-500"><?= $i; ?></a>
                    <?php else:?>
                        <a href="?page=<?= $i; ?>" class="text-red-500"><?= $i; ?></a>
                    <?php endif;?>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
if (isset($_POST['proses'])){
    include '../koneksi.php';
  
    $idproduk = $_POST['idproduk'];
    $namaproduk = $_POST['namaproduk'];
    $hargaproduk = $_POST['hargaproduk'];
    
    mysqli_query($conn, "INSERT INTO produk VALUES('$idproduk','$namaproduk','$hargaproduk')");
    echo "<script>alert('Data Berhasil Ditambahkan'); window.location.replace('produk.php');</script>";
}
?>