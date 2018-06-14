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
    {{ Form::text('firstName', isset($agent)? $agent->firstName : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('surname', 'Surname') }}
    {{ Form::text('surname', isset($agent)? $agent->surname : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('name', 'Business name') }}
    {{ Form::text('name', isset($agent)? $agent->name : null, ['class'=>'form-control', 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('date_of_birth', 'Date of birth') }}
    {{ Form::date('date_of_birth', isset($agent)? $agent->date_of_birth : null, ['class'=>'form-control', 'required']) }}
</div>

