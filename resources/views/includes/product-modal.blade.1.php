<div style="direction:ltr">
            <!-- Modal -->
    <div class="modal fade" id="product{{$product->id}}" tabindex="-1"  >
        <div class="modal-dialog modal-lg" role="document" style="z-index:-2">
            <div class="modal-content">
                <div class="modal-header" style="margin-bottom:-25px;">
                    <button type="button" class="close floatleft" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <div class="product-name product-name1 floatright" style="margin-right:20px;">
                        <h3 style="direction:rtl"><a  href="{{route('product.show',$product->slug)}}" style="color:#8BA462">{{$product->name}}</a></h3>
                    </div>
                </div>
                <div class="modal-body product-modal12">
                    <div >
                            <!-- Nav tabs -->
                            
                            <ul class="nav nav-pills" >
                                <li role="presentation" class="active pull-right"><a href="#uploadTab{{$product->id}}" style="font-weight:bold;font-size:120%"  role="tab" data-toggle="tab">توضیحات</a>
        
                                </li>
                                <li role="presentation" class="pull-right"><a href="#browseTab{{$product->id}}" style="font-weight:bold;font-size:120%"  role="tab" data-toggle="tab">نظرات</a>
        
                                </li>
                            </ul>
                            
                            <!-- Tab panes -->
                            <div class="tab-content" style="margin-top:20px">
                                <div role="tabpanel" class="tab-pane active" id="uploadTab{{$product->id}}">
                                    <div class="modal-product">
                                <!--<div class="container-fluid">-->
                                        @include('includes.product-desc')
                                <!--</div>-->
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="browseTab{{$product->id}}">
                                    @include('includes.reviews')
                                </div>
                    
                               
                    <!-- .modal-product -->
                            </div>
               
            
                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>