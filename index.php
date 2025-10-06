<?php
$title = "Home";
include 'includes/header.php';
?>
<!-- NAVBAR START -->
<div class="py-5 px-8 bg-dongker md:px-16 w-full shadow-md fixed z-50">
    <div class="flex justify-between">
        <div class="flex items-center">
            <!-- DISPLAY DEKSTOP START  -->
            <lord-icon
                src="https://cdn.lordicon.com/hjrbjhnq.json"
                trigger="hover"
                colors="primary:#ffffff"
                class="h-6 w-6 md:h-8 md:w-8 text-white hidden md:flex">
            </lord-icon>
            <!-- DISPLAY DEKSTOP END-->
            <lord-icon
                src="https://cdn.lordicon.com/tewlfgbl.json"
                trigger="hover"
                colors="primary:#ffffff"
                class="h-6 w-6 md:h-8 md:w-8 text-white cursor-pointer md:hidden"
                id="humberger">
            </lord-icon>
            <a href="" class="text-xl md:text-2xl font-extrabold text-white hover:text-slate-200 transition-all duration-200 ml-3">BOOKStore</a>
        </div>
        <!-- DISPLAY DEKSTOP START  -->
        <div class="m-auto space-x-11 text-center hidden md:flex">
            <a href="" class="font-semibold text-white hover:scale-125 transition-all duration-300">Home</a>
            <a href="" class="font-semibold text-white hover:scale-125 transition-all duration-300">Katalog</a>
            <a href="" class="font-semibold text-white hover:scale-125 transition-all duration-300">Kategori</a>
            <a href="" class="font-semibold text-white hover:scale-125 transition-all duration-300">Tentang</a>
        </div>
        <!-- DISPLAY DEKSTOP END  -->
        <div class="flex gap-5">
            <!-- DISPLAY DEKSTOP START  -->
            <div class="bg-slate-50 w-[250px] py-1 px-3 items-center space-x-5 rounded-md overflow-hidden shadow-md hidden md:flex">
                <lord-icon
                    src="https://cdn.lordicon.com/xaekjsls.json"
                    trigger="hover" class="w-6 h-6">
                </lord-icon>
                <input class="text-sm w-full outline-none" type="text" name="" id="" placeholder="Cari buku...">
            </div>
            <!-- DISPLAY DEKSTOP START  -->
            <!-- MOBILE SEARCH START -->
            <div class="absolute right-20 top-28 flex bg-indigo-600 w-[300px] py-2 px-3 items-center space-x-5 rounded-full overflow-hidden shadow-lg border border-gray-200 hidden" id="searchMobile">
                <lord-icon
                    src="https://cdn.lordicon.com/xaekjsls.json"
                    trigger="hover" class="w-6 h-6" colors="primary:#ffffff">
                </lord-icon>
                <input class="text-sm text-white bg-indigo-600 w-full outline-none" type="text" name="" id="" placeholder="Cari buku...">
            </div>
            <!-- MOBILE SEARCH END -->
            <div class="flex items-center gap-5">
                <lord-icon
                    src="https://cdn.lordicon.com/xaekjsls.json"
                    trigger="hover"
                    colors="primary:#ffffff,secondary:#ffffff"
                    class="w-6 h-6 cursor-pointer md:w-8 md:h-8 mb-1 md:hidden"
                    id="searchMobileNav">
                </lord-icon>
                <a href="">
                    <lord-icon
                        src="https://cdn.lordicon.com/bushiqea.json"
                        trigger="hover"
                        colors="primary:#ffffff,secondary:#ffffff"
                        class="w-6 h-6 md:w-8 md:h-8">
                    </lord-icon>
                </a>
            </div>
            <!-- DISPLAY DEKSTOP END  -->
        </div>
    </div>
</div>
<div id="dropDown-mobile" class="grid w-full py-3 h-[300px] space-y-2 bg-dongker hidden fixed top-[70px] items-center z-50">
    <a href="" class="font-semibold text-white focus:bg-gray-600 py-3 px-6">Home</a>
    <a href="" class="font-semibold text-white focus:bg-gray-600 py-3 px-6">Katalog</a>
    <a href="" class="font-semibold text-white focus:bg-gray-600 py-3 px-6">Kategori</a>
    <a href="" class="font-semibold text-white focus:bg-gray-600 py-3 px-6">Keranjang</a>
    <a href="" class="font-semibold text-white focus:bg-gray-600 py-3 px-6">Profile</a>
