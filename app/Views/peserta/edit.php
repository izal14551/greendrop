<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Peserta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white min-h-screen p-6">
    <div>
        <h1 style="text-align: center; color: #0E4A67;" class="text-2xl font-bold mb-4 ">Edit Peserta</h1>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/peserta/update/<?= $peserta['id']; ?>" method="post" class="space-y-4">
            <div>
                <label class="block mb-1 font-medium">NIK</label>
                <input type="text" name="nik" value="<?= esc($peserta['nik']); ?>" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block mb-1 font-medium">Nama</label>
                <input type="text" name="nama" value="<?= esc($peserta['nama']); ?>" required class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block mb-1 font-medium">Alamat</label>
                <textarea name="alamat" required class="w-full border rounded px-3 py-2"><?= esc($peserta['alamat']); ?></textarea>
            </div>
            <div class="flex justify-between">
                <a href="/peserta" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Kembali</a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</body>

</html>