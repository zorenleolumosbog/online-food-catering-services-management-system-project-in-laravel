<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-header text-center">
                    Welcome To Food Catering Service.
                    <strong class="text-center">
                        Sign In to your account
                    </strong>
                </h4>
            </div>
            <div class="modal-body">
                <div class="login-page about">
                    <img class="login-w3img" style="" src="{{ asset('/') }}frontEndSourceFile/images/img3.jpg" alt="">
                    <div class="login-agileinfo">
                        <form action="{{ route('check_login') }}" method="post">
                            @csrf
                            <input class="agile-ltext" type="email" name="email" placeholder="Your email is..." required="">

                            <input class="agile-ltext" type="password" name="password" placeholder="Password" required="">

                            <input type="submit" value="Login In">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
