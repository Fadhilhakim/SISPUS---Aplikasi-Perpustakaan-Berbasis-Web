<?php
$content = ob_get_clean(); 

require 'components/layout.php';
?>

<div class="dark:bg-gray-900 bg-white" style="
position: absolute;
width: 100vw;
height: 100vh;
z-index: -100;
"></div>
<div class="bg-gray-900" style="
position: absolute;
width: 100vw;
height: 100vh;
background-image: url('https://img.freepik.com/free-photo/wooden-table-with-blurred-background_1134-14.jpg');
background-position: center;
background-size:cover;
object-fit:cover;
background-repeat: no-repeat;
z-index: -1;
opacity: 0.5;
"></div>

<br><br><br><br>
<p class="text-center block dark:text-gray-50 ">
    <?php include 'components/logo.php' ?>

</p>
<br>
<form class="max-w-sm mx-auto dark:bg-gray-900 bg-gray-200 p-5" action="/auth/login" method="post">
    <?php if(!empty($data['error'])) : ?>
        <label for="username" class="block mb-2 text-sm font-medium text-red-500 dark:text-red-500"><?= $error ?></label>
    <?php endif; ?>
    <?php if(!empty($data['success'])) : ?>
        <label for="username" class="block mb-2 text-sm font-medium text-green-500 dark:text-green-500"><?= $success ?></label>
    <?php endif; ?>
  <div class="mb-5">
    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-50">Username</label>
    <input type="username" name="username" id="username" class="bg-white border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " autocomplete="off" required />
  </div>
  <div class="mb-5">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-50">Password</label>
    <input type="password" id="password" name="password" class="bg-white border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
  </div>
  <div class="block w-full block text-white">
        <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
  </div>
</form>
</div>


</main>
</div>