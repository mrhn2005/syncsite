@if(count($products)<1)

<div class="col-sm-9 col-sm-pull-3">
	
	<div class="text-center" style="font-size:160%; height:300px;direction:rtl;font-weight:bold">
	    محصولات این دسته به زودی به محلی جات افزوده خواهند شد.
	</div>
</div>

@else
<div class="col-sm-9 col-sm-pull-3">
	
    <div class="posts" id="containerDiv">
    	<div class="category-products">

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
    </div>
</div>
@endif