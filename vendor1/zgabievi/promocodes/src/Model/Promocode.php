<?php

namespace Gabievi\Promocodes\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'reward', 'is_disposable', 'expires_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_disposable' => 'boolean',
        'data' => 'array',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['expires_at'];

    /**
     * Promocode constructor.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('promocodes.table', 'promocodes');
    }

    /**
     * Get the customers who is related promocode.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function customers()
    {
        return $this->belongsToMany(config('promocodes.customer_model'), config('promocodes.relation_table'))
            ->withPivot('used_at');
    }

    /**
     * Query builder to find promocode using code.
     *
     * @param $query
     * @param $code
     *
     * @return mixed
     */
    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }

    /**
     * Query builder to get disposable codes.
     *
     * @param $query
     * @return mixed
     */
    public function scopeIsDisposable($query)
    {
        return $query->where('is_disposable', true);
    }

    /**
     * Query builder to get non-disposable codes.
     *
     * @param $query
     * @return mixed
     */
    public function scopeIsNotDisposable($query)
    {
        return $query->where('is_disposable', false);
    }

    /**
     * Query builder to get expired promotion codes.
     *
     * @param $query
     * @return mixed
     */
    public function scopeExpired($query)
    {
        return $query->whereNotNull('expires_at')->whereDate('expires_at', '<=', Carbon::now());
    }

    /**
     * Check if code is disposable (ont-time).
     *
     * @return bool
     */
    public function isDisposable()
    {
        return $this->is_disposable;
    }

    /**
     * Check if code is expired.
     *
     * @return bool
     */
    public function isExpired()
    {
        // return $this->expires_at ? Carbon::now()->gte($this->expires_at) : false;
        return Carbon::parse($this->expires_at) ? Carbon::now()->gte(Carbon::parse($this->expires_at)) : 0;
    }
}
