<?php

namespace App\Http\Livewire\Security;

use App\Models\User;
use Livewire\Component;
use App\Models\Security;

class SecurityList extends Component
{
    public $securityId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentSecurity' => '$refresh',
        'deleteSecurity',
        'editSecurity',
        'deleteConfirmSecurity'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }

    public function createSecurity()
    {
        $this->emit('resetInputFields');
        $this->emit('openSecurityModal');
    }

    public function editSecurity($securityId)
    {
        $this->securityId = $securityId;
        $this->emit('securityId', $this->securityId);
        $this->emit('openSecurityModal');
    }

    public function deleteSecurity($securityId)
    {
        Security::destroy($securityId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $securities  = Security::all();
        } else {
            $securities  = Security::where('first_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('middle_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
                ->get();
        }
        $users = User::all();
        return view('livewire.security.security-list', [
            'securities' => $securities,
            'users' => $users
        ]);
    }
}
