<div class="body-wrapper">
  <div class="body-wrapper-inner">
    <div class="container-fluid pt-110">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Vendor Information</h5>
          <form id="addform" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="purchasegrp">
                  <label class="purchaseinfo">Vendor Name</label>
                  <input type="text" class="form-control purchaseselects" name="vendor_name" placeholder="Enter Vendor Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="purchasegrp">
                  <label class="purchaseinfo">Vendor Company Name</label>
                  <input type="text" class="form-control purchaseselects" name="vendor_company_name" placeholder="Enter Vendor Company Name">
                </div>
              </div>
            </div>

            <div class="row mt-10">
              <div class="col-md-6">
                <div class="purchasegrp">
                  <label class="purchaseinfo">Address</label>
                  <input type="text" class="form-control purchaseselects" name="address" placeholder="Enter Address">
                </div>
              </div>
              <div class="col-md-6">
                <div class="purchasegrp">
                  <label class="purchaseinfo">Mobile Number</label>
                  <input type="tel" class="form-control purchaseselects" name="mobile_number" placeholder="Enter Mobile Number" pattern="[0-9]{10}" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 blkftr mt-10">
                <div class="modal-footer taskfooter">
                  <button type="submit" class="btn btn-primary btn-sm tasksave1">SAVE</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
  $('#addform').on('submit', function (e) {
    e.preventDefault();

    let isValid = true;
    let errorMessages = [];

    // Get values
    const vendorName = $('input[name="vendor_name"]').val().trim();
    const vendorCompanyName = $('input[name="vendor_company_name"]').val().trim();
    const address = $('input[name="address"]').val().trim();
    const mobileNumber = $('input[name="mobile_number"]').val().trim();

    if (vendorName === '') {
      showToast("Vendor Name is required.", 'danger');
      return;
    }

    if (vendorCompanyName === '') {
      showToast("Vendor Company Name is required.", 'danger');
      return;
    }

    if (address === '') {
      showToast("Address is required.", 'danger');
      return;
    }

    if (mobileNumber === '') {
      showToast("Mobile Number is required.", 'danger');
      return;
    }

    let formData = new FormData($('#addform')[0]);

    $.ajax({
      url: "<?= site_url('vendor/save') ?>",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        if (response.status) {
          alert(response.message);
          $('#addform')[0].reset();
        } else {
          let errors = response.errors;
          let errorMsg = '';
          for (let key in errors) {
            errorMsg += errors[key] + "\n";
          }
          alert(errorMsg);
        }
      },
      error: function (xhr, status, error) {
        alert("An error occurred: " + error);
      }
    });
  });
});

function showToast(message, type = 'warning') {
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
