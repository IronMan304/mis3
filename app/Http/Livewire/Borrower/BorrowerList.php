<?php

namespace App\Http\Livewire\Borrower;

use App\Models\Borrower;
use Livewire\Component;

class BorrowerList extends Component
{
    public $borrowerId;
    public $search = '';
    public $action = '';  //flash
    public $message = '';  //flash

    protected $listeners = [
        'refreshParentBorrower' => '$refresh',
        'deleteBorrower',
        'editBorrower',
        'deleteConfirmBorrower'
    ];

    public function updatingSearch()
    {
        $this->emit('refreshTable');
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
        Borrower::destroy($borrowerId);

        $action = 'error';
        $message = 'Successfully Deleted';

        $this->emit('flashAction', $action, $message);
        $this->emit('refreshTable');
    }

    public function render()
    {
        if (empty($this->search)) {
            $borrowers  = Borrower::all();
        } else {
            $borrowers  = Borrower::where('firs_name', 'LIKE', '%' . $this->search . '%')->get();
        }

        // $borrower = Borrower::with('sex')->get();

        return view('livewire.borrower.borrower-list', [
            'borrowers' => $borrowers,
            // "borrower" => $borrower
        ]);
    }
}
