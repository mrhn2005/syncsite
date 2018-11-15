<?php

namespace App\Transformers;
use League\Fractal\TransformerAbstract;
use App\Store;
class StoreTransformer extends TransformerAbstract
{
    public function transform(Store $user)
    {
        return [
            'id'            => (int) $user->id,
            'نام'          => (string) $user->name,
            'ایمیل'         => (string) $user->email,
            'آدرس'       => (string) $user->address,
        ];
    }
}