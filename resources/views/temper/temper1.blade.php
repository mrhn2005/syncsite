@extends('layout.main')

@section('metadesc')

    <meta name="description" content="با طبع خود آشنا شوید. آیا طبع شما صفراوی، سوداوی، بلغمی و یا دموی است؟">
@endsection

@section('title')
 مسابقه طبع شناسی| فروشگاه اینترنتی محلی جات
@endsection

@section('style')
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto);
@keyframes ripple {
  0% {
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0);
  }
  50% {
    box-shadow: 0px 0px 0px 15px rgba(0, 0, 0, 0.1);
  }
  100% {
    box-shadow: 0px 0px 0px 15px rgba(0, 0, 0, 0);
  }
}
.md-radio {
  margin: 16px 0;
}
.md-radio.md-radio-inline {
  display: inline-block;
}
.md-radio input[type=radio] {
  display: none;
}
.md-radio input[type=radio]:checked + label:before {
  border-color: #90133B;
  animation: ripple 0.2s linear forwards;
}
.md-radio input[type=radio]:checked + label:after {
  transform: scale(1);
}
.md-radio label {
  display: inline-block;
  height: 20px;
  position: relative;
  padding: 0 30px;
  margin-bottom: 0;
  cursor: pointer;
  vertical-align: bottom;
}
.md-radio label:before, .md-radio label:after {
  position: absolute;
  content: "";
  border-radius: 50%;
  transition: all 0.3s ease;
  transition-property: transform, border-color;
}
.md-radio label:before {
  right: 0;
  top: 0;
  width: 20px;
  height: 20px;
  border: 2px solid rgba(0, 0, 0, 0.54);
}
.md-radio label:after {
  top: 5px;
  right: 5px;
  width: 10px;
  height: 10px;
  transform: scale(0);
  background: #90133B;
}

*, *:before, *:after {
  box-sizing: border-box;
}



section {
  background: white;
  margin: 0 auto;
  padding: 4em;
  max-width: 800px;
}
section h1 {
  margin: 0 0 2em;
}

</style>
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')


    
    @include('includes.header')
    <div class="container" style="direction:rtl">
    	@include('includes.messages')	
    </div>
  
     <!-- cart-page-start -->
		<div class="shopping-cart-area" style="direction:rtl">
			<div class="container">
				<div class="row">
					<div class="col-lg-12" >
						<div class="left-sidebar-title">
						    
							<h3 >
							   طبع خود را بشناسید.
							</h3>
						</div>
					</div>
				</div>
				<div  class="col-lg-12"  style="border:2px solid #A4B784; padding:5px;">
                <div class="col-md-12">
                  @if (Auth::guard('customer')->check())
                    <form class="upload-form" role="form" data-toggle="validator" id="temper"  method="post" action="{{route('temper1.store')}}" enctype="multipart/form-data">
   
                        {{ csrf_field() }}
                        <!-- Material checked -->
                        <?php $i=0; ?>
                        @foreach($questions as $question)
                        <?php $i=$i+1; ?>
                            <p style="font-family:IranSans;font-size:130%;color:blue;margin-top:50px"> 
                            {{$i}}) {{$question->title}}
                            </p>
                            @foreach($question->answers as $answer)
                           <div class="form-group" > 
                             <div class="md-radio radio" style="margin-bottom:40px;">
                              <input id="choice{{$answer->id}}" type="radio" value="{{$answer->id}}" name="choice[{{$question->id}}]" {{$loop->first?'required':''}}>
                              <label  for="choice{{$answer->id}}" style="font-family:IranSans;font-size:110%;">{{$answer->title}}</label>
                              </div> 
                            </div>
                            <br>
                            @endforeach
                            
                            <hr style="margin-bottom:20px;">
                        @endforeach
                        
                        <div class="text-center" style="margin-bottom:30px;">
                                <div class="buttons-cart">
                                    <button type="submit" style="font-size:150%;text-decoration:none">
                                        مرحله بعدی
                                    
                                    </button>
                                          
                                    
                                
                               </div>
                        </div>
                        
                    </form>
                  @else
                  <div class="row" style="padding-bottom:100px;">
          					
          					<div class="col-lg-12">
          						<h3>
          						لطفا برای شرکت در مسابقه طبع شناسی ابتدا در سابت ثبت نام کنید.
          						</h3>
          						<div class="text-center">
          							<div class="buttons-cart">
          								<a  data-toggle="modal" href="#registerModal" style="font-size:150%;text-decoration:none" >
          								ثبت نام	
          								</a>
          								<a data-toggle="modal" href="#loginModal" style="font-size:150%;padding-right:30px;text-decoration:none">
          								ورود
          								</a>
          							</div>
          							
          						</div>
          					</div>
          				</div>
                  
                  @endif
                </div>
            </div>
				

			</div>
		</div>
		 <!-- cart-page-end -->

	@include('includes.footer')
	

@endsection

@section('js')


<script>

  $('#temper').validator().on('submit', function (e) {
  if (e.isDefaultPrevented()) {
    alert('لطفا به همه سوالات پاسخ دهید');
  } 
})
</script>
@endsection