@extends('layout.main')

@section('content')
    <div>
        <a class="btn btn-success" href="{{route('expense_categories.create')}}">Add New</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($allData as $data)
            <tr>
                <th scope="row">{{++$loop->index}}</th>
                <td>{{$data->title}}</td>
                <td>{{$data->records->sum('amount')??0}}</td>
                <td>
                    <a href="{{route('expense_categories.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('expense_categories.destroy',[$data->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                No data
            </tr>
        @endforelse

        </tbody>
    </table>
@endsection
