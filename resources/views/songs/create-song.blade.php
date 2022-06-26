@extends('layout.app')

@section('css')

@endsection

@section('content')

    <div class="min-h-[87vh]">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                    Add Song
                </h2>
            </div>
        </header>

        <div class="mt-10">
            <div class="max-w-7xl bg-gray-50 rounded shadow mx-auto py-6 px-4 sm:px-6 lg:px-8 relative">
                <form method="post" action="{{secure_url('songs')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-opacity-25  gap-4 grid grid-cols-1 md:grid-cols-2">
                        <div class="">
                            <label class="block font-medium text-sm text-gray-700">Song Name</label>
                            <input type="text" placeholder="Song Name" name="song_name" required="" class="form-control">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Release Date</label>
                            <input type="date" placeholder="Release Date" name="release_date" required
                                   class="form-control">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label class="block font-medium text-sm text-gray-700">Album Cover</label>
                        <input type="file" name="cover" required class="form-control">
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
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
