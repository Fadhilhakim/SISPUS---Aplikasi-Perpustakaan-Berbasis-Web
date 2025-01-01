<?php
$content = ob_get_clean(); 

require 'components/layout.php';
include_once 'components/nav.php';
?>

<?php if(isset($_GET['status']) == 'success') :
    include_once 'components/success.php'; endif; ?>

<?php if(isset($error)) : ?>
    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="hidden text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
    </button>

    <div class="mx-auto">
        <div id="popup-modal" tabindex="-1" class="mt-52 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full mx-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-600 mx-auto">

                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Tutup</span>
                        </button>

                    <div class="p-4 md:p-5 text-center">
                        <div class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                            <svg aria-hidden="true" class="w-8 h-8 text-red-500 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Error</span>
                        </div>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"><?= $error ?></h3>

                            <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                OK
                            </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


    <br><br><br><br>

    <main class="p-4 md:ml-64 h-auto pt-6">
        <?php if(isset($detail)) : ?>
        <section class="max-w-3xl h-full p-2 mx-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-sm p-6 bg-white dark:bg-gray-900">
                <form action="/admin/update" method="POST">
                        <div class="flex">
                            <div>
                                <div class="p-2 mx-auto" id="background-container" style="
                                    background-image: url('<?= $detail['foto'] ?>');
                                    background-size: cover;
                                    background-position: center;
                                    background-repeat:no-repeat;
                                    width:200px;
                                    height: 200px;
                                ">
                                </div>

                                <div class="mt-3">
                                    <label for="foto_admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Url Foto Admin</label>
                                    <input type="text" name="foto" id="foto_admin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="<?= $detail['foto'] ?>" placeholder="" required="">
                                </div>
                            </div>
                            <div class="ml-6 w-full">
                                <div class="mt-3">
                                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" name="new_username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        value="<?= $detail['username'] ?>" placeholder="Nama Admin" required="">
                                </div>
                                <input type="hidden" name="username" value="<?= $detail['username'] ?>">
                                <div class="mt-3 w-full">
                                    <div class="flex justify-between">
                                        <div class="w-full">
                                            <label for="old_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Passoword Lama</label>
                                            <input type="password" name="old_password" id="old_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                value="" placeholder="Masukkan Password Lama" required="">
                                        </div>
                                        <div class="w-full ml-2">
                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Passoword Baru</label>
                                            <input type="password" name="new_password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                value="" placeholder="Masukkan Password Baru" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <button type="submit" class="w-1/2 mr-3 text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                </form>
            </div> 
        </section>
        <?php endif; ?>


        <?php if(isset($admins)) : ?>
            <section class="max-w-3xl h-full p-2 mx-auto">
            <div class="relative overflow-x-auto shadow-md sm:rounded-sm p-6 bg-white dark:bg-gray-900">
                <a href="/register  ">
                        <div class="pb-4 dark:bg-gray-900">
                            <div class="flex justify-center">
                            <button id="updateProductButton" data-modal-target="updateProductModal" data-modal-toggle="updateProductModal" class="flex hover:underline items-center dark:text-white dark:hover:text-gray-300 hover:text-gray-700 text-gray-900 font-medium text-sm px-5 py-2.5 text-center" type="button">
                                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                                </svg>
                                    Tambah Admin
                            </button>
                        </div>
                        </div>
                        
                </a>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Username
                            </th>
                            <th scope="col" class="px-6 py- text-center3">
                                Password
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Tanggal Registrasi  
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Aksi 
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($admins as $admin) : ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white flex items-center">
                                    <div class="w-8 h-8 me-2 rounded-full" style="background-image: url(<?= $admin['foto']; ?>); background-size:contain"></div>
                                    <?= $admin['username'] ?> 
                                </th>
                                <td class="px-6 py-2">
                                    <p class="font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-between items-center">
                                        ********** 
                                            <svg class="hidden w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                            <svg class="w-5 h-5 text-gray-700 dark:text-gray-300 hover:text-gray-900 hover:dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>

                                    </p>
                                </td>
                                <td class="px-6 py-2">
                                    <img class="font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        <?= $admin['created_at'] ?>
                                    </p>
                                </td>
                                <td class="pr-2">
                                       <div class="flex items-center justify-between">
                                             <!-- Tombol Edit -->
                                            <a href="/admin?detail=<?= $admin['username']; ?>" class="font-medium text-white dark:text-white hover:underline bg-blue-800 hover:bg-blue-900 flex items-center align-center p-1 px-auto rounded-sm w-16 mr-2">
                                                    <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M11.403 5H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6.403a3.01 3.01 0 0 1-1.743-1.612l-3.025 3.025A3 3 0 1 1 9.99 9.768l3.025-3.025A3.01 3.01 0 0 1 11.403 5Z" clip-rule="evenodd" />
                                                        <path fill-rule="evenodd" d="M13.232 4a1 1 0 0 1 1-1H20a1 1 0 0 1 1 1v5.768a1 1 0 1 1-2 0V6.414l-6.182 6.182a1 1 0 0 1-1.414-1.414L17.586 5h-3.354a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                                                    </svg>
                                                    Lihat
                                                </a>
                                            <!-- Tombol Hapus -->
                                            <form method="POST" action="/admin/delete" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                                                <button type="submit" class="font-medium text-white dark:text-white hover:underline bg-red-800 hover:bg-red-900 flex items-center justify-between p-1 rounded-sm w-16">
                                                    <svg class="w-5 h-5 pl-1 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                       </div>
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

<script>
    const inputFotoBuku = document.getElementById('foto_admin');
    const backgroundContainer = document.getElementById('background-container');


    inputFotoBuku.addEventListener('input', function() {
        const url = inputFotoBuku.value;

        if (url && isValidUrl(url)) {
            backgroundContainer.style.backgroundImage = `url(${url})`;
        } else {
            backgroundContainer.style.backgroundImage = "url('https://i.pinimg.com/564x/c5/07/8e/c5078ec7b5679976947d90e4a19e1bbb.jpg')";
        }
    });

    function isValidUrl(url) {
        const pattern = /^(https?:\/\/)[\w.-]+\.[a-z]{2,6}\/?([\w.-]*)/i;
        return pattern.test(url);
    }
</script>