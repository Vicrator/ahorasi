<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Button</title>
    <script src="https://www.paypal.com/sdk/js?client-id=AfaycSjILuybCuvD-t2ppA2OHG_Kno4vQOLmSg_H0VkdsDQZaXhgSyALkKQJBGHFF32YmCkXonwAy449"></script>
</head>
<body>
    <div id="button-paypal"></div>

    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10.00' // Monto de la transacción
                        }
                    }]
                });
            }
        }).render("#button-paypal");
    </script>
</body>
</html>
