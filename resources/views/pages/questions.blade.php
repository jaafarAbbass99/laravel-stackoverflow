@extends('layouts.app')

@section('content')

@php
    $sortingby = [
        'Highest score' =>  'Highest score (default)',
        'Trending'  =>  'Trending (recent votes count more)',
        'Date modified' =>   'Date modified',
        'Date created'=>    'Date created'
    ];
    $answers = [
        [
            'description'=> "Test I recently got into working with the google forms API. I tried to use the watch script from the google developer site, and I'm stuck trying to figure out what the difference between the token and client secret files is. I don't remember this being explained when I first learned about this API. I have an oauth client and the corresponding json file for it, so do I need an API key too?
                <br><br>If the answer to this is painfully obvious, please direct me toward a good starting point for learning about how to do this. I've worked with google cloud console before, but last time I used gspread for google sheets and only had to get a service account.",
            'comments'=>[
                ['isauthor'=> false , 'author'=>'Ben', 'date'=>'Over a year ago' ,'body'=> 'Should the client token be considered "secret" information? Or just the client secret?', 'votes'=>20],
                ['isauthor'=> true, 'author'=>'Zen', 'date'=>'Over a year ago' ,'body'=> 'Should the client token be considered "secret" information? Or just the client secret?', 'votes'=>20],
            ]
        ],

    ];

@endphp

<div>

    
    <x-question-header
        title="What is the difference between the token and client secret in the Google Forms API?"
        asked="3 years, 2 months ago"
        modified="3 years, 2 months ago"
        views="2k times"
    />

    <div id="body-page" class="w-[70%]"> 
        
        <x-question-body />
        
        <section id="answare" >

            <x-answer-header :answers="20" :sortingby="$sortingby" />
            
            @foreach ($answers as $answer)
                <x-answer-body :description="$answer['description']" :comments="$answer['comments']" />
            @endforeach
            
            
        </section>
        
    </div>
</div>

@endsection