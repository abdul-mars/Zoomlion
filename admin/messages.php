<?php
    include_once '../includes/header.php';
    include_once 'side_panel.php';
?>
<main class="mt-5 pt-3">
    <div class="container">
        <div class="mt-2 text-center">
            <a href="messages.php" class="btn btn-primary btn-lg m-2">All Messages</a>
            <!-- <button class="btn btn-primary btn-lg m-2">Today's Pick ups</button> -->
            <a href="messages.php?page=unread" class="btn btn-primary btn-lg m-2">New Messages</a>
        </div>

        <div class="row">
            <?php
                // ### ### ###  ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ###
                $sql = "SELECT * FROM messages";
                $result = mysqli_query($con, $sql);

                if ((@$_GET['page'] != 'unread')) { ?>
                    <h2 class="text-center fw-bold text-primary mt-2 mb-2">All Messages</h2>
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
                    <div class="alert alert-danger text-center" id="alert" role="alert"></div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date Sent</th>
                                <th>Time Sent</th>
                                <!-- <th>Time</th> -->
                                <!-- <th>Payed</th> -->
                                <th colspan="" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 1;
                                while($data = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <th><?= $count; ?></th>
                                <td><?= $data['name']; ?></td>
                                <td><?= $data['email']; ?></td>
                                <td><?= $data['message']; ?></td>
                                <td><?= $data['date_sent']; ?></td>
                                <td><?= $data['time_sent']; ?></td>
                                <!-- <td>Evening</td> -->
                                <!-- <td class="text-center"><i class="fas fa-check"></i></td> -->
                                <!-- <td><button class="btn btn-warning btn">More Info</button></td> -->
                                <td><button type="button" class="btn btn-primary btn-sm msgReply" data-bs-toggle="modal" data-bs-target="#id<?= $data['id']; ?>">Reply</button></td>
                                <td>
                                    <!-- <button class="btn btn-sm msgReply" data-bs-toggle="modal" data-bs-target="#id<?= $data['id']; ?>"><i class="far fa-envelope fa-2x"></i></button> -->
                                    <button class="btn btn-sm msgReplyg" data-bs-toggle="modal" data-bs-target="#whatsapp<?= $data['id']; ?>"><i class="fab fa-whatsapp fa-2x"></i></button>
                                    
                                </td>
                                <!-- <td><button type="button" class="btn btn-danger btn-sm">Delete</button></td> -->
                            </tr>

                            <!-- message reply via email Modal start -->
                            <div class="modal fade replyModal" id="id<?= $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-zoom" id="staticBackdropLabel">Reply Message Via Email</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="messages_handler.php" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email Replying To</label>
                                                        <input type="email" name="email" id="email" class="form-control form-control-sm" value="<?= $data['email']; ?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="toMsg" class="form-label">Message Replying To</label>
                                                        <!-- <input type="text" name="toMsg" class="form-control" id="toMsg" value="<?= $data['message']; ?>" readonly> -->
                                                        <textarea name="toMsg" id="toMsg" cols="" rows="2" class="form-control form-control-lg border border-primary" readonly><?= $data['message']; ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="replyMsg" class="form-label">Your Reply</label>
                                                        <textarea class="form-control form-control-lg border border-primary" name="replyMsg" id="replyMsg" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                <div class="spin">
                                                    <button type="submit" name="replyMsgBtn" class="btn btn-zoom replyMsgBtn">
                                                        Reply
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- message reply via whatsapp Modal start -->
                            <div class="modal fade replyModal" id="whatsapp<?= $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-zoom" id="staticBackdropLabel">Reply Message Via Whatsapp</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="example.php" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <?php $whatEmail = $data['email'];
                                                            $sql2 = mysqli_query($con, "SELECT * FROM userstable WHERE email = '$whatEmail'");
                                                            $data2 = mysqli_fetch_array($sql2);
                                                            $whatsapp = substr($data2['phone'], 1);
                                                            $whatsapp = '+233'.$whatsapp;
                                                        ?>
                                                        <label for="email" class="form-label">Number Replying To</label>
                                                        <input type="text" name="whatsNo" id="email" class="form-control form-control-sm" value="<?= $whatsapp; ?>" >
                                                        <input type="hidden" name="name" value="<?= $data2['firstname']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="toMsg" class="form-label">Message Replying To</label>
                                                        <!-- <input type="text" name="toMsg" class="form-control" id="toMsg" value="<?= $data['message']; ?>" readonly> -->
                                                        <textarea name="toMsg" id="toMsg" cols="" rows="2" class="form-control form-control-lg border border-primary" readonly><?= $data['message']; ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="replyMsg" class="form-label">Your Reply</label>
                                                        <textarea class="form-control form-control-lg border border-primary" name="replyMsg" id="replyMsg" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="spinner-border" id="spinner" role="status">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="replyWhatsMsg" class="btn btn-zoom">
                                                    Reply
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php $count++;  }
                            ?>
                        </tbody>
                    </table>
            <?php
                }
                // ### ### ###  ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ###
                // New Message
                if (@$_GET['page'] == 'unread') {
                    $sql = "SELECT * FROM messages ORDER BY id DESC LIMIT 5";
                    $result = mysqli_query($con, $sql); ?>

                    <h2 class="text-center fw-bold text-primary mt-2 mb-2">Newest Messages</h2>
                    <div class="alert alert-danger text-center" id="alert" role="alert"></div>
                    <?php
                        if (@$_GET['msg']) { ?>
                            <?php if(@$_GET['cssClass']){ $cssClass = $_GET['cssClass'] ?>
                            <div class="alert <?= $cssClass; ?> text-center" role="alert">
                                <i class="<?php if($cssClass == 'alert-danger'){ echo 'fas fa-exclamation-triangle'; }else{echo 'fas fa-check';} ?>"></i> <?= $_GET['msg']; ?>
                            </div>
                        <?php } }
                    ?> <hr>
                    <hr>
                    <table class="table m-1 table-hover">
                        <thead>
                            <tr>
	                            <th>#</th>
	                            <th>Name</th>
	                            <th>Email</th>
	                            <th>Message</th>
	                            <th>Date Sent</th>
	                            <th>Time Sent</th>
	                            <th colspan="" class="text-center">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php
	                            $count = 1;
	                            while($data = mysqli_fetch_array($result)){ ?>
	                        <tr>
	                            <th><?= $count; ?></th>
	                            <td><?= $data['name']; ?></td>
	                            <td><?= $data['email']; ?></td>
	                            <td><?= $data['message']; ?></td>
	                            <td><?= $data['date_sent']; ?></td>
	                            <td><?= $data['time_sent']; ?></td>
	                            <td><button type="button" class="btn btn-primary btn-sm msgReply" data-bs-toggle="modal" data-bs-target="#id<?= $data['id']; ?>">Reply</button></td>
	                            <!-- <td><button type="button" class="btn btn-danger btn">Delete</button></td> -->
                                <td>
                                    <!-- <button class="btn btn-sm msgReply" data-bs-toggle="modal" data-bs-target="#id<?= $data['id']; ?>"><i class="far fa-envelope fa-2x"></i></button> -->
                                    <button class="btn btn-sm msgReplyg" data-bs-toggle="modal" data-bs-target="#whatsapp<?= $data['id']; ?>"><i class="fab fa-whatsapp fa-2x"></i></button>
                                    
                                </td>
	                        </tr>
                            <!-- message reply Modal start -->
                            <div class="modal fade replyModal" id="id<?= $data['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-zoom" id="staticBackdropLabel">Reply Message</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="messages_handler.php" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email Replying To</label>
                                                        <input type="email" name="email" id="email" class="form-control form-control-sm" value="<?= $data['email']; ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="toMsg" class="form-label">Message Replying To</label>
                                                        <!-- <input type="text" name="toMsg" class="form-control" id="toMsg" value="<?= $data['message']; ?>" readonly> -->
                                                        <textarea name="toMsg" id="toMsg" cols="" rows="2" class="form-control form-control-lg border border-primary" readonly><?= $data['message']; ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="replyMsg" class="form-label">Your Reply</label>
                                                        <textarea class="form-control form-control-lg border border-primary" name="replyMsg" id="replyMsg" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="replyMsgBtn" class="btn btn-zoom replyMsgBtn">Reply</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php $count++;  }
                            ?>
                        </tbody>
                    </table> 
                <?php    //}
                } 
               // ### ### ###  ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ###
            ?>
            <!-- // ### ### ###  ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### -->
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
            <!-- // ### ### ###  ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### ### -->
        </div>
    </div>
</main>









<?php
    include_once '../includes/footer.php';
?>