<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @keyframes slideInFromRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOutToLeft {
            from {
                transform: translateX(0);
                opacity: 1;
            }

            to {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        .animate-slide-in {
            animation: slideInFromRight 0.6s ease-out forwards;
        }

        .animate-slide-out {
            animation: slideOutToLeft 0.6s ease-in forwards;
        }
    </style>

</head>

<body class="h-screen w-screen relative " style="background-color: #06438a;">
    <div id="page" class="h-screen w-screen relative animate-slide-in">


        <!-- Background Image -->
        <img src="/images/background2.png" alt="Background" class="absolute inset-0 w-full h-full object-cover ">

        <!-- Tombol Login -->
        <div class="absolute bottom-32 w-full flex justify-center ">
            <button id="loginBtn"
                class="w-10/12 py-4 bg-blue-600 text-white text-lg font-semibold rounded-full shadow-lg text-center hover:bg-blue-700 transition">
                Log in
            </button>
        </div>
    </div>

    <script>
        document.getElementById('loginBtn').addEventListener('click', function() {
            const page = document.getElementById('page');
            page.classList.remove('animate-slide-in');
            page.classList.add('animate-slide-out');
            setTimeout(() => {
                window.location.href = "/auth/login";
            }, 600);
        });
    </script>

</body>

</html>