@extends("template")
@section("content")
    <div class='container'>
        <h1>Create - Categories</h1>

        @if($errors->any())
            <ul>
            @foreach($errors->all() as $error)
                <li  class='alert alert-danger'>{{ $error }}</li>
            @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'categories.store']) !!}
            <div class='form-group'>
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}

            </div>

        {!! Form::close() !!}

    </div>

@endsection