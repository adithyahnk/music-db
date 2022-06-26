@extends('layout.app')

@section('css')

@endsection

@section('content')

    <div class="min-h-[87vh]">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                    View Artist {{$artist->name}}
                </h2>
            </div>
        </header>
        <div class="mt-10">
            <div class="max-w-7xl bg-gray-50 rounded shadow mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <a href="{{url('artists/'.$artist->id.'/edit')}}" class="float-right">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24"
                         class="inline fill-current text-gray-700 cursor-pointer">
                        <path
                            d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-5 17l1.006-4.036 3.106 3.105-4.112.931zm5.16-1.879l-3.202-3.202 5.841-5.919 3.201 3.2-5.84 5.921z"/>
                    </svg>
                </a>
                <div class="bg-opacity-25 gap-4 grid grid-cols-1 md:grid-cols-2">
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Artist Name</label>
                        <p>{{$artist->name}}</p>
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Date of Birth</label>
                        <p>{{\Carbon\Carbon::parse($artist->dob)->format('M d, Y')}}</p>
                    </div>
                </div>
                <div class="mt-7">
                    <label class="block font-medium text-sm text-gray-700">Artist Bio</label>
                    {{$artist->bio}}
                </div>
                <div class="mt-7">
                    <label class="block font-medium text-sm text-gray-700">Songs</label>
                    @forelse($artistSongs as $song)
                        <p class="hover:underline hover:text-gray-600"><a
                                href="{{url('songs/'.$song->id)}}">{{$song->name}}</a></p>
                    @empty
                        NA
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
