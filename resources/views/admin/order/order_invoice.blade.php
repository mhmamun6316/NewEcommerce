<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Order Invoice</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<style>
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
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

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

			/** RTL **/
			.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.rtl table {
				text-align: right;
			}

			.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td >
									<img class="title" src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /><br/>
                                    Sparksuite, Inc,12345 Sunny Road<br />
								</td>

								<td>
									Invoice #: 123<br />
									Created: January 1, 2015<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									<strong>Shipping Info</strong><br>
                                    Name: {{$shipping->full_name}}<br>
                                    Phone: {{$shipping->phone_number}}<br>
                                    Address: {{$shipping->address}}<br>
                                    E-Mail: {{$shipping->email_address}}<br>
                                    Date: {{date('d-m-y h:i:s')}}<br>
								</td>

								<td>
									<strong>Customer Info</strong><br>
                                    {{$customer->first_name.' '.$customer->last_name}}<br>
                                    {{$customer->email_address}}<br>
                                    {{$customer->phone_number}}<br>
                                    {{$customer->address}}<br>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>

					<td>Check #</td>
				</tr>
                <tr>
                </tr>
				<tr>
                     <table class="table table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>SN.</th>
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $grandtotal=0; @endphp
                                    @foreach($order_details as $order_detail)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$order_detail->product_id}}</td>
                                            <td>{{$order_detail->product_name}}</td>
                                            <td>
                                                <img src="{{asset('uploads/product_images')}}/{{$order_detail->product_image}}" class="img-fluid">
                                            </td>
                                            <td>${{$order_detail->product_price}}</td>
                                            <td>{{$order_detail->product_quantity}}</td>
                                            <td>${{$order_detail->product_quantity*$order_detail->product_price}}
                                            @php $grandtotal=$grandtotal+$order_detail->product_quantity*$order_detail->product_price; @endphp
                                            </td>
                                        </tr> 
                                    @endforeach
                                </tbody>
                         </table>               
                 </tr>
                <tr>
                    <hr>
                 <strong> Grand Total: {{$grandtotal}} </strong>
                </tr>
                 <tr>
			</table>
		</div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>
