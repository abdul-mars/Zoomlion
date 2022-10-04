<?php 
    include_once '../includes/header.php';
    include_once 'side_panel.php';
?>
<main class="mt-5 pt-3">
    <div class="container">
        <div class="row p-3">
            <?php
                if (@$_GET['notif_id']) {
                    $payId = $_GET['notif_id'];

                    $sql2 = "UPDATE `notifications` SET `status`= '1', `read`='1' WHERE reason_id = '$payId'";
                    mysqli_query($con, $sql2);
                    ?>
                    <h2 class="text-center text-zoom">New Payments</h2>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Paid By</th>
                                <th>Paid For</th>
                                <th>Amout Paid</th>
                                <th>Date</th>
                                <!-- <th>#</th>
                                <th>#</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            $total = 0;
                            $sql = "SELECT * FROM payments WHERE id = '$payId'";
                            $result = mysqli_query($con, $sql);
                            while ($data = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <th><?= $count; ?></th>
                                <!-- <th><?= $data['id']; ?></th> -->
                                <td><?= $data['email']; ?></td>
                                <?php $email = $data['email']; $result2 = mysqli_query($con, "SELECT * FROM userstable WHERE email = '$email'");
                                $data2 = mysqli_fetch_assoc($result2);
                                ?>
                                <td><?= $data2['surname'].' '.$data2['firstname']; ?></td>
                                <td><?= $data['for']; ?></td>
                                <td>Ghs <?= $data['amount']; ?>¢</td>
                                <td><?= $data['date']; ?></td>
                            </tr>
                            <?php
                            $count++;
                            $total = $total + $data['amount'];
                            }
                            ?>
                            <!-- <tr class="bg-zoom text-light tr">
                                <th colspan="5">Total Amout</th>
                                <th>Ghs <?= $total; ?>¢</th>
                            </tr>
                            <style>
                            .tr:hover{
                            background-color: #031341 !important;
                            }
                            </style> -->
                        </tbody>
                    </table>
                <?php }
            ?>
            <h2 class="text-center text-zoom">All Payments</h2>
            <hr>
            <h6 class="text-center text-zoom">Every payment made by users order by latest</h6> 
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Paid By</th>
                        <th>Paid For</th>
                        <th>Amout Paid</th>
                        <th>Date</th>
                        <!-- <th>#</th>
                        <th>#</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $count = 1;
                        $total = 0;
                        $sql = "SELECT * FROM payments order by id DESC";
                        $result = mysqli_query($con, $sql);

                        while ($data = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <th><?= $count; ?></th>
                            <!-- <th><?= $data['id']; ?></th> -->
                            <td><?= $data['email']; ?></td>
                            <?php $email = $data['email']; $result2 = mysqli_query($con, "SELECT * FROM userstable WHERE email = '$email'");
                                $data2 = mysqli_fetch_assoc($result2);
                            ?>
                            <td><?= $data2['surname'].' '.$data2['firstname']; ?></td>
                            <td><?= $data['for']; ?></td>
                            <td>Ghs <?= $data['amount']; ?>¢</td>
                            <td><?= $data['date']; ?></td>
                        </tr>
                        <?php
                            $count++;
                            $total = $total + $data['amount'];
                            }
                    ?>
                    <tr class="bg-zoom text-light tr">
                        <th colspan="5">Total Amout</th>
                        <th>Ghs <?= $total; ?>¢</th>
                    </tr>
                    <style>
                        .tr:hover{
                            background-color: #031341 !important;
                        }
                    </style>
                </tbody>
            </table>
        </div>
    </div>
</main>









<?php 
    include_once '../includes/footer.php';
?>