@extends("store.store")

@section("content")
    <section id='cart_items'>
        <div class='container'>
            <div class='table-responsive cart_info'>
                <table class='table table-condensed'>
                    <thead>
                        <tr class='cart_menu'>
                            <td class='image'>Item</td>
                            <td class='description'>Descrição</td>
                            <td class='price'>Preço</td>
                            <td class='qtd'>Quantidade</td>
                            <td class='total'>Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cart->all() as $i=>$item)
                        <tr>
                            <td class='cart_product'>
                                <a href='#'>Imagem</a>
                            </td>
                            <td class='cart_description'>
                                <h4><a href="{{ route('store.product') }}">{{ $item['name'] }}</a></h4>
                                <p>Código {{ $i }}</p>
                            </td>
                            <td class='cart_price'>
                                R$ {{ $item['price'] }}
                            </td>
                            <td class='cart_qtd'>
                                {!! Form::open(['route' => ['cart.update', 'id'=> $i], 'method'=>'post']) !!}
                                {!! Form::text('qtd', $item['qtd'], ['size'=>'1']) !!}
                                {!! Form::hidden('id', $i) !!}
                                {!! Form::submit('Atualizar', ['class'=>'btn btn-warning', 'size'=>'10']) !!}
                                <!-- <a href="{{ route('cart.update') }}"><i class="fa fa-repeat"></i></a>-->
                                {!! Form::close() !!}
                            </td>
                            <td class='cart_total'>
                                <p class='cart_total_price'>R$ {{ $item['price'] * $item['qtd'] }}</p>
                            </td>
                            <td class='cart_delete'>
                                <a href="{{ route('cart.remove', ['id'=>$i]) }}" class='cart_quantity_delete'>Delete</a>
                            </td>
                        </tr>
                        @empty
                            <tr><td class='' colspan='6'><p>Nenhum item no carrinho</p></td></tr>
                        @endforelse

                        <tr class='cart_menu'>
                            <td colspan='6'>
                                <div class='pull-right'>
                                    <span>
                                        TOTAL: R$ {{ $cart->getTotal() }}
                                    </span>
                                    <a href='#' class='btn btn-success' >Fechar Compra</a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </section>
@stop