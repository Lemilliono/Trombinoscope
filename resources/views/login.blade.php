@extends('layouts.default')

@section('main')

    <div class="login-page">

        <div class="form">

          <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

              <p class=titre> CONNEXION </p>

              <!-- Nom d'utilisateur -->

              <x-input class="tape" id="login" name="login"  type="text" placeholder="nom d'utilisateur"/>


              <!-- Mot de Passe -->

              <x-input class="tape" id="password" name="password"  type="password" placeholder="mot de passe"/>

              <!--Bouton -->
              <x-button>
                {{ __('Log in') }}
              </x-button>
            

          </form>

        </div>

    </div>
 


@endsection