<?php

namespace App\Http\Livewire\Portal\Querymanagement\Query;

use App\Models\Query;
use App\Models\TeachingUnit;
use Livewire\Component;
use App\Models\TypeQuery;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
  
    public $query = null;
    public $orderBy = 'created_at';
    public $orderAsc = 'desc';
    public $perPage = 15;
    
    public $validity , $code , $label , $type , $name , $content_query;
    public $registration_number , $level, $type_query_id , $type_queries;
    public $teaching_unit_id , $teaching_units;
    public $total_request , $request_processed , $unprocessed_request; 

    public function mount()
    {
        $this->type_queries = TypeQuery::all();
        $this->teaching_units = TeachingUnit::all();
        $this->name = auth()->user()->name;
        $this->registration_number = auth()->user()->registration_number;
        $this->level = auth()->user()->level->name;
    }

    public function updatedTypeQueryId($id)
    {
        if (!empty($id)) {
            $type = TypeQuery::findOrFail($id);
            if (!empty($type->id)) {
                $this->validity = $type->validity;
            }
        } else {
            $this->code = '';
            $this->validity = '';
        }
    }

    public function store()
    {
        
        $this->validate([
            'name' => 'required',
            'registration_number' => 'required',
            'level' => 'required',
            'validity' => 'required',
            'type_query_id' => 'required',
            'teaching_unit_id' => 'required',
            'content_query' => 'required'
        ]);

        $query = Query::create([
            'name' => $this->name,
            'code' => 'Query' . rand(000000, 999999),
            'type_query_id' => $this->type_query_id,
            'teaching_unit_id' => $this->teaching_unit_id,
            'description' => $this->content_query,
            'user_id' => auth()->user()->id,
            'created_by' => auth()->user()->name,
        ]);

        $this->refresh(__('Query Create successfully!'), 'CreateQueryModal');

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


    public function clearFields()
    {
        $this->reset([
            'name',
            'code',
            'type_query_id',
            'teaching_unit_id',
            'content_query',
        ]);
    }

    public function render()
    {

        $queries = Query::where('user_id',auth()->user()->id)->get();
        return view('livewire.portal.querymanagement.query.index',[
            'queries' => $queries
        ]);
    }
}
