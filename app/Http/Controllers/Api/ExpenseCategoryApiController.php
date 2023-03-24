<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseCategoryRequest;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseCategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ExpenseCategory::where('user_id',Auth::id())->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseCategoryRequest $request)
    {
        return ExpenseCategory::create(array_merge($request->validated(), ['user_id' => Auth::id()]))->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        return $expenseCategory->toJson();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExpenseCategoryRequest $request, ExpenseCategory $expenseCategory)
    {
        $expenseCategory->update($request->validated());

        return response()->json('Expense Category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
        $destroy = $expenseCategory->delete();
        return response()->json('Expense Category Deleted');
    }
}