</div>
<!-- NAVBAR END -->
<!-- HERO START -->
<div class="px-6 py-[100px] md:py-[150px] bg-slate-50">
    <div class="grid grid-cols-1 md:grid-cols-2 ">
        <div class="space-y-3 md:space-y-8 m-auto ">
            <h1 class="font-extrabold text-xl md:text-4xl text-gray-600">TEMUKAN BUKU <br> FAVORITMU DENGAN <br> MUDAH</h1>
            <P class="text-slate-500 text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br> Nostrum qui reiciendis ipsum rerum, harum rem odit incidunt <br> tempore ducimus laboriosam animi?</P>
            <!-- <div class="bg-indigo-600"> -->
            <button type="submit" class="text-white text-sm md:text-sm bg-indigo-600 py-2 px-4 md:py-2 md:px-6 rounded-full font-bold hover:bg-indigo-500 transition-all duration-200 focus:bg-indigo-400">Cari Buku</button>
            <!-- </div> -->
        </div>
        <img class="md:w-[450px] md:h-[400px] m-auto hidden md:flex" src="./assets/img/iliustration.png" alt="">
    </div>
</div>
<!-- HERO END -->
<!-- KEUNGGULAN START -->
<div class="px-16 py-20 md:py-28 bg-dongker">
    <div class="grid gap-7 justify-center md:flex md:justify-evenly">
        <div class="flex items-center gap-6 bg-dongker p-5 w-[300px] rounded-full bg-slate-50 shadow hover:scale-105 transition-all duration-200">
            <lord-icon
                src="https://cdn.lordicon.com/ftasfhkn.json"
                trigger="hover"
                class="md:w-10 md:h-10 w-8 h-8">
            </lord-icon>
            <p class="text-dongker">Koleksi Buku Lengkap</p>
        </div>
        <div class="flex items-center gap-6 bg-dongker p-5 w-[300px] rounded-full bg-slate-50 shadow hover:scale-105 transition-all duration-200">
            <lord-icon
                src="https://cdn.lordicon.com/ynsswhvj.json"
                trigger="hover"
                class="md:w-10 md:h-10 w-8 h-8">
            </lord-icon>
            <p class="text-dongker">Pembayaran Mudah & Aman</p>
        </div>
        <div class="flex items-center gap-6 bg-dongker p-5 w-[300px] rounded-full bg-slate-50 shadow hover:scale-105 transition-all duration-200">
            <lord-icon
                src="https://cdn.lordicon.com/xwpcjash.json"
                trigger="hover"
                class="md:w-10 md:h-10 w-8 h-8">
            </lord-icon>
            <p class="text-dongker">Pengiriman Cepat</p>
        </div>
        <div class="flex items-center gap-6 bg-dongker p-5 w-[300px] rounded-full bg-slate-50 shadow hover:scale-105 transition-all duration-200">
            <lord-icon
                src="https://cdn.lordicon.com/zdfcfvwu.json"
                trigger="hover"
                class="md:w-10 md:h-10 w-8 h-8">
            </lord-icon>
            <p class="text-dongker">Buku 100% Original</p>
        </div>
    </div>
</div>
<!-- KEUNGGULAN END -->
<!-- QUOTE START -->
<div class="bg-center bg-cover bg-fixed w-full h-[350px] bg-no-repeat grid items-center" style="background-image: url(./assets/img/orangBacaBuku.jpg);">
    <div class="">
        <p class="text-center text-white text-md md:text-xl italic">"Membaca adalah jendela dunia. Makin banyak membaca, makin banyak pula pengetahuan yang kita dapat." <br> – Najwa Shihab </p>
    </div>
