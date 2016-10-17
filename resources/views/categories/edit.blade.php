@extends("template")
@section("content")
    <div class='container'>
        <h1>Edit: {{ $category->name }}</h1>

        @if($errors->any())
            <ul>
            @foreach($errors->all() as $error)
                <li  class='alert alert-danger'>{{ $error }}</li>
            @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>['categories.update', $category->id], 'method'=>'put']) !!}
            <div class='form-group'>
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::label('description','Post:') !!}
                {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}

            </div>

        {!! Form::close() !!}

    </div>

@endsection