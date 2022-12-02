@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "El contenido de este mensaje y sus anexos son propiedad de la Fuerza Aérea Colombiana son únicamente para el uso del destinatario y pueden contener información de uso privilegiado o confidencial que no es de carácter público. Si usted no es el destinatario intencional, se le informa que cualquier uso, difusión, distribución o copiado de esta comunicación está terminantemente prohibido. Cualquier revisión, retransmisión, diseminación o uso del mismo, así como cualquier acción que se tome respecto a la información contenida, por personas o entidades diferentes al propósito original de la misma es ilegal.<br>
      No malgastemos la energía, cuidemos lo que es de todos. 
      Antes de imprimir este correo, piense bien si es necesario hacerlo. El Medio Ambiente es responsabilidad de todos."
)
@endslot
@endisset
@endcomponent