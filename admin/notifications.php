<?php
    include_once '../includes/header.php';
    include_once 'side_panel.php';
?>
<main class="mt-5 pt-3">
    <div class="row">
        <h3 class="text-center text-zoom">New Messages</h3>
        <!-- <div class="row ml-3">
            <div class="col-md-5 mt-5 mr-5 btn btn-zoom"> 
                <a href="#">
                    <div class="row text-light text-decoration-none">
                        
                        <div class="col-10 tex-left text-decoration-none"><b>Mustapha Abdul-Rashid</b> <br> sent a message</div>
                    </div>
                </a>
            </div>
            <div class="col-md-5 mt-5 mr-5 btn btn-zoom"> 
                <a href="#">
                    <div class="row text-light text-decoration-none">
                        <div class="col-2"></div>
                        <div class="col-10 tex-left text-decoration-none"><b>Mustapha Abdul-Rashid</b> <br> sent a message</div>
                    </div>
                </a>
            </div>
            <div class="col-md-5 mt-5 mr-5 btn btn-zoom"> 
                <a href="#">
                    <div class="row text-light text-decoration-none">
                        
                        <div class="col-10 tex-left text-decoration-none"><b>Mustapha Abdul-Rashid</b> <br> sent a message</div>
                    </div>
                </a>
            </div>
        </div> -->
        <div class="row ml-3">
            <!-- <div> -->
                <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" /> -->
                <link rel="stylesheet" href="../styles/notif.css">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 right ">
                            <div class="box shadow-lg rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Recent</h6>
                                </div>
                                <div class="box-body p-0"id="notifDisplay">
                                    <div class="p-3 d-flex align-items-center border-bottom osaan-post-header"  onclick="notif_seen()">
                                        <!-- <div class="dropdown-list-image mr-3"> -->
                                            <!-- <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" /> -->
                                        <!-- </div> -->
                                        <div class="font-weight-bold mr-3">
                                            <div class="text-truncate">Payment Made</div>
                                            <div class="small">Mustapha Abdul-Rashid made payment of 200c for 20Kg waste pick  up</div>
                                        </div>
                                        <!-- <span class="ml-auto mb-auto">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button class="dropdown-item" type="button"><i class="mdi mdi-delete"></i> Delete</button>
                                                    <button class="dropdown-item" type="button"><i class="mdi mdi-close"></i> Turn Off</button>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="text-right text-muted pt-1">3d</div>
                                        </span> -->
                                    </div>
                                    <div class="p-3 d-flex align-items-center osahan-post-header">
                                        <!-- <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                        </div> -->
                                        <div class="font-weight-bold mr-3">
                                            <div class="mb- text-truncate">Waste pick up request</div>
                                            <div class="small">User Testing Request for waste pick up on 20-03-2022 at evening</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="box shadow-lg rounded bg-white mb-3">
                                <div class="box-title border-bottom p-3">
                                    <h6 class="m-0">Earlier</h6>
                                </div>
                                <div class="box-body p-0">
                                    <div class="p-3 d-flex align-items-center border-bottom osaan-post-header">
                                        <div class="font-weight-bold mr-3">
                                            <div class="text-truncate">Payment Made</div>
                                            <div class="small">Mustapha Abdul-Rashid made payment of 200c for 20Kg waste pick  up</div>
                                        </div>
                                    </div>
                                    <div class="p-3 d-flex align-items-center osahan-post-header">
                                        <div class="font-weight-bold mr-3">
                                            <div class="mb- text-truncate">Waste pick up request</div>
                                            <div class="small">User Testing Request for waste pick up on 20-03-2022 at evening</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>

            <!-- </div> -->
        </div>
    </div>
</main>


<?php  include_once '../includes/footer.php'; ?>