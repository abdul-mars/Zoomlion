<?php 
    include_once '../includes/header.php';
    include_once 'side_panel.php';
?>
<main class="mt-5 pt-3">
    <div class="container">
        <div class="mt-2 text-center">
            <a href="requests.php" class="btn btn-zoom btn-lg m-2">All Picks Ups</a>
            <!-- <button class="btn btn-zoom btn-lg m-2">Today's Pick ups</button> -->
            <a href="requests.php?page=today" class="btn btn-zoom btn-lg m-2">Today's Picks Ups</a>
            <!-- <button class="btn btn-zoom btn-lg m-2">This Week's Pick ups</button> -->
            <a href="requests.php?page=this_week" class="btn btn-zoom btn-lg m-2">This Week's Pick Ups</a>
            <!-- <button class="btn btn-zoom btn-lg m-2">This Month's Pick ups</button> -->
            <a href="requests.php?page=this_month" class="btn btn-zoom btn-lg m-2">This Month's Pick Ups</a>
        </div>

        <div class="row">
            <?php
                if (@$_GET['notif_id']) {
                    $reqId = $_GET['notif_id'];
                    $sql = "SELECT * FROM pickup_requests WHERE id = '$reqId'";
                    $result = mysqli_query($con, $sql);

                    // clear pay notification on click
                    // if (@$_GET['operation'] == 'pay_notif_seen') {
                        // $id = $_POST['id'];
                        // echo $id;
                        $sql2 = "UPDATE `notifications` SET `status`= '1', `read`='1' WHERE reason_id = '$reqId'";
                        mysqli_query($con, $sql2);
                        // echo $id;
                        // echo "<script>$('.payNotif').addClass('bg-light');</script>";
                    // }

                    ?>
                    <h2 class="text-center fw-bold text-zoom mt-2 mb-2">New Pick Up Request</h2>
                    <hr>
                    <table class="table m-1 table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <!-- <th>Place Name</th> -->
                                <!-- <th>Area</th> -->
                                <th>Waste Type</th>
                                <th>Size(Kg)</th>
                                <th>Date</th>
                                <th>Time</th>
                                <!-- <th>Payed</th> -->
                                <th colspan="4" class="text-center">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 1;
                                while($data = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <th><?= $count; ?></th>
                                <td><?= $data['email']; ?></td>
                                <!-- <td><?//= $data['house_name']; ?></td> -->
                                <!-- <td><?= $data['area']; ?></td> -->
                                <td><?= $data['waste_type']; ?></td>
                                <td><?= $data['waste_size']; ?>Kg</td>
                                <td><?= $data['date']; ?></td>
                                <td><?= $data['time']; ?></td>
                                <!-- <td>Evening</td> -->
                                <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                <td><button class="btn btn-warning btn-sm more_info" data-id="<?= $data['email']; ?>" data-bs-toggle="modal" data-bs-target="#moreInfoModal">More Info</button></td>
                                <!-- <td><button class="btn btn-primary btn-sm">View Map</button></td> -->
                                <!-- <td><a href="requests_handler.php?operation=veiw_map&location=<?= $data['location']; ?>" class="btn btn-primary btn-sm">View Map</a></td> -->
                                <!-- <td><a href="#" class="btn btn-zoom btn-sm finished">Finished</a></td> -->
                                <td><button class="btn btn-zoom btn-sm finished" data-id="<?php echo $data['id']; ?>">Finished</button></td>
                                <td><button type="button" class="btn btn-danger btn-sm postponeBtn">Postpone</button></td>
                            </tr> 
                            <?php $count++;  }
                            ?>
                        </tbody>
                    </table>
                <?php }
            ?>
            <?php
                $date = date('Y-m-d');
                // $sql = "SELECT * FROM `house_info` INNER JOIN pickup_requests ON house_info.email = pickup_requests.email";
                    $sql = "SELECT * FROM `house_info` INNER JOIN `pickup_requests` ON pickup_requests.email = house_info.email WHERE status = 0";
                $result = mysqli_query($con, $sql);
                // $data = mysqli_fetch_assoc($result);

                // #############################################################################################################
                if ((@$_GET['page'] != 'today') && (@$_GET['page']) != 'this_week' && (@$_GET['page']) != 'this_month') { ?>
                    <h2 class="text-center fw-bold text-zoom mt-2 mb-2">All Pick Up Request</h2>
                    <hr>
                    <?php
                        if (@$_GET['msg']) {
                            if (@$_GET['alertClass']) { ?>
                              <div class="alert text-center <?= $_GET['alertClass']; ?>" role='alert'>
                                  <?= $_GET['msg']; ?>
                              </div>  
                    <?php   }
                        }
                    ?>
                    <table class="table m-1 table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Client</th>
                                <!-- <th>Place Name</th> -->
                                <th>Area</th>
                                <th>Waste Type</th>
                                <th>Size(Kg)</th>
                                <th>Date</th>
                                <th>Time</th>
                                <!-- <th>Payed</th> -->
                                <th colspan="4" class="text-center">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 1;
                                while($data = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <th><?= $count; ?></th>
                                <td><?= $data['email']; ?></td>
                                <!-- <td><?//= $data['house_name']; ?></td> -->
                                <td><?= $data['area']; ?></td>
                                <td><?= $data['waste_type']; ?></td>
                                <td><?= $data['waste_size']; ?>Kg</td>
                                <td><?= $data['date']; ?></td>
                                <td><?= $data['time']; ?></td>
                                <!-- <td>Evening</td> -->
                                <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                <td><button class="btn btn-warning btn-sm more_info" data-id="<?= $data['email']; ?>" data-bs-toggle="modal" data-bs-target="#moreInfoModal">More Info</button></td>
                                <!-- <td><button class="btn btn-primary btn-sm">View Map</button></td> -->
                                <td><a href="requests_handler.php?operation=veiw_map&location=<?= $data['location']; ?>" class="btn btn-primary btn-sm">View Map</a></td>
                                <!-- <td><a href="#" class="btn btn-zoom btn-sm finished">Finished</a></td> -->
                                <td><button class="btn btn-zoom btn-sm finished" data-id="<?php echo $data['id']; ?>">Finished</button></td>
                                <td><button type="button" class="btn btn-danger btn-sm postponeBtn">Postpone</button></td>
                            </tr> 
                            <?php $count++;  }
                            ?>
                        </tbody>
                    </table>
            <?php
                }

            // #############################################################################################################
                
                // today's pickups
                if (@$_GET['page'] == 'today') {
                    $date = date('Y-m-d');
                    $sql = "SELECT * FROM `house_info` INNER JOIN `pickup_requests` ON pickup_requests.email = house_info.email WHERE pickup_requests.date = '$date' AND status = 0";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) != 0) { ?>
                        <h2 class="text-center fw-bold text-zoom mt-2 mb-2">Todays Pick Up Request</h2>
                        <hr>
                        <table class="table m-1 table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <!-- <th>Place Name</th> -->
                                    <th>Area</th>
                                    <th>Waset Type</th>
                                    <th>Size(Kg)</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <!-- <th>Payed</th> -->
                                    <th colspan="4" class="text-center">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    while($data = mysqli_fetch_array($result)){ ?>
                                <tr>
                                    <th><?= $count; ?></th>
                                    <td><?= $data['email']; ?></td>
                                    <!-- <td><?//= $data['house_name']; ?></td> -->
                                    <td><?= $data['area']; ?></td>
                                    <td><?= $data['waste_type']; ?></td>
                                    <td><?= $data['waste_size']; ?>Kg</td>
                                    <td><?= $data['date']; ?></td>
                                    <td><?= $data['time']; ?></td>
                                    <!-- <td>Evening</td> -->
                                    <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                    <td><button class="btn btn-warning btn-sm more_info" data-id="<?= $data['email']; ?>" data-bs-toggle="modal" data-bs-target="#moreInfoModal">More Info</button></td>
                                    <!-- <td><button class="btn btn-primary btn-sm">View Map</button></td> -->
                                    <td><a href="requests_handler.php?operation=veiw_map&location=<?= $data['location']; ?>" class="btn btn-primary btn-sm">View Map</a></td>
                                    <td><a href="#" class="btn btn-zoom btn-sm finished" data-id="<?php echo $data['id']; ?>">Finished</a></td>
                                    <td><button type="button" class="btn btn-danger btn-sm postponeBtn">Postpone</button></td>
                                </tr> 
                                <?php $count++;  }
                                ?>
                            </tbody>
                        </table> 
                    <?php
                        
                    } else {
                       echo 'No Pick Up Request For Today'; 
                   }
                }

                // #############################################################################################################

                // this week's pickups
                if (@$_GET['page'] == 'this_week') {
                    // $date = date('Y-m-d');
                    $sql = "SELECT * FROM `house_info` INNER JOIN `pickup_requests` ON pickup_requests.email = house_info.email WHERE status = 0 AND pickup_requests.date > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>

                        <h2 class="text-center fw-bold text-zoom mt-2 mb-2">This Week's Pick Up Request</h2>
                        <hr>
                        <table class="table m-1 table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <!-- <th>Place Name</th> -->
                                    <th>Area</th>
                                    <th>Waset Type</th>
                                    <th>Size(Kg)</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <!-- <th>Payed</th> -->
                                    <th colspan="4" class="text-center">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    while($data = mysqli_fetch_array($result)){ ?>
                                <tr>
                                    <th><?= $count; ?></th>
                                    <td><?= $data['email']; ?></td>
                                    <!-- <td><?//= $data['house_name']; ?></td> -->
                                    <td><?= $data['area']; ?></td>
                                    <td><?= $data['waste_type']; ?></td>
                                    <td><?= $data['waste_size']; ?>Kg</td>
                                    <td><?= $data['date']; ?></td>
                                    <td><?= $data['time']; ?></td>
                                    <!-- <td>Evening</td> -->
                                    <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                    <td><button class="btn btn-warning btn-sm more_info" data-id="<?= $data['email']; ?>" data-bs-toggle="modal" data-bs-target="#moreInfoModal">More Info</button></td>
                                    <!-- <td><button class="btn btn-primary btn-sm">View Map</button></td> -->
                                    <td><a href="requests_handler.php?operation=veiw_map&location=<?= $data['location']; ?>" class="btn btn-primary btn-sm">View Map</a></td>
                                    <td><a href="#" class="btn btn-zoom btn-sm finished" data-id="<?php echo $data['id']; ?>">Finished</a></td>
                                    <td><button type="button" class="btn btn-danger btn-sm postponeBtn">Postpone</button></td>
                                </tr> 
                                <?php $count++;  }
                                ?>
                            </tbody>
                        </table> 
                    <?php
                        
                    } else {
                       echo 'No Pick Up Request For Today'; 
                   }
                }

                // #############################################################################################################

                // this month's pickups
                if (@$_GET['page'] == 'this_month') {
                    $date = date('Y-m-d');
                    $sql = "SELECT * FROM `house_info` INNER JOIN `pickup_requests` ON pickup_requests.email = house_info.email WHERE status = 0 AND pickup_requests.date > DATE_SUB(NOW(), INTERVAL 1 MONTH)";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) { ?>

                        <h2 class="text-center fw-bold text-zoom mt-2 mb-2">This Month's Pick Ups Requests</h2>
                        <hr>
                        <table class="table m-1 table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <!-- <th>Place Name</th> -->
                                    <th>Area</th>
                                    <th>Waset Type</th>
                                    <th>Size(Kg)</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <!-- <th>Payed</th> -->
                                    <th colspan="4" class="text-center">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    while($data = mysqli_fetch_array($result)){ ?>
                                <tr>
                                    <th><?= $count; ?></th>
                                    <td><?= $data['email']; ?></td>
                                    <!-- <td><?//= $data['house_name']; ?></td> -->
                                    <td><?= $data['area']; ?></td>
                                    <td><?= $data['waste_type']; ?></td>
                                    <td><?= $data['waste_size']; ?>Kg</td>
                                    <td><?= $data['date']; ?></td>
                                    <td><?= $data['time']; ?></td>
                                    <!-- <td>Evening</td> -->
                                    <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                    <td><button class="btn btn-warning btn-sm more_info" data-id="<?= $data['email']; ?>" data-bs-toggle="modal" data-bs-target="#moreInfoModal">More Info</button></td>
                                    <!-- <td><button class="btn btn-primary btn-sm">View Map</button></td> -->
                                    <td><a href="requests_handler.php?operation=veiw_map&location=<?= $data['location']; ?>" class="btn btn-primary btn-sm">View Map</a></td>
                                    <td><a href="#" class="btn btn-zoom btn-sm finished" data-id="<?php echo $data['id']; ?>">Finished</a></td>
                                    <td><button type="button" class="btn btn-danger btn-sm postponeBtn">Postpone</button></td>
                                </tr> 
                                <?php $count++;  }
                                ?>
                            </tbody>
                        </table> 
                    <?php
                        
                    } else {
                       echo 'No Pick Up Request For Today'; 
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