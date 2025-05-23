<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<style>
  .btn-table {
  padding: 5px;
/*  font-size: 0.875rem;*/
}
</style>

<div class="body-wrapper">
  <div class="body-wrapper-inner">
    <div class="container-fluid pt-110" style="padding-top: 110px;">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">PURCHASE ORDER LIST</h5>

       

          <div class="table-responsive">
            <table id="purchaseOrderTable" class="table table-striped table-hover table-bordered align-middle text-nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>PO ID</th>
                  <th>Vendor Name</th>
                  <th>Vendor Company</th>
                  <th>Product Count</th>
                  <th>Purchase Amount</th>
                  <th>Purchase Date</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
$(document).ready(function () {
  $.ajax({
    url: "<?= base_url('purchase/list') ?>",
    type: "GET",
    dataType: "json",
    success: function (response) {
      const tbody = $('#purchaseOrderTable tbody');
      tbody.empty();

      if (response.status && Array.isArray(response.data)) {
        response.data.forEach((item, index) => {
          const row = `
            <tr>
              <td>${index + 1}</td>
              <td>${item.purchase_order_id}</td>
              <td>${item.vendor_name}</td>
              <td>${item.vendor_company}</td>
              <td class="text-end">${item.total_quantity}</td>
              <td class="text-end">${item.total_value}</td>
              <td>${item.created_at}</td>
            </tr>`;
          tbody.append(row);
        });

      const table = $('#purchaseOrderTable').DataTable({
  destroy: true,
  responsive: true,
  dom:
    '<"row mb-3"' +
      '<"col-sm-5 col-md-4"l>' +  // Length menu
      '<"col-sm-12 col-md-4"f>' +  // Search bar
      '<"col-sm-12 col-md-4 text-end"B>' +  // Buttons
    '>' +
    '<"row"<"col-sm-12"tr>>' +
    '<"row mt-3"' +
      '<"col-sm-12 col-md-5"i>' +
      '<"col-sm-12 col-md-7"p>' +
    '>',
  buttons: [
    { extend: 'copy', className: 'btn btn-secondary btn-sm' },
    { extend: 'csv', className: 'btn btn-secondary btn-sm' },
    { extend: 'excel', className: 'btn btn-secondary btn-sm' },
    { extend: 'pdf', className: 'btn btn-secondary btn-sm' },
    { extend: 'print', className: 'btn btn-secondary btn-sm' },
    { extend: 'colvis', className: 'btn btn-secondary btn-sm' }
  ]
});

  

      } else {
        tbody.append('<tr><td colspan="7" class="text-center">No purchase orders available</td></tr>');
      }
    },
    error: function () {
      $('#purchaseOrderTable tbody').html('<tr><td colspan="7" class="text-center text-danger">Error loading data</td></tr>');
    }
  });
});
</script>

<?= $this->endSection() ?>
