<?php

namespace App\Http\Livewire\Request;

use App\Models\Option;
use App\Models\Request;
use Livewire\Component;
use App\Models\Operator;
use App\Models\RequestOperatorKey;

class RequestStartForm extends Component
{
    public $requestId, $option_id;
    public $action = '';  //flash
    public $message = '';  //flash
    public $operatorItems = [];

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
        $this->option_id = $request->option_id;
        $this->operatorItems = $request->request_operator_keys->map(function ($operator) {
            return $operator->operator_id;
        })->toArray();
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'operatorItems' => $this->option_id == 1 ? 'required|array' : 'nullable|array',
        ]);

        if ($this->requestId) {

            foreach ($this->operatorItems as $operatorId) {
                RequestOperatorKey::create([
                    'request_id' => $this->requestId,
                    'operator_id' => $operatorId,
                ]);
            }
            $request = Request::find($this->requestId);
            if ($request) {
                $request->update(['status_id' => 6]); // In progress
                foreach ($request->tool_keys as $toolKey) {
                    $toolKey->update(['status_id' => 6]);
                }
            }


            $action = 'edit';
            $message = 'Successfully Updated';
        }

        $this->emit('flashAction', $action, $message);
        $this->resetInputFields();
        $this->emit('closeRequestStartFormModal');
        $this->emit('refreshParentRequestStartForm');
        $this->emit('refreshTable');
    }

    public function render()
    {
        $options = Option::all();
        $operators = Operator::all();
        return view('livewire.request.request-start-form', [
            'options' => $options,
            'operators' => $operators,
        ]);
    }
}
