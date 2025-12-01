<?php 

namespace App\Modules\Question\Domain\DTO;

use App\Models\User;

final class UserDto
{
    public function __construct(
        public int $id,
        public string $name,
    ) {}
    
    public static function fromModel(User $user): self
    {
        return new self(
            id: $user->id,
            name: $user->name,
        );
    }

}

