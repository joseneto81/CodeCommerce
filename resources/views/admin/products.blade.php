<h1>Products</h1>
<table class='table' border='1'>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <tbody>
    @foreach($products as $product)
        <tr><td>{{ $product->name }}</td><td>{{$product->description}}</td><td>R$ {{$product->price}}</td></tr>
    @endforeach
    </tbody>
</table>