<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Models\Position;
use App\Models\Security;
use App\Models\Honorific;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserForm extends Component
{
    public $userId, $first_name, $middle_name, $last_name, $position_id, $email, $password, $password_confirmation, $honorific_id;
    public $action = '';  //flash
    public $message = '';  //flash
    public $roleCheck = array();
    public $selectedRoles = [];

    protected $listeners = [
        'userId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function userId($userId)
    {
        $this->userId = $userId;
        $user = User::find($userId);
        $this->first_name = $user->first_name;
        $this->middle_name = $user->middle_name;
        $this->last_name = $user->last_name;
        $this->position_id = $user->position_id; // Changed from position to position
        $this->honorific_id = $user->honorific_id;
        $this->email = $user->email;

        $this->selectedRoles = $user->getRoleNames()->toArray();
    }

    public function store()
    {
        if (is_object($this->selectedRoles)) {
            $this->selectedRoles = json_decode(json_encode($this->selectedRoles), true);
        }

        if (empty($this->roleCheck)) {
            $this->roleCheck = array_map('strval', $this->selectedRoles);
        }

        $is_president = false;
        foreach ($this->roleCheck as $role) {
            if ($role == 'president' || $role == 'vice-president' || $role == 'admin' || $role == 'staff' || $role == 'head of office') {
                $is_president = true;
            }
        }

        if ($this->userId) {

            $data = $this->validate([
                'first_name'    => 'required',
                'middle_name'   => 'nullable',
                'last_name'     => 'required',
                'position_id'      => 'nullable',
                'honorific_id'      => 'nullable',
                'email'         => ['required', 'email'],

            ]);


            $user = User::find($this->userId);
            $this->logChanges($user, $data, 'updated', $this->selectedRoles);
            $user->update($data);

            $president = Security::where('user_id', $user->id)->first();
            if ($is_president == true) {
                if ($president == null) {
                    Security::create([
                        'user_id'       => $user->id,
                        'first_name'    => $this->first_name,
                        'middle_name'   => $this->middle_name,
                        'last_name'     => $this->last_name
                    ]);
                } else {
                    $president->update([
                        'first_name'    => $this->first_name,
                        'middle_name'   => $this->middle_name,
                        'last_name'     => $this->last_name
                    ]);
                }
            } else {
                if ($president != null) {
                    $president->delete();
                }
            }
            if (!empty($this->password)) {
                $this->validate([
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);

                $user->update([
                    'password' => Hash::make($this->password),
                ]);
            }

            $user = User::find($this->userId);

            $user->update($data);


            // Update the doctor's assigned departments
            // $this->updateUserBranches($user);
            // $this->updateUserDepartments($user);
            // $this->updateDoctorSpecializations($user);

            $user->syncRoles($this->roleCheck);

            $action = 'edit';
            $message = 'Successfully Updated';
        } else {

            $this->validate([
                'first_name'    => 'required',
                'middle_name'   => 'nullable',
                'last_name'     => 'required',
                'position_id'      => 'nullable',
                'honorific_id'      => 'nullable',
                'email'         => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password'      => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'first_name'    => $this->first_name,
                'middle_name'   => $this->middle_name,
                'last_name'     => $this->last_name,
                'position_id'      => $this->position_id,
                'honorific_id'      => $this->honorific_id,
                'email'         => $this->email,
                'password'      => Hash::make($this->password)
            ]);

            $user->assignRole($this->roleCheck);

            if ($is_president == true) {
                Security::create([
                    'user_id'       => $user->id,
                    'first_name'    => $this->first_name,
                    'middle_name'   => $this->middle_name,
                    'last_name'     => $this->last_name
                ]);
            }
            // $this->createUserBranches($user);
            // $this->createUserDepartments($user);
            $this->logNewUser($user);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeUserModal');
        $this->emit('refreshParentUser');
        $this->emit('refreshTable');
    }
    private function logChanges($user, $data, $action, $roles)
    {
        $properties = [];
        $logMessage = auth()->user()->first_name . " $action user: ";

        $fields = ['first_name', 'middle_name', 'last_name', 'email', 'position_id', 'honorific_id']; // Add more fields if needed
        foreach ($fields as $field) {
            if ($user->$field != $data[$field]) {
                $properties["old_$field"] = $user->$field;
                $properties["new_$field"] = $data[$field];
                $logMessage .= ucfirst(str_replace('_', ' ', $field)) . ": " . $user->$field . " to " . $data[$field] . ", ";
            }
        }

        // Check for role changes
        $oldRoles = $user->getRoleNames()->toArray();
        $newRoles = $roles; // Use the passed roles
        if ($oldRoles != $newRoles) {
            $properties['old_roles'] = implode(', ', $oldRoles);
            $properties['new_roles'] = implode(', ', $newRoles);
            $logMessage .= "Roles changed from " . implode(', ', $oldRoles) . " to " . implode(', ', $newRoles) . ", ";
        }

        if (!empty($properties)) {
            activity()
                ->performedOn($user)
                ->withProperties($properties)
                ->event('updated')
                ->log(rtrim($logMessage, ', '));
        }
    }



    private function logNewUser($user)
    {
        $properties = [
            'new_first_name' => $user->first_name,
            'new_middle_name' => $user->middle_name,
            'new_last_name' => $user->last_name,
            'new_email' => $user->email,
            'new_position_id' => $user->position_id,
            'new_honorific_id' => $user->honorific_id,
            'new_roles' => implode(', ', $user->getRoleNames()->toArray()) // Add roles
        ];

        $logMessage = auth()->user()->first_name . ' created user. Email: ' . $user->email . '.';

        activity()
            ->performedOn($user)
            ->withProperties($properties)
            ->event('created')
            ->log($logMessage);
    }

    public function render()
    {
        $roles = Role::all();
        $positions = Position::all();
        $honorifics = Honorific::all();
        return view('livewire.user.user-form', [
            'roles' => $roles,
            'positions' => $positions,
            'honorifics' => $honorifics,
        ]);
    }
}
