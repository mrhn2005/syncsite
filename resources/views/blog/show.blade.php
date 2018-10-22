@extends('layout.main')

@section('metadesc')
    <meta name="description" content="{{$sstory->sbody}}">
        <meta property="og:title" content="{{$sstory->subject}}" />
	<meta property="og:type" content="post" />
	<meta property="og:url" content="{{Request::url()}}" />
	<meta property="og:image" content="{{$sstory->photo ? URL::to('/').'/photos/blog/'.$sstory->photo : 'http://placehold.it/400x400' }}" />
@endsection


@section('title')
 {{$sstory->subject}}
 | فروشگاه اینترنتی محلی جات
@endsection

@section('style')
<style>
blockquote {
    background-color:#F7F7F7;
    border-right: 5px solid #F55035;
    border-left: 0px;
    font-family: 'BYekan';
    font-size: 17px !important;
}
.blog-bottom a{
    font-size:110% !important;
}

blockquote strong{
    color:#F55035;
}


th{
	text-align: right;
}
.blog-bottom div,.blog-bottom p{
    text-align:justify!important;
    color:#4d4d4d;
    line-height:31px;
    font-size:16px;
}
.posttitle ul {
    list-style-type: square;
    margin: 30px;
    color:#4d4d4d;
    line-height:26px;
    font-size:15px;
}

.posttitle a{
    font-weight:bold;
}
.blog-top h2{
    font-size:190%!important;
}
.blog-bottom li {
    font-size: 108%;
    line-height:33px;
    margin-bottom:15px;
    
}

@media  only screen and (max-width: 767px){
    .blog-bottom ul {
        margin-left:0px;
        margin-right:15px;
    }
  
}
</style>
<!--<link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/v3.3.4/dist/css/bootstrap-rtl.min.css">-->

@endsection


@section('content')

    
    @include('includes.header')
    
    <div class="container" style="direction:rtl">
    	@include('includes.messages')	
    </div>
    <div class="shop-product-area">
			<div class="container">
				<div class="row" style="direction:rtl">
					@include('blog.posts')
					<div class="col-sm-9 col-sm-pull-3" style="padding-bottom:50px;padding-top:30px">
					    
					    <div class="posts" >
					        
    					    <div class="blog-all">
                                <div class="row">
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="blog-all b-details">
                                            <div class="blogpost-thumb">
                                                <a href="{{ route('blog.show',$sstory->slug)}}">
                                                    <img height="50" src="{{$sstory->photo ? '/photos/blog/'.$sstory->photo : 'http://placehold.it/400x400' }} " alt="{{$sstory->subject}}">
                                                </a>
                                            </div>
                                            <div class="posttitle">
                                                <div class="blog-top">
                                                    <h2 style="font-size:150%;font-weight:bold"><a href="{{ route('blog.show',$sstory->slug)}}">{{$sstory->subject}}</a></h2>
                                                    <h3>{{jDate::forge($sstory->created_at->diffForHumans())->ago()}}</h3>
                                                </div>
                                                <div class="blog-bottom"  style="font-family:IranSans!important;text-align:justify!important;">
                                                    {!! $sstory->body !!}
                                                </div>
                                                <div style="font-size:90%;" class="posted-by2">
                                                نویسنده: 
                                                {{$sstory->author}}
                                            <div>
                                                    @if(count($sstory->tags)>0)
                                                    برچسب‌ها: 
                                                        @foreach($sstory->tags as $tag)
                                                        
                                                        #{{$tag->name}} 
                                                        
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
					    </div>
					    <?php $product=$sstory;?>
    					
    					    <h3 style="padding-top:20px;">
    					        نظرات خوانندگان:
    					    </h3>
    					@include('includes.reviews')
    					
    					
					</div>
					
					
				</div>
			</div>
		 </div>
		 <!-- shop-page-end -->


	@include('includes.footer')
	<!--footer end-->
	
	


@endsection

@section('js')
<script type="text/javascript" src="/js/jquery.PrintArea.js"></script>


@endsection