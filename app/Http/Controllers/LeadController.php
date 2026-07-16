<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Jobs\SendLeadAdminJob;
use App\Services\LeadService;

class LeadController extends Controller
{
    
    private $leadService;

    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeadRequest $request)
    {
        $lead = $this->leadService->create($request->validated());
        
        if($lead->exists){
            SendLeadAdminJob::dispatch($lead);
        }

        return response()->json(['success'=> true, 'code' => 200]);
    }


}
