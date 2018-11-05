<?php
namespace Aries\Seppay\Traits;

trait Data {
    private $transId;
    private $amount;
    private $callback;
    private $factorNumber;

    public function amount($amount)
    {
        $this->amount = $amount;
    }

    public function callback($url)
    {
        $this->callback = urlencode($url);
    }

    public function factorNumber($number = null)
    {
        $this->factorNumber = $number;
    }
}