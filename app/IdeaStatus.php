<?php

namespace App;


//  Idea.php სტატუსის მნიშვნელობების enum-ი, რომ არ ვწეროთ ყველგან ტექსტად და არ დავუშვათ შეცდომები
enum IdeaStatus: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';

    public function label():string
     {
        // status-ის ტექსტი UI-ში ლამაზად გამოვაჩინოთ.მაგ: 
        // X 'in_progress' |||| O In Progress
       return match($this) {
        self::PENDING => 'Pending',
        self::IN_PROGRESS => 'In Progress',
        self::COMPLETED => 'Completed',
       };
    }
    
}
