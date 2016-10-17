@extends("template")
@section("content")
<h1>Index - Products</h1>

<p><a href="{{route('products.create')}}" class='btn btn-primary'>New</a></p>
<table class='table'>
    <th>Id</th>
    <th>Name</th>
    <th>Description</th>
    <th>Action</th>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{ $product->name }}</td>
            <td>{{$product->description}}</td>
            <td><a href="{{route('products.edit',['id'=>$product->id])}}" class='btn btn-primary'>Edit</a>
                <a href="{{route('products.delete',['id'=>$product->id])}}" class='btn btn-danger'>Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection