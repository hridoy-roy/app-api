<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRecordRequest;
use App\Models\ExpenseCategory;
use App\Models\ExpenseRecord;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseRecordApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ExpenseRecord::whereHas(
            'category', function (Builder $q) {
            $q->where('user_id', Auth::id());
        })->paginate(10);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRecordRequest $request)
    {

        return ExpenseRecord::create(array_merge($request->validated(), ['date' => now()]))->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseRecord $expenseRecord)
    {
        return $expenseRecord->toJson();
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExpenseRecordRequest $request, ExpenseRecord $expenseRecord)
    {

        $expenseRecord->update($request->validated());

        return response()->json('Expense Record updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseRecord $expenseRecord)
    {
        $destroy = $expenseRecord->delete();

        return response()->json('Expense Record Deleted');
    }
}
