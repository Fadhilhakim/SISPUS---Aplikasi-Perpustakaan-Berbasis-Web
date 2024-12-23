<?php

$content = ob_get_clean();
require 'components/layout.php';
include 'components/nav.php';
 
    if(isset($success)) {
        include 'components/success.php';
    } 
    
    if(isset($error)) {
        include 'components/pop_up.php';
    }

?>

<div class="md:ml-64 block bg-gray-50 dark:bg-gray-900">
    <br><br><br><br>
    <div class="flex items-center justify-between">
        <h2 class="text-2xl ml-6 font-bold text-gray-900 dark:text-white flex items-center">
            <svg class="w-12 h-12 mr-2 text-gray-900 dark:text-gray-300 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
            </svg>
            Data Mahasiswa
        </h2>
        
        <?php if(isset($id)) : ?>
            <a href="http://sispus.test/data_mahasiswa">
                <svg class="mx-5 mt-2 w-8 h-8 text-gray-800 dark:hover:text-gray-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                </svg>
            </a>
        <?php endif; ?>
    </div>
    <br>
</div>
<main class="p-2 md:ml-64 h-auto dark:text-gray-50 h-full lg:flex justify-evenly items-top">

<?php if(isset($id)) : ?>
    <section class="lg:w-9/12 p-2 mx-0 h-full">
        <div class="w-full px-4 mx-auto py-4 lg:py-5 bg-gray-50 dark:bg-gray-900">
            <form action="/data_mahasiswa/update/<?= $id ?>/" method="POST">
                <h2 class="text-2xl text-gray-900 dark:text-gray-50"><?php if(isset($id)) { foreach ($mahasiswa as $nama) { ?>
                <?= $nama['nama']; ?> <span class="text-sm">(<?= $nama['nim']; ?>)</span>
                <?php }  }  ?> 
                </h2>
                <hr class="dark:my-3">
                <br>
            <?php foreach ($mahasiswa as $data): ?>
                <div class="lg:flex justify-evenly gap-2">
                    <div class="grid gap-1  sm:grid-cols-4 sm:gap-2 w-full">
                        <div class="sm:col-span-2">
                            <label for="kode_program_studi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodi*</label>
                            <select id="kode_program_studi" name="kode_program_studi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php foreach ($prodi as $prod) : ?>
                                    <option <?php 
                                        if(isset($id)) {
                                        if($data['kode_program_studi'] == $prod['kode_jurusan']) { echo 'selected'; } }?>  
                                        value="<?= $prod['kode_jurusan'] ?>">
                                        <?= $prod['nama'] ?>    
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="nim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM*</label>
                            <input type="number" name="nim" id="nim" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            value="<?php if(isset($id)) { echo $data['nim']; } ?>" placeholder="240001" required="">
                        </div>
                        <div class="sm:col-span-1">
                            <label for="tahun_masuk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun*</label>
                            <select id="tahun_masuk" name="tahun_masuk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php for ($i = 2024; $i >= 2019; $i--) : ?>
                                    <option <?php 
                                        if(isset($id)) {
                                        if($data['tahun_masuk'] == $i) { echo 'selected'; } }?>  
                                        value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mahasiswa*</label>
                            <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            value="<?php if(isset($id)) { echo $data['nama']; } ?>" placeholder="Masukkan Nama Mahasiswa" required="">
                        </div>
                        <div class="sm:col-span-1">
                            <label for="kode_agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama*</label>
                            <select id="kode_agama" name="kode_agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php foreach ($agamaa as $agama) : ?>
                                    <option <?php 
                                        if(isset($id)) {
                                        if($data['kode_agama'] == $agama['kode']) { echo 'selected'; } }?>  
                                        value="<?= $agama['kode'] ?>"><?= $agama['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            value="<?php if(isset($id)) { echo $data['tempat_lahir']; } ?>" placeholder="Tempat Lahir" required="">
                        </div>
                        <div class="sm:col-span-1">
                            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            value="<?php if(isset($id)) { echo $data['tanggal_lahir']; } ?>" required>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin*</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option <?php 
                                        if(isset($id)) {
                                        if($data['jenis_kelamin'] == 'L') { echo 'selected'; } }?> 
                                        value="L">Laki-laki</option>
                                <option <?php 
                                        if(isset($id)) {
                                        if($data['jenis_kelamin'] == 'P') { echo 'selected'; } }?>
                                        value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="sm:col-span-3">
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat*</label>
                            <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="<?php if(isset($id)) { echo $data['alamat']; } ?>" placeholder="Jl. Petarani No..." required>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="hobi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hobi</label>
                            <input type="text" name="hobi" id="hobi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            value="<?php if(isset($id)) { echo $data['hobi']; } ?>" placeholder="Coding,..">
                        </div>
                        <div class="sm:col-span-1">
                            <label for="kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                            <input type="text" name="kota" id="kota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            value="<?php if(isset($id)) { echo $data['kota']; } ?>">
                        </div>
                        <div class="sm:col-span-1">
                            <label for="kode_pos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pos</label>
                            <input type="number" name="kode_pos" id="kode_pos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            value="<?php if(isset($id)) { echo $data['kode_pos']; } ?>" placeholder="00000" >
                        </div>
                        <div class="sm:col-span-2">
                            <label for="kode_propinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi*</label>
                            <select id="kode_propinsi" name="kode_propinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <?php foreach ($propinsi as $prov) : ?>
                                    <option <?php 
                                        if(isset($id)) {
                                        if($data['kode_propinsi'] == $prov['kode']) { echo 'selected'; } }?> 
                                        value="<?= $prov['kode'] ?>"><?= $prov['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="telpon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon*</label>
                            <input type="text" name="telpon" id="telpon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            value="<?php if(isset($id)) { echo $data['telpon']; } ?>" placeholder="0812345678910" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="handphone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Handphone</label>
                            <input type="text" name="handphone" id="handphone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                            value="<?php if(isset($id)) { echo $data['handphone']; } ?>" placeholder="0812345678910" required>
                        </div>

                    </div>
                    <br>
                    <div class="lg:w-1/2">
                        <div class="sm:col-span-4 grid gap-1 p-2 sm:grid-cols-4 sm:gap-2 sm:mb-2 lg:h-40 bg-gray-200 dark:bg-gray-800">
                            <div class="sm:col-span-4">
                                <label for="wali" class="block text-sm font-medium text-gray-900 dark:text-white text-center">Informasi Wali</label>
                            </div>
                            <div class="sm:col-span-4">
                                <input type="text" name="wali" id="wali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                value="<?php if(isset($id)) { echo $data['wali']; } ?>" placeholder="Nama Wali/Orang Tua">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="alamat_wali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Wali</label>
                                <input type="text" name="alamat_wali" id="alamat_wali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                value="<?php if(isset($id)) { echo $data['alamat_wali']; } ?>" placeholder="jl...">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="telpon_wali" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon Wali</label>
                                <input type="text" name="telpon_wali" id="telpon_wali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                                value="<?php if(isset($id)) { echo $data['telpon_wali']; } ?>" placeholder="0812345678910">
                            </div>
                        </div>
                        <div class="flex items-center sm:col-span-4 mt-6">
                            <button type="submit" class="w-full mr-3 text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Simpan
                            </button>
                            <div class="w-1/2 text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg class="w-5 h-5 mr-1 -ml-1 text-center" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                <input type="reset">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </form>
        </div>
    </section>
<?php endif; ?>
<?php if(!isset($id)) : ?>
    <section class="w-full h-full p-2 mx-0">

        <div class="relative overflow-x-auto shadow-md sm:rounded-sm p-6 bg-gray-50 dark:bg-gray-900">
        <?php if(!isset($id)) : ?>
            <form action="/data_mahasiswa/search" method="get">
                <div class="pb-4 bg-white dark:bg-gray-900 flex justify-between">
                    <label for="name"  class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="name" name="name" value="<?php if(isset($old)) { echo $old; } ?>" autocomplete="off" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-sm w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Berdasarkan Nama">
                    </div>
                    <div class="text-center p-2 bg-green-700 rounded-full hover:bg-green-900 dark:bg-gray-700 dark:hover:bg-gray-800">
                        <a href="/data_mahasiswa/input" class="flex items-middle align-middle px-1">
                            <span class="px-2">Tambah Data</span>
                            <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </form>
        <?php endif; ?>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nim
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Prodi
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Handphone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa as $row): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                <?= isset($row['nim']) ? $row['nim'] : 'Tidak ada'; ?>
                            </th>
                            <td class="px-6 py-2">
                                <p class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($row['nama']); ?></p>
                            </td>
                            <td class="px-6 py-2 text-center">
                                <p class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($row['kode_program_studi']); ?></p>
                            </td>
                            <td class="px-6 py-2 text-center">
                                <p class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($row['handphone']); ?></p>
                            </td>
                            <td class="px-6 py-2">
                                <p class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($row['alamat']); ?></p>
                            </td>
                            <td class="px-6 py-2 text-center">
                                <p class="font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= htmlspecialchars($row['jenis_kelamin']); ?></p>
                            </td>
                            <td class="mx-auto text-center">
                                <div class="flex justify-evenly">
                                    <!-- Tombol Lihat -->
                                    <a href="/data_mahasiswa/detail/<?= $row['id']; ?>" class="col-span-1 font-medium text-white dark:text-white hover:underline bg-blue-800 hover:bg-blue-900 flex items-center align-center p-1 px-auto rounded-sm w-16 mr-2">
                                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M11.403 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6.403a3.01 3.01 0 0 1-1.743-1.612l-3.025 3.025A3 3 0 1 1 9.99 9.768l3.025-3.025A3.01 3.01 0 0 1 11.403 5Z" clip-rule="evenodd" />
                                            <path fill-rule="evenodd" d="M13.232 4a1 1 0 0 1 1-1H20a1 1 0 0 1 1 1v5.768a1 1 0 1 1-2 0V6.414l-6.182 6.182a1 1 0 0 1-1.414-1.414L17.586 5h-3.354a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                                        </svg>
                                        Lihat
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form method="POST" action="/data_mahasiswa/delete" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display:inline;">
                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                        <button type="submit" class="col-span-1 font-medium text-white dark:text-white hover:underline bg-red-800 hover:bg-red-900 flex items-center align-center p-1 px-auto rounded-sm w-16">
                                            <svg class="w-5 h-5 pl-1 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </section>
    <?php endif; ?>

</main>
</div>


<?php 
 require 'components/byutipulbg.php';
?>