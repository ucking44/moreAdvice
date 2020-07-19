@extends('master')
@section('title')
  Background
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data</h4>

                <form action="{{ url('update-background/'.$background->id) }}" method="post">
                    @csrf
                    {{ method_field('put') }}

                    <div class="modal-body">
                        <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ $background->name }}">
                        </div>
                        {{-- <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Sub-Title:</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ $background->subtitle }}">
                        </div>
                        <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea name="description" class="form-control" rows="6" cols="5">{{ $background->description }}</textarea>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                    <a href="{{ url('background') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
