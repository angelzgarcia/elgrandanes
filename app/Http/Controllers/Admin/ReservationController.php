<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Resources\Preference;
use MercadoPago\Resources\Preference\Item;

class ReservationController extends Controller
{
    public function createPayment(Request $request)
    {
        // Configurar el Access Token
        MercadoPagoConfig::setAccessToken(config('mercadopago.access_token'));

        // Crear un nuevo item
        $item = new Item();
        $item->title = 'Reservación de lugar';
        $item->quantity = 1;
        $item->unit_price = (float) $request->input('amount'); // Monto de la reservación

        // Crear una nueva preferencia
        $preference = new Preference();
        $preference->items = [$item]; // Asignar el ítem a la preferencia
        $preference->back_urls = [
            'success' => route('reservation.success'),
            'failure' => route('reservation.failure'),
            'pending' => route('reservation.pending'),
        ];
        $preference->auto_return = 'approved'; // Configurar auto-retorno

        // Crear el cliente de preferencia
        $preferenceClient = new PreferenceClient();

        // Usar PreferenceClient para crear la preferencia
        $response = $preferenceClient->create($preference); // Pasamos el objeto preferencia directamente

        // Verificar si la preferencia fue creada correctamente
        if (isset($response['status']) && $response['status'] === 'created') {
            return response()->json([
                'init_point' => $response['response']['init_point'], // URL para redirigir al pago
            ]);
        }

        // En caso de error, devolver un mensaje
        return response()->json([
            'error' => 'Error al crear la preferencia.',
        ], 500);
    }

    public function success()
    {
        return view('reservations.success'); // Vista para éxito
    }

    public function failure()
    {
        return view('reservations.failure'); // Vista para fallo
    }

    public function pending()
    {
        return view('reservations.pending'); // Vista para pendiente
    }
}
