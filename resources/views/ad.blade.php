@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$ad->title}}
                </div>

                <div class="panel-body">
                    {{$ad->description}}
                </div>
                <div class="panel-footer">
                    Created: {{$ad->created_at}} By <a href='{{"user/". $ad->user_id }}'> {{$ad->name}}</a>
                </div>
                @if ($ad->user_id == Auth::id())
                <table class="table table-striped task-table">
                    <!-- Table head -->
                    <thead>
                    <th>Actions</th>
                    <th>&nbsp;</th>
                    </thead>
                    <!-- Table body -->
                    <tbody>
                        <tr>
                            <td>
                                <form action="{{ url('delete/'.$ad->id) }}" method="GET">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                            <!-- Button to change an ad -->
                            <td>
                                <form action="{{ url('edit/'.$ad->id) }}" method="GET">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-trash"></i> Change
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
