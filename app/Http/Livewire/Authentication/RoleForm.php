<?php

namespace App\Http\Livewire\Authentication;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleForm extends Component
{
    public $roleId, $name;
    public $action = '';  //flash
    public $message = '';  //flash

    public $permissions = [];
    public $selectedPerms = [];

    protected $listeners = [
        'roleId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function roleId($roleId)
    {
        $this->roleId = $roleId;
        $role = Role::find($roleId);
        $this->name = $role->name;
        $this->selectedPerms = $role->permissions->pluck('id')->map(function($id) {
            return (string) $id;
        })->toArray();
    }

    //store
    public function store()
    {
        if (empty($this->permissions)) {
            $this->permissions = array_map('strval', $this->selectedPerms);
        }

        $data = $this->validate([
            'name' => 'required'
        ]);

        if ($this->roleId) {
            $role = Role::find($this->roleId);
            $this->logChanges($role, $data);
            $role->update($data);
            $role->syncPermissions($this->permissions);

            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
            $role = Role::create($data);
            $role->syncPermissions($this->permissions);
            $this->logNewRole($role);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeRoleModal');
        $this->emit('refreshParentRole');
        $this->emit('refreshTable');
    }

    private function logChanges($role, $data)
    {
        $properties = [];
        $logMessage = auth()->user()->first_name . ' updated role: ';

        $fields = ['name'];
        foreach ($fields as $field) {
            if ($role->$field != $data[$field]) {
                $properties["old_$field"] = $role->$field;
                $properties["new_$field"] = $data[$field];
                $logMessage .= ucfirst(str_replace('_', ' ', $field)) . ": " . $role->$field . " to " . $data[$field] . ", ";
            }
        }

        // Log permission changes
        $oldPermissions = $role->permissions->pluck('name')->toArray();
        $newPermissions = Permission::whereIn('id', $this->permissions)->pluck('name')->toArray();

        if ($oldPermissions != $newPermissions) {
            $properties['old_permissions'] = $oldPermissions;
            $properties['new_permissions'] = $newPermissions;
            $logMessage .= "Permissions changed, ";
        }

        if (!empty($properties)) {
            activity()
                ->performedOn($role)
                ->withProperties($properties)
                ->event('updated')
                ->log(rtrim($logMessage, ', '));
        }
    }

    private function logNewRole($role)
    {
        $properties = [
            'new_name' => $role->name,
            'old_permissions' => [],  // No old permissions for new role
            'new_permissions' => Permission::whereIn('id', $this->permissions)->pluck('name')->toArray()
        ];

        $logMessage = auth()->user()->first_name . ' created role. Name: ' . $role->name . '.';

        activity()
            ->performedOn($role)
            ->withProperties($properties)
            ->event('created')
            ->log($logMessage);
    }

    public function render()
    {
        $perms = Permission::all();
        return view('livewire.authentication.role-form', [
            'perms' => $perms
        ]);
    }
}
