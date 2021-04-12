<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAdverts()
    {
        return Advert::with('category')->get();
    }


    /**
     * @param Request $request
     */
    public function storeAdverts(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'province' => 'required',
            'city' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'price' => 'required',
            'selected_category_id' => 'required',
            'image' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $request->image->store('images', 'public');
        }

        Advert::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'province' => $request->province,
                'city' => $request->city,
                'contact_number' => $request->contact_number,
                'contact_email' => $request->contact_email,
                'price' => $request->price,
                'category_id' => $request->selected_category_id,
                'image_path' => $request->image->hashName()
            ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {
        if ($request->selected_category) {
            return Advert::where('category_id', '=', $request->selected_category)->get();
        }

        return Advert::where('title', 'like', '%' . $request->title . '%')->get();
    }
}
