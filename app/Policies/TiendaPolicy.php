<?php

namespace App\Policies;

use App\Models\Tienda;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TiendaPolicy
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
     * @param  \App\Models\Tienda  $tienda
     * @return mixed
     */
    public function view(User $user, Tienda $tienda)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->rol != '0' and $user->rol != '1' and $user->rol != '2';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tienda  $tienda
     * @return mixed
     */
    public function update(User $user, Tienda $tienda)
    {
        return $user->tienda->id == $tienda->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tienda  $tienda
     * @return mixed
     */
    public function delete(User $user, Tienda $tienda)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tienda  $tienda
     * @return mixed
     */
    public function restore(User $user, Tienda $tienda)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tienda  $tienda
     * @return mixed
     */
    public function forceDelete(User $user, Tienda $tienda)
    {
        //
    }
}
