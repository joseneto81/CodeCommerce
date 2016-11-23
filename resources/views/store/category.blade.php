@extends("store.store")

@section("categories")
    @include("store.partial.categories_partial")
@stop

@section("content")
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <h2 class="title text-center">{{ $category->name }}</h2>

        @foreach($products as $product)
        <div class="col-sm-4">
          <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">

                    @if(count($product->images))
                        <img src="{{ url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension) }}" alt="" />
                    @else
                        <img src="{{url('images/no-img.jpg')}}" alt="" />
                    @endif

                    <h2>{{$product->price}}</h2>
                    <p>{{$product->name}}</p>
                    <a href="http://commerce.dev/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>R$ {{$product->price}}</h2>
                        <p>{{$product->name}}</p>
                        <a href="http://commerce.dev/product/4" class="btn btn-default add-to-cart"><i class="fa fa-crosshairs"></i>Mais detalhes</a>
                        <a href="http://commerce.dev/cart/4/add" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Adicionar no carrinho</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
        @endforeach


        </div>
    </div>
@stop