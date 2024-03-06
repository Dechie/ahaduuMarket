<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    //
    public function showSearch($apiName)
    {

        return view('search', ['apiName' => $apiName]);
    }

    public function search(Request $request, $apiName)
    {
        $query = $request->input('searchQuery');

        switch ($apiName) {
            case 'Ali Express':

                $response = Http::withHeaders([
                    'X-RapidAPI-Key' => '80e7514fb3msh1ad443168703a7ep1bc5e5jsnd3785c401df0',
                    'X-RapidAPI-Host' => 'aliexpress-datahub.p.rapidapi.com'
                ])->get('https://aliexpress-datahub.p.rapidapi.com/item_detail', [
                    'itemId' => '3256804591426248'
                ]);

                $data = $response->body();

                break;
            case 'Amazon':
                $response = Http::withHeaders([
                    'X-RapidAPI-Key' => '80e7514fb3msh1ad443168703a7ep1bc5e5jsnd3785c401df0',
                    'X-RapidAPI-Host' => 'amazon-product-data6.p.rapidapi.com'
                ])->get('https://amazon-product-data6.p.rapidapi.com/product-by-text', [
                    'keyword' => $query,
                    'page' => '1',
                    'country' => 'US'
                ]);

                $data = $response->body();
                break;
            case 'Alibaba':
                break;
        }
    }
}
