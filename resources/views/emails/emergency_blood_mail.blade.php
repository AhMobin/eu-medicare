@component('mail::message')
# Emergency Blood Needed

An emergency patient has needed blood. Your blood group is matched with the patient. If you are available or able to donate blood then please contact with the patient.

<br>

<h5>Emergency Blood Group: <span style="text-transform: uppercase">{{ $donor->blood_group }}</span></h5>
<h5>Contact Number: {{ $donor->req_from_number }}</h5>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

