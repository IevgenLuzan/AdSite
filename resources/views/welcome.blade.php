@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default success">

                <div class="panel-heading success">Ads</div>

                <div class="panel-body">

                    <table class="table table-striped task-table">

                        <!-- Заголовок таблицы -->
                        <thead>
                            <th><i class="fa fa-file" aria-hidden="true"></i> Title</th>
                            <th><i class="fa fa-bars" aria-hidden="true"></i> Description</th>
                            <th class="col-md-1"><i class="fa fa-users" aria-hidden="true"></i>Author</th>
                            <th><i class="fa fa-calendar" aria-hidden="true"></i> Date</th>
                            <th class="col-md-2"><div class="col-md-offset-3"><i class="fa fa-pencil" aria-hidden="true"></i> Actions</div></th>
                        </thead>
                        <!-- Тело таблицы -->
                        <tbody>
                            @foreach ($ads as $ad)
                            <tr>
                                <!-- Title of ad  -->
                                <td class="table-text">
                                    <div>
                                        <a href="{{"". $ad->id }}">{{ $ad->title }}</a>
                                    </div>
                                </td>
                                <td class="table-text" style="width: 50%;">
                                    <div >
                                        <a href="{{ $ad->id }}">{{ $ad->description }}</a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <a href="{{"user/". $ad->user_id }}">{{ $ad->name }}</a>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{ $ad->created_at }}
                                    </div>
                                </td>

                                <td>
                                    <div class="col-md-offset-3 view zoom">
                                        @if(Auth::id() == $ad->user_id)
                                            <a href="{{ 'delete/'.$ad->id }}" class="hoverable" title="Delete"> <i class="fa fa-trash"></i></a>
                                            <a href="{{ 'edit/'.$ad->id }}" title="Edit"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        @endif
                                        <a href="{{"/". $ad->id }}" title="Watch"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if(Auth::user())
                <div class="panel-body">
                    <form action="{{ url('edit') }}" method="GET" class="form-horizontal">
                        {{ csrf_field() }}
                        <!-- Button of creating an ad -->
                        <div class="form-group" style="float: left;">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-plus"></i> Create Ad
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
                <center>
                    {!! $ads->render() !!}
                </center>

            </div>
        </div>
    </div>
</div>
@endsection
