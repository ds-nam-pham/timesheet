<?php

namespace App\Policies;

use App\Models\User;
use App\Models\users;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $users)
    {
        //
        // return $user->rank >= $users->rank;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $users)
    {
        //
        // dd($user->rank >= $users->rank);
        // var_dump($user->rank);
        // dd($users->rank);
        return $user->rank >= $users->rank;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $users)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $users)
    {
        //
        // dd($user->rank >= $users->rank);
        // return $user->rank >= $users->rank;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $users
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $users)
    {
        //
    }
}
