@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('layouts.links')
        <div class="col-md-4">
            @include('layouts.add-link')
        </div>
    </div>
    {{$links->links()}}

</div>


@stop