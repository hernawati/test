<?php

class Status{
	const DIAJUKAN	= 0;
	const DITOLAK	= 1;
	const DITERIMA	= 2;
	const DITUNDA	= 3;
	const URGENT	= 4;
	
	public static function toString($kodestatus){
		if($kodestatus==0){
			return 'DIAJUKAN';
		}else if($kodestatus==1){
			return 'DITOLAK';
		}else if($kodestatus==2){
			return 'DITERIMA';
		}else if($kodestatus==3){
			return 'DITUNDA';
		}else if($kodestatus==4){
			return 'URGENT';
		}
		return '';
	}

	public static function toStr(){
		if($kodestatus==0){
			return 'AJK';
		}else if($kodestatus==1){
			return 'TK';
		}else if($kodestatus==2){
			return 'TR';
		}else if($kodestatus==3){
			return 'TD';
		}else if($kodestatus==4){
			return 'UR';
		}
		return '';
	}
}