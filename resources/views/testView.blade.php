@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Test View <strong>List All</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Options</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tests as $test)
                                <tr>
                                    <td>{{ $test->id }}</td>
                                    <td>{{ $test->name }}</td>
                                    <td>{{ $test->created_at }}</td>
                                    <td>{{ $test->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('test.show', $test->id) }}" class="btn btn-primary">View</a> | <a href="{{ route('test.edit', $test->id) }}" class="btn btn-warning">Edit</a> | <a href="" class="btn btn-danger" onclick="
                                        if(confirm('Are You Sure, you want to delete this record?')) {
                                            event.preventDefault();
                                            document.getElementById('delete-test-{{ $test->id }}').submit();
                                        } else {
                                            event.preventDefault();
                                        }
                                    ">Delete</a>

                                    <form action="{{ route('test.destroy', $test->id) }}"id="delete-test-{{ $test->id }}" method="post" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <hr>
                    <a href="{{ route('test.create') }}" class="btn btn-block btn-info">Add New Test</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection