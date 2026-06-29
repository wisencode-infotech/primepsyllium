<x-email.branded-layout
    :branding="$branding"
    :footer-note="'This is a reply to the inquiry you submitted on '.$inquiry->created_at->format('d M Y, h:i A').' via the '.$branding->email_brand_name.' website contact form.'"
>
    <p>Hi {{ $inquiry->name }},</p>
    <p>Thank you for reaching out to us about <strong>{{ $inquiry->product_interest }}</strong>. Here is our response to your inquiry:</p>
    <div style="margin:16px 0; padding:16px; background-color:{{ $branding->email_background_color }}; border-radius:8px;">
        {!! nl2br(e($replyMessage)) !!}
    </div>
    <p>If you have any further questions, simply reply to this email.</p>
</x-email.branded-layout>
