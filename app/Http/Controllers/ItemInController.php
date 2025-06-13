<?php

namespace App\Http\Controllers;

use App\Models\ItemIn;
use App\Models\Item;
use App\Http\Requests\StoreItemInRequest;
use App\Http\Requests\UpdateItemInRequest;

class ItemInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $itemIns = ItemIn::all();
        return view('itemins.index', compact('itemIns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $items = Item::select('name','id')->get();
        return view('itemins.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreItemInRequest $request)
    // {
    //     //
    //     $itemIn = new ItemIn();
    //     $itemIn->item_id = $request->item_id;
    //     $itemIn->quantity = $request->quantity;
    //     $itemIn->price = $request->price;
    //     $itemIn->save();
    //     // Update the item's stock
    //     $item = Item::find($itemIn->item_id);
    //     function updateItem($item){
    //         $value = 0;
    //         foreach ($item->itemIns as $In) {
    //             if($In->quantity > 0) {
    //                 $item->quantity += $In->quantity;
    //                 $value += $In->quantity * $In->price;
    //             }
    //         }
    //         $item->price = $value/ $item->quantity;
    //         $item->value = $value;
    //         $item->save();
    //     }
    //     updateItem($item);

    //     return redirect(route('item-ins.index'));
    // }
    public function store(StoreItemInRequest $request)
    {
        // Create new ItemIn record
        $itemIn = new ItemIn();
        $itemIn->item_id = $request->item_id;
        $itemIn->quantity = $request->quantity;
        $itemIn->price = $request->price;
        $itemIn->save();

        // Recalculate stock for the related item
        $item = Item::with('itemIns')->find($itemIn->item_id);

        $totalQuantity = 0;
        $totalValue = 0;

        foreach ($item->itemIns as $in) {
            if ($in->quantity > 0) {
                $totalQuantity += $in->quantity;
                $totalValue += $in->quantity * $in->price;
            }
        }

        if ($totalQuantity > 0) {
            $item->quantity = $totalQuantity;
            $item->price = $totalValue / $totalQuantity;
            $item->value = $totalValue;
            $item->save();
        }

        return redirect(route('item-ins.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemIn $itemIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemIn $itemIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemInRequest $request, ItemIn $itemIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemIn $itemIn)
    {
        //
    }
}
