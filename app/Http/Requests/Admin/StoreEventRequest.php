<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'date' => 'required|date|after_or_equal:today',
            'start_event' => 'required|date_format:H:i',
            'end_event' => 'required|date_format:H:i|', // after:start_event
            'pre_sale_cost' => 'nullable|numeric|min:40',
            'ticket_cost' => 'nullable|numeric|min:60',
            'reservation' => 'required|in:si,no',
            'quotas' => 'nullable|integer|min:40',
            'event_type' => 'required|in:fijo,ocacional',
            'fb' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'image_event' => 'required|image|mimes:jpg,jpeg,png|max:5048',
            'musical_genre' => 'required|exists:musical_genres,id|integer',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'La fecha del evento es obligatoria.',
            'date.date' => 'La fecha del evento debe ser válida.',
            'date.after_or_equal' => 'La fecha del evento no puede ser anterior al día de hoy.',
            'musical_genre.required' => 'El género musical es obligatorio.',
            'musical_genre.exists' => 'El género musical seleccionado no es válido.',
            'start_event.required' => 'La hora de inicio del evento es obligatoria.',
            'start_event.date_format' => 'La hora de inicio debe estar en un formato válido (HH:mm).',
            'end_event.required' => 'La hora de cierre del evento es obligatoria.',
            'end_event.date_format' => 'La hora de cierre debe estar en un formato válido (HH:mm).',
            'end_event.after' => 'La hora de cierre debe ser posterior a la hora de inicio.',
            'pre_sale_cost.numeric' => 'El costo de preventa debe ser un número.',
            'pre_sale_cost.min' => 'El costo de preventa no puede ser menor a $40.',
            'ticket_cost.numeric' => 'El costo en taquilla debe ser un número.',
            'ticket_cost.min' => 'El costo en taquilla no puede ser menor a $60.',
            'reservation.required' => 'Debe especificar si se requiere reservación.',
            'reservation.in' => 'El valor de reservación debe ser "Sí" o "No".',
            'event_type.required' => 'Debe especificar el tipo de evento.',
            'event_type.in' => 'El tipo de evento solo puede ser "Fijo" u "Ocacional".',
            'quotas.required' => 'El número de cupos es obligatorio.',
            'quotas.integer' => 'El número de cupos debe ser un número entero.',
            'quotas.min' => 'El número de cupos debe ser al menos de 40.',
            'fb.url' => 'La URL de Facebook no es válida.',
            'instagram.url' => 'La URL de Instagram no es válida.',
            'youtube.url' => 'La URL de YouTube no es válida.',
            'image_event.required' => 'La imagen es obligatoria.',
            'image_event.image' => 'El archivo debe ser una imagen.',
            'image_event.mimes' => 'La imagen debe estar en formato JPG, JPEG o PNG.',
            'image_event.max' => 'La imagen no debe superar los 5 MB.',
        ];
    }

    public function attributes()
    {
        return [
            'date' => 'fecha del evento',
            'musical_genre' => 'género musical',
            'start_event' => 'hora de inicio',
            'end_event' => 'hora de cierre',
            'pre_sale_cost' => 'costo de preventa',
            'ticket_cost' => 'costo en taquilla',
            'reservation' => 'reservación',
            'quotas' => 'cupos',
            'event_type' => 'tipo de evento',
            'fb' => 'Facebook',
            'instagram' => 'Instagram',
            'youtube' => 'YouTube',
            'image_event' => 'imagen',
        ];
    }

}
