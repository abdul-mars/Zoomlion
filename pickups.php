<?php
    include_once 'includes/header.php'; error_reporting(0);
?>
<div class="container">
    <div class="row mt-5">
        <?php if (@$_GET['notif_id']) {
            $id = $_GET['notif_id'];
            $sql2 = "UPDATE `notifications` SET `status`= '1', `read`='1' WHERE reason_id = '$id'";
            mysqli_query($con, $sql2);
            ?>
            <h3 class="text-zoom text-center mt-3">Postponed Waste Pick Up Request</h3>
            <div class="alert alert-danger text-center" id="alert" role="alert"></div>
            <hr>
            <div>
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Waste Type</th>
                            <th>Waste Size</th>
                            <th>Amount</th>
                            <th>Payed?</th>
                            <!-- <th>Method</th> -->
                            <th>Date Postponed to </th>
                            <th>Time Postponed to </th>
                            <th colspan="">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM `pickup_requests` WHERE `id` = '$id'";
                            $result = mysqli_query($con, $sql);
                            // $data = mysqli_fetch_assoc($result); echo $email;
                            if (mysqli_num_rows($result) == 0) {
                                echo "<h5>You currently have no waste pick up request";
                            } else {
                                $count = 1;
                                while ($data = mysqli_fetch_array($result)) { 
                                    if ($data['payed'] == 1) {
                                        $payed = '<i class="fas fa-check"></i>';
                                    } else {
                                        $payed = '<i class="fas fa-times"></i>';
                                    }
                                    ?>
                                    <tr>
                                        <th><?= $data['id']; ?></th>
                                        <td><?= $data['waste_type']; ?></td>
                                        <td><?= $data['waste_size']; ?>Kg</td>
                                        <td>Ghs <?= $data['amount']; ?></td>
                                        <td><?= $payed; ?></td>
                                        <!-- <td><?= $data['pay_method']; ?></td> -->
                                        <th><?= $data['date']; ?></th>
                                        <th><?= $data['time']; ?></th>
                                        <td><?php if ($data['payed'] == 0) { ?>
                                            <button class="btn btn-danger btn-sm cancelRequest" data-id="<?= $data['id']; ?>">Cancel</button>
                                        <?php } else { ?>
                                            <button class="btn btn-danger btn-sm" data-id="<?= $data['id']; ?>" disabled>Cancel</button>
                                        <?php } ?></td>
                                    </tr> 
                            <?php 
                                $count++;
                                }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        <?php }
        ?>
        <h3 class="text-zoom text-center mt-3">All Your Waste Pick Up Requests</h3>
        <div class="alert alert-danger text-center" id="alert" role="alert"></div>
        <hr>
        <div>
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Waste</th>
                        <!-- <th>Waste Size</th> -->
                        <th>Amount</th>
                        <th>Payed?</th>
                        <!-- <th>Method</th> -->
                        <th>Date</th>
                        <th>Time</th>
                        <th colspan="2">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM `pickup_requests` WHERE `email` = '$email' AND status = 0";
                        $result = mysqli_query($con, $sql);
                        // $data = mysqli_fetch_assoc($result); echo $email;
                        if (mysqli_num_rows($result) == 0) {
                            echo "<h5>You currently have no waste pick up request";
                        } else {
                            $count = 1;
                            while ($data = mysqli_fetch_array($result)) { 
                                if ($data['payed'] == 1) {
                                    $payed = '<i class="fas fa-check"></i>';
                                } else {
                                    $payed = '<i class="fas fa-times"></i>';
                                }
                                ?>
                                <tr>
                                    <th><?= $data['id']; ?></th>
                                    <td><?= $data['waste_type']; ?></td>
                                    <!-- <td><?= $data['waste_size']; ?>Kg</td> -->
                                    <td>Ghs <?= $data['amount']; ?>¢</td>
                                    <td><?= $payed; ?></td>
                                    <!-- <td><?= $data['pay_method']; ?></td> -->
                                    <td><?= $data['date']; ?></td>
                                    <td><?= $data['time']; ?></td>
                                    <td><?php if ($data['payed'] == 0) { ?>
                                        <button class="btn btn-danger btn-sm cancelRequest" data-id="<?= $data['id']; ?>">Cancel</button>
                                    <?php } else { ?>
                                        <button class="btn btn-danger btn-sm" data-id="<?= $data['id']; ?>" disabled>Cancel</button>
                                    <?php } ?></td>
                                    <!-- <td><button class="btn btn-zoom btn-sm payModalBtn">Pay</button></td> -->
                                    <?php if ($data['payed'] == 0) { ?>
                                        <td><a href="pay.php?id=<?= $data['id']; ?>" class="btn btn-zoom btn-sm">Pay</a></td>
                                    <?php } else {
                                        // $totalAmount = $data['amount'];
                                        $totalAmount += $data['amount']; ?>
                                        <td><button class="btn btn-zoom btn-sm" type="button" disabled>Payed</button></td>
                                    <?php } ?></td>
                                </tr> 
                        <?php 
                            $count++;
                            }
                        }
                    ?>
                    <th colspan="2">Total</th>
                    <td class="bg-primary text-light fw-bold">Ghs <?= $totalAmount; ?>¢</td>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- pay for waste pick up Modal start -->
<!-- <div class="modal fade" id="payModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-zoom" id="staticBackdropLabel">Pay For Waste Pick Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paymentForm">
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM pickup_requests WHERE email = '$email' AND payed = 0 ORDER BY id DESC LIMIT 1";
                            $result = mysqli_query($con, $sql);
                            $data = mysqli_fetch_assoc($result);
                        ?>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="email">Email Address</label>
                            <input class="form-control form-control-lg border border-primary" value="<?= $data['email']; ?>" type="email" id="email-address" required   readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="amount">Amount</label>
                            <input class="form-control form-control-lg border border-primary" value="<?= $data['amout']; ?>" type="tel" id="amount" required  readonly />
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
                <script src="https://js.paystack.co/v1/inline.js"></script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div> -->
<!-- pay for waste pick up Modal end -->

<!-- <script>
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
</script> -->




<?php
    include_once 'includes/footer.php';
?>