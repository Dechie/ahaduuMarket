<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    //
    public function index() {
        $items = Item::all();   
        //return view('pages.items', compact('items')); 
        return response()->json($items);
    }
    public function store(Request $request)
    {
        $values = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'main_image' => 'required|image',
            'additional_images.*' => 'nullable|image|max:2048'
        ]);

        $itemValues = $request->only(['title', 'description', 'price']);

        $image = $request->file('main_image');
        $ext = $image->getClientOriginalExtension();
        $imagePath = '/images/' . $values['title'] . 'main.' . $ext;
        $image->move(public_path() . '/images/', $values['title'] . 'main.' . $ext);

        $itemValues['main_image'] = 0;
        $item = Item::create($itemValues);

        //dd($item->id);
        if ($item) {
            $pic = Picture::create([
                'filename' => $imagePath,
                'item_id' => $item->id,
            ]);
        }


        $counter = 1;
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $img) {
                $ext = $img->getClientOriginalExtension();
                $imgPath = '/images/' . $values['title'] . 'additional-' . $counter . '.' . $ext;
                $img->move(public_path() . '/images/', $values['title'] . 'additional-' . $counter . '.' . $ext);
                $counter++;

                Picture::create([
                    'filename' => $imgPath,
                    'item_id' => $item->id,
                ]);
            }
        }

        //return back()->with('success', 'Images have been uploaded');
        $items = Item::all();
        return view('pages.items', compact('items'));
    }
    
}
