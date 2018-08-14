@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                <th>Description</th>
                                <th>Link</th>
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
                                    <td>{{ $test->description }}</td>
                                    <td><a href="{{ $test->link }}">{{ $test->link }}</a></td>
                                    <td>{{ $test->created_at }}</td>
                                    <td>{{ $test->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('test.edit', $test->id) }}" class="fa fa-pencil"></a> | <a href="" class="fa fa-trash" onclick="
                                        if(confirm('Are You Sure, you want to delete this record?')) {
                                            event.preventDefault();
                                            document.getElementById('delete-test-{{ $test->id }}').submit();
                                        } else {
                                            event.preventDefault();
                                        }
                                    "></a>

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