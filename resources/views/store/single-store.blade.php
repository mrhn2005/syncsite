
  <div class="column">
    <div class="demo-title"></div>
    <!-- Post-->
    <div class="post-module">
      <!-- Thumbnail-->
      <a href="{{route('store.page',$vendor->slug)}}" target="_blank">
      <div class="thumbnail">
        <div class="date">
          <div class="day">{{$vendor->products_count}}</div>
          <div class="month">
            محصول  
            </div>
        </div><img src="{{$vendor->photo ? $vendor->photo : 'http://placehold.it/400x400' }}" alt="{{$vendor->slug}}" class="simpleLens-big-image">
      </div>
      </a>
      <!-- Post Content-->
      <div class="post-content">
        <div class="category">
        حجره    
        </div>
          <a href="{{route('store.page',$vendor->slug)}}" target="_blank">
        <h3 class="title">
        {{$vendor->name}}    
        </h3>
         </a>
        <div class="sub_title">
          دسته بندی ها:
            @foreach($vendor->categories() as $category)
                <a class=" category-name btn btn-success" href="{{route('category.show',$category->slug)}}" target="_blank">
                    {{$category->name}}
                </a>
            @endforeach
        </div>
        <p class="description">{{str_limit($vendor->description,300)}}</p>
        @if(!empty($vendor->city))
        <div class="post-meta">
          <span class="timestamp">
          <i class="fa fa-map-marker"></i>
          شهر حجره:
          <span class="btn btn-default" style="cursor:default">{{$vendor->city->name}}</span>
          </span>
          
      </div>
        @endif
    </div>
  </div>
  </div>
