<!DOCTYPE html>
<html lang="id" x-data="{ slide: 1, showLogin: false }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Drop</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        @keyframes slideUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-up {
            animation: slideUp 0.7s ease-out forwards;
        }
    </style>
</head>

<body class="h-screen w-screen overflow-hidden">

    <!-- Wrapper -->
    <div class="relative h-full w-full flex transition-transform duration-700"
        :style="'transform: translateX(-' + (slide-1)*100 + '%)'">

        <!-- Slide 1 -->
        <div class="h-full w-full flex-shrink-0 relative">
            <img src="/images/Background.png" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute bottom-32 w-full flex justify-center">
                <button @click="slide = 2"
                    class="w-10/12 py-4 bg-blue-600 text-white text-lg font-semibold rounded-full shadow-lg hover:bg-blue-700 transition">
                    Next
                </button>
            </div>
        </div>

        <!-- Slide 2 (Background Login) -->
        <div class="h-full w-full flex-shrink-0 relative bg-blue-900 flex flex-col justify-between">

            <img src="/images/Background2.png" class="absolute inset-0 w-full h-full object-cover">


            <!-- Tombol trigger login -->
            <div class="absolute bottom-32 w-full flex justify-center" x-show="!showLogin">
                <button @click="showLogin = true"
                    class="w-10/12 py-4 bg-blue-600 text-white text-lg font-semibold rounded-full shadow-lg hover:bg-blue-700 transition">
                    Log in
                </button>
            </div>

            <!-- Form login muncul dari bawah -->
            <div x-show="showLogin" x-transition class="absolute bottom-0 w-full bg-white rounded-t-3xl shadow-lg p-8 animate-slide-up">
                <h2 class="text-xl font-bold mb-6">Log in</h2>
                <form action="/auth/doLogin" method="post" class="space-y-4">
                    <input type="text" name="username" placeholder="Username"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <input type="password" name="password" placeholder="Password"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="bg-red-100 text-red-600 p-2 rounded mb-3 text-center">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <button type="submit"
                        class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                        Login
                    </button>

                </form>
                <!-- Footer logo -->
                <div class="flex justify-center items-center space-x-6 mt-6 mb-6">
                    <img src="/images/logo-telkom.png" alt="Telkom University" class="h-8">
                    <img src="/images/logo-ayoberaksi.png" alt="Ayo Beraksi" class="h-8">
                    <img src="/images/logo-greendrop.png" alt="Eco" class="h-8">
                </div>
            </div>
        </div>
    </div>

</body>

</html>