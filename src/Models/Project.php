<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $approved_by
 * @property integer $project_leader_id
 * @property integer $default_assignee_id
 * @property integer $account_id
 * @property integer $category_id
 * @property string $name
 * @property string $view
 * @property string $status
 * @property string $key
 * @property string $url
 * @property string $description
 * @property string $body
 * @property string $icon
 * @property string $color
 * @property string $type
 * @property string $currency
 * @property float $rate
 * @property string $rate_per
 * @property float $total
 * @property string $start_at
 * @property string $end_at
 * @property boolean $is_activated
 * @property boolean $is_started
 * @property boolean $is_done
 * @property string $created_at
 * @property string $updated_at
 * @property Contract[] $contracts
 * @property Issue[] $issues
 * @property Account $account
 * @property User $user
 * @property Category $category
 * @property User $user
 * @property User $user
 * @property User $user
 * @property User[] $users
 * @property Category[] $categories
 * @property ProjectsMeta[] $projectsMetas
 * @property Sprint[] $sprints
 * @property Timer[] $timers
 */
class Project extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'approved_by', 'project_leader_id', 'default_assignee_id', 'account_id', 'category_id', 'name', 'view', 'status', 'key', 'url', 'description', 'body', 'icon', 'color', 'type', 'currency', 'rate', 'rate_per', 'total', 'start_at', 'end_at', 'is_activated', 'is_started', 'is_done', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function issues()
    {
        return $this->hasMany('App\Models\Issue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'approved_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'default_assignee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'project_leader_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'projects_has_employees', null, 'employee_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'projects_has_tags', null, 'tag_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projectsMetas()
    {
        return $this->hasMany('App\Models\ProjectsMeta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sprints()
    {
        return $this->hasMany('App\Models\Sprint');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timers()
    {
        return $this->hasMany('App\Models\Timer');
    }
}
