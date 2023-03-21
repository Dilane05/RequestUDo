<?php

namespace App\Http\Livewire\Portal\Querymanagement\QueryAdmin;

use App\Models\Query;
use App\Models\TeachingUnit;
use Livewire\Component;
use App\Models\TypeQuery;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

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

    public function render()
    {
        
        $queries = Query::get();
        $total_request = $queries->count();
        // dd($total_request);

        return view('livewire.portal.querymanagement.query-admin.index',[
            'queries' => $queries,
            'total_request' => $total_request
        ]);
    }
}
