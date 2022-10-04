<?php
    include_once 'includes/header.php';
    
?>
<div class="container">
    <div class="dropdown-divider" id="FAQ">
    </div>
    <div class="row mt">
        <div class="col-md-6" id="">
            <!-- Question Accordion -->
            <section class="">
                <div class="container">
                    <h2 class="text-center mt-5">Frequently Asked Questions</h2>
                    <div class="accordion accordion-flush bg-dark" id="questions">
                        <!-- accordion item 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button type="button" class="accordion-button collapsed border border-primary" data-bs-toggle="collapse" data-bs-target="#faq1">
                            How do i sign up?
                            </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#questions">
                                <div class="accordion-body ">
                                   To sign up go to <a href="signup.php">Sign up</a> page and enter your details
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button type="button" class="accordion-button collapsed border border-primary" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Can i open my account if i forget my password?
                            </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#questions">
                                <div class="accordion-body ">
                                   Yes you can still be able to open your account even when you forgot your password. <br>
                                   on the login page click on "forgot password", enter your email and follow the procedure to recover your account
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button type="button" class="accordion-button collapsed border border-primary" data-bs-toggle="collapse" data-bs-target="#faq3">
                            How do i request for waste pick up?
                            </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#questions">
                                <div class="accordion-body ">
                                   You can request for waste pick up by login into your account and tapping on 
                                   the "Request for waste pick up", a dialog box will appear select the waste 
                                   type, enter the size of the waste (in kg), choose the pick up date and time and hit submit
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button type="button" class="accordion-button collapsed border border-primary" data-bs-toggle="collapse" data-bs-target="#faq4">
                            Can i request for waste pick up if i dont have?
                            </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#questions">
                                <div class="accordion-body ">
                                   You need to have account before you can request for waste pick up. creating account
                                    is very simple and free just to <a href="signup.php">Sign up</a> page
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-6 mt-5">
            <div class="container" id="contactUs">
                <h2 class="text-center">Contact Us</h2>
                <h5 class="text-center">Leave us a message or Call us on <a href="Tel:0249393898">+233202098244</a> </h5>
                <div class="alert alert-danger text-center" id="msgAlert" role="alert">
                </div>
                <form action="contact.php" method="post">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control border border-primary" id="name" name="name" value="<?= ucwords($_SESSION['name']); ?>" placeholder="enter your name" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control border border-primary" id="email" name="email" value="<?=$email; ?>" placeholder="name@example.com" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="msg" class="form-label">Message</label> <br>
                            <!-- <input type="email" class="form-control border border-primary" id="email" name="email" placeholder="name@example.com"> -->
                            <textarea class="form-control border border-primary" name="msg" id="msg" cols="0" rows="0" placeholder="Please write you want to contact us"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="button" name="msgSubmit" id="msgSubmit" class="btn btn-zoom btn-block"><i class="fas fa-paper-plane"></i> Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- </div> -->
<?php
//include_once 'includes/footer.php';
?>