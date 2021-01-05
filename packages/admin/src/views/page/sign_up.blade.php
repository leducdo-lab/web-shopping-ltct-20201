@extends('admins::layout.index')
@section('content')
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">
            <div class="sign-up">
                <h3>Tạo tài khoản cho admin</h3>
                <h5>Personal Information</h5>
                <form action="{{(route('sign_up'))}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Email Address* :</h4>
                        </div>
                        <div class="sign-up2">
                            <input type="text" name="email" placeholder="Email" required=" "/>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Main Admin</h4>
                        </div>
                        <div class="sign-up2">
                            <div class="checkbox-inline" style="margin: 29px 30px 0;">
                                <label><input name="is_admin" value="true" type="checkbox"> Yes </label>
                            </div>
                            <div class="checkbox-inline" style="margin: 29px 0 0;">
                                <label><input name="is_admin" value="" type="checkbox"> No </label>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <h6>Login Information</h6>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Password* :</h4>
                        </div>
                        <div class="sign-up2">
                            <input type="password" name="password" placeholder="Password" required=" "/>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Confirm Password* :</h4>
                        </div>
                        <div class="sign-up2">
                            <input type="password" name="re_password" placeholder="Confirm Password" required=" "/>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sub_home">
                        <div class="sub_home_left">
                            <input type="submit" value="Submit">
                        </div>
                        <div class="sub_home_right">
                            <p>Go Back to <a href="{{(route('dashboard'))}}">Home</a></p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
