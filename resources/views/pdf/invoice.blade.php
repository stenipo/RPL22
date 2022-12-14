<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Invoice</title>
	</head>

	<body>

        @php
        $arrNoSeat = [];
        foreach ($order->seat as $val) {

            $arrNoSeat[] += $val->no_seat;

        }
        @endphp

        <div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<h1>Shutle<span class="green">Bus</span></h1>
								</td>

								<td>
									Invoice #: {{$order->id}}<br />
									Created:  {{date("d-m-Y",strtotime($order->created_at))}} <br />
                                    {{-- {{date("j F Y",strtotime($order->created_at))}} --}}

								</td>
							</tr>
						</table>
					</td>
				</tr>
                <tr class="information">
					<td colspan="2">
						<table>
							<tr style="text-align: right">
								<td>

								</td>

								<td>
									{{$order->nama}}<br />
									{{$order->email}} <br/>
                                    {{$order->notelp}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
            </table>
                <table style="width: 100%">
        		<tr class="heading">
					<td>Destinasi</td>
					<td>Bus</td>
                    <td>Jadwal</td>
                    @if($order->sifat_pemesanan == "PRIBADI")
                        <td>Jumlah Seat</td>
                        <td>No Seat</td>
                    @endif
                    <td>Price</td>
            	</tr>
				<tr class="item">
					<td>{{$order->orderproduk->produkbus->area->asal}} - {{$order->orderproduk->produkbus->area->tujuan}}</td>
                    <td>{{$order->orderproduk->produkbus->kode_bus}} - {{$order->orderproduk->produkbus->jenis}}</td>
                    <td>{{$order->jadwal}}</td>
                    @if($order->sifat_pemesanan == "PRIBADI")
                        <td>{{count($order->seat)}}</td>
                        <td>{{implode (", ",$arrNoSeat)}}</td>
                    @endif
                    <td>{{$order->orderproduk->harga}}</td>
                 	</tr>
				<tr class="total">
					<td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
					<td>Total: {{$order->orderproduk->harga}}</td>
				</tr>
                </table>

		</div>
	</body>
</html>
<style>
    body {
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        text-align: center;
        color: #777;
    }

    body h1 {
        font-weight: 300;
        margin-bottom: 0px;
        padding-bottom: 0px;
        color: #000;
    }

    body h3 {
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 20px;
        font-style: italic;
        color: #555;
    }

    body a {
        color: #06f;
    }

    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    /* .invoice-box table tr td:nth-child(2) {
        text-align: right;
    } */

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }


    }
    .green{
            color:#7AB730;
        }

</style>
