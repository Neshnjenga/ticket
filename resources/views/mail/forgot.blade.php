<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="route('reset',['token'=>$token])">
Reset password 
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
