@component('mail::message')

Dear {{$name}},

We appreciate your recent registration with CertifyRecruit. Your commitment to our platform is important to us, and we want to ensure the security of your account and the seamless access to our services.

To complete the registration process, please take a moment to click the button below to verify your email:

@component('mail::button', ['url' => route('verify.email', ['token' => $verificationToken])])
Verify Your Email
@endcomponent

If, by any chance, you did not initiate this registration or if you have any concerns regarding the security of your account, please disregard this email. If you require any assistance or have questions, do not hesitate to contact our dedicated support team immediately.

We value your trust in <b>CertifyRecruit</b> and look forward to providing you with a secure and productive experience on our platform. <br />

Sincerely, <br />
CertifyRecruit Support Team
@endcomponent