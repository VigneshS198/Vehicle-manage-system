</div> <!-- Close page-wrapper -->

<!-- Scripts -->
<script type="text/javascript">
   function showToast(message, type = 'waring') {
  const toastId = 'toast-' + Date.now();

  const toastHtml = `
    <div id="${toastId}" class="toast align-items-center text-bg-${type} border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">${message}</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>`;
 
  $('#toastContainer').append(toastHtml);
  const toastEl = document.getElementById(toastId);
  const bsToast = new bootstrap.Toast(toastEl, { delay: 4000 });
  bsToast.show();

  toastEl.addEventListener('hidden.bs.toast', () => toastEl.remove());
}
</script>
<!-- <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script> -->
<script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sidebarmenu.js'); ?>"></script>
<script src="<?= base_url('assets/js/app.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js'); ?>"></script>
<script src="<?= base_url('assets/libs/simplebar/dist/simplebar.js'); ?>"></script>
<script src="<?= base_url('assets/js/dashboard.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>
</html>
