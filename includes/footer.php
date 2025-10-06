<script>
    var humberger = document.getElementById('humberger');
    var ddMobile = document.getElementById('dropDown-mobile');
    var searchMobileNav = document.getElementById('searchMobileNav');
    var searchMobile = document.getElementById('searchMobile');

    humberger.addEventListener('click', function() {
        ddMobile.classList.toggle('hidden');
    })

    searchMobileNav.addEventListener('click', function(){
        searchMobile.classList.toggle('hidden')
    })
</script>
</body>

</html>