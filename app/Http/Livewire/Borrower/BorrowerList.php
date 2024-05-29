<?php

namespace App\Http\Livewire\Borrower;

use App\Models\Borrower;
use Livewire\Component;
use Livewire\WithPagination;

class BorrowerList extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 10;
    public $borrowerId;
    public $userId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash
 

    protected $listeners = [
        'refreshParentBorrower' => '$refresh',
        'refreshParentBorrowerAccount' => '$refresh',
        'deleteBorrower',
        'editBorrower',
        'deleteConfirmBorrower'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
    }
    public function createRequest($borrowerId)
    {
        $this->borrowerId = $borrowerId;
        $this->emit('resetInputFields');
        $this->emit('borrowerId', $this->borrowerId);
        $this->emit('openRequestModal');
    }

    public function createAccount($borrowerId)
    {
        $this->borrowerId = $borrowerId;
        $this->emit('resetInputFields');
        $this->emit('borrowerId', $this->borrowerId);
        $this->emit('openUserModal');
    }
    public function editBorrowerAccount($userId)
    {
        $this->userId = $userId;
        $this->emit('userId', $this->userId);
        $this->emit('openUserModal');
    }


    public function createBorrowerAccount($borrowerId)
    {
        $this->borrowerId = $borrowerId;
        $this->emit('resetInputFields');
        $this->emit('borrowerId', $this->borrowerId);
        $this->emit('openBorrowerAccountModal');
    }

    public function borrowerProfile($borrowerId)
    {
        $this->borrowerId = $borrowerId;
        //$this->emit('resetInputFields');
        $this->emit('borrowerId', $this->borrowerId);
        $this->emit('openBorrowerProfile');
    }
    public function createBorrower()
    {
        // $borrower = Borrower::with([
        //     'sex',
        //     'college',
        //     'course',
        //     'status',
        // ])
        // ->first();
        
        // dd($borrower);
        $this->emit('resetInputFields');
        $this->emit('openBorrowerModal');
    }

    public function editBorrower($borrowerId)
    {
        $this->borrowerId = $borrowerId;
        $this->emit('borrowerId', $this->borrowerId);
        $this->emit('openBorrowerModal');
    }

    public function deleteBorrower($borrowerId)
    {
        $borrower = Borrower::findOrFail($borrowerId);
        
        // Log the deletion activity
        activity()
            ->causedBy(auth()->user()) // Assuming you have user authentication
            ->performedOn($borrower)
            ->withProperties(['borrower' => $borrower->toArray()])
            ->log('Borrower deleted');
    
        $borrower->delete();
    
        $action = 'success';
        $message = 'Successfully Deleted';
    
        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (!empty($this->search)) {
            $borrowers  = Borrower::where('first_name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('middle_name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('id_number', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->perPage);
           
        } else {
           // $borrowers  = Borrower::paginate($this->perPage);
           $borrowers  = [];
        }

        // $borrower = Borrower::with('sex')->get();

        return view('livewire.borrower.borrower-list', [
            'borrowers' => $borrowers,
            // "borrower" => $borrower
        ]);
    }
}
