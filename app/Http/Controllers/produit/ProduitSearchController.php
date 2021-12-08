<?php

namespace App\Http\Controllers\produit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProduitSearchController extends Controller
{
    private $produitRepository;

    public function __construct(ProduitRepository $produitRepository)
    {
        $this->produitRepository = $produitRepository;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $param=$request->all();
        return $this->produitRepository->searchWithCriteria($param);
    }
}
