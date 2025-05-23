<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="body-wrapper">
  <div class="body-wrapper-inner">
    <div class="container-fluid pt-110" style="padding-top: 110px;">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Role List</h5>
          <div class="table-responsive">
            <table id="purchaseOrderTable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Default</th>
                  <th>Action</th>
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
    url: "<?= base_url('roles/list') ?>",
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
              <td>${item.id}</td>
              <td>${item.name ?? ''}</td>
              <td>
                <span class="badge bg-${item.is_default == 1 ? 'success' : 'secondary'}">
                  ${item.is_default == 1 ? 'Yes' : 'No'}
                </span>
              </td>
              <td>
                <a href="<?= base_url('roles/') ?>${item.id}" class="btn btn-sm btn-primary">Edit</a>
                <a href="<?= base_url('roles/delete/') ?>${item.id}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
              </td>
            </tr>`;
          tbody.append(row);
        });

        // Initialize DataTable after rows are added
        $('#purchaseOrderTable').DataTable({
          destroy: true,
          responsive: true,
          dom: '<"row mb-3"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 text-end"B>>' +
               '<"row"<"col-sm-12"tr>>' +
               '<"row mt-3"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
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
        tbody.append('<tr><td colspan="5" class="text-center">No roles found</td></tr>');
      }
    },
    error: function () {
      $('#purchaseOrderTable tbody').html('<tr><td colspan="7" class="text-center text-danger">Error loading data</td></tr>');
    }
  });
});
</script>


<?= $this->endSection() ?>
