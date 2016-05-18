
</div>
</div>

<!--footer-->
<div class="footer">

</div>
<!--//footer-->
</div>
<!-- Classie -->

<script src="<?= base_url("js/classie.js")?>"></script>
<script>
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;

    showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
    };

    function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
            classie.toggle( showLeftPush, 'disabled' );
        }
    }
</script>
<!--scrolling js-->
<script src="<?= base_url("js/jquery.nicescroll.js")?>"></script>
<script src="<?= base_url("js/scripts.js")?>"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url("js/bootstrap.js")?>"> </script>



<link rel="stylesheet" href="<?= base_url('css/bootstrap-datepicker.min.css') ?>">
<script src="<?= base_url('js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('locales/bootstrap-datepicker.pt-BR.min.js') ?>"></script>
<script src="<?= base_url('js/jquery.maskedinput.min.js') ?>"></script>
<script src="<?= base_url('js/mascaras.js') ?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</body>
</html>