<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Position of Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <h1 class="cursor-pointer p-2 hover:text-red-400 rounded-md mt-1"><a href="../produk/produk.php">Produk</a></h1>
                    <h1 class="text-red-700 cursor-pointer p-2 hover:text-red-400 rounded-md mt-1"><a href="../pos/pos.php">POS</a></h1>
                    <h1 class="cursor-pointer p-2 hover:text-red-400 rounded-md mt-1"><a href="#">Order</a></h1>
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
        <div class="pt-10 mx-80 w-2/3">
                <table class="w-full text-sm text-left text-gray-500">
                    <!-- Konten tabel di sini -->
                        <thead class="text-xs text-red-700 bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID Store
                            </th>
                            <th scope="col" class="px-6 py-3">
                                POS Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../koneksi.php';
                            $query = mysqli_query($conn, "SELECT * FROM pos");
                            while ($data=mysqli_fetch_array($query)){
                        ?>
                        <tr class="bg-gray-100 border-b hover:bg-gray-300 w-full">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?php echo $data['idstore'];?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $data['postitle'];?>
                            </td>
                            <td class="px-6 py-4">
                                <a href="pos-ubah.php?idstore=<?php echo $data['idstore'];?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Update</a>
                                <a href="pos-hapus.php?idstore=<?php echo $data['idstore'];?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody> 
                </table>
                <div class="flex">
                        <a 
                            href="pos-tambah.php"
                            type="submit"
                            name="proses"

                            class="flex w-24 justify-center rounded-md bg-red-600 px-3 py-1.5 mt-5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-400"
                        >
                            Add
                        </a>
                </div>
            </div>
            
        </div>
</body>
</html>