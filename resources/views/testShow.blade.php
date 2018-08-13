@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Test View <strong>View Existing</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="form-group row">
                            <div for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Test Feed') }}</div>

                            <div class="col-md-6">
                                <div id="name" class="form-control" name="name">
                                    <h3><strong>{{ $test->name }}</strong> <br>
                                    <small>{{ $test->description }}</small></h3>

                                    <hr>
                                    <a href="{{ route('test.edit', $test->id) }}" class="btn btn-warning">Edit</a> | <a href="" class="btn btn-danger" onclick="
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
                                </div>
                            </div>
                        </div>
                    <hr>
                    <a href="{{ route('test.index') }}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection