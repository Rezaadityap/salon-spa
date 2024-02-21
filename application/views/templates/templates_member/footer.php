<!-- Footer-->
<footer class="py-2 bg-dark fixed-bottom">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; By amberlee 2023</p>
    </div>
</footer>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?php echo base_url() ?>/assets/member/shop/js/scripts.js"></script>
<!-- Sweet alert -->
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/myscript.js"></script>
<!-- Rateyo -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
    // rateyo
    $(function () {

        $("#rateYo").rateYo({
            fullStar: true,
            onSet: function (rating, rateYoInstance) {
                $("#nilai").val(rating);
            }
        });

    });
</script>
</body>

</html>