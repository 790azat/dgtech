<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Pagination\Paginator;

class ItemController extends Controller
{
    public function index() {
        $items = Item::paginate(9);
        $categories = Category::all();
        return view('welcome',['items' => $items, 'categories' => $categories]);
    }

    public function show_item($id) {
        $item = Item::find($id);
        return view('user.item',['item' => $item]);
    }
}
