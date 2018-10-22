<form  data-toggle="validator" class="form-horizontal upload-form"  method="POST" action="{{route('customer.edit.profile')}}">
            {{ csrf_field() }}

<div class="col-md-10 col-md-offset-1" style="padding-top:20px;">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class=" control-label" >
          نام:
          </label>

        <div class="">
            <input id="name" type="text" class="form-control" name="name" value="{{$customer->name }}" required data-error="لطفا این فیلد را  پر نمایید." >
            <div class="help-block with-errors"></div>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
        <label for="mobile" class="control-label">
          تلفن همراه:
          </label>

        <div class="">
            <input id="mobile" type="text" class="form-control" name="mobile" pattern="^[\u06F0-\u06F90-9]{11}$" value="{{$customer->mobile}}" placeholder="09124322534" required data-error="لطفا این فیلد را مطابق فرمت خواسته شده پر نمایید." >
            <div class="help-block with-errors"></div>
            @if ($errors->has('mobile'))
                <span class="help-block">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone" class=" control-label">
          تلفن ثابت:
          </label>

        <div class="">
            <input id="phone" type="text" class="form-control" name="phone" pattern="^[\u06F0-\u06F90-9]{8}$" value="{{ $customer->phone}}" placeholder="44328765" data-error="لطفا این فیلد را مطابق فرمت خواسته شده پر نمایید." >
            <div class="help-block with-errors"></div>
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
       <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <input style="font-size:18px" type="submit" name="register" class="btn btn-success btn-md btn-block" value="ویرایش">              
        </div>
    </div>
</div>   
</form>
