<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


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
            case 'ali_express':

                // $response = Http::withHeaders([
                //     'X-RapidAPI-Key' => '80e7514fb3msh1ad443168703a7ep1bc5e5jsnd3785c401df0',
                //     'X-RapidAPI-Host' => 'aliexpress-datahub.p.rapidapi.com'
                // ])->get('https://aliexpress-datahub.p.rapidapi.com/item_detail', [
                //     'itemId' => '3256804591426248'
                // ]);

                $response = Http::withHeaders([
                    'X-RapidAPI-Key' => '80e7514fb3msh1ad443168703a7ep1bc5e5jsnd3785c401df0',
                    'X-RapidAPI-Host' => 'aliexpress-datahub.p.rapidapi.com'
                ])->get('https://aliexpress-datahub.p.rapidapi.com/item_search_2', [
                    'q' => $query,
                    'page' => '1'
                ]);

                $data = json_decode($response->body());

                $searchresults = [];
                foreach ($data->result->resultList as $result) {

                    $searchresults[] = $result->item;
                }
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
                dd($data);
                break;
            case 'Alibaba':
                break;
        }



        //return view('item_detail', ['searchResults' => $searchresults]);
        return response()->json($searchresults);
    }
}
