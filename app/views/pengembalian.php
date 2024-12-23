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

            Pengembalian Buku
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
<div class="p-2 md:ml-64 h-auto dark:text-gray-50 h-full lg:flex justify-evenly items-top">


    <div class="p-2">
        <div class="relative w-full h-full md:h-auto p-6 bg-white rounded-sm shadow dark:bg-gray-800">
            <div class="relative">

                <div class="pb-2 mb-4 rounded-t border-b sm:mb-2 dark:border-gray-600 text-gray-900 dark:text-white">
                    <h3 class="text-lg font-semibold">
                        Input Pengembalian
                    </h3>
                    <p class="text-xs mt-1">* pengembalian > 12 hari maka kena denda</p>
                    <p class="text-xs mt-b">* lambat 1 hari denda Rp.500,-</p>
                </div>
                <form action="/pengembalian/cek" method="POST">
                    <div class="mb-2">
                        <label for="nomor_anggota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peminjam</label>
                        <select id="nomor_anggota" name="nomor_anggota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                            <option value="">Pilih</option>
                            <?php foreach ($anggota as $data) : ?>
                                <option value="<?= $data['nomor_anggota'] ?>"><?= $data['nama_anggota'] ?> (<?= $data['nomor_anggota'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="w-full space-x-2">
                        <button type="submit" class="w-full text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Cek
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Start block -->
    <section class="w-full lg:flex gap-1 p-2 justify-between">
        <div class="lg:max-w-4xl w-full px-1 lg:px-4">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-sm overflow-hidden">
                <div class="block text-center space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <h2 class="font-bold text-2xl text-gray-900 dark:text-white">DAFTAR PENGEMBALIAN</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-4 text-center">Peminjaman</th>
                                <th scope="col" class="px-4 py-4 text-center">Pengembalian</th>
                                <th scope="col" class="px-4 py-3">Nim</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Judul Buku</th>
                                <th scope="col" class="px-4 py-3">Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($peminjam as $data) : ?>
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"><?= $data['tanggal_peminjaman'] ?></th>
                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center"><?= $data['tanggal_pengembalian'] ?></th>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $data['nomor_anggota'] ?></td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $data['nama_anggota'] ?></td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $data['judul_buku'] ?></td>
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $data['denda'] ?></td>
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

<?php if (isset($buku_dipinjam)) :  ?>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Input Pengembalian
                        </h3>
                        <a href="/pengembalian">
                            <button class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </a>
                    </div>
                    <!-- Modal body -->
                    <form action="/pengembalian/insert" method="post" class="p-4 md:p-5">
                        
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-600 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-2 text-center">
                                                Kode Buku
                                            </th>
                                            <th scope="col" class="px-6 py-2">
                                                judul
                                            </th>
                                            <th scope="col" class="px-6 py-2 text-center">
                                                Jumlah
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($buku_dipinjam as $buku) : ?>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <th scope="row" class="px-6 py-2 text-center">
                                                <?= $buku['kode'] ?>
                                            </th>
                                            <td class="px-6 py-2">
                                            <?= $buku['judul'] ?>
                                            </td>
                                            <td class="px-6 py-2 text-center">
                                            <?= $buku['total'] ?>
                                            </td>
                                        </tr>
                                        <?php 
                                            $nama = $buku['nama_anggota'];
                                            endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        <div class="grid gap-3 mb-4 mt-4 grid-cols-5 items-center">
                            <div class="col-span-1">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            </div>
                            <div class="col-span-4">
                                <input type="text" name="nama" value="<?= $nama ?>" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                                <input type="hidden" name="nomor_anggota" value="<?= $nomor_anggota ?>">
                            </div>
                            <div class="col-span-1">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Buku</label>
                            </div>
                            <div class="col-span-4">
                                <select id="kode_buku" name="kode_buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option tanggal-pinjam="00-00-00" selected value="">Pilih</option>
                                    <?php foreach($buku_dipinjam as $buku) : ?>
                                        <option tanggal-pinjam="<?= $buku['tanggal_peminjaman'] ?>" value="<?= $buku['kode'] ?>"><?= $buku['judul'] ?> (<?= $buku['kode'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="tanggal_peminjaman" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Peminjaman</label>
                            </div>
                            <div class="col-span-3">
                                <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                            </div>
                            <div class="col-span-2">
                                <label for="tanggal_pengembalian" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pengembalian</label>
                            </div>
                            <div class="col-span-3">
                                <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="col-span-1">
                                <label for="denda" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Denda <span class="text-xs font-normal"></label>
                                <input type="text" name="denda" id="denda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                            </div>
                            <div class="col-span-1">
                                <label for="lambat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lambat</label>
                                <input type="text" name="lambat" id="lambat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly>
                            </div>
                            <div class="col-span-3">
                                <button type="submit" class="mt-6 text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <div class="text-center inline-flex items-center mx-auto">
                                          Simpan
                                    </div>
                                </button>
                            </div>
                            <p class="text-xs dark:text-gray-300 text-gray-700">>12 hari = Rp. 500,-</span></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php endif; ?>


</div>
</main>

<script>
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('tanggal_pengembalian').value = today;

    document.getElementById('kode_buku').addEventListener('change', function () {

        const selectedOption = this.options[this.selectedIndex];
        const tanggal_peminjaman = selectedOption.getAttribute('tanggal-pinjam');
    
        document.getElementById('tanggal_peminjaman').value = tanggal_peminjaman;
    });                                        
    
    document.addEventListener("DOMContentLoaded", function () {
        const kodeBukuSelect = document.getElementById("kode_buku");
        const tanggalPeminjamanInput = document.getElementById("tanggal_peminjaman");
        const tanggalPengembalianInput = document.getElementById("tanggal_pengembalian");
        const dendaInput = document.getElementById("denda");
        const lambatInput = document.getElementById("lambat");

        kodeBukuSelect.addEventListener("change", function () {
            const selectedOption = kodeBukuSelect.options[kodeBukuSelect.selectedIndex];
            const tanggalPeminjaman = selectedOption.getAttribute("tanggal-pinjam");

            tanggalPeminjamanInput.value = tanggalPeminjaman || "";

            if (tanggalPengembalianInput.value) {
                hitungDenda(tanggalPeminjaman, tanggalPengembalianInput.value);
            }
        });

        tanggalPengembalianInput.addEventListener("change", function () {
            const tanggalPeminjaman = tanggalPeminjamanInput.value;
            const tanggalPengembalian = tanggalPengembalianInput.value;

            hitungDenda(tanggalPeminjaman, tanggalPengembalian);
        });

        function hitungDenda(tanggalPeminjaman, tanggalPengembalian) {
            if (!tanggalPeminjaman || !tanggalPengembalian) {
                dendaInput.value = "";
                return;
            }

            const tglPinjam = new Date(tanggalPeminjaman);
            const tglKembali = new Date(tanggalPengembalian);

            const selisihHari = Math.ceil((tglKembali - tglPinjam) / (1000 * 60 * 60 * 24));

            if (selisihHari >= 12) {
                const denda = (selisihHari - 12) * 500;
                dendaInput.value = formatRupiah(denda);
                lambatInput.value = (selisihHari - 12) + ' hari';
            } else {
                dendaInput.value = formatRupiah(0);
            }
        }

        function formatRupiah(angka) {
            return `Rp. ${angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")},-`;
        }
    });
</script>


<?php 
 require 'components/byutipulbg.php';
?>