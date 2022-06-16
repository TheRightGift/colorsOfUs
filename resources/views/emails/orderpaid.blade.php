
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
					<img src="{{(isset($_SERVER["HTTPS"]) ? "https://" : "http://") . $_SERVER["HTTP_HOST"]}}/{{$item['images'][0]['url']}}" width="150" height="160" >
				</td>
				<td>
					<p>{{$item['title']}} 
						<em>
							{{in_array($item['size'], $item) ? $item['is_customized'] == '1' ? $item['size'].' / ' : $item['size']['name'].' / ' : ''}} 
						</em>
						<em>
							{{in_array($item['color'], $item) ? $item['color']['name'] : ''}}
						</em>
					</p>
					<p>x{{$item['quantity']}}</p>
					<p>&#8358;{{$item['discount'] == 0 ? $item['amount'] : $item['amount'] - ($item['discount'] / 100 * $item['amount'])}}</p>
					<p>&#8358;{{$item['discount'] == 0 ? $item['amount'] * $item['quantity'] : $item['quantity'] * ($item['amount'] - ($item['discount'] / 100 * $item['amount']))}}</p>
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
