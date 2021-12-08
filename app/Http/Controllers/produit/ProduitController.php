<?php

namespace App\Http\Controllers\produit;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Review;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProduitController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $param = $request->all();
        $res = Produit::create($param);

        if ($res) {
            return response()->json(['data' => $res->format(), 'message' => 'Produit cree avec succee'], 200);
        } else {
            return response()->json(['error' => 'Echec creation Produit'], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeProduits(Request $request)
    {
        set_time_limit(0);
        Review::truncate();
        Produit::truncate();
        $client = new Client();
        $res = $client->request('GET', 'https://tech.dev.ats-digital.com/api/products?size=5000');
        $result = $res->getBody();
        $result = json_decode($result, true);
        $listProduit = $result['products'];
        foreach ($listProduit as $produit) {
            $paramProduit = [
                "productName" => $produit["productName"],
                "description" => $produit["description"],
                "price" => $produit["price"],
                "category" => $produit["category"],
                "imageUrl" => $produit["imageUrl"]

            ];
            $res = Produit::create($paramProduit);
            if ($res) {
                foreach ($produit['reviews'] as $review) {

                    $paramReview = [
                        "value" => $review["value"],
                        "content" => $review["content"],
                        "produit_id" => $res->id,
                    ];
                    Review::create($paramReview);
                }
            }
        }
        return "Produits ajoutés avec succès";
    }

    /**
     * Display the specified resource.
     *
     * @param Produit $produit
     * @return Produit
     */
    public function show(Produit $produit)
    {
        return $produit->formatWithReviews();

    }
    /**
     * Display the specified resource.
     *
     * @param Produit $produit
     * @return Produit
     */
    public function getCategory()
    {
        return Produit::select('category')->distinct()->get();

    }

}
