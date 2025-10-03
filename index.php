<?php
$title = "Home";
include 'includes/header.php';
?>
<div class="py-5 bg-dongker px-16 bg-don shadow-md">
    <div class="flex items-center">
        <lord-icon
            src="https://cdn.lordicon.com/hjrbjhnq.json"
            trigger="hover"
            colors="primary:#ffffff"
            class="h-8 w-8 text-white">
        </lord-icon>
        <div class="hover:bg-white py-1 px-3 rounded transition-all duration-200 group">
            <a href="" class="text-xl font-extrabold text-white group-hover:text-dongker">LP3I BOOKS</a>
        </div>
        <div class="m-auto flex gap-8 text-center">
            <a href="" class="font-semibold text-white hover:scale-125 transition-all duration-300">Home</a>
            <a href="" class="font-semibold text-white hover:scale-125 transition-all duration-300">Categories</a>
        </div>
        <div class="bg-slate-50 w-[250px] py-1 px-3 flex items-center gap-5 rounded-md overflow-hidden shadow-md">
            <lord-icon
                src="https://cdn.lordicon.com/xaekjsls.json"
                trigger="hover" class="w-6 h-6">
            </lord-icon>
            <input class="text-sm w-full outline-none" type="text" name="" id="" placeholder="Cari buku...">
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>