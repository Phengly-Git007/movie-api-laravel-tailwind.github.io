@extends('layouts.app');

@section('content')
    <div class="container mx-auto px-4 pt-10">
        <div class="actor-popular">
            <h2 class=" capitalize text-xl text-amber-500 font-semibold">Popular Actor</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-8 gap-3">
               @foreach ($popular_actor as $actor)
                    @if ($loop->index < 24)
                        @if($actor['profile_path'] !== null)
                            <div class=" actor mt-8 relative">
                                <a href="{{ route('actor.show',$actor['id']) }}" class="">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $actor['profile_path'] }}" alt="image"
                                        class="rounded-lg hover:opacity-50 transition ease-in-out duration-150"
                                    />
                                </a>
                                <div class="mt-2  text-center">
                                    <a href="{{ route('actor.show',$actor['id']) }}" class=" text-gray-100 text-md pt-2 font-semibold hover:text-yellow-500">{{ $actor['name'] }}</a>
                                    <div class="text-gray-300 text-sm truncate">
                                        <span>{{ collect($actor['known_for'])->pluck('title')->implode(', ') }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="mt-8 relative">
                            <a href="{{ route('actor.show',$actor['id']) }}" class="">
                                <img src="https://placeholder.photo/img/300x450?text=no+poster" alt="image"
                                    class="rounded-lg hover:opacity-50 transition ease-in-out duration-150"
                                />
                            </a>
                            <div class="mt-2  text-center">
                                <a href="{{ route('actor.show',$actor['id']) }}" class=" text-gray-100 text-md pt-2 font-semibold hover:text-yellow-500">{{ $actor['name'] }}</a>
                                <div class="text-gray-300 text-sm truncate">
                                    <span>{{ collect($actor['known_for'])->pluck('title')->implode(', ') }}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
               @endforeach
        </div>
    </div>

@endsection


@section('script')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.js"></script>
    <script>
        const elem = document.querySelector('.grid');
        const infScroll = new InfiniteScroll(elem,{
            path: '/actor/page/@{{#}}',
            append: '.actor',
        })
    </script>
@endsection
