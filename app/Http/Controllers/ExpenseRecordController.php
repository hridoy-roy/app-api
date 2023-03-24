<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Models\ExpenseRecord;
use App\Http\Requests\StoreExpenseRecordRequest;
use App\Http\Requests\UpdateExpenseRecordRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ExpenseRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $allData = ExpenseRecord::whereHas(
            'category', function (Builder $q) {
            $q->where('user_id', Auth::id());
        })->get();

        return view('expense_record.index', ['allData' => $allData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'categories' => ExpenseCategory::where('user_id',Auth::id())->get(),
        ];
        return view('expense_record.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRecordRequest $request)
    {
        ExpenseRecord::create(array_merge($request->validated(), ['date' => now()]));


        $allData = ExpenseRecord::whereHas(
            'category', function (Builder $q) {
            $q->where('user_id', Auth::id());
        })->get();

        return view('expense_record.index', ['allData' => $allData]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseRecord $expenseRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseRecord $expenseRecord)
    {

        $allData = [
            'categories' => ExpenseCategory::where('user_id',Auth::id())->get(),
            'data' => $expenseRecord,
        ];
        return view('expense_record.edit', $allData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExpenseRecordRequest $request, ExpenseRecord $expenseRecord)
    {
        $expenseRecord->update($request->validated());

        $allData = ExpenseRecord::whereHas(
            'category', function (Builder $q) {
            $q->where('user_id', Auth::id());
        })->get();

        return view('expense_record.index', ['allData' => $allData]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseRecord $expenseRecord)
    {
        $destroy = $expenseRecord->delete();
        $allData = ExpenseRecord::whereHas(
            'category', function (Builder $q) {
            $q->where('user_id', Auth::id());
        })->get();

        return view('expense_record.index', ['allData' => $allData]);
    }
}
