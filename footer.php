<?php wp_footer() ?>
<footer class="bg-gray-900 flex justify-center h-36 items-center">
    <div>
        <p class="text-white">Copyright KSM Android</p>
    </div>
</footer>
<script>
    window.onscroll = function() {
        myFunction();
    }

    function myFunction() {
        if (document.documentElement.scrollTop > 500) {
            document.getElementById("header").style.backgroundColor = "#DFA878"
        } else {
            document.getElementById("header").style.backgroundColor = "#dfa87850"
        }
    }
    // const menus = document.querySelectorAll('.menu-item');
    // menus.forEach((menu) => {
    //     menu.addEventListener('mouseover', () => {
    //         if (menu.childElementCount > 1) {
    //             menu.lastElementChild.style.display = 'none';
    //         }
    //     })
    // })
</script>
</body>

</html>