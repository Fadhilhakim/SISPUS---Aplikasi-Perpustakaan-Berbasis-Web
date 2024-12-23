<?php

$content = ob_get_clean();
require 'components/layout.php';
include 'components/nav.php';

if ($success == true) {
    include 'components/success.php';
}

if (isset($error)) {
    include 'components/pop_up.php';
}

?>

<div class="md:ml-64 block bg-gray-50 dark:bg-gray-900">
    <br><br><br><br>
    <div class="flex items-center justify-between">
        <h2 class="text-2xl ml-6 font-bold text-gray-900 dark:text-white flex items-center">
            <svg class="w-12 h-12 mr-2 text-gray-900 dark:text-gray-300 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
            </svg>

            Peminjaman Buku
        </h2>

        <?php if (isset($id)) : ?>
            <a href="http://sispus.test/data_mahasiswa">
                <svg class="mx-5 mt-2 w-8 h-8 text-gray-800 dark:hover:text-gray-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
            </a>
        <?php endif; ?>
    </div>
    <br>
</div>
<main class="p-2 md:ml-64 h-auto dark:text-gray-50 h-full lg:flex justify-evenly items-top">


    <div class="p-2">
        <div class="relative w-full h-full md:h-auto p-6 bg-white rounded-sm shadow dark:bg-gray-800">
            <div class="relative">

                <div class="pb-2 mb-4 rounded-t border-b sm:mb-2 dark:border-gray-600 text-gray-900 dark:text-white">
                        <h3 class="text-lg font-semibold">
                        Input Peminjaman 
                        </h3>
                        <p class="text-xs mt-1">* hanya meminjam max 4 buku</p>
                        <p class="text-xs mt-1">* dapat meminjam buku yang sama</p>
                    </div>
                <form action="/peminjaman/insert" method="POST">
                    <div class="mb-4">
                        <div class="mb-2">
                            <label for="nomor_anggota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peminjam</label>
                            <select id="nomor_anggota" name="nomor_anggota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option data-jumlah-peminjaman="0" value="" >Pilih</option>
                                <?php foreach ($anggota as $data) : ?>
                                    <option data-jumlah-peminjaman="<?= $data['jumlah_peminjaman'] ?>" value="<?= $data['nomor'] ?>"><?= $data['nama'] ?> (<?= $data['nomor'] ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="kode_buku" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">judul Buku</label>
                            <select id="kode_buku" name="kode_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                <option value="">Pilih</option>
                                <?php foreach ($buku_tersedia as $data) : ?>
                                    <option value="<?= $data['kode'] ?>"><?= $data['kode'] ?> (<?= $data['judul'] ?>) stock : <?= $data['stock'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label for="tanggal_peminjaman" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </div>
                    </div>
                    <div class="pt-2 mt-4 rounded-t border-t sm:mb-4 dark:border-gray-600">
                        <h3 class="text-normal font-semibold text-gray-900 dark:text-white">
                        Sisa Kuota : <span id="jumlah_peminjaman"></span>
                        </h3>
                    </div>
                    <div class="flex items-center w-full space-x-2">
                        <button type="submit" class="w-full text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Tambah
                        </button>
                        <div class="w-1/2 text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <input type="reset" value="Batal">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Start block -->
    <section class="w-full max-w-9xl lg:flex gap-1 p-2 justify-between">
        <div class=" w-full px-1 lg:px-4">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-sm overflow-hidden">
                <div class="block text-center space-y-3 md:space-y-0 md:space-x-4 p-4">
                                    <h2 class="font-bold text-2xl text-gray-900 dark:text-white">DAFTAR PEMINJAM</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-4 text-center">Tanggal Peminjaman</th>
                                <th scope="col" class="px-4 py-3">Nim</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Judul Buku</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($peminjam as $data) : ?>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"><?= $data['tanggal_peminjaman'] ?></th>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $data['nomor_anggota'] ?></td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $data['nama_anggota'] ?></td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $data['judul_buku'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Showing
                        <span class="font-semibold text-gray-900 dark:text-white"><?= ($currentPage - 1) * 10 + 1 ?>-<?= min($currentPage * 10, $totalPeminjaman) ?></span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white"><?= $totalPeminjaman ?></span>
                    </span>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            <a href="?page=<?= ($currentPage > 1) ? $currentPage - 1 : 1 ?>" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Previous</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li>
                            <a href="?page=<?= $i ?>" class="flex items-center justify-center text-sm py-2 px-3 leading-tight <?= ($i == $currentPage) ? 'z-10 text-primary-600 bg-primary-50 border border-primary-300' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' ?>">
                            <?= $i ?>
                            </a>
                        </li>
                        <?php endfor; ?>

                        <li>
                            <a href="?page=<?= ($currentPage < $totalPages) ? $currentPage + 1 : $totalPages ?>" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <span class="sr-only">Next</span>
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>


    </section>


</main>
</div>

<script>
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('tanggal_peminjaman').value = today;

    document.getElementById('nomor_anggota').addEventListener('change', function () {
        // Ambil elemen yang dipilih
        const selectedOption = this.options[this.selectedIndex];
        // Ambil nilai data-jumlah-peminjaman dari elemen yang dipilih
        const jumlahPeminjaman = parseInt(selectedOption.getAttribute('data-jumlah-peminjaman'), 10) || 0;
        
        const sisaKuota = 4 - jumlahPeminjaman;

        document.getElementById('jumlah_peminjaman').textContent = sisaKuota || "0";
    });
</script>


<?php 
 require 'components/byutipulbg.php';
?>