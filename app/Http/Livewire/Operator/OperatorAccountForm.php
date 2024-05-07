<?php

namespace App\Http\Livewire\Operator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Operator;
use App\Models\User;
use Livewire\Component;

class OperatorAccountForm extends Component
{
    public $user_id, $operatorId, $last_name, $first_name, $middle_name, $email, $password, $position_id, $position;
    public $action = '';  //flash
    public $message = '';  //flash
    public $showButton = true;
    protected $listeners = [
        'operatorId',
        'resetInputFields',

    ];
    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function operatorId($operatorId)
    {
        $this->operatorId = $operatorId;
        $operator = Operator::whereId($operatorId)->first();
        $this->first_name = $operator->first_name;
        $this->middle_name = $operator->middle_name;
        $this->last_name = $operator->last_name;
        // $this->username = strtolower($this->first_name . $this->last_name);
        // $this->username = str_replace(' ', '', $this->username);
        $this->position = $operator->position;
        $this->email = strtolower($this->first_name . $this->last_name . "@gmail.com");
        $this->email = str_replace(' ', '', $this->email);
        $this->password = Str::random(8); // Generate a random passcode of length 8
    }
        //store
        public function store()
        {
            $data = $this->validate([
                'last_name' => 'required',
                'first_name' =>  'required',
                'middle_name' =>  'nullable',
                // 'username' =>  'required',
                //'position' => 'required',
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:6'],
                'position_id' =>  'nullable',
            ]);

            $operator = Operator::find($this->operatorId);
            $user = User::create($data);
           // Concatenate and convert to lowercase
            // $user = User::create([
            //     //'id' => $this->user_id,
            //     'first_name' => $this->first_name,
            //     'last_name' => $this->last_name,
            //     'middle_name' => $this->middle_name,
            //     // 'username' => $this->username,
            //     //'position' => $this->position,
            //     'email' => $this->email,
            //     'password' => Hash::make($this->password),
            //     'position_id' => $operator->position_id,
            // ]);
    
            // Assign the "operator" role to the user
            $user->assignRole('operator');
    
    
    
            // Update the user_id field in the Operator model
            $operator->user_id = $user->id; // Set the user_id to the ID of the newly created user
            $operator->save(); // Save the changes to the Operator record

          
    
            $action = 'store';
            $message = 'Account Successfully Created';
            $this->emit('flashAction', $action, $message);
            $this->resetInputFields();
            $this->emit('closeOperatorAccountModal');
            $this->emit('refreshParentOperatorAccount');
            $this->emit('refreshTable');
            //$this->reset();
        }
    public function render()
    {
        $operatorId = $this->operatorId;
        return view('livewire.operator.operator-account-form', [
            'operatorId' => $operatorId,
        ]);
    }
}
