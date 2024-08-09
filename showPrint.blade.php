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

        {!! $template->cssEditor !!}
    </style>
</head>

<body x-data="{
        vouchers: {{ $vouchers->map(function($voucher) {
            return [
                'profile' => '',
                'id' => $voucher->id,
                'code' => $voucher->username, // Generate random 4-digit number
                'price' => $voucher->cost,
                'time_limit' => '60',
                'validity' => '360',
            ];
        }) }}
    }">

    <div id="printTools">
        <button @click="window.print()">PRINT</button><br />
        <hr />
    </div>

    <!-- Loop through the vouchers and create a table for each -->
    <template x-for="voucher in vouchers" :key="voucher.id">
        {!! $template->htmlEditor !!}
    </template>

</body>

</html>
