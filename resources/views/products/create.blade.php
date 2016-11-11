@extends("template")
@section("content")
    <div class='container'>
        <h1>Create - Products</h1>

        @if($errors->any())
            <ul>
            @foreach($errors->all() as $error)
                <li  class='alert alert-danger'>{{ $error }}</li>
            @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'products.store']) !!}

            <div class='form-group'>
                {!! Form::label('category','Category:') !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>'5']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label('tag','Tags:', ['class'=>'form-label']) !!}
                {!! Form::textarea('tags', null, ['class'=>'form-control', 'rows'=>'1']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label('description','Price:') !!}
                {!! Form::text('price', null, ['class'=>'']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label('featured','Featured:') !!}
                {!! Form::checkbox('featured', 't', '') !!}

                &nbsp;&nbsp;&nbsp;&nbsp;
                {!! Form::label('recommend','Recommend:') !!}
                {!! Form::checkbox('recommend', 't', '') !!}
            </div>

            <div class='form-group'>
                {!! Form::submit('Enviar Dados', ['class'=>'btn btn-primary']) !!}

            </div>

        {!! Form::close() !!}

    </div>

@endsection