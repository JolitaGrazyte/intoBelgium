@extends('layouts.master')

@section('title', 'Home')

@section('content')

    @include('partials.message')



    <div class="container-fluid home-container">
        <div class="background-skew"></div>

        <div class="home_header">

            <div class="container">

                @include('partials.search')

            </div>


        </div>


        <div class="home-content">
            <div class="about">
                <img src="/img/Logo.png" alt="Logo into B"/>
                <p>into Belgium is a social integration platform that tries to connect people - the newcomers with locals.
                    If you are new in Belgium and feel like you could use some help of locals you are at the right place. Go search for an answer to your question. You might find the answer here. You might join one or another event organized by locals to find out more about everyday life in Belgium.
                    If you are local, socially engaged and willing to help the newcomers to find their way in Belgium you can do it here. Your help is needed and valued.
                </p>
            </div>
        </div>
    </div>


@stop