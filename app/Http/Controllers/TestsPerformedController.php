<?php

namespace App\Http\Controllers;
use DB;
use App\Models\AvailableTest;
use App\Models\Patient;
use App\Models\TestPerformed;
use App\Models\Status;
use Session;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class TestsPerformedController extends Controller
{
    public function index()
    { 
        $testPerformeds = DB::table('test_performeds')
            ->join('patients', 'test_performeds.patient_id', '=', 'patients.id')
            ->join('statuses', 'test_performeds.Sname_id', '=', 'statuses.id')
            ->join('available_tests', 'test_performeds.available_test_id', '=', 'available_tests.id')
            ->join('categories', '.available_tests.category_id', '=', 'categories.id')
            ->select('test_performeds.*', 'patients.Pname','patients.dob','available_tests.name','available_tests.testFee','available_tests.initialNormalValue','available_tests.finalNormalValue','available_tests.units','categories.Cname','statuses.Sname')
            ->orderBy('patient_id', 'DESC')
            ->get();
        return view('admin.TestPerformed.index', compact('testPerformeds'));
    }

    public function create()
    {
        $patientNames = Patient::all()->pluck('Pname', 'id')->prepend(trans('global.pleaseSelect'), '');
        $availableTests = AvailableTest::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $stat = Status::all()->pluck('Sname', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.TestPerformed.create', compact('patientNames','availableTests','stat'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
        TestPerformed::create($input); 
        return redirect()->route('tests-performed');
    } 
    public function edit($id)
    {
        $performed  = TestPerformed::findOrFail($id);
        $getNameFromAvailbles = AvailableTest::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $patientNames = Patient::all()->pluck('Pname', 'id')->prepend(trans('global.pleaseSelect'), '');
        $books = Status::pluck('Sname', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $statuses = Status::pluck('Sname');
        // dd($statuses);

        return view('admin.TestPerformed.edit', compact('performed','getNameFromAvailbles','patientNames','books'));
    }
    public function update($id, Request $request)
    {
        $task = TestPerformed::findOrFail($id);
        $input = $request->all();
        $task->fill($input)->save();    
        // Session::flash('flash_message', 'Task successfully added!');
        return redirect()->route('tests-performed');
    }
    public function show($id)
    {
        $testPerformedsId = TestPerformed::findOrFail($id);
        $getSatusData =  $testPerformedsId->stat;
        // dd($getSatusData);

         $getpatient = $testPerformedsId->patient;
         $getavailableTestName = $testPerformedsId->availableTest;
        return view('admin.TestPerformed.show', compact('testPerformedsId','getpatient','getavailableTestName','getSatusData'));
    }
    public function destroy($id)
    {
        $task = TestPerformed::findOrFail($id);
        $task->delete();
        Session::flash('flash_message', 'Task successfully deleted!');
        return redirect()->route('tests-performed');
    }
}
