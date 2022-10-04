<?php
    // session_start();
    ob_start();
    // $email = $_SESSION['email'];
    include_once 'includes/header.php';
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 mt-4 text-">
            <h5 class="text-primary fw-bold">Who We Are</h5>
            <h2>Sustainable Waste Management Solution for homes, Businesses and Communities</h2>
            <p class="mb-5">
                We are a wholly Ghanaian owned company that focuses on delivering total waste management solutions. We provide integrated waste manageent solution from waste collection, through haulage, trnsfer and sorting to recycling disposal. We are a member of the Environmental Services Providers Association (ESPA) of Ghana and a silver member of the International Solid Waste Management Association (ISWMA, USA).
            </p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-zoom btn-lg" data-bs-toggle="modal" data-bs-target="#requestModal">
                Request for waste pick up
            </button>
            <a type="submit" class="btn btn-warning btn-lg" href="pickups.php">
                View waste pick up requests
            </a>
            <?php
                if (@$_GET['msg']) {
                    if (@$_GET['cssClass']) { ?>mu$tapha
                        <div class="alert <?= $_GET['cssClass']; ?> text-center mt-2" role="alert"><?= $_GET['msg']; ?></div>
                    <?php }
                }
            ?>
        </div>

        <div class="col-md-6 mt-5">
            <img src="<?php if($role == 1) echo "<main>"; ?>img/zoomlion.jpeg" alt="zoomlion" width="100%">
            <!-- <img src="img/zoomlion.jpeg" alt="zoomlion" width="100%"> -->
        </div>
        <div class="col-md-6 mt-3 text-center">
            <div class="col-12 mt-4 mb-5">
                <h1 class="zoom_numb text-zoom" style="font-size: 100px;">14 <sup class="text-warning">+</sup></h1>
                <h2>Years Experiance</h2>
            </div>
            <div class="mt-4"></div>
            <div class="col-12 mt-4 mb-5">
                <h1 class="zoom_numb text-zoom" style="font-size: 100px;">5 Million<sup class="text-warning">+</sup></h1>
                <h2>Happy Customers</h2>
            </div> 
            <div class="mt-4"></div>
            <div class="col-12 mt-4 mb-5">
                <h1 class="zoom_numb text-zoom" style="font-size: 100px;">1 Million<sup class="text-warning">+</sup></h1>
                <h2>Free Waste Bins to be Disributed</h2>
            </div>  
            <div class="mt-4"></div>
            <div class="col-12 mt-4 mb-5">
                <h1 class="zoom_numb text-zoom" style="font-size: 100px;">90,000<sup class="text-warning">+</sup></h1>
                <h2>Workforce</h2>
            </div>
        </div>
        <?php
            // function request(){
                // global $con;
                // global $email;
                // global $value;
                // global $houseName;
                // global $houseNo;
                // global $gps;
                // global $location;
                $sql = "SELECT * FROM `house_info` WHERE `email` = '$email'";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) < 1) {
                    $error = 'Complete Your Profile';
                    header("location: register.php?error=$error");
                } else {
                    $data = mysqli_fetch_assoc($result);
                    $houseName = $data['house_name'];
                    $houseNo = $data['house_no'];
                    $gps = $data['gps'];
                    $location = $data['location']; 
                }
            // }
            
            // $sql = "SELECT * FROM `house_info` WHERE `email` = '$email'";
            // $result = mysqli_query($con, $sql);
            // if(mysqli_num_rows($result) > 0){
            //     request();
            // } else {
            //     $error = 'You have to fill this form before you can request pickup';
            //     header("location: register.php?error=$error");
            //     exit();
            // }
        ?>
        <!-- Request waste pick up Modal start -->
        <div class="modal fade" id="requestModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><h5 class="text-primary">Request For Waste Pick Up</h5></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <hr>
                        <div class="alert alert-danger text-center" id="modalAlert" role="alert"></div>
                        <!-- <form action="process.php?operation=requst_pickup" id="requestForm" method="post"> -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label for="wasteType" class="form-label">Waste Type</label>
                                        <select name="wasteType" id="wasteType" class="form-select border border-primary">
                                            <option value="select">-Select Waste Type-</option>
                                            <option value="Hazardious">Hazardious</option>
                                            <option value="Non Hazardious">Non Hazardious</option>
                                            <option value="Bio Waste">Bio Waste</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label for="size" class="form-label">Number of waste cans</label>
                                        <input type="number" name="size" class="form-control border border-primary" id="size" placeholder="Enter how many cans of waste">
                                    </div>
                                    <!-- <div class="mb-1 col-md-6"> -->
                                        <!-- <label for="email" class="form-label">email</label> -->
                                        <input type="hidden" name="email" value="<?= $email; ?>" class="form-control border border-primary" id="eamil">
                                    <!-- </div> -->
                                    <div class="mb-1 col-md-6">
                                        <label for="date" class="form-label">Date for waste pickup</label>
                                        <input type="date" name="date" class="form-control border border-primary" id="date" min="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label for="time" class="form-label">Time for waste pickup</label>
                                        <!-- <input type="week" name="time" class="form-control border border-primary" id="date" placeholder="Enter the date and time for pickup"> -->
                                         <select name="time" id="time" class="form-select border border-primary">
                                            <option value="select">-Select Time for pickup-</option>
                                            <option value="Morning">Morning</option>
                                            <option value="Afternoon">Afternoon</option>
                                            <option value="Evening">Evening</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label for="payment" class="form-label">Payment Method</label>
                                        <select name="payment" id="payment" class="form-select border border-primary">
                                            <!-- <option value="select">---Select Payment Method---</option> -->
                                            <option value="momo">Online Payment</option>
                                            <!-- <option value="manual">Manual</option> -->
                                            <!-- <option value="bioWaste">Bio Waste</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <!-- </form> -->

                        <div>
                            <h5 class="float-left text-center bg-zoom form-control text-light">Total Amout: Ghs <span id="totalAmount"></span>¢</h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="requestSubmit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Request waste pick up  Modal end -->

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payModal">
          Launch static backdrop modal
        </button> -->

        <!-- pay for waste pick up Modal start -->
        <div class="modal fade" id="payModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-zoom" id="staticBackdropLabel">Pay For Waste Pick Up</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="paymentForm">
                            <div class="row">
                                <div id="payModalBody">
                                    
                                </div>
                                <div class="form-submit">
                                    <button type="submit" class="btn btn-zoom btn-lg btn-block" onclick="payWithPaystack()"> Pay </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <script src="https://js.paystack.co/v1/inline.js"></script>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- pay for waste pick up Modal end -->
    </div>
</div>
<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);
    function payWithPaystack(e) {
      e.preventDefault();

      let handler = PaystackPop.setup({
        key: 'pk_test_bb07f7317f54ea7b19a8ffa2f02fe7bef305675d', // Replace with your public key
        email: document.getElementById("email-address").value,
        amount: document.getElementById("amount").value * 100,
        currency: "GHS",
        ref: 'Z-'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
        // label: "Optional string that replaces customer email"
        onClose: function(){
            window.location = "index.php?msg=you have canceled Payment for waste pick up";
          alert('Window closed.');
        },
        callback: function(response){
          let message = 'Payment complete! Reference: ' + response.reference;
          alert(message);
        }
      });

      handler.openIframe();
    }
</script>

<?php include_once 'contact.php'; ?>
<?php include_once 'about.php'; ?>


<?php include_once 'includes/footer.php'; ?>
</body>

</html>