<?php /*
@extends('layout')
@section('content')
*/ ?>
<x-layout>
@include('partials._search')
<?php /*
<h2>{{$listing['title']}}</h2>
<p>{{$listing['description']}}</p>
*/ ?>
 <a href="/" class="inline-block text-black ml-4 mb-4"
 ><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <x-card class="p-10 bg-black">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
        <?php // //src="{{asset('images/no-image.png')}}" 
        //{{$listing->logo}}
                ?>
            <img
                class="w-48 mr-6 mb-6"
               
                src="{{$listing->logo ? asset('storage/'.$listing->logo) : asset('images/no-image.png') }}"
                alt=""
            />

            <h3 class="text-2xl mb-2">{{$listing['title']}}</h3>
            <div class="text-xl font-bold mb-4">{{$listing['company']}}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Job Description
                </h3>
                <div class="text-lg space-y-6">
                    <p>{{$listing['description']}}</p>
                    <?php /*
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Eligendi non reprehenderit
                        facilis architecto autem quam
                        necessitatibus, odit quod, repellendus
                        voluptate cum. Necessitatibus a id tenetur.
                        Error numquam at modi quaerat.
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur
                        adipisicing elit. Quaerat praesentium eos
                        consequuntur ex voluptatum necessitatibus
                        odio quos cupiditate iste similique rem in,
                        voluptates quod maxime animi veritatis illum
                        quo sapiente.
                    </p>
                    */ ?>

                    <a
                        href="mailto:{{$listing->email}}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                        Contact Employer</a
                    >

                    <a
                        href="{{$listing->website}}"
                        target="_blank"
                        class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit
                        Website</a
                    >
                </div>
            </div>
        </div>
    </x-card>

    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/listings/{{$listing->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit
        </a>
<?php /*
        <form method="POST" action="/listings/{{$listing->id}}">
            @csrf
            @method('DELETE')
            <button class="text red-500"><i class="fa-solid fa-trash"></i> Delete</button>
        </form>
        */ ?>
    </x-card>


</div>
</x-layout>
<?php /*
@endsection
*/ ?>