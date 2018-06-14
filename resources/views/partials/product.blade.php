@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', isset($product)? $product->name : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', isset($product)? $product->description : null, ['class'=>'form-control', 'rows'=>5, 'required']) }}
</div>
