@extends('layout.main')

@section('content')


    <h1>Total Amount <span class="badge bg-secondary">{{$sum}}</span></h1>
    <h2>Top Two Expense</h2>
    @if(isset($data1['name']))
    <h3>{{$data1['name']}} <span class="badge bg-secondary">{{$data1['amount']}} - ({{number_format(($data1['amount']/$sum)*100,2)}}%)</span></h3>
    @endif
    @if(isset($data2['name']))
        <h3>{{$data2['name']}} <span class="badge bg-secondary">{{$data2['amount']}} - ({{number_format(($data2['amount']/$sum)*100,2)}}%)</span></h3>
    @endif


    <div class="m-3">
        <a class="btn btn-success" href="{{route('expense_records.index')}}">Expense list </a>
    </div>


    <div class="container">
        <h1>Category List</h1>
        <div class="row">
            @forelse($categories as $category)
            <div class="col-md-2 border">
                <h2>{{$category->title}}</h2>
            </div>
            @empty
                <div class="col-md-2">
                    <h2>No data</h2>
                </div>
            @endforelse
        </div>
        <div class="row m-3 p-0">
            <div class="col-md-2">
                <a class="btn btn-success" href="{{route('expense_categories.create')}}">Add Expense Category</a>
            </div>
        </div>
    </div>
    <div>

    </div>


@endsection
