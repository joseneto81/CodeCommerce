@extends("template")
@section("content")
<h1>Images of {{ $product->name }}</h1>

<p><a href="{{route('products.images.create', ['id'=>$product->id])}}" class='btn btn-primary'>New</a></p>

<table class='table'>
    <th>Id</th>
    <th>Name</th>
    <th>Extension</th>
    <th>Action</th>
    <tbody>
    @foreach($product->images as $image)
        <tr>
            <td>{{$image->id}}</td>
            <td><img src="{{ url('uploads/'.$image->id.'.'.$image->extension) }}" width='80'/></td>
            <td>{{$image->extension}}</td>
            <td>
                <!--<a href="{{route('products.edit',['id'=>$image->id])}}" class='btn btn-primary'>Edit</a>-->
                <a href="{{route('products.images.destroy',['id'=>$image->id])}}" class='btn btn-danger'>Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ route('products.index') }}" class='btn btn-default'>Voltar</a>
@endsection