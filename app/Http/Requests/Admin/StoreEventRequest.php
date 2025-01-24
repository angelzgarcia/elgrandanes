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
            'musical-genre' => 'required|in:pop,rock,hiphop,reggaeton,salsa,bachata,cumbia,merengue,electronica,house,techno,trance,norteño,mariachi,banda,ranchera',
            'start-event' => 'required|date_format:H:i',
            'end-event' => 'required|date_format:H:i|after:start-event',
            'pre-sale-cost' => 'nullable|numeric|min:40',
            'ticket-cost' => 'nullable|numeric|min:60',
            'reservation' => 'required|in:si,no',
            'quotas' => 'nullable|integer|min:40',
            'fb' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'image-event' => 'required|image|mimes:jpg,jpeg,png|max:5048',
        ];
    }

    public function messages()
    {
        return [
            'date.required' => 'La fecha del evento es obligatoria.',
            'date.date' => 'La fecha del evento debe ser válida.',
            'date.after_or_equal' => 'La fecha del evento no puede ser anterior al día de hoy.',
            'musical-genre.required' => 'El género musical es obligatorio.',
            'musical-genre.in' => 'El género musical seleccionado no es válido.',
            'start-event.required' => 'La hora de inicio del evento es obligatoria.',
            'start-event.date_format' => 'La hora de inicio debe estar en un formato válido (HH:mm).',
            'end-event.required' => 'La hora de cierre del evento es obligatoria.',
            'end-event.date_format' => 'La hora de cierre debe estar en un formato válido (HH:mm).',
            'end-event.after' => 'La hora de cierre debe ser posterior a la hora de inicio.',
            'pre-sale-cost.numeric' => 'El costo de preventa debe ser un número.',
            'pre-sale-cost.min' => 'El costo de preventa no puede ser menor a $40.',
            'ticket-cost.numeric' => 'El costo en taquilla debe ser un número.',
            'ticket-cost.min' => 'El costo en taquilla no puede ser menor a $60.',
            'reservation.required' => 'Debe especificar si se requiere reservación.',
            'reservation.in' => 'El valor de reservación debe ser "Sí" o "No".',
            'quotas.required' => 'El número de cupos es obligatorio.',
            'quotas.integer' => 'El número de cupos debe ser un número entero.',
            'quotas.min' => 'El número de cupos debe ser al menos de 40.',
            'fb.url' => 'La URL de Facebook no es válida.',
            'instagram.url' => 'La URL de Instagram no es válida.',
            'youtube.url' => 'La URL de YouTube no es válida.',
            'image-event.required' => 'La imagen es obligatoria.',
            'image-event.image' => 'El archivo debe ser una imagen.',
            'image-event.mimes' => 'La imagen debe estar en formato JPG, JPEG o PNG.',
            'image-event.max' => 'La imagen no debe superar los 5 MB.',
        ];
    }

    public function attributes()
    {
        return [
            'date' => 'fecha del evento',
            'musical-genre' => 'género musical',
            'start-event' => 'hora de inicio',
            'end-event' => 'hora de cierre',
            'pre-sale-cost' => 'costo de preventa',
            'ticket-cost' => 'costo en taquilla',
            'reservation' => 'reservación',
            'quotas' => 'cupos',
            'fb' => 'Facebook',
            'instagram' => 'Instagram',
            'youtube' => 'YouTube',
            'image-event' => 'imagen',
        ];
    }

}
