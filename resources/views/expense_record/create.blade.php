@extends('layout.main')

@section('content')


<div class="mt-4 w-50 my-0 mx-auto">
    <form action="{{route('expense_records.store')}}" method="post">
        @csrf
        <div class="form-outline">
            <label class="form-label" for="Title">Expense Category</label>
            <select class="form-select" name="expense_category_id">
                @forelse($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @empty
                    <option value="">No Data</option>
                @endforelse
            </select>
            @error('expense_category_id')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-outline">
            <label class="form-label" for="Title">Expense Record Title</label>
            <input type="text" id="Title" name="title" class="form-control"  placeholder="Expense Record Title"/>
            @error('title')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-outline">
            <label class="form-label" for="Title">Amount</label>
            <input type="number" id="Title" name="amount" class="form-control"  placeholder="Expense Record Amount"/>
            @error('amount')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
