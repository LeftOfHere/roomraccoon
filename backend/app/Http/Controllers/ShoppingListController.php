<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function getLists()
    {
        return response()->json(['message' => 'not implemented'], 501);
    }

    public function createList(Request $request)
    {
        return response()->json(['message' => 'not implemented'], 501);
    }

    public function getList($listId)
    {
        $result = app('db')->select("SELECT * FROM listItem WHERE listId = :id", ['id' => $listId]);

        return response()->json($result, 200);
    }

    public function deleteList($listId)
    {
        return response()->json(['message' => 'not implemented'], 501);
    }

    public function createListItem(Request $request, $listId)
    {
        $item = ListItem::parseJson($request);
        $result = app('db')->insert("INSERT INTO listItem (name, checked, listId) VALUES (?,?,?)", [$item->getName(), $item->getChecked(), $listId]);

        //TODO: Check if insert was succesful
        //Return inserted item on success

        return response()->json([], 204);
    }

    public function updateListItem(Request $request, $listId, $itemId)
    {
        $item = ListItem::parseJson($request);

        $item = ListItem::parseJson($request);
        $result = app('db')->update("UPDATE listItem SET name = ?, checked = ? WHERE id = ?", [
            $item->getName(),
            $item->getChecked(),
            $itemId
        ]);

        //TODO: Check if insert was succesful
        //Return inserted item on success

        return response()->json([], 204);
    }

    public function deleteListItem($itemId)
    {
        $result = app('db')->update("DELETE FROM listItem WHERE id = :id", [
            'id' => $itemId
        ]);

        //TODO: Check if insert was succesful
        //Return inserted item on success

        return response()->json([], 204);
    }
}
