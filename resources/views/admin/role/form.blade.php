<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('permissions') ? 'has-error' : ''}}">
    {!! Form::label('permissions', 'Permission', ['class' => 'control-label']) !!}
    {!! Form::select('permissions[]',$permissions,old('permissions')??isset($role)?$role->permissions->pluck('name','name'):null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required','multiple'=>'true'] : ['class' => 'form-control','multiple']) !!}
    {!! $errors->first('permissions', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
