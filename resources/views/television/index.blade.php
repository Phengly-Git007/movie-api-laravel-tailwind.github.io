@extends('layouts.app')


@section('content')
<div class="container mx-auto px-4 pt-10">
    <div class="popular-televiion">
        <h2 class=" capitalize text-xl text-amber-500 font-semibold">Popular Television</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-3">
           @foreach ($popular_television as $television)
                @if ($loop->index < 24)

                    @if($television['poster_path'] !== null)

                        <div class="television mt-8 relative">
                            <a href="{{ route('television.show',$television['id']) }}" class="">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/'. $television['poster_path'] }}" alt="image"
                                    class="rounded-lg hover:opacity-50 transition ease-in-out duration-150"
                                />
                            </a>
                            <span class="absolute ml-3 mt-3 border-2 border-green-400 rounded-full w-8 h-8 text-center top-0 left-0 text-white font-semibold text-sm flex justify-center items-center">
                                {{ $television['vote_average'] * 10 }} <small class="text-xs">%</small>
                            </span>
                            <div class="mt-2  text-center">
                                <a href="{{ route('television.show',$television['id']) }}" class=" text-gray-100 text-md pt-2 font-semibold hover:text-yellow-500">{{ $television['name'] }}</a>
                                <div class="text-gray-300 text-sm">
                                    <span>{{\Carbon\Carbon::parse($television['first_air_date'])->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="television mt-8 relative">
                        <a href="{{ route('television.show',$television['id']) }}" class="">
                            <img src="https://placeholder.photo/img/200x300" alt="image"
                                class="rounded-lg hover:opacity-50 transition ease-in-out duration-150"
                            />
                        </a>
                        <span class="absolute ml-3 mt-3 border-2 border-green-400 rounded-full w-8 h-8 text-center top-0 left-0 text-white font-semibold text-sm flex justify-center items-center">
                            {{ $television['vote_average'] * 10 }} <small class="text-xs">%</small>
                        </span>
                        <div class="mt-2  text-center">
                            <a href="{{ route('television.show',$television['id']) }}" class=" text-gray-100 text-md pt-2 font-semibold hover:text-yellow-500">{{ $television['name'] }}</a>
                            <div class="text-gray-300 text-sm">
                                <span>{{\Carbon\Carbon::parse($television['first_air_date'])->format('d M Y') }}</span>
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
            path: '/television/page/@{{#}}',
            append: '.television',
        })
    </script>
@endsection
