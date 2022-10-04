<?php
    include_once 'includes/header.php';
    if (@$_GET['id']) {
        $id = $_GET['id'];
        $_SESSION['pay_for_id'] = $id; ?>
   
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3"></div>
            <div class="card text-white bg-primary mt-5 col-md-6" >
              <div class="card-header h2">Pay For Waste Pick Up</div>
              <div class="card-body ">
                <h5 class="card-title"></h5>
                <form id="paymentForm">
                    <div class="row m">
                        <?php
                        $sql = "SELECT * FROM pickup_requests WHERE email = '$email' AND id = $id";
                        $result = mysqli_query($con, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="email">Email Address</label>
                            <input class="form-control form-control-lg border border-primary" value="<?= $data['email']; ?>" type="email" id="email-address" required   readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="amount">Amount</label>
                            <input class="form-control form-control-lg border border-primary" value="<?= $data['amount']; ?>" type="tel" id="amount" required  readonly />
                        </div>
                        <?php
                        $sql = "SELECT * FROM userstable WHERE email = '$email'";
                        $result = mysqli_query($con, $sql);
                        $data = mysqli_fetch_assoc($result);
                        ?>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="first-name">First Name</label>
                            <input class="form-control form-control-lg border border-primary" value="<?= $data['firstname']; ?>" type="text" id="first-name"   readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="last-name">Last Name</label>
                            <input class="form-control form-control-lg border border-primary" value="<?= $data['surname']; ?>" type="text" id="last-name"  readonly  />
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-zoom btn-lg btn-block" onclick="payWithPaystack()"> Pay </button>
                        </div>
                    </div>
                </form> 
              </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <script>
            // paystack js code
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
              window.location = "http://localhost/zoomlion/verify_transaction.php?reference=" + response.reference;

              
            }
          });

          handler.openIframe();
        }
    </script>
    <script src="https://js.paystack.co/v1/inline.js"></script>


<?php 
     }
    include_once 'includes/header.php';