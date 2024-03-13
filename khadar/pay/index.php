<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Payment Page</title>
    <link rel="stylesheet" href="index.css">

</head>

<body>
    <div class="loder">
        <div></div>
    </div>
    <div class="div">
        <form class="payment-container">
            <h1>Online Payment</h1>
            <div class="input-group">
                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" placeholder="Enter card number" required />
            </div>
            <div class="input-group">
                <label for="expiry">Expiry Date</label>
                <input type="text" id="expiry" placeholder="MM/YY" required />
            </div>
            <div class="input-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" placeholder="CVV" required />
            </div>
            <div class="input-group">
                <label for="email" id="email">Email</label>
                <input type="email" id="email" placeholder="email" required />
            </div>

            <div class="card-logos">
                <img class="card-logo" src="https://cdn.visa.com/v2/assets/images/logos/visa/blue/logo.png" alt="Visa Logo" />
                <img class="card-logo" src="https://www.mastercard.fr/content/dam/public/mastercardcom/eu/fr/images/Logo/mc-logo-52.svg" alt="MasterCard Logo" />
            </div>
            <button id="pay-button" type="submit">Pay Now</button>
        </form>
    </div>
</body>
<script>
    var loder = document.querySelector('.loder');
    var div = document.querySelector('.div');
    var body = document.body;
    window.onload = () => {
        loder.style.display = 'none';
        div.style.display = 'block';
        body.style.backdropFilter = 'blur(0px)';

    }


</script>

</html>