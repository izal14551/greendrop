<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-white min-h-screen p-6 pb-20">
    <div>
        <h1 class="text-xl font-bold mb-4">Transaksi</h1>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-2 rounded mb-4">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Form input timbang -->
        <form action="/timbang/store" method="post" class="space-y-4 mb-6">
            <!-- 🔽 Input NIK dengan datalist -->
            <input list="nikList" id="nik" name="nik" placeholder="Pilih atau ketik NIK" required
                class="border w-full p-2 rounded">
            <datalist id="nikList">
                <?php
                // ambil semua peserta untuk pilihan
                $db = \Config\Database::connect();
                $peserta = $db->table('peserta')->get()->getResultArray();
                foreach ($peserta as $p): ?>
                    <option value="<?= $p['nik'] ?>"><?= $p['nama'] ?> - <?= $p['alamat'] ?></option>
                <?php endforeach; ?>
            </datalist>

            <input type="text" id="nama" name="nama" placeholder="Nama" readonly
                class="border w-full p-2 rounded bg-gray-100">
            <textarea id="alamat" name="alamat" placeholder="Alamat" readonly
                class="border w-full p-2 rounded bg-gray-100"></textarea>

            <h2>Jenis Sampah</h2>
            <select name="jenis" class="border w-full p-2 rounded" required>
                <option value="">-- Pilih Jenis Sampah --</option>
                <option value="kertas">Kertas</option>
                <option value="kardus">Kardus</option>
                <option value="plastik">Plastik</option>
            </select>
            <h2>Berat Sampah</h2>
            <input type="number" step="0.01" name="berat" placeholder="Berat (kg)" required class="border w-full p-2 rounded">
            <h2>Tanggal</h2>
            <input type="date" name="tanggal" required class="border w-full p-2 rounded">
            <h2>Produk yang Ingin Ditukar</h2>
            <select name="tukar" class="border w-full p-2 rounded" required>
                <option value="">-- Pilih Produk Yang Ingin Ditukar --</option>
                <option value="biodegradable">Biodegradable</option>
                <option value="spray anti jamur">Spray Anti Jamur</option>
                <option value="spray anti hama">Spray Anti Hama</option>
                <option value="sabun cair">Sabun Cair</option>
                <option value="lotion">Lotion</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>


    </div>

    <!-- Bottom Navbar -->
    <div class="fixed bottom-0 left-0 right-0 bg-white border-t shadow-md flex justify-around items-center py-2">
        <a href="/" class="flex flex-col items-center text-gray-500 hover:text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
            </svg>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6h6m-6-6H7v6H3v-6h4z" />
            </svg>
            <span class="text-xs">Dashboard</span>
        </a>

        <a href="/timbang" class="flex flex-col items-center text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M12 7.5a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" />
                <path fill-rule="evenodd" d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 14.625v-9.75ZM8.25 9.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM18.75 9a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V9.75a.75.75 0 0 0-.75-.75h-.008ZM4.5 9.75A.75.75 0 0 1 5.25 9h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75V9.75Z" clip-rule="evenodd" />
                <path d="M2.25 18a.75.75 0 0 0 0 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 0 0-.75-.75H2.25Z" />
            </svg>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 10h11M9 21V3m12 18h-6a2 2 0 01-2-2v-6a2 2 0 012-2h6v10z" />
            </svg>
            <span class="text-xs">Transaksi</span>
        </a>

        <a href="/peserta" class="flex flex-col items-center text-gray-500 hover:text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
            </svg>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 17v-6h13v6H9zM3 9V5h4v4H3zm0 8v-4h4v4H3zm6-8V5h13v4H9z" />
            </svg>
            <span class="text-xs">Peserta</span>
        </a>
        <a href="/rekap" class="flex flex-col items-center text-gray-500 hover:text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M19.5 21a3 3 0 0 0 3-3v-4.5a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h15ZM1.5 10.146V6a3 3 0 0 1 3-3h5.379a2.25 2.25 0 0 1 1.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 0 1 3 3v1.146A4.483 4.483 0 0 0 19.5 9h-15a4.483 4.483 0 0 0-3 1.146Z" />
            </svg>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 17v-6h13v6H9zM3 9V5h4v4H3zm0 8v-4h4v4H3zm6-8V5h13v4H9z" />
            </svg>
            <span class="text-xs">Rekap</span>
        </a>
    </div>

    <script>
        $(document).ready(function() {
            $("#nik").on("change", function() {
                let nik = $(this).val();
                if (nik.length > 0) {
                    $.get("/timbang/getPeserta", {
                        nik: nik
                    }, function(data) {
                        if (data && data.nik) {
                            $("#nama").val(data.nama);
                            $("#alamat").val(data.alamat);
                        } else {
                            $("#nama").val("");
                            $("#alamat").val("");
                            alert("Peserta dengan NIK ini tidak ditemukan!");
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>