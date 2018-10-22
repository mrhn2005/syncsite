<div class="col-sm-3 col-sm-push-9">
	<div class="left-sidebar">
		<div class="left-sidebar-title">
			<h1>
			    
			   وبلاگ
			</h1>
		</div>
		
		<!--<div class="single-sidebar"  data-spy="affix" data-offset-top="305" data-offset-bottom="505">-->
		<div class="single-sidebar" style="">
		    <h3 class="single-sidebar-title" style="font-size:160%">
			    آخرین مقالات
			</h3>
			<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
              <button class="navbar-toggle " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                 <span class="sr-only">
                    نمایش
                    </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>   
                
              </button>
              
            </div>
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top:20px;padding-bottom:20px;">
				<ul class="nav nav-pills nav-stacked">
				    @foreach( $titles as $title)
					<li class="category-select {{isset($stitle)?($sstory->id==$sstory->id?'active':'' ):''}}" ><a href="{{ route('blog.show',$title->slug)}}" style="width:100%" >
					    {{$title->subject}}
					    
					</a></li>
					@endforeach
				</ul>
			</div>
			</nav>
		</div>

	</div>
</div>