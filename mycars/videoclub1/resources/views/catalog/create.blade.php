@extends('layouts.app')
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Película') }}
        </h2>
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <a href="{{route('catalogo')}}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-1" :errors="$errors"/>


        <form method="POST" action="{{ route('Create') }}">
        @csrf


        <!-- titulo -->
            <div>
                <x-label for="titulo" :value="__('Titulo')"/>

                <x-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('name')" required
                         autofocus/>
            </div>

            <!-- año -->
            <div>
                <x-label for="anio" :value="__('Año')"/>

                <x-input id="anio" class="block mt-1 w-full" type="text" name="anio" :value="old('anio')" required
                         autofocus/>
            </div>


            <!-- Director -->
            <div>
                <x-label for="director" :value="__('Director')"/>

                <x-input id="director" class="block mt-1 w-full" type="text" name="director" :value="old('director')"
                         required
                         autofocus/>
            </div>

            <!-- Imagen -->
            <div>
                <x-label for="poster" :value="__('Imagen')"/>

                <x-input id="poster" class="block mt-1 w-full" type="text" name="poster" :value="old('poster')" required
                         autofocus/>
            </div>


            <!-- Resumen -->
            <div>
                <x-label for="resumen" :value="__('Resumen')"/>

                <x-input id="resumen" class="block mt-1 w-full" type="text" name="resumen" :value="old('resumen')"
                         required
                         autofocus/>
            </div>


            <div class="flex items-center justify-end mt-4">


                <x-button class="ml-4">
                    {{ __('Añadir Película') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>