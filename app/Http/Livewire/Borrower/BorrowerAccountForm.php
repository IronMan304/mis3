<?php

namespace App\Http\Livewire\Borrower;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\Borrower;
use App\Models\User;
use Livewire\Component;

class BorrowerAccountForm extends Component
{
    public $user_id, $borrowerId, $last_name, $first_name, $middle_name, $email, $password, $position_id, $position;
    public $action = '';  //flash
    public $message = '';  //flash
    public $showButton = true;
    protected $listeners = [
        'borrowerId',
        'resetInputFields',

    ];
    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function borrowerId($borrowerId)
    {
        $this->borrowerId = $borrowerId;
        $borrower = Borrower::whereId($borrowerId)->first();
        $this->first_name = $borrower->first_name;
        $this->middle_name = $borrower->middle_name;
        $this->last_name = $borrower->last_name;
        // $this->username = strtolower($this->first_name . $this->last_name);
        // $this->username = str_replace(' ', '', $this->username);
        $this->position = $borrower->position;
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
                'password' => ['required', 'min:6']
            ]);

            $borrower = Borrower::find($this->borrowerId);
    
           // Concatenate and convert to lowercase
            $user = User::create([
                'id' => $this->user_id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'middle_name' => $this->middle_name,
                // 'username' => $this->username,
                //'position' => $this->position,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'position_id' => $borrower->position_id,
            ]);
    
            // Assign the "requester" role to the user
            $user->assignRole('requester');
    
    
    
            // Update the user_id field in the borrower model
            $borrower->user_id = $user->id; // Set the user_id to the ID of the newly created user
            $borrower->save(); // Save the changes to the borrower record

          
    
            $action = 'store';
            $message = 'Account Successfully Created';
            $this->emit('flashAction', $action, $message);
            $this->resetInputFields();
            $this->emit('closeBorrowerAccountModal');
            $this->emit('refreshParentBorrowerAccount');
            $this->emit('refreshTable');
            //$this->reset();
        }
    public function render()
    {
        $borrowerId = $this->borrowerId;
        return view('livewire.borrower.borrower-account-form', [
            'borrowerId' => $borrowerId,
        ]);
    }
}
