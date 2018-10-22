  <div class="modal fade " id="loginModal" role="dialog" style="direction:rtl;z-index:1051; font-size:130%">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal-header1" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p><span class="glyphicon glyphicon-lock"></span>
          ورود
          </p>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <!--<form role="form">-->
          <!--  <div class="form-group">-->
          <!--    <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>-->
          <!--    <input type="text" class="form-control" id="usrname" placeholder="Enter email">-->
          <!--  </div>-->
          <!--  <div class="form-group">-->
          <!--    <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>-->
          <!--    <input type="text" class="form-control" id="psw" placeholder="Enter password">-->
          <!--  </div>-->
          <!--  <div class="checkbox">-->
          <!--    <label><input type="checkbox" value="" checked>Remember me</label>-->
          <!--  </div>-->
          <!--    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>-->
          <!--</form>-->
          <form method="POST" action="{{ url('/customer/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" >
                                پست الکترونیکی:
                                </label>

                            
                                <input id="email1" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">
                               رمز عبور:
                                </label>

                            
                                <input id="password1" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        
                            
                        <div class="checkbox">
                            <label style="margin-bottom:15px;">
                                <input type="checkbox" name="remember"> 
                                <span style="margin-right:15px;">
                                مرا به خاطر بسپار
                                </span>
                            </label>
                        </div>

                        <button style="font-size:18px;margin-top:20px;" type="submit" class="btn btn-success btn-block submit1" >
                            ورود
                        </button>

                 
                        
                    </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal" style="font-size:18px;"><span class="glyphicon glyphicon-remove"></span>
          لغو
          </button>
          <p>
           
               <a class="btn btn-link register-pop" onclick="event.preventDefault();"  href="" >
                      عضو نیستم! می‌خواهم ثبت نام کنم.
                </a>
         </p>
          <p>
               <a class="btn btn-link" href="{{ url('/customer/password/reset') }}">
                    رمز عبورم را فراموش کردم.
                </a>
          </p>
        </div>
      </div>
      
    </div>
  </div> 
