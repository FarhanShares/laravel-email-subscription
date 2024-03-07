<x-mail::message>
# New Post Alert: {{ $post->title }}

{{ $post->description }}

@component('mail::button', ['url' => 'Your post URL here'])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
