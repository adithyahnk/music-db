<div class="min-h-[87vh]" x-data="{ deleteArtist: false, artistSongs: false}">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                All Artists
            </h2>
        </div>
    </header>
    <div class="container mx-auto px-5 pt-20">
        <div class="bg-white p-8 rounded-md w-full">
            <div class=" flex items-center justify-between pb-6">
                <div class="flex items-center justify-between w-full">
                    <div class="w-full md:w-3/5 2xl:w-4/5">
                        <input type="search" wire:model="searchString" class="form-control w-full"
                               placeholder="Search Artists">
                    </div>
                    <div class="lg:ml-40 ml-10 space-x-8">
                        <a href="{{secure_url('artists/create')}}" class="bg-green-600 px-4 py-2 rounded-md text-white font-semibold
                             tracking-wide cursor-pointer">Add Artist</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            @if(count($artists) > 0)
                                <thead>
                                <tr>
                                    <th class="home-table">Artist</th>
                                    <th class="home-table">Songs</th>
                                    <th class="home-table">Date of Birth</th>
                                    <th class="home-table">Avg. Rating</th>
                                    <th class="home-table">Actions</th>
                                </tr>
                                </thead>
                            @endif
                            <tbody>
                            @forelse($artists->sortBy('name') as $artist)
                                <tr>
                                    <td class="table-details">
                                        <div class="flex items-center">
                                            <div class="">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$artist->name}}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="table-details">
                                        <span x-on:click="artistSongs=true"
                                              wire:click="setArtistSongs('{{$artist->id}}')"
                                              class="text-gray-900 text-blue-500 underline cursor-pointer whitespace-no-wrap text">
                                            View Songs</span>
                                    </td>
                                    <td class="table-details">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{\Carbon\Carbon::parse($artist->dob)->format('M d, Y')}}
                                        </p>
                                    </td>
                                    <td class="table-details">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{number_format($artist->rating, 1)}}
                                        </p>
                                    </td>
                                    <td class="table-details">
                                        <a href="{{url('artists/'.$artist->id)}}" class="inline-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 class="inline fill-current text-green-700 cursor-pointer">
                                                <path
                                                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 17h-12v-2h12v2zm0-4h-12v-2h12v2zm0-4h-12v-2h12v2z"/>
                                            </svg>
                                        </a>
                                        <a href="{{url('artists/'.$artist->id.'/edit')}}" class="inline-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 class="inline fill-current text-gray-700 cursor-pointer">
                                                <path
                                                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-5 17l1.006-4.036 3.106 3.105-4.112.931zm5.16-1.879l-3.202-3.202 5.841-5.919 3.201 3.2-5.84 5.921z"/>
                                            </svg>
                                        </a>
                                        <a class="inline-flex" x-on:click="deleteArtist=true"
                                           wire:click="setArtist('{{$artist->id}}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24"
                                                 class="inline fill-current text-red-700 ml-7 cursor-pointer">
                                                <path
                                                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.5 16.084l-1.403 1.416-4.09-4.096-4.102 4.096-1.405-1.405 4.093-4.092-4.093-4.098 1.405-1.405 4.088 4.089 4.091-4.089 1.416 1.403-4.092 4.087 4.092 4.094z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <div class="flex justify-center bg-white items-center px-6 py-8" style="">
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="65" height="51"
                                             viewBox="0 0 65 51" class="mb-3 m-auto">
                                            <path fill="#A8B9C5"
                                                  d="M56 40h2c.552285 0 1 .447715 1 1s-.447715 1-1 1h-2v2c0 .552285-.447715 1-1 1s-1-.447715-1-1v-2h-2c-.552285 0-1-.447715-1-1s.447715-1 1-1h2v-2c0-.552285.447715-1 1-1s1 .447715 1 1v2zm-5.364125-8H38v8h7.049375c.350333-3.528515 2.534789-6.517471 5.5865-8zm-5.5865 10H6c-3.313708 0-6-2.686292-6-6V6c0-3.313708 2.686292-6 6-6h44c3.313708 0 6 2.686292 6 6v25.049375C61.053323 31.5511 65 35.814652 65 41c0 5.522847-4.477153 10-10 10-5.185348 0-9.4489-3.946677-9.950625-9zM20 30h16v-8H20v8zm0 2v8h16v-8H20zm34-2v-8H38v8h16zM2 30h16v-8H2v8zm0 2v4c0 2.209139 1.790861 4 4 4h12v-8H2zm18-12h16v-8H20v8zm34 0v-8H38v8h16zM2 20h16v-8H2v8zm52-10V6c0-2.209139-1.790861-4-4-4H6C3.790861 2 2 3.790861 2 6v4h52zm1 39c4.418278 0 8-3.581722 8-8s-3.581722-8-8-8-8 3.581722-8 8 3.581722 8 8 8z"></path>
                                        </svg>
                                        <h3 class="text-gray-500 text-80 font-normal mb-6">
                                            No artist matched the given criteria.
                                        </h3>
                                        <div>
                                            <a href="{{url('artists/create')}}"
                                               class="bg-gray-200 hover:bg-gray-300 text-gray-600 text-sm font-bold py-2 px-4 rounded inline-flex items-center">
                                                <span>Add Artist</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{$artists->onEachSide(1)->links()}}
                    </div>

                    {{--   delete Artist modal--}}
                    <div x-cloak x-show="deleteArtist"
                         class="fixed top-0 left-0 bg-opacity-50 w-full h-screen  bg-gray-800 z-40 flex items-center justify-center">
                        <div class="w-11/12 md:w-1/3 shadow rounded-lg bg-white rounded-lg p-4 text-gray-800">
                            <form method="post" wire:submit.prevent="deleteArtist">
                                <div class="max-w-7xl mx-auto sm:px-6">
                                    <div class="overflow-hidden sm:rounded-lg">
                                        @csrf
                                        <div>
                                            <div class="text-lg">
                                                Delete Artist
                                            </div>
                                            <div class="mt-4">
                                                Are you sure you want to delete the
                                                Artist @if(isset($artistName)){{$artistName}}@endif?
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <div class="flex my-2 items-center">
                                        <div>
                                            <button class="ml-6 font-bold text-red-600" x-on:click="deleteArtist=false"
                                                    type="submit">Delete
                                            </button>
                                        </div>
                                        <a class="ml-4 cursor-pointer text-xs hover:underline"
                                           x-on:click="deleteArtist=false" wire:click="resetArtist()">
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{--   delete Artist modal--}}

                    {{--   view artist songs modal--}}
                    <div x-cloak x-show="artistSongs"
                         class="fixed top-0 left-0 bg-opacity-50 w-full h-screen  bg-gray-800 z-40 flex items-center justify-center">
                        <div class="w-11/12 md:w-1/3 shadow rounded-lg bg-white rounded-lg p-4 text-gray-800">
                            <div class="max-w-7xl mx-auto sm:px-4">
                                <div class="overflow-hidden sm:rounded-lg">
                                    @if(isset($artistName))
                                        <p class="text-xl mb-4">Artist: {{$artistName}}</p>
                                    @endif
                                    @if(isset($artistSongs) && count($artistSongs) > 0)
                                        @foreach($artistSongs as $song)
                                            <p class="hover:underline hover:text-gray-600">
                                                <a href="{{url('songs/'.$song->id)}}">{{$song->name}}</a>
                                            </p>
                                        @endforeach
                                    @else
                                        <p class="">NA</p>
                                    @endif
                                </div>
                            </div>
                            <div class="my-3">
                                <div class="flex my-2 items-center">
                                    <a class="ml-4 cursor-pointer text-xs hover:underline"
                                       x-on:click="artistSongs=false">
                                        Close
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--   view artist songs modal--}}

                </div>
            </div>
        </div>
    </div>
</div>
