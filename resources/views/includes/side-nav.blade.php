<div class="col-sm-3 col-sm-push-9">
	<div class="left-sidebar">

		
		<!--<div class="single-sidebar"  data-spy="affix" data-offset-top="305" data-offset-bottom="505">-->
		<div class="single-sidebar">
			<h3 class="single-sidebar-title" style="font-size:160%">
			دسته بندی محصولات
			</h3>
			<nav class="navbar navbar-default">
			<div class="navbar-header">
              <button class="navbar-toggle " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
                 <span class="sr-only">
                    نمایش دسته بندی ها 
                    </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>   
                
              </button>
              
            </div>
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-top:20px;padding-bottom:20px">
				<ul class="nav nav-pills nav-stacked">
					<li class="category-select" ><a href="{{route('shop')}}" style="width:100%;font-weight:bold;font-size:120%" >
					همه محصولات
					</a></li>
					@foreach ($categories as $maincat)
					
					<li class="{{isset($maincat1)?($scategory->id==$maincat->id?'active':'' ):''}}" ><a style="width:100%;font-weight:bold;font-size:120%" href="{{route('maincat.show',$maincat->slug)}}" >
					    {{$maincat->name}} 
					        
					    </a>
					     <ul class="sub-menu1" >
					         @foreach ($maincat->children as $category)
					
								<li class="category-select subcat {{isset($subcat1)?($scategory->id==$category->id?'active':'' ):''}}" >
									<a style="width:100%;text-decoration: none !important;" href="{{route('category.show',$category->slug)}}">
								   {{$category->name}}
								    </a></li>
							@endforeach
					         
					       </ul>
					 </li>
					@endforeach
				</ul>
			</div>
			</nav>
		</div>

	</div>
</div>