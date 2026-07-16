<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Repositories\Interfaces\LeadRepositoryInterface;

class LeadRepository implements LeadRepositoryInterface
{
       
    public function create(array $data)
    {
        return Lead::create($data);
    }
    
}