</div>
<!-- QUOTE END -->
<!-- REALEASED BOOK START -->
<div class="px-6 py-16 bg-dongker">
    <h3 class="font-bold text-xl text-gray-200 md:text-2xl text-center">Baru Rilis</h3>
    <hr class="w-24 h-[3px] bg-slate-800 mt-1 m-auto">
    <div class="grid grid-cols-2 justify-items-center md:flex flex-wrap justify-center md:gap-5">
        <div class="mt-5 bg-gray-200 grid justify-items-center w-48 h-94 p-5 text-center rounded-xl shadow-lg md:w-72">
            <img src="./assets/img/2k6cjwpghl675m9qzvyyp5.jpg" class="w-52 h-60 md:w-60 md:h-72" alt="">
            <p class="font-bold text-lg text-dongker mt-2">A Guide Book To Slow Down Your Life</p>
            <p class="text-dongker">Rp 150.000.00,-</p>
            <button class="bg-indigo-600 w-full py-2 text-sm m-auto rounded-lg text-gray-200 hover:bg-indigo-500 focus:bg-indigo-400 mt-3">Beli</button>
        </div>
        <div class="mt-5 bg-gray-200 grid justify-items-center w-48 h-94 p-5 text-center rounded-xl shadow-lg md:w-64 md:h-94">
            <img src="./assets/img/6a378f02-8798-485e-b7d9-874d6aa78762.jpg" class="w-52 h-60 md:w-60 md:h-72" alt="">
            <p class="font-bold text-lg text-dongker mt-2">Good Vibes Good Life</p>
            <p class="text-dongker">Rp 180.000.00,-</p>
            <button class="bg-indigo-600 w-full py-2 text-sm m-auto rounded-lg text-gray-200 hover:bg-indigo-500 focus:bg-indigo-400 mt-3">Beli</button>
        </div>
        <div class="mt-5 bg-gray-200 grid justify-items-center w-48 h-94 p-5 text-center rounded-xl shadow-lg md:w-64 md:h-94">
            <img src="./assets/img/6uvrurklaulrsxsavgv7yk.jpg" class="w-52 h-60 md:w-60 md:h-72" alt="">
            <p class="font-bold text-lg text-dongker mt-2">How To Be Great</p>
            <p class="text-dongker">Rp 250.000.00,-</p>
            <button class="bg-indigo-600 w-full py-2 text-sm m-auto rounded-lg text-gray-200 hover:bg-indigo-500 focus:bg-indigo-400 mt-3">Beli</button>
        </div>
        <div class="mt-5 bg-gray-200 grid justify-items-center w-48 h-94 p-5 text-center rounded-xl shadow-lg md:w-64 md:h-94">
            <img src="./assets/img/6xviaeyshc4od9atcs6fd4.jpg" class="w-52 h-60 md:w-60 md:h-72" alt="">
            <p class="font-bold text-lg text-dongker mt-2">Kita Semua Pandai Bicara</p>
            <p class="text-dongker">Rp 150.000.00,-</p>
            <button class="bg-indigo-600 w-full py-2 text-sm m-auto rounded-lg text-gray-200 hover:bg-indigo-500 focus:bg-indigo-400 mt-3">Beli</button>
        </div>
        <div class="mt-5 bg-gray-200 grid justify-items-center w-48 h-94 p-5 text-center rounded-xl shadow-lg md:w-64 md:h-94">
            <img src="./assets/img/9786238036004-pahami_jenis_otak-1.jpg" class="w-52 h-60 md:w-60 md:h-72" alt="">
            <p class="font-bold text-lg text-dongker mt-2">Maksimalkan Jenis Otak Anda</p>
            <p class="text-dongker">Rp 300.000.00,-</p>
            <button class="bg-indigo-600 w-full py-2 text-sm m-auto rounded-lg text-gray-200 hover:bg-indigo-500 focus:bg-indigo-400 mt-3">Beli</button>
        </div>
        <div class="mt-5 bg-gray-200 grid justify-items-center w-48 h-94 p-5 text-center rounded-xl shadow-lg md:w-64 md:h-94">
            <img src="./assets/img/9786239700225_-_Ionelines.jpg" class="w-52 h-60 md:w-60 md:h-72" alt="">
            <p class="font-bold text-lg text-dongker mt-2">Loneliness</p>
            <p class="text-dongker">Rp 90.000.00,-</p>
            <button class="bg-indigo-600 w-full py-2 text-sm m-auto rounded-lg text-gray-200 hover:bg-indigo-500 focus:bg-indigo-400 mt-3">Beli</button>
        </div>
    </div>
