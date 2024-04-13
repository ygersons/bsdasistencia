<div class="modal fade" id="admin_users_modals_create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'admin.users.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Correo') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Repetir contraseña') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {!! Form::label(null, 'Rol') !!}
                <div class="form-group border rounded-lg p-2">
                    @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                {!! Form::submit('Crear Usuario', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
