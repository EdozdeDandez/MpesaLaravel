
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', isset($service)? $service->name : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', isset($service)? $service->description : null, ['class'=>'form-control', 'rows'=>5, 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('code', 'Service Code') }}
    {{ Form::text('code', isset($service)? $service->code : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('product_id', 'Product') }}
    {{ $id = null }}
    <products :selected-product="{{ isset($service) ? $service->product_id : 0 }}" inline-template>
        <div>
            {{ Form::text('', null, ['class' => 'form-control', 'v-model' => 'name', '@input' => 'getProducts', 'placeholder' => 'Search product by name']) }}
            <br>
            <select id="product_id" name="product_id" class="form-control" required>
                <option></option>
                <option v-for="product in products" :value="product.id" :selected="compareID(product.id)">@{{ product.name }}</option>
            </select>
        </div>
    </products>
</div>
