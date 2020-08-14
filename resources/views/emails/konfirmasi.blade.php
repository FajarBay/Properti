@component('mail::message')
# Transaksi Telah Dikonfirmasi

Terimakasih telah bertransaksi di Proper, Transaksi anda telah kami konfirmasi.

{{--  @component('mail::button', ['url' => ''])
Button Text
@endcomponent  --}}

Hormat Kami,<br>
{{ config('app.name') }}
@endcomponent
