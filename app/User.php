<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable implements HasMedia
{
  use Notifiable;
  use HasMediaTrait;
  use HasSlug;
  use SoftDeletes;
  protected $dates = ['deleted_at'];

  /**
   * Get the options for generating the slug.
   */
  public function getSlugOptions() : SlugOptions
  {
      return SlugOptions::create()
          ->generateSlugsFrom('name')
          ->saveSlugsTo('slug');
  }
  public function registerMediaCollections()
  {
    $this->addMediaCollection('avatar')->singleFile();
  }

  // relationship 
  // 
  public function bazars()
  {
    return $this->hasMany(Bazar::class);
  }

  public function meals()
  {
    return $this->hasMany(Meal::class);
  }


  // mine function

  public function isAdmin()
  {
    return $this->role->id == 1;
  }
  public function isMederator()
  {
    return $this->role->id == 2;
  }
  public function isMember()
  {
    return $this->role->id == 3;
  }
  
  

  public function hasRole($role)
  {
    return $this->role->slug === $role;
  }

  public function hasRoles($roles)
  {
    $hasRole = false;
    foreach ($roles as $role) {
      $hasRole = $this->hasRole($role);
    }
    return $hasRole;
  }

  public function hasAnyRoles($roles)
  {
    foreach ($roles as $role) {
      if ($this->hasRole($role)) {
        return true;
      }

    }
    return false;
  }



  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
      'email',
      'password',
      'provider',
      'provider_id',
      'slug',
      'avatar',
      'address',
      'city',
      'others',
      'role_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];
  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  public function is_editable($user_id)
  {
    return $this->isAdmin() || $this->id == $user_id;
  }
  


  

  public function setNameAttribute($value)
  {
      $this->attributes['name'] = ucfirst($value);
  }


}
