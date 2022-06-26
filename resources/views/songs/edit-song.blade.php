@extends('layout.app')

@section('css')

    <link href="{{asset('js/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

    <div class="min-h-[87vh]">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                    {{ __('Edit Song '.$song->name) }}
                </h2>
            </div>
        </header>

        <div class="mt-10">
            <form method="post" action="{{url('songs/'.$song->id)}}">
                @csrf
                {{ method_field("PUT") }}
                <div class="max-w-7xl bg-gray-50 rounded shadow mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="bg-opacity-25  gap-4 grid grid-cols-1 md:grid-cols-2">
                        <div class="">
                            <label class="block font-medium text-sm text-gray-700">Song Name</label>
                            <input type="text" placeholder="Song Name" name="song_name" value="{{$song->name}}" required
                                   class="form-control">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Release Date</label>
                            <input type="date" placeholder="Release Date"
                                   value="{{\Carbon\Carbon::make($song->release_date)->format('Y-m-d')}}"
                                   name="release_date" required class="form-control">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label class="block font-medium text-sm text-gray-700">Album Cover</label>
                        <input type="file" name="cover" class="form-control">
                        <div class="mt-3">
                            <label class="block font-medium text-xs mb-1 text-gray-700">Current Album Cover</label>
                            <img src="{{secure_asset('images/'.$song->cover)}}" class="h-16 w-16 object-cover">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md
                        font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900
                        focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25
                         transition ease-in-out duration-150 mt-4">
                            Submit
                        </button>
                        <a class="text-sm ml-3" href="{{secure_url('songs')}}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')

@endsection
