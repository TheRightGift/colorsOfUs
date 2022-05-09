
@extends('beautymail::templates.ark')

        
@section('content') 

    @include('beautymail::templates.ark.heading', [
		'heading' => 'Mail from ColorsOfUs',
		'level' => 'h1'
	])

    @include('beautymail::templates.ark.heading', [
		'heading' => 'Order Request Received',
		'level' => 'h2'
	])

    @include('beautymail::templates.ark.contentStart')

		<h4 class="secondary"><strong>Order Received</strong></h4>
		<p>Hi!, your order has been received, our admins will process and ship it soon</p>
		<p>.</p>
        <table>
			@foreach ($data as $item)
				<tr>
				<td>
					<img src="{{(isset($_SERVER["HTTPS"]) ? "https://" : "http://") . $_SERVER["HTTP_HOST"]}}/images/resources/{{$item['images'][0]['url']}}" width="150" height="160" >
				</td>
				<td>
					<p>{{$item['title']}}</p>
					<p>x{{$item['quantity']}}</p>
					<p>&#8358;{{$item['quantity'] * $item['amount']}}</p>
				</td>
				</tr>
				
			@endforeach
	
			<tr>
				<td>
					<i class="fa fa-facebook" aria-hidden="true"></i>
				</td>
			</tr>
		</table>

    @include('beautymail::templates.ark.contentEnd')

@stop
