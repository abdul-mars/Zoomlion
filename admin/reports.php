<?php 
    include_once '../includes/header.php';
    include_once 'side_panel.php';
?>
<main class="mt-5 pt-3">
    <div class="container">
        <div class="mt-2 text-center">
            <!-- <a href="reports.php" class="btn btn-primary btn-lg m-2">All Reports</a> -->
            <!-- <button class="btn btn-primary btn-lg m-2">Today's Pick ups</button> -->
            <a href="reports.php?page=today" class="btn btn-zoom btn-lg m-2 today">Today's Reports</a>
            <!-- <button class="btn btn-zoom btn-lg m-2">This Week's Pick ups</button> -->
            <a href="reports.php?page=this_week" class="btn btn-zoom btn-lg m-2 this_week">This Week's Reports</a>
            <!-- <button class="btn btn-zoom btn-lg m-2">This Month's Reports</button> -->
            <a href="reports.php?page=this_month" class="btn btn-zoom btn-lg m-2 this_month">This Month's Reports</a>
        </div>

        <div class="row">
            <?php
                $date = date('Y-m-d');
                // $sql = "SELECT * FROM `house_info` INNER JOIN pickup_requests ON house_info.email = pickup_requests.email";
                    $sql = "SELECT * FROM `house_info` INNER JOIN `pickup_requests` ON pickup_requests.email = house_info.email WHERE status = 0";
                // $sql = "SELECT * FROM pickup_requests WHERE status = 1";
                $result = mysqli_query($con, $sql);
                // $data = mysqli_fetch_assoc($result);

                // #############################################################################################################
               

            // #############################################################################################################
                
                // today's pickups
                if (@$_GET['page'] == 'today') {
                    $date = date('Y-m-d');
                    $sql = "SELECT * FROM `house_info` INNER JOIN `pickup_requests` ON pickup_requests.email = house_info.email WHERE pickup_requests.date = '$date'";
                    $result = mysqli_query($con, $sql);
                    $sql1 = "SELECT * FROM pickup_requests WHERE date = '$date'";
                    $sql2 = "SELECT * FROM pickup_requests WHERE date = '$date' AND status = 1";
                    if (mysqli_num_rows($result) != 0) { ?>
                        <h2 class="text-center fw-bold text-primary mt-2 mb-2">Todays Reports</h2>
                        <p class="text-center">Out of <?php echo mysqli_num_rows(mysqli_query($con, $sql1)); ?> requsts for waste pickup for today, <?php echo mysqli_num_rows(mysqli_query($con, $sql2)); ?> was attended and two were postponed.
                        Total Amount of 200ghc was recieved as payment for waste pickup
                        Below is a summary table of todays report</p>
                        <hr>
                        <table class="table m-1 table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <!-- <th>Place Name</th> -->
                                    <th>Area</th>
                                    <th>Waset Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Attended?</th>
                                    <!-- <th colspan="4" class="text-center">Operations</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    $total = 0;
                                    while($data = mysqli_fetch_array($result)){ 
                                        if ($data['status'] == 1) {
                                            $status = '<i class="fas fa-check"></i>';
                                        } else {
                                            $status = '<i class="fas fa-times"></i>';
                                        }
                                        ?>
                                <tr>
                                    <th><?= $count; ?></th>
                                    <td><?= $data['email']; ?></td>
                                    <!-- <td><?= $data['house_name']; ?></td> -->
                                    <td><?= $data['area']; ?></td>
                                    <td><?= $data['waste_type']; ?></td>
                                    <td>Ghs <?= $data['amount']; ?>¢</td>
                                    <td><?= $data['date']; ?></td>
                                    <td><?= $data['time']; ?></td>
                                    <td><?= $status; ?></td>
                                    <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                    <!-- <td><button class="btn btn-warning btn-sm more_info" data-id="<?= $data['email']; ?>" data-bs-toggle="modal" data-bs-target="#moreInfoModal">More Info</button></td> -->
                                    <!-- <td><button class="btn btn-primary btn-sm">View Map</button></td> -->
                                    <!-- <td><a href="requests_handler.php?operation=veiw_map&location=<?= $data['location']; ?>" class="btn btn-primary btn-sm">View Map</a></td>
                                    <td><a href="#" class="btn btn-zoom btn-sm finished" data-id="<?php echo $data['id']; ?>">Finished</a></td>
                                    <td><button type="button" class="btn btn-danger btn-sm postponeBtn">Postpone</button></td> -->
                                </tr> 
                                <?php 
                                    $total = $total + $data['amount'];
                                    $count++; 
                                    }
                                ?>
                                <tr class="btn-zoom total">
                                    <th  class="total" colspan="7">Total</th>
                                    <th>Ghs <?= $total; ?>¢</th>
                                </tr>
                            </tbody>
                        </table> 
                        <div class="row">
                            <button class="btn btn-zoom btn-block m-2 printBtn" onclick="window.print();">Print</button>
                        </div>
                    <?php
                        
                    } else {
                       echo 'No Reports For Today'; 
                   }
                }

                // #############################################################################################################

                // this week's pickups
                if (@$_GET['page'] == 'this_week') {
                    // $date = date('Y-m-d');
                    $sql = "SELECT * FROM `house_info` INNER JOIN `pickup_requests` ON pickup_requests.email = house_info.email WHERE pickup_requests.date > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                    $sql1 = "SELECT * FROM pickup_requests WHERE date > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                    $sql2 = "SELECT * FROM pickup_requests WHERE status = 1 AND date > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>
                        <h2 class="text-center fw-bold text-primary mt-2 mb-2">This Week's Reports</h2>
                        <hr>
                        <p class="text-center">Out of <?php echo mysqli_num_rows(mysqli_query($con, $sql1)); ?> requsts for waste pickup this week, <?php echo mysqli_num_rows(mysqli_query($con, $sql2)); ?> was attended.
                        Total Amount of 200ghc was recieved as payment for waste pickup
                        Below is a summary table for this week's report</p>
                        <table class="table m-1 table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <!-- <th>Place Name</th> -->
                                    <th>Town</th>
                                    <th>Waset Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Attended?</th>
                                    <!-- <th colspan="4" class="text-center">Operations</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    $total = 0;
                                    while($data = mysqli_fetch_array($result)){ 
                                        if ($data['status'] == 1) {
                                            $status = '<i class="fas fa-check"></i>';
                                        } else {
                                            $status = '<i class="fas fa-times"></i>';
                                        }
                                        ?>
                                <tr>
                                    <th><?= $count; ?></th>
                                    <td><?= $data['email']; ?></td>
                                    <!-- <td><?= $data['house_name']; ?></td> -->
                                    <td><?= $data['town']; ?></td>
                                    <td><?= $data['waste_type']; ?></td>
                                    <td>Ghs <?= $data['amount']; ?>¢</td>
                                    <td><?= $data['date']; ?></td>
                                    <td><?= $data['time']; ?></td>
                                    <td><?= $status; ?></td>
                                    <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                    <!-- <td><button class="btn btn-warning btn-sm more_info" data-id="<?= $data['email']; ?>" data-bs-toggle="modal" data-bs-target="#moreInfoModal">More Info</button></td> -->
                                    <!-- <td><button class="btn btn-primary btn-sm">View Map</button></td> -->
                                    <!-- <td><a href="requests_handler.php?operation=veiw_map&location=<?= $data['location']; ?>" class="btn btn-primary btn-sm">View Map</a></td>
                                    <td><a href="#" class="btn btn-zoom btn-sm finished" data-id="<?php echo $data['id']; ?>">Finished</a></td>
                                    <td><button type="button" class="btn btn-danger btn-sm postponeBtn">Postpone</button></td> -->
                                </tr> 
                                <?php
                                    $total = $total + $data['amount'];
                                    $count++;
                                    }
                                ?>
                                <tr class="btn-zoom">
                                    <th colspan="7">Total</th>
                                    <th>Ghs <?= $total; ?>¢</th>
                                </tr>
                            </tbody>
                        </table>  
                        <div class="row">
                            <button class="btn btn-zoom btn-block m-2 printBtn" onclick="window.print();">Print</button>
                        </div>
                    <?php
                        
                    } else {
                       echo 'No Reports For Today'; 
                   }
                }

                // #############################################################################################################

                // this month's pickups
                if (@$_GET['page'] == 'this_month') {
                    $date = date('Y-m-d');
                    $sql = "SELECT * FROM `house_info` INNER JOIN `pickup_requests` ON pickup_requests.email = house_info.email WHERE pickup_requests.date > DATE_SUB(NOW(), INTERVAL 1 MONTH)";

                    $sql1 = "SELECT * FROM pickup_requests WHERE date > DATE_SUB(NOW(), INTERVAL 1 MONTH)";
                    $sql2 = "SELECT * FROM pickup_requests WHERE status = 1 AND date > DATE_SUB(NOW(), INTERVAL 1 MONTH)";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>
                        <h2 class="text-center fw-bold text-primary mt-2 mb-2">This Month's Reports</h2>
                        <hr>
                        <p class="text-center">Out of <?php echo mysqli_num_rows(mysqli_query($con, $sql1)); ?> requsts for waste pickup this month, <?php echo mysqli_num_rows(mysqli_query($con, $sql2)); ?> was attended.
                        Total Amount of 200ghc was recieved as payment for waste pickup
                        Below is a summary table for this week's report</p>
                        <table class="table m-1 table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <!-- <th>Place Name</th> -->
                                    <th>Town</th>
                                    <th>Waset Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Attended?</th>
                                    <!-- <th colspan="4" class="text-center">Operations</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    $total = 0;
                                    while($data = mysqli_fetch_array($result)){ 
                                        if ($data['status'] == 1) {
                                            $status = '<i class="fas fa-check"></i>';
                                        } else {
                                            $status = '<i class="fas fa-times"></i>';
                                        }
                                        ?>
                                <tr>
                                    <th><?= $count; ?></th>
                                    <td><?= $data['email']; ?></td>
                                    <!-- <td><?= $data['house_name']; ?></td> -->
                                    <td><?= $data['town']; ?></td>
                                    <td><?= $data['waste_type']; ?></td>
                                    <td>Ghs <?= $data['amount']; ?>¢</td>
                                    <td><?= $data['date']; ?></td>
                                    <td><?= $data['time']; ?></td>
                                    <td><?= $status; ?></td>
                                    <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                    <!-- <td><button class="btn btn-warning btn-sm more_info" data-id="<?= $data['email']; ?>" data-bs-toggle="modal" data-bs-target="#moreInfoModal">More Info</button></td> -->
                                    <!-- <td><button class="btn btn-primary btn-sm">View Map</button></td> -->
                                    <!-- <td><a href="requests_handler.php?operation=veiw_map&location=<?= $data['location']; ?>" class="btn btn-primary btn-sm">View Map</a></td>
                                    <td><a href="#" class="btn btn-zoom btn-sm finished" data-id="<?php echo $data['id']; ?>">Finished</a></td>
                                    <td><button type="button" class="btn btn-danger btn-sm postponeBtn">Postpone</button></td> -->
                                </tr> 
                                <?php
                                    $total = $total + $data['amount'];
                                    $count++; 
                                    }
                                ?>
                                <tr class="btn-zoom">
                                    <th colspan="7">Total</th>
                                    <th>Ghs <?= $total; ?>¢</th>
                                </tr>
                            </tbody>
                        </table>  
                        <div class="row">
                            <button class="btn btn-zoom btn-block m-2 printBtn" onclick="window.print();">Print</button>
                        </div>
                    <?php
                        
                    } else {
                       echo 'No Reports For Today'; 
                   }
                }
            ?>
            <!-- ##############################################################################################3 -->
            <!-- Modal -->
            <div class="modal fade" id="moreInfoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-zoom" id="staticBackdropLabel">More Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body moreInfoModalBody">

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                  </div>
                </div>
              </div>
            </div>

            <!-- // ############################################################################################################# -->

            <!-- postpone pop up Modal start -->
            <div class="modal fade" id="postponeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Postpone Waste Pick Up</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="requests_handler.php" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="email" id="email">
                                    <div class="mb-2 col-md-6">
                                        <label for="oldDate" class="form-label">Old Date</label>
                                        <input type="text" class="form-control" name="oldDate" id="oldDate" readonly>
                                        <!-- <input type="hidden" class="form-control" name="oldDate" id="oldDate"> -->
                                    </div>
                                    <div class="mb-2 col-md-6">
                                        <label for="oldTime" class="form-label">Old Time</label>
                                        <input type="text" class="form-control" name="oldTime" id="oldTime" disabled>
                                    </div>
                                    <!-- <input type="text" id="time2" class="form-control"> -->
                                    <div class="mb-3 col-md-6">
                                        <label for="date" class="form-label">New Date</label>
                                        <input type="date" name="date" id="date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="time" class="form-label">New Time</label>
                                        <!-- <input type="time" class="form-control" name="time" id="time"> -->
                                        <select name="time" id="time" class="form-select" id="time">
                                            <option value="">---Select New Time</option>
                                            <option value="Morning">Morning</option>
                                            <option value="Afternoon">Afternoon</option>
                                            <option value="Evening">Evening</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="postponeSubmit">Postpone</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- postpone pop up Modal end -->

            <!-- // ############################################################################################################# -->

        </div>
    </div>
</main>


<?php 
    include_once '../includes/footer.php';
?>
<script>
    // $(document).ready(function(){
    //     $('.postponeBtn').on('click', function(){
    //         $('#postponeModal').modal('show');
    //         $tr = $(this).closest('tr');

    //         var data = $tr.children("td").map(function(){
    //             return $(this).text();
    //         }).get();

    //         console.log(data);
    //         $('#email').val(data['0']);
    //         $('#oldDate').val(data[4]);
    //         $('#oldTime').val(data[5]);
    //         // console.log($('#time').val(data[5]));

    //     });
    // });
</script>