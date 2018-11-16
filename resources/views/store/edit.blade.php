<form  data-toggle="validator" class="form-horizontal upload-form"  method="POST" action="{{route('store.update',$store)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
<div class="col-md-10 col-md-offset-1" style="padding-top:20px;">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class=" control-label" >
          نام حجره:
          </label>

        <div class="">
            <input id="name" type="text" class="form-control" name="name" value="{{$store->name }}" required data-error="لطفا این فیلد را  پر نمایید." >
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
            <input id="mobile" type="text" class="form-control" name="mobile" pattern="^[\u06F0-\u06F90-9]{11}$" value="{{$store->mobile}}" placeholder="09124322534" required data-error="لطفا این فیلد را مطابق فرمت خواسته شده پر نمایید." >
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
            <input id="phone" type="text" class="form-control" name="phone" pattern="^[\u06F0-\u06F90-9]{11}$" value="{{ $store->phone}}" placeholder="02187654321" data-error="لطفا این فیلد را مطابق فرمت خواسته شده پر نمایید." >
            <div class="help-block with-errors"></div>
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    
    
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class=" control-label">
             آدرس:
          </label>

        <div class="">
            <input id="address" type="text" class="form-control" name="address"  value="{{ $store->address}}"  data-error="لطفا این فیلد را پر نمایید." >
            <div class="help-block with-errors"></div>
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('history') ? ' has-error' : '' }}">
        <label for="history" class=" control-label">
            زندگینامه 
          </label>

        <div class="">
            <textarea id="history" rows="6" type="text" class="form-control" name="history"  data-error="لطفا این فیلد را پر نمایید." >{{ $store->history}}</textarea>
            <div class="help-block with-errors"></div>
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('history') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    
        <div class="form-group">
          <label for="photo">
                 تصویر غرفه
            <br>
            ( هرچی عکس طبیعی تر و از محل کار و تولید محصول باشه مطمئنا تاثیر بیشتری میتونه داشته باشه)
          </label>
          <input accept="image/*" type="file" class="" data-max-size="5000000"  id="photo" name="photo" multiple  data-error="لطفا عکس غرفه را بارگذاری نماید.">
          <div class="help-block with-errors"></div>
          
        </div>
    
    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <input style="font-size:18px" type="submit" class="btn btn-success btn-md btn-block" value="تایید">              
        </div>
    </div>
</div>   
</form>