<script type="text/javascript" src="<?php echo HTTP_JS_PATH;?>pages/signup.js"></script>
<div class="modal fade bs-example-modal-sm" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myLargeModalLabel" class="modal-title">Travel System</h4>
            </div>
            <div class="modal-body">
                <h2 class="text-center">Sign Up</h2>
                <form class="sky-form" id="signupForm" method="POST">
                    <div class="alert-box"></div>
                    <section>
                        <label class="input">
                            <i class="icon-prepend fa fa-user"></i>
                            <input type="text" name="name" placeholder="User Name">
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <i class="icon-prepend fa fa-envelope"></i>
                            <input type="text" name="email" placeholder="Email">
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <i class="icon-prepend fa fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Password">
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <i class="icon-prepend fa fa-lock"></i>
                            <input type="password" name="confirmPassword" placeholder="Confirm Password">
                        </label>
                    </section>
                    <section class="text-center">
                        <button class="btn-u btn-u-aqua" type="button" id="signup">SIGN UP</button>
                    </section>
                </form>
            </div>
        </div>
    </div>
</div>