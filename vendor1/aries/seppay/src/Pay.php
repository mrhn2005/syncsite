<?php
namespace Aries\Seppay;

use Aries\Seppay\Traits\Data;
use Aries\Seppay\Traits\Request;

class Pay {

    use Data, Request;

    public function __construct()
    {
        $this->factorNumber = null;
    }

    public function ready()
    {
        $params = [];
        $params['api']  =  config('Seppay.api');
        $params['amount']   =   $this->amount;
        $params['factorNumber'] =   $this->factorNumber;
        $params['redirect'] =   $this->callback;

        $res = $this->send_request("https://pay.ir/payment/send", $params, false);

        if($res->status == 1) {
            $this->transId = $res->transId;
        } else {
            throw new SendException($res->errorCode);
        }

        return $res;
    }

    public function start()
    {
        return redirect()->to("https://pay.ir/payment/gateway/". $this->transId);
    }

    public function verify()
    {
        $params['api'] = config('Seppay.api');
        $params['transId'] = $_REQUEST['transId'];

        $transaction = \DB::table('transactions')->where('transId', '=', $params['transId']);

        $res = $this->send_request("https://pay.ir/payment/verify", $params);

        if($res->status != 1) {
            $transaction->update(['status' => 'FAILED']);
            throw new VerifyException($res->errorCode);
        }

        $transaction->update([
            'status' => 'SUCCESS',
            'cardNumber' => $_REQUEST['cardNumber']
        ]);

        return $res;
    }
}