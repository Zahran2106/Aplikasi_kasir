<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" covntent="width=device-width, initial-scale=1.0" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
        theme: {
            extend: {
            spacing: {
                13: "3.25rem",
                15: "3.75rem",
                128: "32rem",
                144: "36rem",
            },
            colors: {
                main: "#043a7b",
                text: "#b3b3b3",
                input: "#E9EDF2",
                hovermain: "#042f63",
            },
            },
        },
        };
    </script>
    <title>Login</title>
    </head>
    <body class="bg-[url('../assets/img/background-login.png')] bg-cover bg-no-repeat">
        <div class="w-11/12 m-auto flex justify-end items-center h-screen">
            @if (session('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session ('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>  
                @endif
                <form action="{{ route('login.store') }}" method="POST"
                    class="h-2/3 bg-white w-fit flex flex-col px-7 py-8 rounded-xl items-center justify-around">
                        <img src="../assets/img/shop.jpg" alt="shop.jpg" class="w-16 rounded-full" />
                        @csrf
                        <h1 class="-mt-7 text-2xl font-semibold">Login</h1>
                        <h3 class="-mt-7 text-sm font-semibold text-text">Silakan Masuk ke akun anda</h3>
                            <div class="bg-tDeal-400 flex flex-col h-24 justify-between">
                                <div class="w-96 pl-3 p-2 rounded-full bg-input text-text">
                                    <i class="fa-solid fa-user"></i>
                                    <input class="ml-4 w-10/12 focus:outline-none bg-input" id="username" name="username" type="text" placeholder="Username" /></div>
                                <div class="w-96 pl-3 p-2 rounded-full bg-input text-text">
                                    <i class="fa-solid fa-lock"></i>
                                    <input class="ml-4 w-10/12 focus:outline-none bg-input" id="password" name="password" type="password" placeholder="Password" />
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>
                        <button class="bg-main text-white w-full rounded-full p-2 hover:bg-hovermain" type="submit">Login</button>
                </form>
        </div>

        <script>
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");

            togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
    });
        </script>

    
    </body>
</html>