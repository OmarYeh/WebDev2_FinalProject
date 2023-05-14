@extends('layouts.app')

@section('title', 'Profile')
@section('css')
<link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <style>
        input{
            height: 32px;
            padding: 7px;
        }
    </style>
@endsection
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12" style="display: flex;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="margin-right: 0 !important;margin-left: 0 !important; width:40%">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="box-shadow: 0 0 0 0 !important;">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="box-shadow: 0 0 0 0 !important;">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="box-shadow: 0 0 0 0 !important;">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
        <div class="flex-1 bg-indigo-100 text-center hidden lg:flex" style="width: 60%;border-radius: 9px;margin-right: 13px;">
        <div
          class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
          style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');"
        ></div>
      </div>
    </div>

    @endsection
