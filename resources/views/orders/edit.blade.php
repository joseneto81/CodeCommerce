@extends('template')

@section('content')
    <h1>Edit Order: {{ $order->id }}</h1>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($order, ['route'=>['admin.orders.update', $order->id], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status_id', $status,  $order->status_id, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save Order', ['class'=>'btn btn-primary']) !!}
            <a href="{{ route('admin.orders.index') }}" class='btn btn-default '>Back</a>
        </div>
    {!! Form::close() !!}

@endsection