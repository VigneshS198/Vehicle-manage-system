<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>    
<div class="body-wrapper">
      <div class="body-wrapper-inner">
        <div class="container-fluid pt-110" style="padding-top: 110px;">
          <div class="card">
            <div class="card-body">

                <div class="row g-6 mb-6">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Today Entry</span>
                                        <span class="h3 font-bold mb-0"><?= esc($todayEntry ?? 0) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                              <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Checkin count</span>
                                        <span class="h3 font-bold mb-0"><?= esc($checkIn ?? 0) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">Checkout count</span>
                                        <span class="h3 font-bold mb-0"><?= esc($checkOut ?? 0) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h6 font-semibold text-muted text-sm d-block mb-2">User Count</span>
                                        <span class="h3 font-bold mb-0"><?= esc($userCount ?? 0) ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

          <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Today Entry</h4>
                      <p class="card-subtitle">
                        Check-in and check-out
                      </p>
                    </div>
                  </div>
                  <div class="table-responsive mt-4">
                    <table id="checkinTable" class="table table-striped table-hover table-bordered align-middle text-nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th scope="col" class="px-0 text-muted">
                            Vehicle Name
                          </th>
                          <th scope="col" class="px-0 text-muted">D.C. Number </th>
                          <th scope="col" class="px-0 text-muted">
                            P.O. Number 
                          </th>
                          <th scope="col" class="px-0 text-muted">Check In Time </th>
                          <th scope="col" class="px-0 text-muted text-end">
                             Status
                          </th>
                        </tr>
                      </thead>
                        <tbody id="checkin-table-body">
                        </tbody>

                    </table>


                  </div>
                </div>
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
    method: "GET",
    dataType: "json",
    success: function (response) {
      let data = response.data ?? response;
      let tbody = $('#checkin-table-body');
      tbody.empty();

      if (!Array.isArray(data)) {
        tbody.html('<tr><td colspan="5" class="text-danger">Invalid data format.</td></tr>');
        return;
      }

      data.forEach(function (entry) {
        const row = `
          <tr>
            <td class="px-0">
              <div class="d-flex align-items-center">
                <div class="ms-3">
                  <h6 class="mb-0 fw-bolder">${entry.vehicle_name}</h6>
                </div>
              </div>
            </td>
            <td class="px-0">${entry.dc_number}</td>
            <td class="px-0">${entry.po_number}</td>
            <td class="px-0">${entry.datetime}</td>
            <td class="px-0 text-dark fw-medium text-end">
              <span class="badge bg-${entry.status === 'checkin' ? 'success' : 'info'}">${entry.status}</span>
            </td>
          </tr>`;
        tbody.append(row);
      });

      $('#checkinTable').DataTable({
        destroy: true,
        responsive: true,
        dom:
          '<"row mb-3"' +
            '<"col-sm-12 col-md-2"l>' +
            '<"col-sm-12 col-md-4"f>' +
            '<"col-sm-12 col-md-6 text-end"B>' +
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

    },
    error: function () {
      $('#checkin-table-body').html('<tr><td colspan="5" class="text-danger">Failed to load data.</td></tr>');
    }
  });
});
</script>


<?= $this->endSection() ?>
