@extends('admin.layout.auth')

@section('style')
<style>
    #tags_tagsinput{
        width:100% !important;
    }
     #tags_tagsinput span{
        font-size: 110%;
        font-family: Calibri;
     }
     div.tagsinput span.tag a {
         font-size: 140% !important;
         color:white !important;
     }
     div.tagsinput span.tag a:hover{
         color:red!important;
     }

</style>
<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.css" />

@endsection

@section('content')
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                   <div class="col-md-12">
                         <div class="row">
                              @include('includes.messages')
                        <h1 class="page-header" style="margin-right:10px;">
                           اضافه کردن محصول جدید
                        </h1>
                        </div>
                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" style="color:black;">
                        @include('includes.form-product')
                   </div>
                  
                </div>
            </section>
        </section>
@endsection

@section('js')
    @include('includes.tinyeditor')
        <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.min.js" ></script>
    
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css" />
    <script>
        $('#tags').tagsInput({
           autocomplete_url: "{{route('tags.autosearch')}}" 
            });
    </script>
@endsection
