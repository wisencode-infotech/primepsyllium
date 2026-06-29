<x-email.branded-layout
    :branding="$branding"
    :footer-note="'This notification was sent automatically from the '.$branding->email_brand_name.' website contact form.'"
>
    {!! $body !!}
</x-email.branded-layout>
