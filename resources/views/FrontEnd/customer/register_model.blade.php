
    <div class="modal fade" id="sigup-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-header text-center">
                        Welcome To Food Catering Service.
                        <strong class="text-center">
                            Sign Up to make your account.
                        </strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="login-page about">
                        <img class="login-w3img" style="" src="{{ asset('/') }}frontEndSourceFile/images/img3.jpg" alt="">
                        <div class="login-agileinfo">
                            <form action="{{ route('store_customer') }}" method="post">
                                @csrf
                                <input class="agile-ltext" type="text" name="name" placeholder="Enter your good name" required="">
                                <input class="agile-ltext" type="email" name="email" placeholder="Your email is..." required="">
                                <input class="agile-ltext" type="text" name="phone_no" placeholder="Your phone number is..." required="">
                                <input class="agile-ltext" type="password" name="password" placeholder="Password" required="">
                                <div class="wthreelogin-text">
                                    <ul>
                                        <li>
                                            <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>
                                                <span> I agree to the terms of service</span>
                                            </label>
                                        </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                                <input type="submit" value="Sign Up">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

