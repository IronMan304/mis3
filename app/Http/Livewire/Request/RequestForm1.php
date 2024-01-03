<?php

namespace App\Http\Livewire\Request;

use App\Models\Borrower;
use App\Models\Request;
use App\Models\Tool;
use Livewire\Component;

class RequestForm1 extends Component
{
    public $requestId, $request_number, $user_id, $borrower_id, $tool_id, $status_id;
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'requestId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function requestId($requestId)
    {
        $this->requestId = $requestId;
        $request = Request::whereId($requestId)->first();
        $this->request_number = $request->request_number;
        $this->borrower_id = $request->borrower_id;
        $this->tool_id = $request->tool_id;
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'request_number' => 'required',
            'borrower_id' => 'required',
            'tool_id' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['status_id'] = 6;

        if ($this->requestId) {
            Request::whereId($this->requestId)->first()->update($data);
            $action = 'edit';
            $message = 'Successfully Updated';
        } else {
    
            Request::create($data);
            $action = 'store';
            $message = 'Successfully Created';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeRequestModal');
        $this->emit('refreshParentRequest');
        $this->emit('refreshTable');
    }

    public function render()
    {
        $borrowers = Borrower::all();
        $tools = Tool::all();
        return view('livewire.request.request-form1', [
            'borrowers' => $borrowers,
            'tools' => $tools,
        ]);
    }
}
