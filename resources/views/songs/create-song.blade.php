@extends('layout.app')

@section('css')

    <link href="{{asset('js/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>

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
                    <div class="mt-5">
                        <div class="flex items-center justify-between">
                            <label class="block font-medium text-sm text-gray-700">Artists</label>
                            <label class="block font-medium text-sm text-gray-700 cursor-pointer"
                                   onclick="showArtistModal()">Add New</label>
                        </div>
                        <select class="select2 w-full" required data-placeholder="Choose Artists..." multiple name="artists[]">
                            @foreach($artists as $artist)
                                <option value="{{$artist->id}}">{{$artist->name}}</option>
                            @endforeach
                        </select>
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

        {{--   add Artist modal--}}
        <div id="add-artist-modal" style="display: none;"
             class="fixed top-0 left-0 bg-opacity-50 w-full h-screen  bg-gray-800 z-40 flex items-center justify-center">
            <div class="w-11/12 md:w-1/3 shadow rounded-lg bg-white rounded-lg p-4 text-gray-800">
                <form id="add-artist" method="post">
                    <div class="max-w-7xl mx-auto sm:px-6">
                        <div class="overflow-hidden sm:rounded-lg">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div>
                                <div class="bg-opacity-25 gap-4 grid grid-cols-1 md:grid-cols-2">
                                    <div>
                                        <label class="block font-medium text-sm text-gray-700">Artist Name</label>
                                        <input type="text" placeholder="John Doe" name="name" required=""
                                               class="form-control">
                                    </div>
                                    <div>
                                        <label class="block font-medium text-sm text-gray-700">Date of Birth</label>
                                        <input type="date" placeholder="Blog Title" name="dob" required
                                               class="form-control" max="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                    </div>
                                </div>
                                <div class="mt-5">

                                    <label class="block font-medium text-sm text-gray-700">Artist Bio</label>
                                    <textarea class="form-control" name="bio" rows="4" required
                                              placeholder="About Artist"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <div class="flex my-2 items-center">
                            <div>
                                <button class="ml-6 font-bold text-red-600" type="submit">Save
                                </button>
                            </div>
                            <a class="ml-4 cursor-pointer text-xs hover:underline" onclick="hideArtistModal()">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{--   add Artist modal--}}
    </div>

@endsection

@section('js')

    <script src="{{secure_asset('js/jquery/jquery.min.js')}}"></script>
    <script src="{{secure_asset('js/select2/js/select2.min.js')}}"></script>

    <script>
        $('.select2').select2();
    </script>

    <script>
        function showArtistModal() {
            $('#add-artist-modal').show();
        }

        function hideArtistModal() {
            $('#add-artist-modal').hide();
        }
    </script>

    <script>
        let $contactForm = $('#add-artist');

        $contactForm.on('submit', function (ev) {
            ev.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                }
            });
            $.ajax({
                url: '{{secure_url('add/artist')}}',
                type: 'post',
                data: $contactForm.serialize(),
                success: function (res) {
                    $('input[name="name"]').val('');
                    $('input[name="dob"]').val('');
                    $('textarea[name="bio"]').val('');
                    $('#add-artist-modal').hide();
                    $('.select2').append($('<option>', {
                        value: res.id,
                        text : res.name
                    })).select2();
                },
            });
        });
    </script>

@endsection
