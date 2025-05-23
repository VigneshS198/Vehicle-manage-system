<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<div class="body-wrapper">
  <div class="body-wrapper-inner">
    <div class="container-fluid pt-110" style="padding-top: 110px;">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">VEHICLES CHECKIN LIST</h5>
          <div class="table-responsive">
            <table id="vehicleTable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Vehicle Name</th>
                  <th>Photo</th>
                  <th>D.C. Number</th>
                  <th>P.O. Number</th>
                  <th>Check In Time</th>
                  <th>Status</th>
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
      url: "<?= base_url('vehicles/checkin_list') ?>",
      type: "get",
      dataType: "json",
      success: function (response) {
        const tbody = $('#vehicleTable tbody');
        tbody.empty();

        if (response.status && Array.isArray(response.data)) {
          response.data.forEach((item, index) => {
            const row = `
              <tr>
                <td>${index + 1}</td>
                <td>${item.vehicle_name}</td>
                <td><img src="${item.vehicle_photo_url}" alt="Vehicle Photo" width="80"></td>
                <td>${item.dc_number}</td>
                <td>${item.po_number}</td>
                <td>${item.datetime}</td>
               <td>
      <button 
  onclick="changeStatus(${item.id}, this)" 
  class="btn ${item.status === 'checkin' ? 'btn-success' : 'btn-danger'} btn-sm"
  ${item.status === 'checkout' ? 'disabled' : ''}>
  ${item.status === 'checkin' ? 'Check In' : 'Check Out'}
</button>


    </td>
              </tr>`;
            tbody.append(row);
          });

          $('#vehicleTable').DataTable({
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
          tbody.append('<tr><td colspan="7" class="text-center">No data available</td></tr>');
        }
      },
      error: function () {
        $('#vehicleTable tbody').html('<tr><td colspan="7" class="text-center text-danger">Error loading data</td></tr>');
      }
    });
   

  });
   function changeStatus(id, button) {
  fetch(`/vehicle/changestatus/${id}`, {
    method: 'post',
    headers: {
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest' 
    }
  })
  .then(res => res.json())
  .then(data => {
    showToast(data.message,'success');
    button.textContent = data.newStatus;
    button.disabled = data.shouldDisable ?? false;
  })
  .catch(err => {
    console.error(err);
    alert('Failed to update status');
  });
}
</script>

<?= $this->endSection() ?>
