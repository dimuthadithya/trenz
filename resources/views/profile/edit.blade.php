@extends('profile.index')

@section('profile-content')
<div class="p-6">
    <div class="max-w-xl mx-auto">
        <div class="mb-8">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="mb-8">
            @include('profile.partials.update-password-form')
        </div>
    </div>
</div>
@endsection