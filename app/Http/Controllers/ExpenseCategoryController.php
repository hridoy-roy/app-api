<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Http\Requests\StoreExpenseCategoryRequest;
use App\Http\Requests\UpdateExpenseCategoryRequest;
use Illuminate\Support\Facades\Auth;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $allData = ExpenseCategory::where('user_id',Auth::id())->get();
        return view('expense_category.index', ['allData' => $allData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseCategoryRequest $request)
    {

        ExpenseCategory::create(array_merge($request->validated(), ['user_id' => Auth::id()]));

        $allData = ExpenseCategory::where('user_id',Auth::id())->get();
        return view('expense_category.index', ['allData' => $allData]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        return view('expense_category.edit', ['data' => $expenseCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseCategory $expenseCategory)
    {
        return view('expense_category.edit', ['data' => $expenseCategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExpenseCategoryRequest $request, ExpenseCategory $expenseCategory)
    {
        $expenseCategory->update($request->validated());

        $allData = ExpenseCategory::where('user_id',Auth::id())->get();
        return view('expense_category.index', ['allData' => $allData]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
        $destroy = $expenseCategory->delete();
        $allData = ExpenseCategory::where('user_id',Auth::id())->get();
        return view('expense_category.index', ['allData' => $allData]);
    }
}
