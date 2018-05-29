@extends('layouts.app')

@section('content')
<form action="{{ url('/edit/'.$ad->id) }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Имя задачи -->
    <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Title</label>

        <div class="col-sm-6">
            <input type="text" name="title" id="ad-title" class="form-control" value="{{$ad->title}}">
        </div>
    </div>
    <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Description</label>

        <div class="col-sm-6">
            <input type="text" name="description" id="ad-description" class="form-control" value="{{$ad->description}}">
        </div>
    </div>

    <!-- Кнопка добавления задачи -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i> Save
            </button>
        </div>
    </div>
</form>
@endsection