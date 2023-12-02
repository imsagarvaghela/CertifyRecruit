@component('mail::message')

Dear {{$user->name}},

We extend our sincere appreciation for promptly verifying your email address. To enhance your payment experience and ensure the utmost security, we invite you to access our dedicated and secure payment portal through the link provided below:

@component('mail::button', ['url' => url('/payment/domestic')])
Access Secure Payment Portal
@endcomponent

Should you find the need for any assistance or have inquiries, please do not hesitate to contact our specialized support team. We are here to provide you with the highest level of service.

We are truly grateful for your choice of CertifyRecruit for your Assessment, and we remain committed to delivering a professional and seamless experience.<br />

Best regards,<br />
The CertifyRecruit Team
@endcomponent