@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        {{-- success or error message --}}
        @include('shared.success-message')

        {{-- new idea --}}
        @include('shared.submit-idea')
        <hr>
        {{-- list of ideas --}}
        @foreach ($ideas as $idea )
        <div class="mt-3">
            @include('shared.idea-card')
        </div>
        @endforeach

        {{-- paginate --}}
        <div class="mt-3">
            {{ $ideas->links() }} {{-- ideas is result of paginate in dashcontroller --}}
        </div>

    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')

    </div>
</div>
@endsection

