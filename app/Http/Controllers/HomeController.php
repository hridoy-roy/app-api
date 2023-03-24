<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $expenseData = Auth::user()->expenseCategory->all();

        $data1 = [
            'name' => null,
            'amount' => null,
        ];

        $data2 = [
            'name' => null,
            'amount' => null,
        ];
        $sum = 0;
        foreach ($expenseData as $data) {
            if ($data1['amount'] < $data->records->sum('amount')) {
                $data1['name'] = $data->title;
                $data1['amount'] = $data->records->sum('amount');
            } elseif ($data2['amount'] < $data->records->sum('amount')) {
                $data2['name'] = $data->title;
                $data2['amount'] = $data->records->sum('amount');
            }
            $sum += $data->records->sum('amount');
        }

        $allData = [
            'data1' => $data1,
            'data2' => $data2,
            'sum' => $sum,
            'categories' => ExpenseCategory::where('user_id',Auth::id())->get(),
        ];

        return view('home', $allData);
    }

    public function apiIndex()
    {
        $expenseData = Auth::user()->expenseCategory->all();

        $data1 = [
            'name' => null,
            'amount' => null,
        ];

        $data2 = [
            'name' => null,
            'amount' => null,
        ];
        $sum = 0;

        foreach ($expenseData as $data) {
            if ($data1['amount'] < $data->records->sum('amount')) {
                $data1['name'] = $data->title;
                $data1['amount'] = $data->records->sum('amount');
            } elseif ($data2['amount'] < $data->records->sum('amount')) {
                $data2['name'] = $data->title;
                $data2['amount'] = $data->records->sum('amount');
            }
            $sum += $data->records->sum('amount');
        }


        if (isset($data1['amount']))
            $data1['percentage'] = number_format(($data1['amount']/$sum)*100,2);
        if (isset($data2['amount']))
            $data2['percentage'] = number_format(($data2['amount']/$sum)*100,2);

        $allData = [
            'data1' => $data1,
            'data2' => $data2,
            'sum' => $sum,
        ];

        return $allData;
    }

}
