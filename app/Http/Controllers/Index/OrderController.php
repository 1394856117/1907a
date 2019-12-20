<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
    //发起支付
    public function pay($orderId){
//        echo $orderId;die;
        //根据订单ID查询订单号和订单金额
        $order=DB::table('order')->select('order_sn','order_money')->where('order_id',$orderId)->first();
        require_once app_path('lib/alipay/wappay/service/AlipayTradeService.php');
        require_once app_path ('lib/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
        $config=config('alipay');

        if (!empty($order->order_sn)&& trim($order->order_sn)!=""){
            //商户订单号，商户网站订单系统中唯一订单号，必填
            $out_trade_no = $order->order_sn;

            //订单名称，必填
            $subject = '全球知名军火贩子';

            //付款金额，必填
            $total_amount = $order->order_money;

            //商品描述，可空
            $body = '';

            //超时时间
            $timeout_express="1m";

            $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
            $payRequestBuilder->setBody($body);
            $payRequestBuilder->setSubject($subject);
            $payRequestBuilder->setOutTradeNo($out_trade_no);
            $payRequestBuilder->setTotalAmount($total_amount);
            $payRequestBuilder->setTimeExpress($timeout_express);

            $payResponse = new \AlipayTradeService($config);
            $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

            return ;
        }

            }

}
