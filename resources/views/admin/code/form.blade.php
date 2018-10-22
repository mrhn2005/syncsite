<div style="margin-left:100px">
    <div class="form-group">
        <label for="is_fixed">
            نوع کد تخفیف
        </label>
        
        <select id="is_fixed" name="is_fixed"  class="form-control">
             <?php $selected=""?>
                    @if(isset($promocode))
                        @if($promocode->is_fixed)
                            <?php $selected="selected"?>
                        @endif
                    @endif
                    @if (old('is_fixed') == '1')
                          <?php $selected="selected"?>
                    
                    @endif
              <option value="0">
            درصدی
              </option>
              <option value="1" {{$selected}}>
              ریالی
            </option>
        </select>
     </div>
     <div class="form-group">
        <label for="first_use">
           فقط اولین خرید
        </label>
        
        <select id="first_use" name="first_use"  class="form-control">
             <?php $selected=""?>
                     @if(isset($promocode))
                        @if($promocode->first_use)
                            <?php $selected="selected"?>
                        @endif
                    @endif
                    @if (old('first_use') == '1')
                          <?php $selected="selected"?>
                    
                    @endif
              <option value="0">
                غیرفعال
              </option>
              <option value="1" {{$selected}}>
             فعال
            </option>
        </select>
     </div>
     <div class="form-group">
      <label for="discount_amount">
          درصد تخفیف یا مقدار تخفیف به تومان:
          </label>
        <input type="number" name="discount_amount" id="discount_amount" class="form-control" value="{{isset($promocode)?$promocode->discount_amount:Request::old('discount_amount')}}">
    </div>
    <div class="form-group">
      <label for="order_amount">
          حداکثر مقدار سفارش (برای تخفیف درصدی) یا حداقل مقدار سفارش (برای تخفیف ریالی):
          </label>
        <input type="number" name="order_amount" id="order_amount" class="form-control" value="{{isset($promocode)?$promocode->order_amount:Request::old('order_amount')}}">
    </div>
    <div class="form-group">
        <label for="expires_at">
         تاریخ انقضای کد:
          </label>
        <div class='input-group date' id='datetimepicker1'>
            <input type='text' class="form-control" name="expires_at" id="expires_at" value="{{isset($promocode)?$promocode->expires_at:Request::old('expires_at')}}" />
            <span class="input-group-addon" style="border:1px solid lightgray; border-radius: 0px">
                <span class="glyphicon glyphicon-calendar" ></span>
            </span>
        </div>
    </div>
    <div class="form-group">
      <label for="max_uses_user">
          تعداد کد تخفیف:
          </label>
        <input type="number" name="max_uses_user" id="max_uses_user" class="form-control" value="{{isset($promocode)?$promocode->max_uses_user:Request::old('max_uses_user')}}">
    </div>
    <!--<div class="form-group">-->
    <!--  <label for="max_uses">-->
    <!--     حداکثر تعداد مجاز استفاده یک کاربر از این کد:-->
    <!--      </label>-->
    <!--    <input type="number" name="max_uses" id="max_uses" class="form-control" value="{{isset($promocode)?$promocode->max_uses:Request::old('max_uses')}}">-->
    <!--</div>-->
    <div class="text-center">
        <button type="submit"  class="btn btn-primary btn-lg">
            تایید
            </button>
    </div>
</div> 