</div>
<!-- REALEASED BOOK START -->
<!-- BOOK CATEGORIES START -->
<div class="py-20 px-6">
    <h3 class="font-bold text-xl text-dongker md:text-2xl text-center">Book Categories</h3>
    <hr class="w-24 h-[3px] bg-slate-800 mt-1 m-auto">
    <div class="grid grid-cols-1 md:grid-cols-3 mt-3">
        <div class="grid grid-cols-1 justify-items-center mt-5 px-8 text-center space-y-3">
            <div class="bg-gray-200 shadow-lg p-3 rounded-full flex items-center">
                <lord-icon
                    src="https://cdn.lordicon.com/izhpqsis.json"
                    trigger="hover"
                    class="h-10 w-10">
                </lord-icon>
            </div>
            <p class="font-bold text-xl">Novel</p>
            <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores hic totam autem molestiae beatae aliquam excepturi officiis facilis.</p>
        </div>
        <div class="grid grid-cols-1 justify-items-center mt-5 px-8 text-center space-y-3">
            <div class="bg-gray-200 shadow-lg p-3 rounded-full flex items-center">
                <lord-icon
                    src="https://cdn.lordicon.com/qvaikltw.json"
                    trigger="hover"
                    class="h-10 w-10">
                </lord-icon>
            </div>
            <p class="font-bold text-xl">Agama</p>
            <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores hic totam autem molestiae beatae aliquam excepturi officiis facilis.</p>
        </div>
        <div class="grid grid-cols-1 justify-items-center mt-5 px-8 text-center space-y-3">
            <div class="bg-gray-200 shadow-lg p-3 rounded-full flex items-center">
                <lord-icon
                    src="https://cdn.lordicon.com/wzefksjc.json"
                    trigger="hover"
                    class="h-10 w-10">
                </lord-icon>
            </div>
            <p class="font-bold text-xl">Alam</p>
            <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores hic totam autem molestiae beatae aliquam excepturi officiis facilis.</p>
        </div>
        <div class="grid grid-cols-1 justify-items-center mt-5 px-8 text-center space-y-3">
            <div class="bg-gray-200 shadow-lg p-3 rounded-full flex items-center">
                <lord-icon
                    src="https://cdn.lordicon.com/iiudwewg.json"
                    trigger="hover"
                    class="h-10 w-10">
                </lord-icon>
            </div>
            <p class="font-bold text-xl">Biografi</p>
            <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores hic totam autem molestiae beatae aliquam excepturi officiis facilis.</p>
        </div>
        <div class="grid grid-cols-1 justify-items-center mt-5 px-8 text-center space-y-3">
            <div class="bg-gray-200 shadow-lg p-3 rounded-full flex items-center">
                <lord-icon
                    src="https://cdn.lordicon.com/mitohekz.json"
                    trigger="hover"
                    class="h-10 w-10">
                </lord-icon>
            </div>
            <p class="font-bold text-xl">Keuangan</p>
            <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores hic totam autem molestiae beatae aliquam excepturi officiis facilis.</p>
        </div>
        <div class="grid grid-cols-1 justify-items-center mt-5 px-8 text-center space-y-3">
            <div class="bg-gray-200 shadow-lg p-3 rounded-full flex items-center">
                <lord-icon
                    src="https://cdn.lordicon.com/toprgkru.json"
                    trigger="hover"
                    class="h-10 w-10">
                </lord-icon>
            </div>
            <p class="font-bold text-xl">Sains</p>
            <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores hic totam autem molestiae beatae aliquam excepturi officiis facilis.</p>
        </div>
    </div>
</div>
<!-- ABOUT START -->
<div class="py-10 px-6 bg-dongker">
    <div class="grid grid-cols-1 justify-items-center md:grid-cols-2 ">
        <img src="./assets/img/manypeople.png" class="w-[250px] h-[250px] md:w-[350px] md:h-[350px]" alt="">
        <div class="space-y-5 text-center grid px-10 justify-items-center md:flex md:flex-col md:justify-center md:text-left md:px-16">
            <h1 class="text-white text-2xl font-bold">About Our BookStore</h1>
            <p class="text-white font-thin">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque eos molestias ipsum alias porro voluptatibus voluptas dicta, dolor, necessitatibus aspernatur architecto adipisci in explicabo molestiae illo quisquam rerum expedita ipsam.</p>
            <div class="flex items-center">
                <a href="" class="text-white text-sm md:text-sm bg-indigo-600 py-2 px-4 md:py-2 md:px-6 rounded-full font-bold hover:bg-indigo-500 transition-all duration-200 focus:bg-indigo-400">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT END-->


<?php include 'includes/footer.php'; ?>