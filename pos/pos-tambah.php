<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pos</title>
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
                    <h1 class="cursor-pointer p-2 hover:text-red-400 rounded-md mt-1"><a href="produk.php">Produk</a></h1>
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
        <div class="-ml-64 sm:rounded-lg">
                <div class="ml-20 mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="#" method="POST">
                        <!-- Konten form di sini -->
                        <div>
                            <label
                                for="text"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >ID Store</label
                            >
                            <div class="mt-1">
                                <input
                                    id="username"
                                    name="idstore"
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
                                >POS Title</label
                            >
                            <div class="mt-1">
                                <input
                                    id="username"
                                    name="postitle"
                                    type="text"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                                />
                            </div>
                        </div>
                        <div class="flex">
                            <button
                                type="submit"
                                name="proses"
                                class="flex w-40 justify-center rounded-md bg-red-600 px-3 py-1.5 mr-3 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-400"
                            >
                                Submit
                            </button>
                            <a href="pos.php">
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
    <h2> Halaman Pos </h2>

    <form action="" method="post">
        <table>
            <tr>
                <td> ID Store </td>
                <td> <input type="text" name="idstore"> </td>
            </tr>
            <tr>
                <td> Pos Title </td>
                <td> <input type="text" name="postitle"> </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="proses" value="Simpan"> 
                    <a href="../pos.php"><input type="button" value="Kembali"></a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php 
if (isset($_POST['proses'])){
    include '../koneksi.php';
  
    $idstore = $_POST['idstore'];
    $postitle = $_POST['postitle'];
    
    mysqli_query($conn, "INSERT INTO pos VALUES('$idstore','$postitle')");
    echo "<script type='text/javascript'>alert('Data Berhasil Ditambah'); window.location.href = 'pos.php';</script>";
}
?>