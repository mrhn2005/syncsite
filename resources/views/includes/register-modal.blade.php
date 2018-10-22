
  <div class="modal fade modal-success" id="registerModal" role="dialog" style=" text-align:right;z-index:9999999999999999999;" >
    <div class="modal-dialog " style="direction:RTL;">
    
      <!-- Modal content-->
      <div class="modal-content panel-success" style="width:105%">
        <div class="modal-header modal-header1" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <p><span class="glyphicon glyphicon-lock"></span>
          ثبت نام
          </p>
        </div>
        <div class="modal-body">
          
            <form data-toggle="validator" class="form-horizontal upload-form"  method="POST" action="{{ url('/customer/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label" >
                              نام:
                              </label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus required data-error="لطفا این فیلد را  پر نمایید." >
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-3 control-label">
                              تلفن همراه:
                              </label>

                            <div class="col-md-9">
                                <input id="mobile" type="text" class="form-control" name="mobile" pattern="^[\u06F0-\u06F90-9]{11}$" value="{{ old('mobile') }}" placeholder="09121234567" required data-error="لطفا این فیلد را مشابه 09121234567 پر نمایید." >
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-3 control-label">
                              تلفن ثابت:
                              <br>
                              (الزامی نیست)
                              </label>

                            <div class="col-md-9">
                                <input id="phone" type="text" class="form-control" name="phone" pattern="^[\u06F0-\u06F90-9]{8}$" value="{{ old('phone') }}" placeholder="87654321" data-error="لطفا این فیلد را مطابق فرمت خواسته شده پر نمایید." >
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email')&&Session::has('fail_register') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">
                              پست الکترونیکی:
                              </label>

                            <div class="col-md-9">
                                <input id="email" type="email" placeholder="test@test.com" class="form-control" name="email" required value="{{ old('email') }}" data-error="لطفا این فیلد را به فرمت ایمیل پر نمایید." >
                                 @if(Session::has('fail_register'))   
                                        <div class="help-block with-errors"></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                @else
                                	<div class="help-block with-errors"></div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">
                             رمز عبور:
                              </label>

                            <div class="col-md-9">
                                <input id="password" type="password" data-minlength="6" class="form-control" name="password" required data-error="رمز عبور باید حداقل 6 حرف باشد." >
                                <div class="help-block with-errors">
                                    حداقل 6 کاراکتر
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-3 control-label">
                              تکرار رمز عبور:
                              </label>

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" data-match="#password" required class="form-control" name="password_confirmation" data-error="رمز عبورها با یکدیگر مطابقت ندارد." >
                                <div class="help-block with-errors"></div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cities') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-3 control-label">
                                  شهر:
                              </label>
                            
                            <div class="col-md-9">
                                <?php $cities=DB::table('deliveries')->get();?>
                                @foreach($cities as $city)
                                <label class="radio-inline" style="margin-right: 20px;">
                                  <input value="{{$city->id}}" {{(old('region_id') == $city->id)?'selected':''}} type="radio" name="region_id" style="margin-right: -20px;" {{$loop->first?'required':''}}>{{$city->region}}
                                </label>
                                
                                @endforeach
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-3 control-label">
                              آدرس:
                              </label>

                            <div class="col-md-9">
                                <textarea rows="4" id="address" minlength="20"   name="address"   required data-error="حداقل باید 20 کاراکتر باشد.">{{ old('address') }}</textarea>
                                <div class="help-block with-errors" >
                                    حداقل 20 کاراکتر
                                </div>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input style="font-size:18px" type="submit" name="register" class="btn btn-success btn-md btn-block" value="ثبت نام">              
                            </div>
                        </div>
                    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger floatleft" data-dismiss="modal">
              بستن
              </button>
        </div>
      </div>
      
    </div>
  </div>