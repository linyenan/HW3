<div class="gototop d-none d-sm-block">
    <a href="#">
        <img src="./SVG/man.svg" alt="" width="150px">
    </a>
</div>


<script>
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 1000) {
            $(".gototop a").fadeIn();
        } else {
            $(".gototop a").fadeOut();
        }
    });
</script>