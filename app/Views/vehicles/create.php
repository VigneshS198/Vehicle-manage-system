<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>   
<div class="body-wrapper">
      <div class="body-wrapper-inner">
        <div class="container-fluid pt-110" style="padding-top: 110px;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">VEHICLES CHECKIN</h5>
              <form id="addform" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
      <div class="purchasegrp">
        <label class="purchaseinfo">Vehicle Name</label>
        <input type="text" class="form-control purchaseselects" name="vehicle_name" placeholder="Enter Vehicle Name" style="text-transform: uppercase;">
      </div>
    </div>
    <div class="col-md-6">
      <div class="purchasegrp">
        <label class="purchaseinfo">Vehicle Photo</label>
        <input type="file" class="form-control purchaseselects" name="vehicle_photo" accept="image/*">
      </div>
    </div>
  </div>

  <div class="row mt-10">
    <div class="col-md-6">
      <div class="purchasegrp">
        <label class="purchaseinfo">Delivery Challan (D.C.) Number</label>
        <input type="text" class="form-control purchaseselects" name="dc_number" placeholder="Enter D.C. Number">
      </div>
    </div>
    <div class="col-md-6">
      <div class="purchasegrp">
        <label class="purchaseinfo">Purchase Order (P.O.) Number</label>
        <input type="text" class="form-control purchaseselects" name="po_number" placeholder="Enter P.O. Number">
      </div>
    </div>
  </div>

 

  <div class="row mt-10">
    <div class="col-md-6">
      <div class="purchasegrp">
        <label class="purchaseinfo">Date and Time</label>
          <input type="datetime-local" class="form-control purchaseselects" name="datetime" value="<?= date('Y-m-d\TH:i') ?>">
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

<script>
$(document).ready(function () {
  $('#addform').on('submit', function (e) {
    e.preventDefault();

    let isValid = true;
    let errorMessages = [];

    // Get values
    const vehicleName = $('input[name="vehicle_name"]').val().trim();
    const dcNumber = $('input[name="dc_number"]').val().trim();
    const poNumber = $('input[name="po_number"]').val().trim();
    const datetime = $('input[name="datetime"]').val().trim();
    const vehiclePhotoInput = $('input[name="vehicle_photo"]')[0];
    const photoFile = vehiclePhotoInput.files[0];

    if (vehicleName === '') {
      showToast("Vehicle Name is required.",'danger');
            return;
    }

    if (dcNumber === '') {
        showToast("Delivery Challan (D.C.) Number is required.",'danger');
            return;
    }

    if (poNumber === '') {
       showToast("Purchase Order (P.O.) Number is required.",'danger');
            return;
    }

    if (datetime === '') {
       showToast("Date and Time are required.",'danger');
            return;
    }

    if (!photoFile) {
      showToast("Vehicle photo required.",'danger');
            return;

    } 
 
    let formData = new FormData($('#addform')[0]);

    $.ajax({
      url: "<?= base_url('vehicle/checkin') ?>",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {

        if (response.status) {
       showToast("checkin added succesfully.",'success');

          $('#addform')[0].reset();
        } 
      },
      
    });
  });
});
</script>
<?= $this->endSection() ?>
