<?php

namespace App\Helper;

class BoardHelper{
    public const ICSE = 0;
    public const CBSE = 1;
    public const STATE_BOARD_HSC = 2;
    public const STATE_BOARD_SSC = 3;
    
    public function boardtype(int $board_id)
    {
        $type=match($board_id){
            self::ICSE=>'ICSE',
            self::CBSE=>'CBSE',
            self::STATE_BOARD_HSC=>'STATE_BOARD_HSC',
            self::STATE_BOARD_SSC=>'STATE_BOARD_SSC'
        };
        
        return $type; 
    }
}

