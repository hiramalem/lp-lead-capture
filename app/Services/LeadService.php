<?php

namespace App\Services;

use App\Repositories\Interfaces\LeadRepositoryInterface;

class LeadService
{
    protected $leadRepository;

    public function __construct(LeadRepositoryInterface $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }   

    public function create(array $data)
    {
        return $this->leadRepository->create($data);
    }

}