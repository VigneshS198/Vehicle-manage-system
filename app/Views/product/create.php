<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="body-wrapper">
  <div class="body-wrapper-inner">
    <div class="container-fluid pt-110" style="padding-top: 110px;">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">PURCHASE ORDER </h5>
          <form id="purchaseOrderForm" enctype="multipart/form-data" novalidate>
            <div class="row">
              <div class="col-md-6">
                <div class="purchasegrp">
                  <label class="purchaseinfo">Vendor Name</label>
                  <input type="text" class="form-control purchaseselects" name="vendor_name" placeholder="Enter Vendor Name" required>
                  <div class="invalid-feedback">Vendor Name is required.</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="purchasegrp">
                  <label class="purchaseinfo">Vendor Company Name</label>
                  <input type="text" class="form-control purchaseselects" name="vendor_company" placeholder="Enter Vendor Company Name" required>
                  <div class="invalid-feedback">Vendor Company Name is required.</div>
                </div>
              </div>
            </div>

            <div class="row mt-10">
              <div class="col-md-6">
                <div class="purchasegrp">
                  <label class="purchaseinfo">Address</label>
                  <input type="text" class="form-control purchaseselects" name="address" placeholder="Enter Address" required>
                  <div class="invalid-feedback">Address is required.</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="purchasegrp">
                  <label class="purchaseinfo">Mobile Number</label>
                  <input type="tel" class="form-control purchaseselects" name="mobile" placeholder="Enter Mobile Number" required>
                  <div class="invalid-feedback">Mobile Number is required.</div>
                </div>
              </div>
            </div>

            <hr>

            <h6 class="fw-semibold">Product Details</h6>
            <div id="productFields">
              <div class="product-row row">
                <div class="col-md-3">
                  <input type="text" class="form-control" name="product_name[]" placeholder="Product Name" required>
                  <div class="invalid-feedback">Product Name is required.</div>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" name="product_code[]" placeholder="Product Code" required>
                  <div class="invalid-feedback">Product Code is required.</div>
                </div>
                <div class="col-md-2">
                  <input type="number" class="form-control" name="quantity[]" placeholder="Quantity" min="1" required>
                  <div class="invalid-feedback">Quantity is required.</div>
                </div>
                <div class="col-md-2">
                  <input type="number" class="form-control" name="price[]" placeholder="Price" min="0" step="0.01" required>
                  <div class="invalid-feedback">Price is required.</div>
                </div>
                <div class="col-md-2">
                  <button type="button" class="btn btn-danger remove-product">Remove</button>
                </div>
              </div>
            </div>

            <button type="button" id="addProduct" class="btn btn-success btn-sm mt-3">Add Another Product</button>

            <hr>

            <div class="modal-footer taskfooter">
              <button type="submit" class="btn btn-primary btn-sm tasksave1">SAVE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    // Add product row
    $('#addProduct').on('click', function () {
      const productRow = `
        <div class="product-row row mt-2">
          <div class="col-md-3">
            <input type="text" class="form-control" name="product_name[]" placeholder="Product Name" required>
            <div class="invalid-feedback">Product Name is required.</div>
          </div>
          <div class="col-md-2">
            <input type="text" class="form-control" name="product_code[]" placeholder="Product Code" required>
            <div class="invalid-feedback">Product Code is required.</div>
          </div>
          <div class="col-md-2">
            <input type="number" class="form-control" name="quantity[]" placeholder="Quantity" min="1" required>
            <div class="invalid-feedback">Quantity is required.</div>
          </div>
          <div class="col-md-2">
            <input type="number" class="form-control" name="price[]" placeholder="Price" min="0" step="0.01" required>
            <div class="invalid-feedback">Price is required.</div>
          </div>
          <div class="col-md-2">
            <button type="button" class="btn btn-danger remove-product">Remove</button>
          </div>
        </div>
      `;
      $('#productFields').append(productRow);
    });

    // Remove product row
    $(document).on('click', '.remove-product', function () {
      $(this).closest('.product-row').remove();
    });

$(document).ready(function () {
  $('#purchaseOrderForm').on('submit', function (e) {
    e.preventDefault();

    // Validate vendor information
    const vendorName = $('input[name="vendor_name"]').val().trim();
    const vendorCompany = $('input[name="vendor_company"]').val().trim();
    const address = $('input[name="address"]').val().trim();
    const mobile = $('input[name="mobile"]').val().trim();

    if (!vendorName) {
      showToast("Vendor Name is required.", 'danger');
      return;
    }

    if (!vendorCompany) {
      showToast("Vendor Company Name is required.", 'danger');
      return;
    }

    if (!address) {
      showToast("Address is required.", 'danger');
      return;
    }

    if (!mobile) {
      showToast("Mobile Number is required.", 'danger');
      return;
    }

    // Validate product details
    $('#productFields .product-row').each(function () {
      const productName = $(this).find('input[name="product_name[]"]').val().trim();
      const productCode = $(this).find('input[name="product_code[]"]').val().trim();
      const quantity = $(this).find('input[name="quantity[]"]').val().trim();
      const price = $(this).find('input[name="price[]"]').val().trim();

      if (!productName) {
        showToast("Product Name is required.", 'danger');
        return false; // Exit the loop and stop form submission
      }

      if (!productCode) {
        showToast("Product Code is required.", 'danger');
        return false;
      }

      if (!quantity) {
        showToast("Quantity is required.", 'danger');
        return false;
      }

      if (!price) {
        showToast("Price is required.", 'danger');
        return false;
      }
    });

    // Prepare form data
    let formData = new FormData($('#purchaseOrderForm')[0]);

    // Send data via AJAX
    $.ajax({
      url: "<?= base_url('purchase_order/save') ?>",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        if (response.status) {
          showToast(response.message, 'success');
          $('#purchaseOrderForm')[0].reset();
          $('#productFields').empty();
        } else {
          showToast("An error occurred: " + response.message, 'danger');
        }
      },
      error: function (xhr, status, error) {
        showToast("An error occurred: " + error, 'danger');
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
  });
</script>

<?= $this->endSection() ?>