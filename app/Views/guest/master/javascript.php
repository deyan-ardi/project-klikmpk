    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendor_admins -->
    <script src="<?= base_url(); ?>/assets/vendor_admin/global/global.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor_admin/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor_admin/owl-carousel/owl.carousel.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor_admin/sweetalert2/dist/sweetalert2.min.js"></script>
    <!-- Datatable -->
    <script src="<?= base_url(); ?>/assets/vendor_admin/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/plugins-init/datatables.init.js"></script>
    <script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
window.setTimeout("waktu()", 1000);

function waktu() {
    var waktu = new Date();
    setTimeout("waktu()", 1000);
    if (document.getElementById("jam") != null || document.getElementById("menit") != null || document.getElementById(
            "detik") != null) {
        document.getElementById("jam").innerHTML = waktu.getHours() + "	: ";
        document.getElementById("menit").innerHTML = waktu.getMinutes() + "	: ";
        document.getElementById("detik").innerHTML = waktu.getSeconds() + " WITA";
    }
}
    </script>
    <script src="<?= base_url(); ?>/assets/js/custom.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/deznav-init.js"></script>
    <script src="<?= base_url(); ?>/assets/js/demo.js"></script>