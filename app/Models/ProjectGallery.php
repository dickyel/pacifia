<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class ProjectGallery extends Model
{
    use HasFactory, SoftDeletes;

    
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'project_id',
        'image_project',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });
    }
}
