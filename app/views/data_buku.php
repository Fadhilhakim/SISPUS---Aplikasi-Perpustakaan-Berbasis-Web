<?php

$content = ob_get_clean();
require 'components/layout.php';
include 'components/nav.php';

if (isset($success)) {
    include 'components/success.php';
}
?>
<div class="md:ml-64 block bg-gray-50 dark:bg-gray-900">
    <br><br><br><br>
    <div class="flex items-center justify-between">
        <h2 class="text-2xl ml-6 font-bold text-gray-900 dark:text-white flex items-center">
            <svg class="w-12 h-12 text-gray-500 mr-2 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M7.111 20A3.111 3.111 0 0 1 4 16.889v-12C4 4.398 4.398 4 4.889 4h4.444a.89.89 0 0 1 .89.889v12A3.111 3.111 0 0 1 7.11 20Zm0 0h12a.889.889 0 0 0 .889-.889v-4.444a.889.889 0 0 0-.889-.89h-4.389a.889.889 0 0 0-.62.253l-3.767 3.665a.933.933 0 0 0-.146.185c-.868 1.433-1.581 1.858-3.078 2.12Zm0-3.556h.009m7.933-10.927 3.143 3.143a.889.889 0 0 1 0 1.257l-7.974 7.974v-8.8l3.574-3.574a.889.889 0 0 1 1.257 0Z" />
            </svg>
            Input Data Buku
        </h2>
        <br>

        <a href="http://sispus.test/buku">
            <svg class="mx-5 mt-2 w-8 h-8 text-gray-900 dark:hover:text-gray-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>
        </a>
    </div>
    <br>
</div>
<main class="p-2 md:ml-64 h-auto dark:text-gray-50 h-full lg:flex justify-evenly items-top">

    <section class="lg:max-w-5xl p-2 mt-6 mx-0 h-full lg:flex bg-white dark:bg-gray-900">
        <div class="w-full p-5 pr-2 mx-auto lg:py-5 bg-gray-50 dark:bg-gray-900">
            <form action="/buku/insert" method="post">
                <div class="lg:flex justify-evenly gap-2">
                    <div class="pr-6 lg:border-r border-gray-300 dark:border-gray-700">
                        <div class="p-2 mx-auto" id="background-container" style="
                            background-image: url('https://png.pngtree.com/png-clipart/20200826/original/pngtree-matte-book-mockup-psd-png-image_5479091.jpg');
                            background-size: cover;
                            background-position: center;
                            background-repeat:no-repeat;
                            width:300px;
                            height: 300px;
                        ">
                        </div>

                        <div class="mt-3">
                            <label for="foto_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url Foto Buku</label>
                            <input type="text" name="foto_buku" id="foto_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="" placeholder="https://cover-buku/cover.png" required="">
                        </div>



                        <div class="flex items-center sm:col-span-4 mt-9">
                            <button type="submit" class="w-full mr-3 text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Simpan
                            </button>
                            <div class="w-1/2 text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg class="w-5 h-5 mr-1 -ml-1 text-center" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                <input type="reset">
                            </div>
                            </i>
                        </div>
                    </div>
                    <div class="grid gap-1 lg:ml-4 sm:grid-cols-4 sm:gap-2 w-full mb-12 lg:mb-0">
                        <div class="sm:col-span-1">
                            <label for="kode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Buku*</label>
                            <input type="text" name="kode" id="kode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="<?= $last_code ?>" placeholder="B001" required="">
                        </div>
                        <div class="sm:col-span-1">
                            <label for="kode_kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori*</label>
                            <select id="kode_kategori" name="kode_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php foreach ($kategori as $kate) : ?>
                                    <option value="<?= $kate['kode'] ?>">
                                        <?= $kate['nama'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah/Stock*</label>
                            <input type="number" name="jumlah" id="jumlah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="" placeholder="100" required="">
                        </div>
                        <div class="sm:col-span-1">
                            <label for="tahun_pengadaaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Pengadaan*</label>
                            <select id="tahun_pengadaaan" name="tahun_pengadaaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php for ($i = 2024; $i >= 2019; $i--) : ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku*</label>
                            <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="" placeholder="Masukkan Judul Buku" required="">
                        </div>
                        <div class="sm:col-span-1">
                            <label for="tahun_terbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Terbit*</label>
                            <input type="number" name="tahun_terbit" id="tahun_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="" placeholder="1980" required="">
                        </div>
                        <div class="sm:col-span-4 grid gap-1 sm:grid-cols-4 sm:gap-2 w-full mb-12 lg:mb-0 bg-gray-200 dark:bg-gray-800 p-3 mt-3">
                            <div class="sm:col-span-2">
                                <label for="pengarang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengarang*</label>
                                <input type="text" name="pengarang" id="pengarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="" placeholder="Masukkan Nama Pengarang" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penerbit*</label>
                                <input type="text" name="penerbit" id="penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="" placeholder="Masukkan Nama Penerbit" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="ISBN" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ISBN*</label>
                                <input type="text" name="ISBN" id="ISBN" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="" placeholder="987654321" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="sumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber</label>
                                <input type="text" name="sumber" id="sumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="" placeholder="Asal buku" required>
                            </div>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="rak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Rak</label>
                            <input type="text" name="rak" id="rak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="" placeholder="A0" required>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                            <input type="number" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="" readonly>
                        </div>
                    </div>
                    <br>

                </div>
            </form>
        </div>
    </section>
</main>
</div>


<script>
    const jumlahInput = document.getElementById('jumlah');
    const stockInput = document.getElementById('stock');
    const inputFotoBuku = document.getElementById('foto_buku');
    const backgroundContainer = document.getElementById('background-container');

    jumlahInput.addEventListener('input', function() {
        const jumlah = jumlahInput.value;

        if (!isNaN(jumlah) && jumlah >= 0) {
            stockInput.value = jumlah;
        } else {
            stockInput.value = '';
        }
    });
    

    inputFotoBuku.addEventListener('input', function() {
        const url = inputFotoBuku.value;

        if (url && isValidUrl(url)) {
            backgroundContainer.style.backgroundImage = `url(${url})`;
        } else {
            backgroundContainer.style.backgroundImage = "url('https://png.pngtree.com/png-clipart/20200826/original/pngtree-matte-book-mockup-psd-png-image_5479091.jpg')";
        }
    });

    function isValidUrl(url) {
        const pattern = /^(https?:\/\/)[\w.-]+\.[a-z]{2,6}\/?([\w.-]*)/i;
        return pattern.test(url);
    }
</script>


<?php 
 require 'components/byutipulbg.php';
?>