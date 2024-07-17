<?php

namespace App\Policies;

use App\Models\ScheduledClass;
use App\Models\User;

class ScheduledClassPolicy
{
   public function delete(User $user , ScheduledClass $class){
    return $user->id == $class->teacher_id ; 
   }
}
