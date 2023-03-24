@extends('layout.main')

@section('content')

    <div class="text-center text-danger">
        <h1>Total Amount </h1>
        <h1>
            <span class="badge bg-secondary">{{$sum}}</span>
        </h1>
    </div>
    <div class="text-center">
        <h2 class="text-success">Top Two Expense</h2>
        @if(isset($data1['name']))
            <h3><small>Category 1:</small> {{$data1['name']}} <span class="badge bg-secondary">{{$data1['amount']}} - ({{number_format(($data1['amount']/$sum)*100,2)}}%)</span>
            </h3>
        @endif
        @if(isset($data2['name']))
            <h3><small>Category 2:</small> {{$data2['name']}} <span class="badge bg-secondary">{{$data2['amount']}} - ({{number_format(($data2['amount']/$sum)*100,2)}}%)</span>
            </h3>
        @endif
    </div>


    <div class="m-3">
        <a class="btn btn-success btn-lg" href="{{route('expense_records.index')}}">Expense list </a>
    </div>


    <div class="container text-center">
        <h1 class="text-primary">Category List</h1>
        <div class="row">
            @forelse($categories as $category)
                <div class="col-md-2 border">
                    <h2>{{$category->title}}</h2>
                    <span class="badge bg-secondary">{{$category->records->sum('amount') ?? 0}}</span>
                </div>
            @empty
                <div class="col-md-2">
                    <h2>No data</h2>
                </div>
            @endforelse
        </div>
        <div class="mt-4">
                <a class="btn btn-success" href="{{route('expense_categories.create')}}">Add Expense Category +</a>
        </div>
    </div>
    <div>

    </div>

@endsection
