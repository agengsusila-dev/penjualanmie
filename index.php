<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Home</title>
    </head>
    <body>
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img
                    class="mx-auto h-28 w-auto"
                    src="assets/images/logo-golam.png"
                    alt="Golden Lamian"
                />
                <h2
                    class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"
                >
                    Login Golden Lamian's Admin
                </h2>
            </div>

            <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="#" method="POST">
                    <div>
                        <label
                            for="text"
                            class="block text-sm font-medium leading-6 text-gray-900"
                            >Username</label
                        >
                        <div class="mt-2">
                            <input
                                id="username"
                                name="username"
                                type="text"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                            />
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label
                                for="password"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Password</label
                            >
                            <div class="text-sm">
                                <a
                                    href="#"
                                    class="font-semibold text-red-600 hover:text-red-500"
                                    >Forgot password?</a
                                >
                            </div>
                        </div>
                        <div class="mt-2">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-slate-400 sm:text-sm sm:leading-6 p-2"
                            />
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            onclick="location.href='home.php'"
                            class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-400"
                        >
                            Sign in
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Not registered?
                    <a
                        href="#"
                        class="font-semibold leading-6 text-red-600 hover:text-red-500"
                        >Contact HR Division</a
                    >
                </p>
            </div>
        </div>
    </body>
</html>
