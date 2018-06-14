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
    {{ Form::label('firstName', 'First Name') }}
    {{ Form::text('firstName', isset($customer) ? $customer->firstName : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('surname', 'Surname') }}
    {{ Form::text('surname', isset($customer)? $customer->surname : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('national_id', 'ID number') }}
    {{ Form::number('national_id', isset($customer)? $customer->national_id : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('phone', 'Phone number') }}
    {{ Form::tel('phone', isset($customer)? $customer->phone : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('date_of_birth', 'Date of birth') }}
    {{ Form::date('date_of_birth', isset($customer)? $customer->date_of_birth : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('agent_id', 'Agent') }}
    {{ $id = null }}
    <agents :selected-agent="{{ isset($customer) ? $customer->agent_id : 0 }}" inline-template>
        <div>
            {{ Form::text('', null, ['class' => 'form-control', 'v-model' => 'name', '@input' => 'getAgents', 'placeholder' => 'Search agent by business name']) }}
            <br>
            <select id="agent_id" name="agent_id" class="form-control" required>
                <option></option>
                <option v-for="agent in agents" :value="agent.id" :selected="compareID(agent.id)">@{{ agent.name }}</option>
            </select>
        </div>
    </agents>
</div>
