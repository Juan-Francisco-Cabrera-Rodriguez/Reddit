@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('flash-message')
            @if (count($links))
                @include ('layouts.links')
            @else
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">No contributions yet</div>
                    </div>
                </div>
            @endif
            <div class="col-md-4">
                @include ('layouts.add-link')
            </div>
        </div>
        {{ $links->links() }}
    </div>
@stop