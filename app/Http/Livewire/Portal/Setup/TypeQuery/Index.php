<?php

namespace App\Http\Livewire\Portal\Setup\TypeQuery;

use Livewire\Component;
use App\Models\TypeQuery;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
  
    public $query = null;
    public $validity , $label , $type;
    public $orderBy = 'created_at';
    public $orderAsc = 'desc';
    public $perPage = 15;

    public function initData($id)
    {
        $type = TypeQuery::findOrFail($id);
        $this->type = $type;
        
        $this->validity = $type->validity;
        $this->label = $type->label;
    }

    public function store()
    {
        // dd("ENTRER");
        $this->validate([
            'label' => 'required',
            'validity' => 'required',
        ]);

        $type = TypeQuery::create([
            'label' => $this->label,
            'validity' => $this->validity,
        ]);

         $this->refresh(__('Type Create successfully!'), 'CreateTypeModal');

    }

    public function update()
    {
        DB::transaction(function () {
            $this->type->update([
                'label' => $this->label,
                'validity' => $this->validity
            ]);
        });

        $this->refresh(__('Type Updated successfully!'), 'EditTypeModal');
    }

    public function delete()
    {
        
        if (!empty($this->type)) {
            $this->type->delete();
        }

        $this->refresh(__('Type successfully deleted!'), 'DeleteModal');
    }

    public function refresh($message, $modal)
    {
        //Close the active modal
        $this->emit('cancel', $modal);
        session()->flash('message', $message);
        $this->clearFields();
        //Refresh the livewire component
        $refresh;
    }

    public function render()
    {
        $types = TypeQuery::orderBy($this->orderBy, $this->orderAsc)->paginate($this->perPage);

        return view('livewire.portal.setup.type-query.index',[
            'types' => $types
        ]);
    }

    public function clearFields()
    {
        $this->reset([
            'label',
            'validity',
        ]);
    }

}
