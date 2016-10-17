@extends("template")
@section("content")
    <div class='container'>
        <h1>Edit: {{ $product->name }}</h1>

        @if($errors->any())
            <ul>
            @foreach($errors->all() as $error)
                <li  class='alert alert-danger'>{{ $error }}</li>
            @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>['products.update', $product->id], 'method'=>'put']) !!}
            <div class='form-group'>
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}

            </div>

        {!! Form::close() !!}

    </div>

@endsection