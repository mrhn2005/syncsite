




@if(Session::has('fail'))
      <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
         {{ Session::get('fail') }}
      </div>
@endif

@if(Session::has('success'))
      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {{ Session::get('success') }}
      </div>
@endif

@if(count($errors)>0)
    <div class="alert alert-danger alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @foreach($errors->all() as $error)
            <h3 style="direction:ltr;text-align:right">{{$error}}-</h3>
        @endforeach
    </div>
@endif

