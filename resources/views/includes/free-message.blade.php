@if (Auth::guard('customer')->check() )
    @if(Auth::guard('customer')->user()->orders->count()<1)
<div class="fullscreen textcenter" style="z-index:9999999">
    <div class="myAlert-corner alert alert-info alert-dismissable" style="font-size:18px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span id="fixed-message1">
          <a href="{{route('free')}}" style="font-size:120%">
             برای دریافت نمونه اولیه رایگان کلیک کنید.
          </a>

      </span>
    </div>
</div>
    @endif
@else
<div class="fullscreen textcenter" style="z-index:9999999">
    <div class="myAlert-corner alert alert-info alert-dismissable" style="font-size:18px;">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <span id="fixed-message1">
          
             با
             <a data-toggle="modal"  href="#registerModal">
             ثبت نام
             </a>
             در محلی جات خرید اول خود را رایگان انجام دهید.
      </span>
    </div>
</div>

@endif
