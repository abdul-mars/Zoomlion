<?php 
    include_once '../includes/header.php';
    include_once 'side_panel.php';
?>
<!-- main start --> 
<main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fw-bold fs-3">Dashboard</div>
            </div>
            <!-- cards start -->
            <div class="row">
                <!-- request card -->
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-zoom">
                            <!-- <div class="card-header">Header</div> -->
                        <a href="requests.php" class="text-light text-decoration-none">
                            <div class="card-body">
                                <h5 class="card-title text-center">Pick Up Requests</h5>
                                <div class="row">
                                    <div class="col-6 text-center"><sup><i class="far fa-trash-alt fa-2x"></i></sup><i class="fas fa-truck-pickup fa-4x text-mted" style="width: 70px !important; height: 70px;"></i></div>
                                    <div class="col-6">10 Requests Today, 75 In This Week</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                view details
                            </div>
                        </div>
                    </a>
                </div>
 
                <!-- users card -->
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-warning">
                            <!-- <div class="card-header">Header</div> -->
                            <a href="users.php" class="text-dark text-decoration-none">
                            <div class="card-body">
                                <h5 class="card-title text-center">Manage Users</h5>
                                <div class="row">
                                    <div class="col-6 text-center"><i class="far fa-user fa-4x text-mted" style="width: 70px !important; height: 70px;"></i></div>
                                    <div class="col-6">20 new users, 200 in Total</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                view details
                            </div>
                        </div>
                    </a>
                </div>
 
                <!-- request card -->
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-danger">
                            <!-- <div class="card-header">Header</div> -->
                            <a href="#" class="text-light text-decoration-none">
                            <div class="card-body">
                                <h5 class="card-title text-center">Payments</h5>
                                <div class="row">
                                    <div class="col-6 text-center"><i class="far fa-credit-card fa-4x text-mted" style="width: 70px !important; height: 70px;"></i></div>
                                    <div class="col-6">20 Payments pending</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                view details
                            </div>
                        </div>
                    </a>
                </div>
 
                <!-- request card -->
                <div class="col-md-3 mb-3">
                    <div class="card text-white bg-dark">
                            <!-- <div class="card-header">Header</div> -->
                            <a href="reports.php?page=today" class="text-light text-decoration-none">
                            <div class="card-body">
                                <h5 class="card-title text-center">Report</h5>
                                <div class="row">
                                    <div class="col-6 text-center"><i class="fas fa-info fa-4x text-mted" style="width: 70px !important; height: 70px;"></i></div>
                                    <div class="col-6">daily, weekly or monthly report</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                view details
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- cards end -->

            <!-- charts start -->
            <div class="row">
                <!-- <h2 class="text-center">Today's Pick Ups</h2> -->
                <div>
                <?php
                    $date = date('Y-m-d');
                    $sql = "SELECT * FROM `pickup_requests` INNER JOIN `house_info` ON pickup_requests.email = house_info.email WHERE pickup_requests.date = '$date'";
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) != 0) { ?>
                        <h2 class="text-center fw-bold text-primary mt-2 mb-2">Todays Pick Up Request</h2>
                        <hr>
                        <table class="table m-1 table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Place Name</th>
                                    <th>Area</th>
                                    <th>Waset Type</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <!-- <th>Payed</th> -->
                                    <th colspan="3" class="text-center">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    while($data = mysqli_fetch_array($result)){ ?>
                                <tr>
                                    <th><?= $count; ?></th>
                                    <td><?= $data['email']; ?></td>
                                    <td><?= $data['house_name']; ?></td>
                                    <td><?= $data['area']; ?></td>
                                    <td><?= $data['waste_type']; ?></td>
                                    <td><?= $data['date']; ?></td>
                                    <td><?= $data['time']; ?></td>
                                    <!-- <td>Evening</td> -->
                                    <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                    <td><button class="btn btn-warning btn-sm more_info" data-id="<?= $data['email']; ?>" data-bs-toggle="modal" data-bs-target="#moreInfoModal">More Info</button></td>
                                    <!-- <td><button class="btn btn-primary btn-sm">View Map</button></td> -->
                                    <td><a href="requests_handler.php?operation=veiw_map&location=<?= $data['location']; ?>" class="btn btn-primary btn-sm">View Map</a></td>
                                    <td><button type="button" class="btn btn-danger btn-sm postponeBtn">Postpone</button></td>
                                </tr> 
                                <?php $count++;  }
                                ?>
                            </tbody>
                        </table> 
                    <?php
                        
                    } else {
                        $sql = "SELECT * FROM `pickup_requests` INNER JOIN `house_info` ON pickup_requests.email = house_info.email WHERE pickup_requests.date > DATE_SUB(NOW(), INTERVAL 1 WEEK)";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0) { ?>

                            <h2 class="text-center fw-bold text-primary mt-2 mb-2">This Week's Pick Up Request</h2>
                            <hr>
                            <table class="table m-1 table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Place Name</th>
                                        <th>Area</th>
                                        <th>Waset Type</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <!-- <th>Payed</th> -->
                                        <th colspan="2" class="text-center">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 1;
                                        while($data = mysqli_fetch_array($result)){ ?>
                                    <tr>
                                        <th><?= $count; ?></th>
                                        <td><?= $data['email']; ?></td>
                                        <td><?= $data['house_name']; ?></td>
                                        <td><?= $data['area']; ?></td>
                                        <td><?= $data['waste_type']; ?></td>
                                        <td><?= $data['date']; ?></td>
                                        <td><?= $data['time']; ?></td>
                                        <!-- <td>Evening</td> -->
                                        <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                        <td><button class="btn btn-warning btn-sm more_info" data-id="<?= $data['email']; ?>" data-bs-toggle="modal" data-bs-target="#moreInfoModal">More Info</button></td>
                                        <!-- <td><button class="btn btn-primary btn-sm">View Map</button></td> -->
                                        <td><a href="requests_handler.php?operation=veiw_map&location=<?= $data['location']; ?>" class="btn btn-primary btn-sm">View Map</a></td>
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
                   } ?>
                </div>
            </div>
            <!-- charts end -->
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
    </main>
    <!-- main end -->





<?php 
    include_once '../includes/footer.php';
?>