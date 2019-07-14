<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['content', 'finished'];

    public function isFinished (): bool {
        return $this->finished;
    }

    public function belongsToUser ($userId): bool {
        return $this->user_id == $userId;
    }

    public function finish (): self {
        $this->finished = true;
        $this->save();

        return $this;
    }

    public function remove (): bool {
        if(!$this->isFinished()) {
            return $this->delete();
        }
        return false;
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function getAllByUser ($userId, $search) {
        $query = self::where('user_id', $userId);

        if ($search != null) {
            $query->where('content', 'like', "%{$search}%");
        }

        return $query->paginate(5);
    }
}
