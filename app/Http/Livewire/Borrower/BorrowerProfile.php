<?php

namespace App\Http\Livewire\Borrower;

use App\Models\Borrower;
use App\Models\Request;
use Livewire\Component;
use App\Models\BorrowerRequest;
use Livewire\WithPagination;

class BorrowerProfile extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $borrowerId;
    public $action = '';  //flash
    public $message = '';  //flash
    public $borrower_first_name;
    public $borrower_middle_name;
    public $borrower_last_name;

    protected $listeners = [
        'borrowerId',
        'resetInputFields'
    ];
    public function closeModal()
    {
        $this->emit('modalClosed');
    }
    public function closeToolLog()
    {
        $this->emit('resetInputFields');
        $this->emit('closeBorrowerProfile');
    }

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    //edit
    public function borrowerId($borrowerId)
    {
        $this->borrowerId = $borrowerId;
        $borrower = Request::whereId($borrowerId)->first();
        //$this->description = $tool->description;
        $borrower = Borrower::whereId($borrowerId)->first();
        $this->borrower_first_name = $borrower->first_name;
        $this->borrower_middle_name = $borrower->middle_name;
        $this->borrower_last_name = $borrower->last_name;
    }

    public function render()
    {
        $borrowerRequests = Request::where('borrower_id', $this->borrowerId)->paginate($this->perPage);
        return view('livewire.borrower.borrower-profile', [
            'borrowerRequests' => $borrowerRequests,
        ]);
    }
}
