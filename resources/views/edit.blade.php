@extends('layouts.app')

@section('content')
<form action="{{ url('edit') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Имя задачи -->
    <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Title</label>

        <div class="col-sm-6">
            <input type="text" name="title" id="ad-title" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Description</label>

        <div class="col-sm-6">
            <input type="text" name="description" id="ad-description" class="form-control">
        </div>
    </div>

    <!-- Кнопка добавления задачи -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i> Create
            </button>
        </div>
    </div>
</form>
@endsection
