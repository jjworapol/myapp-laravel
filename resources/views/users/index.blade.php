@extends('layouts.default')

@section('content')

    <div id="app" class="container">
        <h1 v-if="showTitle">@{{ title }}</h1>
        <div>
            <span>Search By ID: </span>
            <input type="text" v-model="searchId" />
            <user-info v-bind:user-id="searchId"></user-info>
        </div>

        <!--function-->
        <button v-on:click="toggleTitle">Toggle</button>


        <example-component></example-component>

        <user-info user-id="1"  ></user-info>
        <user-info user-id="2"  ></user-info>
        <user-info user-id="3"  ></user-info>
        <user-info user-id="4"  ></user-info>

    </div>

@endsection