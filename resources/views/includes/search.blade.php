<form action="{{route('product.search')}}" id="search-form">
    <input id="search-term" type="text" name="term" value="{{Request::get('term')}}" style="direction: rtl;padding-right: 10px;" placeholder="نام محصول مورد نظر را جستجو کنید ... " />
    <button id="submit"><i class="fa fa-search"></i></button>
    
    
</form>