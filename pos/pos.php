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
        <div class="pt-10 mx-80 w-2/3">
            <div class="flex">
                        <a 
                            href="pos-tambah.php"
                            type="submit"
                            name="proses"

                            class="flex w-fit justify-center rounded-md bg-red-600 px-3 py-1.5 mb-5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-400"
                        >
                            Add Posisiton of Stores
                        </a>
                </div>
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
                                <a href="pos-ubah.php?idstore=<?php echo $data['idstore'];?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="pos-hapus.php?idstore=<?php echo $data['idstore'];?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody> 
                </table>
                <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                    <div class="flex flex-1 justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                        <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                        <div>
                        <p class="text-sm text-gray-700">
                            Showing
                            <span class="font-medium">1</span>
                            to
                            <span class="font-medium">10</span>
                            of
                            <span class="font-medium">97</span>
                            results
                        </p>
                        </div>
                        <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                            </svg>
                            </a>
                            <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                            <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-red-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">1</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                            <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                            <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">8</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">9</a>
                            <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">10</a>
                            <a href="#" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                            </a>
                        </nav>
                        </div>
                    </div>
                    </div>

            </div>
            
        </div>
</body>
</html>