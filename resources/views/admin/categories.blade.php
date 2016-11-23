<h1>Categories</h1>
<u>
<table class='table' border='1'>
    <th>Name</th>
    <th>Description</th>
    <tbody>
    @foreach($categories as $categories)
        <tr><td>{{ $categories->name }}</td><td>{{$categories->description}}</td></tr>
    @endforeach
    </tbody>
</table>
</ul>