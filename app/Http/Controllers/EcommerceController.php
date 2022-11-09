<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->has('keyword') ? $request->input('keyword') : null;
        $selected_price = $request->has('price') ? $request->input('price') : null;
        $selected_category = $request->has('category') ? $request->input('category') : null;
        $selected_tags = $request->has('tag') ? $request->input('tag') : [];


        $categories = Category::all();
        $tags = Tag::all();
        $products = Product::with(['category', 'tags']);
        if ($keyword != null) {
            $products = $products->where(function ($query) use ($keyword, $products) {
                $query->where('name', 'LIKE', "%$keyword%");
            }
            );
        }
        if ($selected_price != null) {
            $products = $products->when($selected_price, function ($query) use ($selected_price) {
                if ($selected_price == 'price_0_500') {
                    $query->whereBetween('price', [0, 500]);
                } else if ($selected_price == 'price_501_1500') {
                    $query->whereBetween('price', [501, 1500]);
                } else if ($selected_price == 'price_1501_3000') {
                    $query->whereBetween('price', [1501, 3000]);
                } else if ($selected_price == 'price_3001_5000') {
                    $query->whereBetween('price', [3001, 5000]);
                }
            });
        }
        if ($selected_category != null) {
            $products = $products->whereCategoryId($selected_category);
        }
        if (is_array($selected_tags) && count($selected_tags) > 0) {
            $products = $products->whereHas('tags', function ($query) use ($selected_tags) {
                $query->whereIn('product_tag.tag_id', $selected_tags);
            });
        }
        $products = $products->orderBy('id')->paginate(9);

        return view('front.index', [
            'products' => $products,
            'categories' => $categories,
            'tags' => $tags,
            'keyword' => $keyword,
            'selected_price' => $selected_price,
            'selected_category' => $selected_category,
            'selected_tags' => $selected_tags,


        ]);
    }

    public function index_list(Request $request)
    {
        $keyword = $request->has('keyword') ? $request->input('keyword') : null;
        $selected_price = $request->has('price') ? $request->input('price') : null;
        $selected_category = $request->has('category') ? $request->input('category') : null;
        $selected_tags = $request->has('tag') ? $request->input('tag') : [];


        $categories = Category::all();
        $tags = Tag::all();
        $products = Product::with(['category', 'tags']);
        if ($keyword != null) {
            $products = $products->where(function ($query) use ($keyword, $products) {
                $query->where('name', 'LIKE', "%$keyword%");
            }
            );
        }
        if ($selected_price != null) {
            $products = $products->when($selected_price, function ($query) use ($selected_price) {
                if ($selected_price == 'price_0_500') {
                    $query->whereBetween('price', [0, 500]);
                } else if ($selected_price == 'price_501_1500') {
                    $query->whereBetween('price', [501, 1500]);
                } else if ($selected_price == 'price_1501_3000') {
                    $query->whereBetween('price', [1501, 3000]);
                } else if ($selected_price == 'price_3001_5000') {
                    $query->whereBetween('price', [3001, 5000]);
                }
            });
        }
        if ($selected_category != null) {
            $products = $products->whereCategoryId($selected_category);
        }
        if (is_array($selected_tags) && count($selected_tags) > 0) {
            $products = $products->whereHas('tags', function ($query) use ($selected_tags) {
                $query->whereIn('product_tag.tag_id', $selected_tags);
            });
        }
        $products = $products->orderBy('id')->paginate(9);

        return view('front.index_list', [
            'products' => $products,
            'categories' => $categories,
            'tags' => $tags,
            'keyword' => $keyword,
            'selected_price' => $selected_price,
            'selected_category' => $selected_category,
            'selected_tags' => $selected_tags,


        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('front.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function store(Request $request)
    {
    }

    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $product = Product::whereId($id)->first();
        return view('front.create', compact('product', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        dd($id);
    }
}
