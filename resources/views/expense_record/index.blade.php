@extends('layout.main')

@section('content')
<div>
    <a class="btn btn-success" href="{{route('expense_records.create')}}">Add New</a>
</div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($allData as $data)
            <tr>
                <th scope="row" >{{++$loop->index}}</th>
                <td>{{$data->category->title}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->amount}}</td>
                <td>{{$data->date}}</td>
                <td>
                    <a href="{{route('expense_records.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('expense_records.destroy',[$data->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>
                    No data
                </td>
            </tr>
        @endforelse

        </tbody>
    </table>
@endsection
