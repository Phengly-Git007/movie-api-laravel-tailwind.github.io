@extends('layouts.app')

@section('content')
    <div class="actor-info">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none ">
                <img src="{{ 'https://image.tmdb.org/t/p/w500/' .$television_detail['poster_path'] }}" alt="image"
                class=" w-72 rounded-lg hover:opacity-50 transition ease-in-out duration-150 "
                >
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold text-gray-100">{{ $television_detail['name'] }}</h2>
                <div class="flex items-center text-gray-300 text-sm mt-2">
                    <svg class="fill-current text-yellow-500 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg>
                    <span class="ml-2">{{ $television_detail['vote_average'] * 10 }}%</span>
                     <span class="mx-2">|</span>
                    <span>{{\Carbon\Carbon::parse($television_detail['last_air_date'])->format('d M Y') }}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($television_detail['genres'] as $genres)
                            {{ $genres['name'] }}
                            @if (!$loop->last),

                            @endif
                        @endforeach
                    </span>
                </div>
                <div class=" mt-4">
                    <h3 class=" text-gray-100 text-2xl font-semibold "> Overview</h3>
                    <p class="text-gray-200 mt-3">{{ $television_detail['overview'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="top-tv-cast">
        <div class="container mx-auto px-4 py-10 pb-10">
            <h2 class="capitalize text-2xl font-semibold text-gray-100">Top Billed Cast</h2>
            <div class="grid lg:grid-cols-8 gap-7">
               @foreach ($television_detail['credits']['cast'] as $cast)
                @if ($loop->index < 8)

                    @if ($cast['profile_path'] !== null)
                    <div class="mt-8">
                        <a href="{{ route('actor.show',$cast['id']) }}" class="ref">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' .$cast['profile_path']  }}" alt="image" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg" >
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actor.show',$cast['id']) }}" class="text-md text-gray-300 pt-4 font-semibold hover:text-amber-500">{{ $cast['original_name'] }}</a>
                            <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                        </div>
                    </div>
                    @else
                    <div class="mt-8 text-center">
                        <a href="{{ route('actor.show',$cast['id']) }}" class="">
                            <img src="https://placeholder.photo/img/200x300" alt="image" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg" >
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actor.show',$cast['id']) }}" class="text-md text-gray-300 pt-4 font-semibold hover:text-amber-500">{{ $cast['original_name'] }}</a>
                            <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                        </div>
                    </div>
                    @endif


                @endif
               @endforeach
            </div>
        </div>
    </div>

@endsection

