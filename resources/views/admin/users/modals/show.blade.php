<div class="modal fade" id="admin_users_modals_show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-bold">Ver Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <b style="min-width:100px; display: inline-block">Nombre:</b> {{ $user->name }}
                    </li>
                    <li class="list-group-item">
                        <b style="min-width:100px; display: inline-block">Correo:</b> {{ $user->email }}
                    </li>
                    <li class="list-group-item">
                        <b style="min-width:100px; display: inline-block">Rol:</b>
                        @if ($user->roles->count())
                            <td>
                                @foreach ($user->roles as $userrol)
                                    <span class="badge badge-secondary text-nowrap">
                                        {{ $userrol->name }}
                                    </span>
                                @endforeach
                            </td>
                        @else
                            <td>
                                <span class="badge badge-warning text-nowrap">
                                    Sin rol
                                </span>
                            </td>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
