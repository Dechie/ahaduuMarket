<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class SearchController extends Controller
{
    //
    public function showSearch($apiName)
    {

        return view('search', ['apiName' => $apiName]);
    }

    public function search(Request $request, $apiName, $queryy)
    {
        $query = $request->input('query');
                $searchresults = [];
                $res = [];

        Log::info('Received search query:', ['query' => $query]);
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
                    'X-RapidAPI-Key' => 'c8eecfafc3msh950e4cbf27e89f7p1405e0jsn9876bdfdfa36',

                    'X-RapidAPI-Host' => 'aliexpress-datahub.p.rapidapi.com'
                ])->get('https://aliexpress-datahub.p.rapidapi.com/item_search_2', [
                    'q' => $query,
                    'page' => '1',
                    'sort' => 'default'
                ]);

                Log::info('Third-party API response:', ['response' => $response->json()]);
                $data = json_decode($response->body(), true);
                 
                //dd($data);
                //$res = $data;
                //var_dump($data);
                // var_dump($data);
                // if (isset($data->products)) {
                //     foreach ($data->result as $result) {

                //         $searchresults[] = $result;
                //     }
                // } else {
                //     return response()->json(["error" => "no results found"]);
                // }
                
                
                $searchresults = $data;//['result']['resultList'];
                // $result = [];
                // var_dump($searchresults);
                // foreach ($searchresults['item'] as $item) {
                //     $result[] = $item;
                // }
                break;

            case 'Amazon':
                $response = Http::withHeaders([
                    'X-RapidAPI-Key' => 'a9116d38d3mshc3b38ce2942b41cp1edeeejsnfcbdcaa65e39',
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

        return response()->json($searchresults);
        //return response()->json($result);
        //return response()->json(['items' => count($res)]);
    }
}
