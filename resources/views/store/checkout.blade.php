@extends("store.store")

@section("content")
    <section id='order'>
        <div class='col-sm-9 padding-right'>
            <p>
                @if(isset($order))
                    <h3> Pedido #{{$order->id }} realizado com sucesso! </h3>
                @else
                    <h3>Carrinho de compras vazio.</h3>
                @endif
            </p>
        </div>
    </section>
@stop