@extends('beautymail::templates.ark')

        
@section('content') 

    @include('beautymail::templates.ark.heading', [
		'heading' => 'Mail from ColorsOfUs',
		'level' => 'h1'
	])

    @include('beautymail::templates.ark.heading', [
		'heading' => 'Customized Product Order',
		'level' => 'h2'
	])

    @include('beautymail::templates.ark.contentStart')

		<h4 class="secondary"><strong>Customized Production</strong></h4>
		<p>Hi!, your request for product below</p>
		<p>.</p>
        <table>
            <table>
                @foreach ($data as $item)
                    <tr>
                        <td>
                            <img src="{{(isset($_SERVER["HTTPS"]) ? "https://" : "http://") . $_SERVER["HTTP_HOST"]}}/{{$item['product']['images'][0]['url']}}" width="150" height="160" >
                        </td>
                        <td>
                            <p>{{$item['product']['title']}} 
                                <em>
                                    {{(!empty($item['size']) ? $item['size']['name']. ' / ' : $item['is_customized'] == '1') ? $item['size_id'].' / ' : ''}} 
                                </em>
                                <em>
                                    {{!empty($item['color']) ? $item['color']['name'] : ''}}
                                </em>
                            </p>
                            <p>x{{$item['quantity']}}</p>
                            <p>&#8358;{{$item['discount'] == 0 ? $item['unit_price'] : $item['unit_price'] - ($item['discount'] / 100 * $item['unit_price'])}}</p>
                            <p>&#8358;{{$item['discount'] == 0 ? $item['unit_price'] * $item['quantity'] : $item['quantity'] * ($item['unit_price'] - ($item['discount'] / 100 * $item['unit_price']))}}</p>
                        </td>
                        </tr>
                    <tr>
                        <td>
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </td>
                    </tr>
                @endforeach
            </table>
		</table>
        <p>Our production team will commence production and the approximat time to finish is {{$item['time_to_finish_customized']}} days</p>
    @include('beautymail::templates.ark.contentEnd')

@stop