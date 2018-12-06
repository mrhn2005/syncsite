
                        {{ csrf_field() }}
                    <aside id="admin_sidebar" class="col-md-4">
                        <div class="form-group">
                               <label for="desc_short">
                                 توضیح کوتاه محصول 
                                </label>
                          <textarea style="text-align:right" name="desc_short" id="desc_short" cols="30" rows="5" class="form-control" >{{isset($product)?$product->desc_short:Request::old('desc_short')}}</textarea>
                        </div>
                         <div class="form-group">
                            <label for="active_discount">
                                تخفیف
                            </label>
                            
                            <select id="active_discount" name="active_discount"  class="form-control">
                                 <?php $selected=""?>
                                        @if (old('active_discount') == '1')
                                              <?php $selected="selected"?>
                                        @elseif (isset($product))
                                            @if($product->active_discount=='1')
                                                <?php $selected="selected"?>
                                            @endif
                                        @endif
                                  <option value="0">
                                 غیر فعال
                                  </option>
                                  <option value="1" {{$selected}}>
                                  فعال
                                </option>
                            </select>
                          </div>
                        <div class="form-group">
                             <label for="category_id">
                                 دسته بندی محصول
                                 </label>
                    
                            <select name="category_id" id="category_id" class="form-control" required data-error="لطفا این فیلد را  پر نمایید." >
                                
                                    <option value="">
                                    انتخاب دسته بندی
                                    </option>
                                @foreach($categories as $category)
                                        @if (old('category_id') == $category->id)
                                              <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @elseif (isset($product))
                                            @if($product->category->id==$category->id)
                                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @else
                                              <option value="{{$category->id}}">
                                                    {{$category->name}}
                                                </option>
                                            @endif
                                            
                                        
                                        @else
                                              <option value="{{$category->id}}">
                                                    {{$category->name}}
                                                </option>
                                        @endif 
                                    
                                @endforeach
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                          <label for="quantity">
                              موجودی محصول
                              </label>
                            <input required type="number" name="quantity" id="quantity" class="form-control" value="{{isset($product)?$product->quantity:Request::old('quantity')}}" data-error="لطفا این فیلد را  پر نمایید." >
                           <div class="help-block with-errors"></div>
                       </div>
                        
                        <div class="form-group">
                          <label for="origin">
                              محل تولید محصول
                              </label>
                            <input type="text" id="origin" name="origin" class="form-control" value="{{isset($product)?$product->origin:Request::old('origin')}}">
                            
                        </div>

                        <div class="form-group">
                            <label for="image">
                                تصویر محصول
                                </label>
                            
                            <input  type="file" name="image" id="image" accept="image/*" data-error="لطفا این فیلد را  پر نمایید." >
                          <div class="help-block with-errors"></div>
                        </div>
                    
                    <h6 class="alert alert-danger">(images should be 502x602)</h6>
                     <div class="form-group">
                           <!--<input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">-->
                            <input type="submit" name="publish" class="btn btn-primary btn-lg" value="
                            تایید
                            ">
                        </div>
                    
                    </aside><!--SIDEBAR-->
                    
                    <div class="col-md-8">
                    
                    <div class="form-group">
                        <label for="name">
                            عنوان محصول 
                        </label>
                            <input required type="text" name="name" class="form-control" id="name" value="{{isset($product)?$product->name:Request::old('name')}}" data-error="لطفا این فیلد را  پر نمایید." >
                           <div class="help-block with-errors"></div>
                        </div>
                    
                        <label for="desc">
                                   توضیحات محصول
                                </label>
                        <div class="form-group"  style="padding-top:40px">
                               
                          <textarea name="desc" id="desc" cols="30" rows="10" class="form-control  my-editor" data-error="لطفا این فیلد را  پر نمایید." >{{isset($product)?$product->desc:Request::old('desc')}}</textarea>
                          <div class="help-block with-errors"></div>
                        </div>
                    
                    
                    
                        <div class="form-group row">
                            <div class="col-xs-4">
                            <label for="price_discount">
                                قیمت در تخفیف ویژه
                            </label>
                            <input required type="number" name="price_discount" id="price_discount" class="form-control" size="60" value="{{isset($product)?$product->price_discount:Request::old('price_discount')}}" data-error="لطفا این فیلد را  پر نمایید." >
                            <div class="help-block with-errors"></div>
                          </div>
                          <div class="col-xs-4">
                            <label for="price_sell">
                                قیمت فروش
                            </label>
                            <input required type="number" name="price_sell" id="price_sell" class="form-control" size="60" value="{{isset($product)?$product->price_sell:Request::old('price_sell')}}" data-error="لطفا این فیلد را  پر نمایید." >
                            <div class="help-block with-errors"></div>
                          </div>
                          <div class="col-xs-4">
                            <label for="price_buy">
                                قیمت خرید (تومان)
                            </label>
                            <input required type="number" name="price_buy" id="price_buy" class="form-control" size="60"  value="{{isset($product)?$product->price_buy:Request::old('price_buy')}}" data-error="لطفا این فیلد را  پر نمایید." >
                            <div class="help-block with-errors"></div>
                          </div>
                          
                        </div>
                    
                    
                    
                        <div class="form-group row">
                              <div class="col-xs-6">
                                <label for="weight_unit">
                                   واحد وزن
                                </label>
                                <input required type="text" name="weight_unit" id="weight_unit" class="form-control" size="60" value="{{isset($product)?$product->weight_unit:Request::old('weight_unit')}}" placeholder="گرم،کیلوگرم ، لیتر" data-error="لطفا این فیلد را  پر نمایید." >
                                  <div class="help-block with-errors"></div>
                              </div>
                              <div class="col-xs-6">
                                <label for="weight">
                                    وزن محصول (به صورت عدد)
                                </label>
                                <input required type="text" name="weight" id="weight" class="form-control" size="60" value="{{isset($product)?$product->weight:Request::old('weight')}}" data-error="لطفا این فیلد را  پر نمایید." >
                                 <div class="help-block with-errors"></div>
 
                              </div>
                              

                       </div><!--Main Content-->
                        <div class="form-group">
                           
                                <label for="tags">
                                    برچسبها
                                </label>
                                <input style="text-align:right" name="tags" id="tags" value="{{isset($product)?$product->tagNames:Request::old('tags')}}" />
                              
                        </div>
                    </div>
                    <!-- SIDEBAR-->
                    
                    
                    
                    
                    
                       
                    </form>
                