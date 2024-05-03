<?php

namespace App\Http\Livewire\Security;

use Log;
use Exception;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Security;
use App\Models\Honorific;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class SecurityForm extends Component
{
    use WithFileUploads;

    public $securityId, $first_name, $middle_name, $last_name, $esignature, $honorific_id;
    public $action = '';
    public $message = '';

    protected $listeners = [
        'securityId',
        'resetInputFields'
    ];

    public function resetInputFields()
    {
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function securityId($securityId)
    {
        $this->securityId = $securityId;
        $security = Security::find($securityId);
        $this->first_name = $security->first_name;
        $this->middle_name = $security->middle_name;
        $this->last_name = $security->last_name;
        $this->honorific_id = $security->honorific_id;
    }

    public function store()
    {
        try {
            DB::beginTransaction();

            if ($this->securityId) {
                $data = $this->validate([
                    'first_name' => 'required',
                    'middle_name' => 'nullable',
                    'last_name' => 'required',
                    'honorific_id' => 'nullable',
                ]);
                if ($this->esignature) {
                    $pictureName = Carbon::now()->timestamp . '.' . $this->esignature->extension();
                    $data['esignature'] = $this->esignature->storeAs('esignature', $pictureName, 'public');
                    $filePath = $this->esignature->storeAs('esignature', $pictureName, 'public');
                    Log::info('File stored at: ' . $filePath);
                }
                $security = Security::find($this->securityId);
                $security->update($data);

                $action = 'edit';
                $message = 'Successfully Updated';
            } else {
                $this->validate([
                    'first_name' => 'required',
                    'middle_name' => 'nullable',
                    'last_name' => 'required',
                    'esignature' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    'honorific_id' => 'nullable',
                ]);

                $security = Security::create([
                    'first_name' => $this->first_name,
                    'middle_name' => $this->middle_name,
                    'last_name' => $this->last_name,
                    'esignature' => $this->esignature,
                    'honorific_id' => $this->honorific_id,
                ]);
                $action = 'store';
                $message = 'Successfully Created';
            }

            DB::commit();

            $this->emit('flashAction', $action, $message);
            $this->resetInputFields();
            $this->emit('closeSecurityModal');
            $this->emit('refreshParentSecurity');
            $this->emit('refreshTable');
        } catch (Exception $e) {
            DB::rollBack();
            $errorMessage = $e->getMessage();
            $this->emit('flashAction', 'error', $errorMessage);
        }
    }

    public function render()
    {
        $honorifics = Honorific::all();
        return view('livewire.security.security-form', [
            'honorifics' => $honorifics,
        ]);
    }
}
