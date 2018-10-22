<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Address
 *
 * @property int $id
 * @property string $name
 * @property int $customer_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Customer $customer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUpdatedAt($value)
 */
	class Address extends \Eloquent {}
}

namespace App{
/**
 * App\Sale
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $customer_id
 * @property int $quantity
 * @property string $price
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereUpdatedAt($value)
 */
	class Sale extends \Eloquent {}
}

namespace App{
/**
 * App\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $origin
 * @property string|null $desc_short
 * @property string|null $desc
 * @property int|null $quantity
 * @property int|null $price_buy
 * @property int|null $price_sell
 * @property int|null $price_discount
 * @property float|null $score
 * @property string|null $image
 * @property int|null $weight
 * @property string|null $weight_unit
 * @property int|null $active_discount
 * @property int|null $category_id
 * @property string|null $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Category|null $category
 * @property-read \App\Photo $photo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereActiveDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePriceBuy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePriceDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePriceSell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereWeightUnit($value)
 */
	class Product extends \Eloquent {}
}

namespace App{
/**
 * App\Review
 *
 * @property int $id
 * @property string $desc
 * @property int $product_id
 * @property int $customer_id
 * @property int $star
 * @property int $active
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Customer $customer
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereStar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereUpdatedAt($value)
 */
	class Review extends \Eloquent {}
}

namespace App{
/**
 * App\Photo
 *
 * @property int $id
 * @property string $name
 * @property int $product_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $file
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Photo whereUpdatedAt($value)
 */
	class Photo extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Customer
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string|null $phone
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Address[] $addresses
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUpdatedAt($value)
 */
	class Customer extends \Eloquent {}
}

namespace App{
/**
 * App\Order
 *
 * @property int $id
 * @property int $customer_id
 * @property int $address_id
 * @property string $phone
 * @property string $payment
 * @property string $total_price
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Address $address
 * @property-read \App\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sale[] $sales
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 */
	class Order extends \Eloquent {}
}

namespace App{
/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $photo
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App{
/**
 * App\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

