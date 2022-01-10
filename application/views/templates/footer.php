<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SIPSIASI <?= date('Y'); ?> </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href=" <?= base_url('auth/logout'); ?> ">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets'); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- PDF plugins -->
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#pdf').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'pdfHtml5',
                orientation: 'potrait',
                pageSize: 'A4'
            }]
        });
    });
</script>

<!-- <script>
    $("#kriteria_id").change(function() {
        var kriteria_id = $("#kriteria_id").val();

        $.ajax({
            url: "<?= base_url('admin/getRentangNilai'); ?>",
            method: "POST",
            data: {
                kriteria_id: kriteria_id
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var coba = '';
                var i;

                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id + '>' + data[i].rentang_nilai + '</option>';
                    coba += '<option value=' + data[i].id + '>' + data[i].nilai + '</option>';
                }
                $('#rentang_nilai').html(html);
                $('#nilaikriteria').html(coba);
            }
        });
    });
</script> -->

</body>

</html>