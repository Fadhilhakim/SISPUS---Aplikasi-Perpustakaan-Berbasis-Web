<?php
$content = ob_get_clean(); 

require 'components/layout.php';
include_once 'components/nav.php' 
?>



<div class="md:ml-64 block bg-gray-50 dark:bg-gray-900">
    <br><br><br><br>
    <div class="flex items-center justify-between">
        <h2 class="text-2xl ml-6 font-bold text-gray-900 dark:text-white flex items-center">
            <svg class="w-12 h-12 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z"/>
                <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z"/>
            </svg>
            Dashboard
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
<main class="p-4 md:ml-64 h-auto pt-6">
        <div class="rounded-lg bg-gray-50 h-52 mb-4 hidden lg:block antialiased bg-gradient-to-t from-fuchsia-50 to-emerald-50 dark:bg-gradient-to-t dark:from-slate-800 dark:to-gray-900">
            <div style="background-color:rgba(0, 0, 0, 0); z-index: 100; position:absolute; width:60%; height:30%;"></div>
            <div>
                <p class="flex items-center justify-evenly text-center max-w-52">
                    <img class="lg:w-52 mr-2" src="https://cdn.icon-icons.com/icons2/2474/PNG/512/education_books_library_icon_149685.png" alt="logo">
                    <span style="font-family: 'Audiowide', serif;" class="text-start self-center text-blue-600 text-8xl font-semibold whitespace-nowrap dark:text-white text-center tracking-widest">
                        <span style="
                            background: rgb(169,164,255);
                            background: linear-gradient(106deg, rgb(106, 106, 201) 0%, rgb(0, 166, 255) 100%);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                        ">SisPus</span>
                        <span class="block text-2xl font-normal  tracking-widest pt-4" style="font-family: Arial; margin-top:-6px">Sistem Perpustakaan</span>
                    </span>
                </p>
            </div>
        </div>


     <!-- card  -->

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
        <a href="/data_mahasiswa" class="text-blue-500 hover:text-blue-700 dark:text-white hover:dark:text-gray-200 bg-gray-50 dark:bg-gray-800 transition duration-75 hover:bg-gray-100 hover:dark:bg-gray-500 border-4 border-dashed border-gray-200 dark:border-gray-700 rounded-lg h-64 text-center">
            <div class="mt-4 block items-center mx-auto p-2">
                <h2 class="font-bold text-center mr-0">
                 <svg class="w-20 h-20 mx-auto block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                </svg>
                </h2>
                <h1 class="font-bold mr-4">Total :</h1>
                <div class="text-center">
                    <h1  style="font-family: 'Audiowide', serif;" class="text-6xl font-bold mr-0">
                        <?= $mahasiswa ?> 
                    </h1>
                    <h1 class="font-normal text-lg">Mahasiswa</h1>
                </div>
                
            </div>
        </a>
        <a href="/buku" class="text-green-500 dark:text-white hover:text-green-700 hover:dark:text-gray-200 bg-gray-50 dark:bg-gray-800 bg-gray-100 transition duration-75 hover:bg-gray-100 hover:dark:bg-gray-500 border-4 border-dashed border-gray-200 dark:border-gray-700 rounded-lg h-64 text-center">
            <div class="mt-4 block items-center mx-auto p-2">
                <h2 class="font-bold text-center  mr-0">
                 <svg class="w-20 h-20 mx-auto block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
                </svg>
                </h2>
                <h1 class="font-bold mr-4">Total :</h1>
                <div class="flex justify-evenly">
                    <div>
                        <h1  style="font-family: 'Audiowide', serif;" class="text-6xl font-bold  mr-0">
                            <?= $total_buku ?> 
                        </h1>
                        <h1 class="font-normal text-lg">Buku</h1>
                    </div>
                </div>
                
            </div>
        </a>
        <a href="/anggota_perpustakaan" class="text-indigo-500 dark:text-white hover:text-indigo-700 hover:dark:text-gray-200 bg-gray-50 dark:bg-gray-800 bg-gray-100 transition duration-75 hover:bg-gray-100 hover:dark:bg-gray-500 border-4 border-dashed border-gray-200 dark:border-gray-700 rounded-lg h-64 text-center">
            <div class="block mt-4 items-center mx-auto p-2">
                <h2 class="font-bold text-center mr-0">
                 <svg class="w-20 h-20 mx-auto block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                     <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                </svg>

                </h2>
                <h1 class="font-bold mr-0">Total :</h1>
                <div>
                    <h1  style="font-family: 'Audiowide', serif;" class="text-6xl font-bold mr-0">
                        <?= $anggota ?> 
                    </h1>
                    <h1 class="font-normal text-lg">Anggota Perpustakaan</h1>
                </div>
                
            </div>
        </a>
        <a href="/peminjaman" class="text-red-500 dark:text-white hover:text-red-700 hover:dark:text-gray-200 bg-gray-50 dark:bg-gray-800 bg-gray-100 transition duration-75 hover:bg-gray-100 hover:dark:bg-gray-500 border-4 border-dashed border-gray-200 dark:border-gray-700 rounded-lg h-64 text-center">
            <div class="mt-4 block items-center mx-auto p-2">
                <h2 class="font-bold text-center mr-0 md:pb-4">
                 <svg class="w-16 h-16 mx-auto block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                     <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm5.757-1a1 1 0 1 0 0 2h8.486a1 1 0 1 0 0-2H7.757Z" clip-rule="evenodd"/>
                </svg>
                </h2>
                <h1 class="font-bold mr-0">Total :</h1>
                <div>
                    <h1  style="font-family: 'Audiowide', serif;" class="text-6xl font-bold mr-0">
                        <?= $buku_dipinjam ?> 
                    </h1>
                    <h1 class="font-normal text-lg">Buku Belum Dikembalikan</h1>
                </div>
                
            </div>
        </a>
      </div>
      
    </main>
  </div>
<?php 
 require 'components/byutipulbg.php';
?>