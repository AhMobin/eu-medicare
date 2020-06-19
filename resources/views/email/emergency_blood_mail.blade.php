<!DOCTYPE html>
<html lang="en">
    <body>
        <div>
            <p>Dear {{ $donor-> donor_name }},</p>
            <p>We receive an emergency blood request for A+ blood.</p>
            <p>Contact With:</p>
            <p><strong>{{ $donor->req_from_number }}</strong></p>
            <br>
            <p>Thank You</p>
            <p>EU MediCare</p>
        </div>
    </body>
</html>
