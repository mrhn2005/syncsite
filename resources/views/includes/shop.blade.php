
@foreach($products as $product)
<div class="test">
     @include('includes.product-modal')
 </div>   
@endforeach	


<div class="category-products">
						
						
	<div class="row"> 

	</div>
	<div class="row">
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="shop-square">
			    @foreach ($products as $product)
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					@include('includes.single-product')
				</div>
				@endforeach
				
			</div>

			<!--</div>-->
			
			<div class="pages">
                {{ $products->links() }}
            </div>
		</div>
	</div>
							    
</div>
	
						