<?php $page_title='Bharari App'; include('includes/header.php'); ?>
  <!-- location map start -->
  <div class="location-map" id="map"></div>
  <!-- location map end -->

  <!-- location popup start -->
  <div class="location-popup">
    <div class="change-location">
      <div class="d-flex align-items-center gap-2">
        <i class="ri-map-pin-line"></i>
        <h2>Ontario</h2>
      </div>
      <a href="address.php" class="change-add theme-color">Change</a>
    </div>
    <p class="address mt-2 mb-0 p-0">World of Maps, 1191 Wellington St. W, Ottawa, ONTARIO K1Y 2Z6, Canada</p>
    <a href="payment-method.php" class="btn theme-btn confirm-location-btn w-100">Confirm Location</a>
  </div>
  <!-- location popup end -->

  <!-- google map js -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw"></script>
  <script src="../assets/js/location-map.js"></script>

<?php include('includes/footer.php'); ?>