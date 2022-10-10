@extends('layouts.app')

@section('content')
    <div class="movie-info bg-cover bg-no-repeat" style="background-image: url('{{ 'https://image.tmdb.org/t/p/original/'.$movie_detail['backdrop_path']}}')" >
        <div style="background-image:linear-gradient(to right,rgba(7.84%,8.63%,9.80%,1.00)150px,rgba(7.84%,8.63%,9.80%,0.84)100%)">
            <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
                <div class="flex-none ">
                    @if($movie_detail['poster_path'] !== null)
                        <img src="{{ 'https://image.tmdb.org/t/p/w500/' .$movie_detail['poster_path'] }}" alt="image"
                        class=" w-80 rounded-lg hover:opacity-50 transition ease-in-out duration-150 "
                        >
                    @else
                        <img src="https://placeholder.photo/img/500x720?text=no+poster" alt="image"
                        class=" w-72 rounded-lg hover:opacity-50 transition ease-in-out duration-150 "
                        >
                    @endif
                </div>
                <div class="md:ml-24">
                    <h2 class="text-4xl font-semibold text-gray-100">{{ $movie_detail['title'] }}</h2>
                    <div class="flex items-center text-gray-300 text-sm mt-2">
                        <svg class="fill-current text-yellow-500 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                        <span class="ml-2">{{ $movie_detail['vote_average'] * 10 }}%</span>
                        <span class="mx-2">|</span>
                        <span>{{\Carbon\Carbon::parse($movie_detail['release_date'])->format('d M Y') }}</span>
                        <span class="mx-2">|</span>
                        <span>
                            @foreach ($movie_detail['genres'] as $genres)
                                {{ $genres['name'] }}
                                @if (!$loop->last),

                                @endif
                            @endforeach
                        </span>
                    </div>
                    <div class=" mt-4">
                        <h3 class=" text-gray-100 text-2xl font-semibold "> Overview</h3>
                        <p class="text-gray-200 mt-3">{{ $movie_detail['overview'] }}</p>
                    </div>
                    <div class="mt-12">
                        <div class="flex mt-4">
                            @foreach ($movie_detail['credits']['crew'] as $crew)
                                @if ($loop->index < 3)
                                    <div class="mr-12">
                                        {{-- <img src="{{ 'https://image.tmdb.org/t/p/w500/' .$crew['profile_path']  }}" class="w-10 h-10 rounded-full" alt="image"> --}}
                                        <div class="text-gray-300 font-semibold">{{ $crew['name'] }}</div>

                                        <div class="text-sm text-gray-300">{{ $crew['known_for_department'] }}</div>
                                        <div class="text-sm text-gray-300">{{ $crew['job'] }}</div>
                                        <div class="text-sm text-gray-300">{{ $crew['popularity'] }} <span></span> </div>

                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="mt-12">
                        <a href="https://www.youtube.com/watch?v={{ $movie_detail['videos']['results'][0]['key'] }}" class="flex items-center bg-transparent text-gray-100 rounded-lg font-semibold focus:outline-none px-4 py-4 hover:text-amber-100 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                            </svg>
                            <span class="ml-2"> Play Trailer</span>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="top-movie-cast">
        <div class="container mx-auto px-4 py-16 pb-10">
            <h2 class="capitalize text-2xl font-semibold text-gray-100">Top Billed Cast</h2>
            <div class="grid lg:grid-cols-8 gap-7">
               @foreach ($movie_detail['credits']['cast'] as $cast)
                @if ($loop->index < 8)

                    @if ($cast['profile_path'] !== null)
                    <div class="mt-8">
                        <a href="{{ route('actor.show',$cast['id']) }}" class="ref">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' .$cast['profile_path']  }}" alt="image" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg" >
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-md text-gray-300 pt-4 font-semibold hover:text-amber-500">{{ $cast['original_name'] }}</a>
                            <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                        </div>
                    </div>
                    @else
                    <div class="mt-8 text-center">
                        <a href="" class="">
                            <img src="https://placeholder.photo/img/200x301" alt="image" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg" >
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-md text-gray-300 pt-4 font-semibold hover:text-amber-500">{{ $cast['original_name'] }}</a>
                            <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                        </div>
                    </div>
                    @endif


                @endif
               @endforeach
            </div>
        </div>
    </div>
    {{-- movie image --}}
    <div class="movie-image">
        <div class="container mx-auto px-4 py-15 pb-10">
            <h2 class="capitalize text-2xl font-semibold text-gray-100">Image Backdrops</h2>
            <div class="grid lg:grid-cols-4 gap-7">
                @foreach ($movie_detail['images']['backdrops'] as $backdrops)
                    @if ($loop->index < 12)
                            <div class="mt-8">
                            <a href="" class="ref">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' .$backdrops['file_path']  }}" alt="image" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg" >
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    {{-- movie recommendations --}}
    <div class="movie-recommendations">
        <div class="container mx-auto px-4 py-15 pb-10">
            <h2 class="capitalize text-2xl font-semibold text-gray-100">Recommendations</h2>
            <div class="grid lg:grid-cols-7 gap-7">
                @foreach ($movie_recommendations as $recommendations)
                    @if ($loop->index < 14)

                        @if ($recommendations['poster_path'] !== null)
                            <div class="mt-8 ">
                                <a href="{{ route('movie.show',$recommendations['id']) }}" class="">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/' .$recommendations['poster_path']  }}" alt="image" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg" >
                                </a>
                                <div class="mt-2  text-center">
                                    <a href="{{ route('movie.show',$recommendations['id']) }}" class=" text-gray-100 text-md pt-2 font-semibold hover:text-yellow-500">{{ $recommendations['title'] }}</a>
                                    <div class="text-gray-300 text-sm">
                                        <span>{{\Carbon\Carbon::parse($recommendations['release_date'])->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="mt-8 ">
                                <a href="{{ route('movie.show',$recommendations['id']) }}" class="">
                                    <img src="https://placeholder.photo/img/300x450?text=no+poster" alt="image" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg" >
                                </a>
                                <div class="mt-2  text-center">
                                    <a href="{{ route('movie.show',$recommendations['id']) }}" class=" text-gray-100 text-md pt-2 font-semibold hover:text-yellow-500">{{ $recommendations['title'] }}</a>
                                    <div class="text-gray-300 text-sm">
                                        <span>{{\Carbon\Carbon::parse($recommendations['release_date'])->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
