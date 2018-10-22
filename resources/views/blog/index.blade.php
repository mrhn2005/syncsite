@extends('layout.main')

@section('metadesc')
    <meta name="description" content="وبلاگ محلی جات - منبع جامع اخبار و مقالات تخصصی در حوزه‌ی محصولات محلی، ارگانیک، سالم و طبیعی و صنایع دستی">
@endsection

@section('title')
     وبلاگ | فروشگاه اینترنتی محلی جات
@endsection

@section('style')
<style>
th{
	text-align: right;
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
					<div class="col-sm-9 col-sm-pull-3" style="padding-bottom:150px;padding-top:30px">
					    
					    <div class="posts" >
					        @foreach($stories as $story)
    					    <div class="blog-all">
                                <div class="row">
                                    
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                        <div class="posttitle">
                                            <div class="blog-top" >
                                                <h2 style="font-size:150%;font-weight:bold"><a href="{{ route('blog.show',$story->slug)}}">{{$story->subject}}</a></h2>
                                                <h3>{{jDate::forge($story->created_at->diffForHumans())->ago()}}</h3>
                                            </div>
                                            <div class="blog-bottom">
                                                <p style="font-family:IranSans;text-align:justify;">{{$story->sbody}}</p>
                                                <a style="font-size:100%;" href="{{ route('blog.show',$story->slug)}}">
                                                بیشتر بخوانید    
                                                </a>
                                            </div>
                                            <div style="font-size:90%;" class="posted-by2">
                                                نویسنده:
                                                {{$story->author}}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                        <div class="blogpost-thumb">
                                            <a href="{{ route('blog.show',$story->slug)}}">
                                                <img height="50" src="{{$story->photo ? '/photos/blog/'.$story->photo : 'http://placehold.it/400x400' }} " alt="{{$story->subject}}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
					    </div>
					    <div class="pages">
                            {{ $stories->links() }}
                        </div>
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