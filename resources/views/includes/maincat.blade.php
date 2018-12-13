<div class="row">
    <div class="col-lg-12 text-center">
        <div>
            <div >
                
                
                <!-- Nav tabs -->
                <ul class="product-tab-menu product-tab-menu1" style="direction:rtl;display:none"  >
                    
                    <!--<li class="category-select active"  class="questo">-->
                    <!--    <a style="text-decoration:none" href="#" >-->
                    <!--        همه محصولات-->
                    <!--        </a>-->
                    <!--  </li>-->
                    <?php $i=1; ?>
                    @foreach($categories as $category)
                        
                        <li id="{{$category->id}}" class="category-select {{$i==1?'active':''}}"><a  style="text-decoration:none" href="index-3.html#shop-square{{$category->id}}">{{$category->name}}</a></li>
                    <?php $i=2; ?>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
   
</div>

 <!--Tab panes -->
 <div class="posts">
   @include('includes.homeproducts')
 </div>
