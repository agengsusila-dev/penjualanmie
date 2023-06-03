<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class>
        <img class="ml-72 w-1/2" src="assets/images/promo-2for58k.jpeg" alt="" >
    </div>
    <span
        class="absolute text-white text-4xl top-5 left-4 cursor-pointer"
        onclick="Openbar()"
    >
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div
        class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000 p-2 w-[300px] overflow-y-auto text-center bg-gray-100 shadow h-screen"
    >
        <div class="text-gray-950 text-xl">
            <div class="p-2.5 mt-1 flex items-center rounded-md">
                <img
                    class="px-2 py-1 rounded-md w-auto h-20"
                    src="assets/images/logo-golam.png"
                ></img>
                <i
                    class="bi bi-x ml-20 cursor-pointer lg:hidden"
                    onclick="Openbar()"
                ></i>
            </div>
            <hr class="my-2 text-stone-950" />

            <div>
                
                <div
                    class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-red-500"
                >
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span class="text-[15px] ml-4 text-gray-900 font-semibold">Home</span>
                </div>
            </div>
            <div class=" leading-7 text-left text-sm font-medium mt-2 w-4/5 mx-auto inline-block" id="submenu">
                <h1 class="cursor-pointer p-2 hover:text-red-400 rounded-md mt-1"><a href="produk/produk.php">Produk</a></h1>
                <h1 class="cursor-pointer p-2 hover:text-red-400 rounded-md mt-1"><a href="pos/pos.php">POS</a></h1>
                <h1 class="cursor-pointer p-2 hover:text-red-400 rounded-md mt-1"><a href="#">Order</a></h1>
            </div>
            <hr class="my-4 text-gray-600" />
                <div
                    onclick="location.href='index.php'"
                    class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-red-500"
                >
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span class="text-[15px] ml-4 text-gray-900 font-semibold">Logout</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
