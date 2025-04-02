<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'description',
        'status',
        'icon'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
    
    // Automatically determine status based on dates
    protected static function booted()
    {
        static::creating(function ($schedule) {
            $schedule->status = $schedule->calculateStatus();
        });
        
        static::updating(function ($schedule) {
            $schedule->status = $schedule->calculateStatus();
        });
    }
    
    // Calculate status based on current date and schedule dates
    public function calculateStatus()
    {
        $today = Carbon::today();
        
        if ($today->gt($this->end_date)) {
            return 'completed';
        } elseif ($today->gte($this->start_date) && $today->lte($this->end_date)) {
            return 'active';
        } else {
            return 'upcoming';
        }
    }
    
    // Scope for completed schedules
    public function scopeCompleted($query)
    {
        return $query->where('end_date', '<', Carbon::today());
    }
    
    // Scope for active schedules
    public function scopeActive($query)
    {
        $today = Carbon::today();
        return $query->where('start_date', '<=', $today)
                     ->where('end_date', '>=', $today);
    }
    
    // Scope for upcoming schedules
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>', Carbon::today());
    }
    
    // Update status for all records
    public static function updateAllStatuses()
    {
        foreach (self::all() as $schedule) {
            $schedule->status = $schedule->calculateStatus();
            $schedule->save();
        }
    }
}
