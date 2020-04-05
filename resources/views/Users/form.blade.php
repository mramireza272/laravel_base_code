<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input class="form-control" type="text" name="name" value="{{ $user->name ?? old('name')}}" placeholder="Nombre" style="font-size: 16px;margin-top: 19px;">
{!! $errors->first('name', '<small class="help-block text-danger">:message</small>') !!} 
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 19px;">
    	<input class="form-control" type="text" name="paterno" value="{{ $user->paterno ?? old('paterno')}}" placeholder="Paterno" style="font-size: 16px;">
		{!! $errors->first('paterno', '<small class="help-block text-danger">:message</small>') !!} 
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0" style="margin-top: 19px;">
    	<input class="form-control" type="text" name="materno" value="{{ $user->materno ?? old('materno')}}" placeholder="Materno" style="font-size: 16px;" >
		{!! $errors->first('materno', '<small class="help-block text-danger">:message</small>') !!} 
    </div>
</div>
<div class="form-group">
	<input class="form-control" type="email" name="email" value="{{ $user->email ?? old('email')}}" placeholder="Correo Electrónico Personal"  style="font-size: 16px;margin-top: 16px;">{!! $errors->first('email', '<small class="help-block text-danger">:message</small>') !!}
</div>
<div class="form-group">
	<input class="form-control" type="email" name="email_confirmation" value="{{ $user->email ?? old('email_confirmation') }}" placeholder="Confirmar Correo Electrónico Personal" style="font-size: 16px;">{!! $errors->first('email_confirmation', '<small class="help-block text-danger">:message</small>') !!}
</div>
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input class="form-control" type="password" name="password" placeholder="**********" style="font-size: 16px;">
        {!! $errors->first('password', '<small class="help-block text-danger">:message</small>') !!}
    </div>
    <div class="col-sm-6 mb-3 mb-sm-0">
        <input class="form-control" type="password" name="password_confirmation" placeholder="**********" style="font-size: 16px;">
        {!! $errors->first('password_confirmation', '<small class="help-block text-danger">:message</small>') !!} 
    </div>
    <input type="hidden" name="auth" value="{{ auth()->user()->id }}">
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <hr>

    <div class="col-sm-6 mb-3 mb-sm-0" style="width: 114px;margin-top: 18px;">
        <label class="col-form-label" style="font-size: 16px;">Rol Asignado*</label>
    </div>

    <div class="col-sm-6 align-self-center" style="margin-top: 18px;">
    @foreach($roles as $id => $name)
        @php($check = str_random(5))
        <div class="checkbox">
        	<input id="{{ $check }}" class="magic-radio" type="radio" name="roles[]" value="{{ $id }}">
        		@if(isset($default))
        			{{ ($id == 5) ? 'checked' : '' }}
        		@else
        			{{ $user->roles->pluck('name')->contains($id) ? 'checked' : ''}}
        		@endif
            <label for="{{ $check }}">{{ $name }}</label>
        </div>
    @endforeach
    {!! $errors->first('roles', '<small class="help-block text-danger">:message</small>') !!}
</div>
</div><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="background-color: rgb(5,61,27);font-size: 18px;">{{ isset($btnText) ? $btnText : 'Guardar' }}</button>
<hr>
<a button class="btn btn-primary btn-block text-white btn-user" type="button"  href="{{ route('usuarios.index') }}" style="background-color: #2b7418;font-size: 18px;">Regresar</button>
</a>

