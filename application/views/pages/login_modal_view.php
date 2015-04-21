<script type="text/javascript" src="<?php echo HTTP_JS_PATH;?>pages/login.js"></script>
<div class="modal fade bs-example-modal-sm" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myLargeModalLabel" class="modal-title">Travel System</h4>
            </div>
            <div class="modal-body">
                <h2 class="text-center">Log In</h2>
                <form class="sky-form" method="POST" id="loginForm">
                    <div class="alert-box"></div>
                    <section>
                        <label class="input">
                            <i class="icon-prepend fa fa-user"></i>
                            <input type="text" name="email" placeholder="User Name Or Email">
                        </label>
                    </section>
                    <section>
                        <label class="input">
                            <i class="icon-prepend fa fa-lock"></i>
                            <input type="password" name="password" placeholder="Password">
                        </label>
                    </section>
                     <section>
                        <p>Not a member yet ? Please Click <a href="#" id="go_signup">here</a></p>
                    </section>
                    <section class="text-center">
                        <button class="btn-u btn-u-aqua" type="button" id="login">SIGN IN</button>
                    </section>
                </form>
            </div>
        </div>
    </div>
</div>