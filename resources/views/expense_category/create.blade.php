@extends('layout.main')

@section('content')


<div class="mt-4 w-50 my-0 mx-auto">
    <form action="{{route('expense_categories.store')}}" method="post">
        @csrf
        <div class="form-outline">
            <label class="form-label" for="Title">Expense Category Title</label>
            <input type="text" id="Title" name="title" class="form-control"  placeholder="Expense Category Title"/>
            @error('title')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
