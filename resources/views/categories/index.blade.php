@extends("template")
@section("content")
<h1>Index - Categories</h1>

<p><a href="{{route('categories.create')}}" class='btn btn-success'>New</a></p>
{!!$categories->render()!!}
<table class='table'>
    <th>Id</th>
    <th>Name</th>
    <th>Description</th>
    <th>Action</th>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{ $category->name }}</td>
            <td>{{$category->description}}</td>
            <td><a href="{{route('categories.edit',['id'=>$category->id])}}" class='btn btn-info'>Edit</a>
                <a href="{{route('categories.delete',['id'=>$category->id])}}" class='btn btn-danger'>Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
{!!$categories->render()!!}
@endsection