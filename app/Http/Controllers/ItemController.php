<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    //
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
        $imagePath = public_path() . '/images/' . $values['title'] . '.' . $ext;
        $image->move($imagePath);

        $itemValues['main_image'] = 0;
        $item = Item::create($itemValues);

        //dd($item->id);
        if ($item) {
            dd($item["id"]);
            dd($item);
            $pic = Picture::create([
                'filename' => $imagePath,
                'item_id' => $item["id"],
            ]);
        }


        $counter = 0;
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $img) {
                $ext = $img->getClientOriginalExtension();
                $imgPath = public_path() . '\/images\/' . $values['title'] . $counter . '.' . $ext;
                $img->move($imgPath);

                Picture::create([
                    'filename' => $imagePath,
                    'item_id' => $item->id,
                ]);
            }
        }

        return back()->with('success', 'Images have been uploaded');
    }
    public function unstore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'main_image' => 'required|image',
            'additional_images.*' => 'nullable|image|max:2048'
        ]);

        $itemValues = $request->only(['title', 'description', 'price']);

        // Upload main image
        $mainImage = $request->file('main_image');
        $mainImagePath = $mainImage->store('images', 'public');
        $itemValues['main_image'] = $mainImagePath;

        // Create item
        $item = Item::create($itemValues);

        // Upload additional images
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $additionalImage) {
                $additionalImagePath = $additionalImage->store('images', 'public');
                Picture::create([
                    'filename' => $additionalImagePath,
                    'item_id' => $item->id // Associate image with item
                ]);
            }
        }

        return back()->with('success', 'Item has been created successfully');
    }
}
