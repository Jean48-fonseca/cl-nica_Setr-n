<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialController extends Controller
{
    /**
     * Redirecciona al usuario a la página de inicio de sesión del proveedor (Google o GitHub)
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Recibe la respuesta del proveedor tras la autenticación
     */
   public function handleProviderCallback($provider)
    {
        // Quitamos el try-catch temporalmente para que Laravel nos muestre la pantalla roja con el error
       $socialUser = Socialite::driver($provider)->stateless()->user();
        
        $user = User::updateOrCreate([
            'email' => $socialUser->getEmail(),
        ], [
            'name' => $socialUser->getName() ?? $socialUser->getNickname(),
            'social_id' => $socialUser->getId(),
            'social_provider' => $provider,
            'password' => null, 
            'social_id',        // <--- Añade esto
            'social_provider'
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
    
}