@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-10">
        {{-- popular-movie --}}
        <div class="popular-movie">
            <h2 class=" capitalize text-xl text-amber-500 font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-3">
               @foreach ($popular_movie as $popular)
                    @if ($loop->index < 24)
                        <div class="mt-8 relative">
                            <a href="{{ route('movie.show',$popular['id']) }}" class="">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $popular['poster_path'] }}" alt="image"
                                    class="rounded-lg hover:opacity-50 transition ease-in-out duration-150"
                                />
                            </a>
                            <span class="absolute ml-3 mt-3 border-2 border-green-400 rounded-full w-8 h-8 text-center top-0 left-0 text-white font-semibold text-sm flex justify-center items-center">
                                {{ $popular['vote_average'] * 10 }} <small class="text-xs">%</small>
                            </span>
                            <div class="mt-2  text-center">
                                <a href="{{ route('movie.show',$popular['id']) }}" class=" text-gray-100 text-md pt-2 font-semibold hover:text-yellow-500">{{ $popular['title'] }}</a>
                                <div class="text-gray-300 text-sm">
                                    <span>{{\Carbon\Carbon::parse($popular['release_date'])->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
               @endforeach
            </div>
        </div>

        {{-- upcomming-movie --}}
        <div class="upcoming-movie pb-10">
            <h2 class=" capitalize text-xl text-amber-500 font-semibold mt-10">Upcoming Movies</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-3">
               @foreach ($upcoming_movie as $upcoming)
                    @if ($loop->index < 24)
                        <div class="mt-8 relative">
                            <a href="{{ route('movie.show',$upcoming['id']) }}" class="">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $upcoming['poster_path'] }}" alt="image"
                                    class="rounded-lg hover:opacity-50 transition ease-in-out duration-150"
                                />
                            </a>
                            <span class="absolute ml-3 mt-3 border-2 border-green-400 rounded-full w-8 h-8 text-center top-0 left-0 text-white font-semibold text-sm flex justify-center items-center">
                                {{ $upcoming['vote_average'] * 10 }} <small class="text-xs">%</small>
                            </span>
                            <div class="mt-2  text-center">
                                <a href="{{ route('movie.show',$upcoming['id']) }}" class=" text-gray-100 text-md pt-2 font-semibold hover:text-yellow-500">{{ $upcoming['title'] }}</a>
                                <div class="text-gray-300 text-sm">
                                    <span>{{\Carbon\Carbon::parse($upcoming['release_date'])->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
               @endforeach
            </div>
        </div>
    </div>
@endsection
