<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voucher</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
    <style>
        @media print {
            #printTools {
                display: none;
            }
        }

        #printTools>button {
            margin-top: 0.5rem;
            margin-left: 0.5rem;
        }

        {!! $templete->cssEditor !!}
    </style>
</head>

<body x-data="{
        vouchers: Array.from({ length: 10 }, (v, i) => ({
            profile: 'PREVIEW',
            id: i,
            code: 'VC' + String(Math.floor(1000 + Math.random() * 9000)),  // Generate random 4-digit number
            price: '10.00',
            time_limit: '60',
            validity: '360'
        }))
    }">

    <div id="printTools">
        <button @click="window.print()">PRINT</button><br />
        <hr />
    </div>

    <!-- Loop through the vouchers and create a table for each -->
    <template x-for="voucher in vouchers" :key="voucher.id">
        {!! $templete->htmlEditor !!}
    </template>

</body>

</html>
