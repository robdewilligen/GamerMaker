@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class="mb-5">
                <p>Admin Panel</p>
            </div>
            @if($posts->count())
                @foreach($posts as $post)
                    <div class="mb-4">
                        <p class="mb-1">{{ $post->body }}</p>

                        <div class="flex item-center">
                            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                            </div>
                            <label for="toggle" class="text-xs text-gray-700">Enable/Disable</label>
                        </div>
                    </div>
                @endforeach

            @else
                <p>There are no posts available!</p>
            @endif

        </div>
    </div>
@endsection



{{--//CSS for toggle button--}}
<style>
    /* CHECKBOX TOGGLE SWITCH */
    /* @apply rules for documentation, these do not work as inline style */
    .toggle-checkbox:checked {
        @apply: right-0 border-green-400;
        right: 0;
        border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label {
        @apply: bg-green-400;
        background-color: #68D391;
    }
</style>
