@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/45?autoplay=true'])
Laracasts
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
