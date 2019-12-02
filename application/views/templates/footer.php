      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ESportal <?= date('Y'); ?></span>
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript" src="jquery-1.4.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $('#max_nohp').keyup(function() {
    var len = this.value.length;
    if (len >= 12) {
    this.value = this.value.substring(0, 13);
    }
    });
    });
  </script>

<!-- Datepicker -->
<script src="<?= base_url('assets/'); ?>js/jquery-1.12.4.js"></script>
<script src="<?= base_url('assets/'); ?>js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      minDate: 0,
      maxDate: "+10Y"
    });
  });
  $( function() {
    $( "#datepicker2" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      minDate: 0,
      maxDate: "+10Y"
    });
  });
  $( function() {
    $( "#datepicker3" ).datepicker({
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true,
      minDate: 0,
      maxDate: "+10Y"
    });
  });
  </script>
</body>

</html>
  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dataTables/datatables.min.js"></script>

  <script>
      $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      }); //JQuery mencari custom file input, lalu ketika kita ubah isinya, ambil nama filenya lalu nama filenya simpan kedalam isi dari input ini
  
      $('.form-check-input').on('click', function() {
          const menuId = $(this).data('menu');
          const roleId = $(this).data('role');

          $.ajax({
            url: "<?= base_url('superadmin/changeaccess'); ?>",
            type: 'post',
            data: {
                    menuId: menuId,
                    roleId: roleId
            },
            success: function() {
              document.location.href = "<?= base_url('superadmin/roleaccess/'); ?>" + roleId;
            }
          });
      });

      $(document).ready( function () {
    $('#dataTable').DataTable();
} );
  </script>


