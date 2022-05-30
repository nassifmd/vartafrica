<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['string', 'max:255'],
            'contact' => ['string', 'max:255'],
            // 'email' => ['string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'sex' => ['required'],
            'age' => ['required'],
            'country_code' => ['required'],
            'next_of_kin_name' => ['required'],
            'next_of_kin_phone' => ['required'],
            // 'seed_quantity' => ['required', 'min:5'],
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'last_name' => $input['last_name'],
                'username' => $input['username'],
                // 'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'country_code' => $input['country_code'],
                'contact' => $input['contact'],
                'sex' => $input['sex'],
                'age' => $input['age'],
                'country' => $input['country'],
                'next_of_kin_name' => $input['next_of_kin_name'],
                'next_of_kin_phone' => $input['next_of_kin_phone'],
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
