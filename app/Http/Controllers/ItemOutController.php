<?php

namespace App\Http\Controllers;

use App\Models\ItemOut;
use App\Models\ItemIn;
use App\Models\Item;
use App\Http\Requests\StoreItemOutRequest;
use App\Http\Requests\UpdateItemOutRequest;

class ItemOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $itemOuts = ItemOut::with('itemIn.item')->get();

        return view('itemouts.index', compact('itemOuts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Item $item)
    {
        //
        $itemins = $item->itemIns->where('quantity', '>', 0);
        return view('itemouts.create', compact('itemins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreItemOutRequest $request)
    // {
    //     //
    //     $itemout = new ItemOut();
    //     $itemins = ItemIn::find($request->item_in_id);
    //     $itemout->item_in_id = $request->item_in_id;
    //     $itemout->quantity = $request->quantity;
    //     $itemout->save();
    //     // Update the item's stock
    //     $itemins->quantity -= $request->quantity;
    //     $itemins->save();
    //     $item = Item::find($itemins->item_id);
    //     function updateItem($item) {
    //         $value = 0;
    //         foreach ($item->itemIns as $In) {
    //             if ($In->quantity > 0) {
    //                 $item->quantity += $In->quantity;
    //                 $value += $In->quantity * $In->price;
    //             }
    //         }
    //         if ($item->quantity > 0) {
    //             $item->price = $value / $item->quantity;
    //         } else {
    //             $item->price = 0; // Avoid division by zero
    //         }
    //         $item->value = $value;
    //         $item->save();
    //     }
    //     updateItem($item);
    //     return redirect(route('items.index', $item->id));
    // }

    public function store(StoreItemOutRequest $request)
    {
        $itemIn = ItemIn::findOrFail($request->item_in_id);
        // Prevent overdraft
        if ($request->quantity > $itemIn->quantity) {
            return back()->withErrors(['quantity' => 'Not enough quantity available in stock.']);
        }

        // Create ItemOut record
        $itemOut = new ItemOut();
        $itemOut->item_in_id = $itemIn->id;
        $itemOut->quantity = $request->quantity;
        $itemOut->save();

        // Decrease quantity from ItemIn
        $itemIn->quantity -= $request->quantity;
        $itemIn->save();

        // Recalculate the item stock and price
        $item = Item::with('itemIns')->find($itemIn->item_id);
        $itemOut->price = $item->price; // Set the price from the item
        $itemOut->save();
        $totalQuantity = 0;
        $totalValue = 0;

        foreach ($item->itemIns as $in) {
            if ($in->quantity > 0) {
                $totalQuantity += $in->quantity;
                $totalValue += $in->quantity * $in->price;
            }
        }

        $item->quantity = $totalQuantity;
        $item->price = $totalQuantity > 0 ? $totalValue / $totalQuantity : 0;
        $item->value = $totalValue;
        $item->save();
        return redirect(route('items.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemOut $itemOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemOut $itemOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemOutRequest $request, ItemOut $itemOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemOut $itemOut)
    {
        //
    }
}
