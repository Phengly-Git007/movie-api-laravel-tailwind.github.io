@extends('layouts.app')

@section('content')
   <div class="actor-info">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none ">

                @if ($actor_detail['profile_path'] !== null)
                <img src="{{ 'https://image.tmdb.org/t/p/w500/' .$actor_detail['profile_path'] }}" alt="image"
                class=" w-full rounded-lg hover:opacity-50 transition ease-in-out duration-150 "
                >
                @else
                <img src="https://placeholder.photo/img/500x720?text=no+poster" alt="image"
                class=" w-72 rounded-lg hover:opacity-50 transition ease-in-out duration-150 "
                >
                @endif
            </div>
            <div class="md:ml-20">
                <h2 class="text-3xl font-semibold text-gray-100">{{ $actor_detail['name'] }}</h2>
                <div class=" mt-4">
                    <h3 class=" text-gray-100 text-xl font-semibold "> Biography</h3>
                    <p class="text-gray-200 mt-2">{{ $actor_detail['biography'] }}</p>
                </div>
                <div class="known-for">
                    <h2 class=" text-xl font-semibold text-gray-100 mb-5 mt-5">Known For</h2>
                    <div class=" grid md:grid-cols-5 lg:grid-cols-7 gap-4">
                        @foreach ($actor_detail['combined_credits']['cast'] as $cast)
                            @if ($loop->index < 21)
                                @if ($cast['poster_path'] !== null)
                                    @if($cast['media_type'] =='movie')
                                        <div class="mr-10 ">
                                            <a href="{{ route('movie.show',$cast['id']) }}" class="#">
                                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' .$cast['poster_path']  }}" class=" w-72 rounded-lg" alt="image">
                                            </a>
                                        </div>
                                    @else
                                        <div class="mr-10 ">
                                            <a href="{{ route('television.show',$cast['id']) }}" class="#">
                                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' .$cast['poster_path']  }}" class=" w-72 rounded-lg" alt="image">
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    @if($cast['media_type'] =='movie')
                                    <div class="mr-10 ">
                                        <a href="{{ route('movie.show',$cast['id']) }}" class="#">
                                        <img src="https://placeholder.photo/img/300x450?text=no+poster" class=" w-72 rounded-lg" alt="image">
                                        </a>
                                    </div>
                                    @else
                                    <div class="mr-10 ">
                                        <a href="{{ route('television.show',$cast['id']) }}" class="#">
                                        <img src="https://placeholder.photo/img/300x450?text=no+poster" class=" w-72 rounded-lg" alt="image">
                                        </a>
                                    </div>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                </div>
                </div>
                <div class="credit-info">
                    <h4 class="text-3xl font-semibold text-gray-100 mt-12 mb-5">Movie Credit</h4>
                    <div class="bg-gray-300 shadow-xl rounded-lg">
                        <ul class="divide-y divide-gray-500">
                            @foreach ($actor_detail['combined_credits']['cast'] as $credit)
                                @if (isset($credit['release_date']) &@ isset($credit['title']) )
                                <li Class="px-4 mt-2 py-1">{{ \Carbon\Carbon::parse($credit['release_date'])->format('Y') }}
                                   <strong> <a href="{{ route('movie.show',$credit['id']) }}" class="hover:text-blue-500 ml-5">{{ $credit['title'] }}</a></strong>
                                   as {{ $credit['character'] }}
                                </li>
                                @elseif (isset($credit['first_air_date']) && isset($credit['name']) )
                                    <li Class="px-4 mt-2 py-1">{{ \Carbon\Carbon::parse($credit['first_air_date'])->format('Y') }}
                                       <strong> <a href="{{ route('television.show',$credit['id']) }}" class="hover:text-blue-500 ml-5">{{ $credit['name'] }}</a></strong>
                                        as {{ $credit['character'] }}
                                    </li>
                                @else
                                <li></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection


