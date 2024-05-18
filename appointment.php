<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointment Details - Hamro Salon</title>
  <link rel="stylesheet" href="apointment.css">
</head>
<body>
  <div class="container">
    <div id="appointmentsBtn">
    <div id="appointmentsBtn">
  <h2>Appointment Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Apt. ID</th>
        <th>Customer Name</th>
        <th>Contact</th>
        <th>Appointment Date</th>
        <th>Service Type</th>
        <th>Status</th>
        <th>More Details</th>
      </tr>
    </thead>
    <?php
   include('dbconnection.php');
    $sql = "SELECT * FROM appointments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?= $row["apt_id"] ?></td>
          <td><?= $row["customer_name"] ?></td>
          <td><?= $row["contact"] ?></td>
          <td><?= $row["apt_date"] ?></td>
          <td><?= $row["service_type"] ?></td>
          <td>
            <?php
            if ($row["status"] == 0) {
            ?>
              <button class="btn btn-warning">Pending</button>
            <?php
            } else if ($row["status"] == 1) {
            ?>
              <button class="btn btn-success">Confirmed</button>
            <?php
            } else if ($row["status"] == 2) {
            ?>
              <button class="btn btn-danger">Cancelled</button>
            <?php
            }
            ?>
          </td>
          <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachAppointment.php?aptID=<?= $row['apt_id'] ?>" href="javascript:void(0);">View</a></td>
        </tr>
    <?php
      }
    }
    ?>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Appointment Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="appointment-view-modal modal-body">

      </div>
    </div><!--/ Modal content-->
  </div><!-- /Modal dialog-->
</div>

<script>
  // View appointment modal
  $(document).ready(function() {
    $('.openPopup').on('click', function() {
      var dataURL = $(this).attr('data-href');

      $('.appointment-view-modal').load(dataURL, function() {
        $('#viewModal').modal({
          show: true
        });
      });
    });
  });
</script>

    </div>
</body>
</html>
