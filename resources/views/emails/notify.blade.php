@component('mail::message')
# Notifikasi Penjualan!

Iklan anda telah terjual, silahkan periksa penjualan iklan anda.

{{--  @component('mail::button', ['url' => ''])
Button Text
@endcomponent  --}}

Hormat Kami,<br>
{{ config('app.name') }}
@endcomponent
