<?php

namespace App\Http\Controllers\produit;

use App\Models\Produit;
use App\Models\Societe;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class ProduitRepository
{
    private $offset = 0;
    private $limit = 50;

    public function searchWithCriteria($criteria, $withLimit = true)
    {
        if (isset($criteria['offset'])) {
            $this->offset = $criteria['offset'];
        }
        if (isset($criteria['limit']) && $criteria['limit'] < 50) {
            $this->limit = $criteria['limit'];
        }
        /** @var Builder $qr */
        $qr = Produit::orderBy('id');
        foreach ($criteria as $key => $value) {
            if ($value != null) {
                switch ($key) {
                    case 'productName':
                        $qr->where('productName', 'like', '%' . $value . '%');
                        break;
                    case 'category':
                        $qr->where('category', 'like', '%' . $value . '%');
                        break;
                    case 'price':
                        $qr->where('price', '>', $value);
                        break;
                }

            }
        }
        $count=$qr->count();
        $qr->offset($this->offset)->limit($this->limit);
        return ["produits"=>$qr->get()->map->format(),"totalCount"=>$count];
    }
}
