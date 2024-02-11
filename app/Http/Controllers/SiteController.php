<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Repositories\SiteRepository;
use App\Http\Resources\SiteResource;

class SiteController extends Controller
{
    public function __construct(
        protected SiteRepository $siteRepository
    ) { }
    
    public function getAllSites(Request $request): ResourceCollection
    {
        $sites  = $this->siteRepository->getAll($request->all());
        return SiteResource::collection($sites);
    }
}
