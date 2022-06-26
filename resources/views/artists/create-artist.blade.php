@extends('layout.app')

@section('css')

@endsection

@section('content')

    <div class="min-h-[87vh]">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                    Add Artist
                </h2>
            </div>
        </header>

        <div class="mt-10">
            <form method="post" action="{{secure_url('artists')}}">
                @csrf
                <div class="max-w-7xl bg-gray-50 rounded shadow mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="bg-opacity-25 gap-4 grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Artist Name</label>
                            <input type="text" placeholder="John Doe" name="name" required="" class="form-control">
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Date of Birth</label>
                            <input type="date" placeholder="Blog Title" name="dob" required
                                   class="form-control" max="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                        </div>
                    </div>
                    <div class="mt-5">
                        <label class="block font-medium text-sm text-gray-700">Artist Bio</label>
                        <textarea class="form-control" name="bio" rows="4" placeholder="About Artist"></textarea>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md
                        font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900
                        focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25
                         transition ease-in-out duration-150 mt-4">
                            Submit
                        </button>
                        <a class="text-sm ml-3" href="{{secure_url('artists')}}">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')

@endsection

