<?php

namespace App\Policies;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PedidoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pedido  $pedido
     * @return mixed
     */
    public function view(User $user, Pedido $pedido)
    {
        return $user->id == $pedido->usuario_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pedido  $pedido
     * @return mixed
     */
    public function update(User $user, Pedido $pedido)
    {
        if($user->id == $pedido->usuario_id or $user->tienda->id == $pedido->tienda_id){
            if($user->id == $pedido->usuario_id and $pedido->estado == 1){
                return true;
            }
            elseif($user->tienda->id == $pedido->tienda_id and $pedido->estado != 5){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pedido  $pedido
     * @return mixed
     */
    public function delete(User $user, Pedido $pedido)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pedido  $pedido
     * @return mixed
     */
    public function restore(User $user, Pedido $pedido)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pedido  $pedido
     * @return mixed
     */
    public function forceDelete(User $user, Pedido $pedido)
    {
        //
    }
}
