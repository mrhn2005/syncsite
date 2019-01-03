<section id="main-content">
            <section class="wrapper">
                <div class="row">
                    
                   <h1 class="page-header"  style="margin-right:10px;">
                     ویژگی ها
                     {{$product->name}}
                    </h1>
                    
                    <div class="col-md-12">
                    
                        <?php 
                            if(count($product->properties)>0){
                                $properties=$product->properties;
                                
                            }else{
                                $properties=$product->category->properties;
                            }
                        ?>
                        
                        <form action="{{route('product.property.store')}}" method="post">
                            <input type="hidden" name="product_id" value="{{$product->id}}" >
                            @foreach($properties as $property)
                            @if($product->category->properties->contains($property->id))
                            <input type="hidden" name="property[]" value="{{$property->id}}" >
                            <div class="form-group">
                                  <label for="property{{$property->id}}">
                                      {{$property->subject}}
                                  </label>
                                <input type="text" name="property_name[]" id="property{{$property->id}}" class="form-control" value="{{$property->pivot->name}}">
                            </div>
                            @endif
                            @endforeach
                            <div class="text-center">
                                <button type="submit"  class="btn btn-primary btn-lg">
                                    تایید
                                </button>
                            </div>
                        </form>
                    
                    
                    </div>
                     
                    
                    
                </div>
            </section>
        </section>