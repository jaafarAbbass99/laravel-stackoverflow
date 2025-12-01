<?php 


namespace App\Enums;

enum QuestionStatus : string
{
    const OPEN = 'open';
    const REOPEN = 'reopen';
    const CLOSED = 'closed';
    const LOCKED = 'locked';
    const DELETED = 'deleted';

}