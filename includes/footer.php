<script>
    var humberger = document.getElementById('humberger');
    var ddMobile = document.getElementById('dropDown-mobile');
    var searchMobileNav = document.getElementById('searchMobileNav');
    var searchMobile = document.getElementById('searchMobile');

    humberger.addEventListener('click', function() {
        ddMobile.classList.toggle('hidden');
    })

    searchMobileNav.addEventListener('click', function() {
        searchMobile.classList.toggle('hidden')
    })
    const userIcon = document.getElementById('userIcon');
    const dropdown = document.getElementById('dropdownMenu');
    let locked = false;

    // toggle dropdown saat ikon diklik
    userIcon.addEventListener('click', (e) => {
        e.stopPropagation();
        locked = !locked;
        dropdown.classList.toggle('!opacity-100', locked);
        dropdown.classList.toggle('!scale-100', locked);
        dropdown.classList.toggle('!pointer-events-auto', locked);
    });

    // klik di luar area untuk menutup dropdown
    document.addEventListener('click', (e) => {
        if (locked && !document.getElementById('userDropdown').contains(e.target)) {
            locked = false;
            dropdown.classList.remove('!opacity-100', '!scale-100', '!pointer-events-auto');
        }
    });
</script>
</body>

</html>