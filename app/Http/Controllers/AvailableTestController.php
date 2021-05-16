<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AvailableTest;
use App\Models\TestPerformed; 
use App\Models\Inventory;
use App\Models\AvailableTestInventory;
use Session;
use App\Models\Category;
use Gate; 
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class AvailableTestController extends Controller
{
    public function index()
    { 
        $availableTests = AvailableTest::all();
        return view('admin.availableTests.index', compact('availableTests'));
    }
    public function create()
    {
        $inventoryes = Inventory::all()->pluck('inventoryName', 'id')->prepend(trans('global.pleaseSelect'), '');
        $categoryNames = Category::all()->pluck('Cname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.availableTests.create',compact('categoryNames','inventoryes'));
    }
    public function store(Request $request)
    {
        $availableTestId = AvailableTest::create($request->all())->id;
        $availableTestInventory= new AvailableTestInventory();
        $availableTestInventory->available_test_id= $availableTestId;
        $availableTestInventory->inventory_id= $request['inventory_id'];
        $availableTestInventory->itemUsed	= $request['itemUsed'];
        $availableTestInventory->save();
        return redirect()->route('available-tests');
    }   
    public function edit($id)
    {
        $availableTest = AvailableTest::findOrFail($id);
        $catagorys = Category::all()->pluck('Cname', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('admin.availableTests.edit', compact('availableTest','catagorys'));
    }
    public function update($id, Request $request)
   {
    $task = AvailableTest::findOrFail($id);
    $input = $request->all();
    $task->fill($input)->save();
    return redirect()->route('available-tests');
}
    public function show($id)
    {
        $availableTestId = AvailableTest::findOrFail($id);
        return view('admin.availableTests.show', compact('availableTestId'));
    }
    public function destroy($id)
    {
        $task = AvailableTest::findOrFail($id);
        $task->delete();
        return redirect()->route('available-tests');
    }
}
