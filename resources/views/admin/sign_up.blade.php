@extends('index')
@section('content')
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-up">
                <h3>Tạo tài khoản cho admin</h3>
                <h5>Personal Information</h5>
                <div class="sign-u">
                    <div class="sign-up1">
                        <h4>First Name* :</h4>
                    </div>
                    <div class="sign-up2">
                        <form>
                            <input type="text" placeholder=" " required=" "/>
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="sign-u">
                    <div class="sign-up1">
                        <h4>Last Name* :</h4>
                    </div>
                    <div class="sign-up2">
                        <form>
                            <input type="text" placeholder=" " required=" "/>
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="sign-u">
                    <div class="sign-up1">
                        <h4>Email Address* :</h4>
                    </div>
                    <div class="sign-up2">
                        <form>
                            <input type="text" placeholder=" " required=" "/>
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="sign-u">
                    <div class="sign-up1">
                        <h4>Admin</h4>
                    </div>
                    <div class="sign-up2">
                        <form>
                            <div class="checkbox-inline" style="margin: 29px 30px 0;"><label><input type="checkbox"> Yes </label></div>
                            <div class="checkbox-inline" style="margin: 29px 0 0;"><label><input type="checkbox"> No </label></div>
                        </form>
                    </div>
                </div>
                <br><br>
                <h6>Login Information</h6>
                <div class="sign-u">
                    <div class="sign-up1">
                        <h4>Password* :</h4>
                    </div>
                    <div class="sign-up2">
                        <form>
                            <input type="password" placeholder=" " required=" "/>
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="sign-u">
                    <div class="sign-up1">
                        <h4>Confirm Password* :</h4>
                    </div>
                    <div class="sign-up2">
                        <form>
                            <input type="password" placeholder=" " required=" "/>
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="sub_home">
                    <div class="sub_home_left">
                        <form>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                    <div class="sub_home_right">
                        <p>Go Back to <a href="{{(route('dashboard'))}}">Home</a></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
@endsection
