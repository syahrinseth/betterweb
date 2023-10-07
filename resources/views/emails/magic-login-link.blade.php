<x-mail::message>
# Log masuk ke Betterweb
 
Abaikan e-mel ini jika anda tidak membuat pendaftaran atau log masuk.
 
<x-mail::button :url="$url">
Log Masuk
</x-mail::button>
 
Terima Kasih,<br>
Syahrin @{{ config('app.name') }}
</x-mail::message>