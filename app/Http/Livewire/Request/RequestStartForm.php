<?php

namespace App\Http\Livewire\Request;

use Carbon\Carbon;
use App\Models\Tool;
use App\Models\Option;
use App\Models\Request;
use Livewire\Component;
use App\Models\Operator;
use App\Models\RequestOperatorKey;

class RequestStartForm extends Component
{
    public $requestId, $option_id, $errorMessage;
    public $action = '';  //flash
    public $message = '';  //flash
    public $operatorItems = [];
    public $approval_toolItems = [];

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
        $this->approval_toolItems = $request->tool_keys->map(function ($tool) {
            return $tool->tool_id;
        })->toArray();
    }

    //store
    public function store()
    {
        $data = $this->validate([
            'operatorItems' => $this->option_id == 1 ? 'required|array' : 'nullable|array',
        ]);

        if ($this->requestId) {
            $request = Request::whereId($this->requestId)->first();
            if ($request->status_id == 10) {
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
                        if ($toolKey->status_id == 10) {
                            $toolKey->update(['status_id' => 2]);// In use
                            $toolKey->update(['dt_started_user_id' => auth()->user()->id]);
                            $toolKey->update(['dt_started' => Carbon::now()->setTimezone('Asia/Manila')]);
                        }
                    }
                }

                foreach ($this->approval_toolItems as $toolId) {
                    $tool = Tool::find($toolId);
                    if ($tool && $tool->status_id == 17) {
                        $tool->update(['status_id' => 2]); // if approved, the tool in the inventory will be "In Use"
                    }
                }

                $request->update(['dt_started_user_id' => auth()->user()->id]);
                $request->update(['dt_started' => Carbon::now()->setTimezone('Asia/Manila')]);

                $action = 'edit';
                $message = 'Successfully Updated';
                $this->emit('flashAction', $action, $message);
                $this->resetInputFields();
                $this->emit('closeRequestStartFormModal');
                $this->emit('refreshParentRequestStartForm');
                $this->emit('refreshTable');
            } else {
                $this->errorMessage = 'You can only start once this requests has been Approved';
            }
        }
    }

    public function render()
    {
        $options = Option::all();
        $operators = Operator::all();
        return view('livewire.request.request-start-form', [
            'options' => $options,
            'operators' => $operators,
            'errorMessage' => $this->errorMessage,
        ]);
    }
}
