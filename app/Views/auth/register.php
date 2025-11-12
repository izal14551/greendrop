<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Green Drop</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-green-100">
    <div class="w-full max-w-sm bg-white p-6 rounded-2xl shadow-lg">
        <h1 class="text-2xl font-bold text-green-700 mb-4 text-center">Daftar Akun</h1>

        <form action="/auth/doRegister" method="post" class="space-y-4">
            <input type="text" name="username" placeholder="Username"
                class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-green-400">
            <input type="text" name="nama" placeholder="Nama Lengkap"
                class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-green-400">
            <input type="password" name="password" placeholder="Password"
                class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-green-400">

            <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Daftar</button>
        </form>

        <p class="text-sm text-center mt-4">Sudah punya akun?
            <a href="/auth/login" class="text-green-600 font-medium">Login</a>
        </p>
    </div>
</body>

</html>