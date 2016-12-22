@extends("store.store")
@section('content')
 <div class="container">
     <h3>Meus Pedidos</h3>
     <table class="table table-striped table-condensed table-responsive">
         <tr>
         <tbody>
             <tr>
                 <th>#ID</th>
                  <th>Itens</th>
                   <th>Valor</th>
                    <th>Status</th>
             </tr>
             @foreach($orders as $order)
             <tr>
                 <td>{{ $order->id}}</td>
                 <td>
                     <ul>
                        @foreach($order->items as $item)
                        <li> {{ $item->product->name }} {{$item->product->price}}</li>
                        @endforeach
                     </ul>
                 </td>
                   <td>{{ $order->total}}</td>
                    <td>{{ $order->status->name}}</td>
             </tr>
             @endforeach
         </tbody>
         </tr>
     </table>
</div>
 @stop