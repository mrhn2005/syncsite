    @include('includes.header')
    <div class="container" style="direction:rtl">
    	@include('includes.messages')	
    </div>
    <div class="container-fluid">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!--<ol class="carousel-indicators">-->
    <!--  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
    <!--  <li data-target="#myCarousel" data-slide-to="1"></li>-->
      <!--<li data-target="#myCarousel" data-slide-to="2"></li>-->
    <!--</ol>-->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @foreach($banners as $banner)
      <div class="item {{$loop->first?'active':''}}">
          <a target="_blank" href="{{$banner->link}}">
                <img alt="" style="width:100%;"  src="/photos/1/{{$banner->path}}">

          </a>
      </div>
        @endforeach
      <!--<div class="item">-->
      <!--  <img  alt="Chicago" style="width:100%;" src="/photos/1/سیب-خشک.jpg">-->
      <!--</div>-->
    
      <!--<div class="item">-->
      <!--  <img src="ny.jpg" alt="New york" style="width:100%;">-->
      <!--</div>-->
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="fa fa-chevron-left"></span>
      <!--<span class="sr-only">Previous</span>-->
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="fa fa-chevron-right"></span>
      <!--<span class="sr-only">Next</span>-->
    </a>
  </div>
</div>