package _-5i
{
    import *.*;
    import _-4Y.*;
    import flash.display.*;

    public class PreLoaderManager extends Object
    {
        private static var _-8M:Number;
        private static var _-2K:int;
        private static var _-49:Sprite;
        private static var _-2O:int = 0;
        private static var _-9B:int = 0;
        private static var else20:int = 0;
        private static var _-L:int = 0;
        private static var _-2:Object;
        private static var _-0g:String = "center";
        private static var _-0:_-A4 = new _-A4("PreLoaderManager", _-A4._-8W);

        public function PreLoaderManager()
        {
            ;
            var _loc_1:* = null - (null as (null is null + (true as false)));
            var _loc_2:String = null;
            ;
            if (!(_loc_1 && this))
            {
            }
            throw new Error("This Class is not to be Instantiated.");
            return;
        }// end function

        public static function _-9E(param1:String = "center") : void
        {
            ;
            var _loc_2:* = null + (true >>> false >> null) - 1 + 1;
            var _loc_3:String = null;
            do
            {
                
                return;
                if (false)
                {
                    
                    _-2Y();
                }while (true)
                
                _-05();
                if (_loc_3 || _loc_2)
                {
                    ;
                    _loc_2 = null | null;
                    _loc_2 = null;
                    _loc_2--;
                    do
                    {
                        
                        _-0g = param1;
                    }
                    do
                    {
                        
                        _-L = _-2.height * 0.5;
                    }while (true)
                    
                    else20 = _-2.width * 0.5;
                }while (true)
                
                ;
                _loc_2--;
                (PreLoaderManager - [])._-2 = new (!_loc_3)._-3T();
                ;
                if (_-2 == null) goto 128;
                _-3o();
                ;
            }
            return;
        }// end function

        public static function _-5R() : void
        {
            ;
            var _loc_1:* = undefined % (-false);
            var _loc_2:Boolean = false;
            do
            {
                
                return;
                if (false)
                {
                    
                    _-9B = NaN;
                }while (true)
                
                _-2O = NaN;
                ;
                if (_loc_2)
                {
                    do
                    {
                        
                        _-49 = null;
                    }
                    if (!_loc_1)
                    {
                        do
                        {
                            
                            _-2K = NaN;
                        }
                    }while (true)
                    
                    ;
                    (null instanceof (true & PreLoaderManager) * (new activation >= _loc_3 < ))._-8M = NaN;
                }while (true)
                if (_-2 == null) goto 107;
                _-3o();
                ;
            }
            return;
        }// end function

        public static function _-3o() : void
        {
            ;
            _loc_3--;
            _loc_2--;
            var _loc_3:* = true ^ false;
            var _loc_4:String = null;
            try
            {
                _-49.removeChild(_-2);
                if (_loc_4)
                {
                    _-2 = null;
                    ;
                    _loc_3++;
                    _loc_3--;
                    _loc_2--;
                    _loc_3--;
                }
            }
            catch (e)
            {
                ;
                _loc_3 = _loc_3;
                _loc_3--;
                _loc_2--;
                if (!(null / (null - (null + 1)) && _loc_2))
                {
                    _-0.error("Error Trying to Remove Pre Loader.");
                }
            }
            return;
            return;
        }// end function

        public static function init(param1:DisplayObject) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2--;
            _loc_2 = false;
            _loc_2++;
            var _loc_3:* = null >= null;
            if (_loc_2)
            {
                do
                {
                    
                    return;
                    ;
                    _loc_2--;
                    
                    _-CE(65535, 0);
                    ;
                    _loc_2++;
                    _loc_2++;
                }
            }while (true)
            _-49 = param1 as Sprite;
            return;
        }// end function

        public static function _-2Y() : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            var _loc_3:* = ~(~_loc_2 in false) - 1;
            if (!_loc_3)
            {
                do
                {
                    
                    if (_loc_2 || _loc_3)
                    {
                        if (!_loc_3)
                        {
                        }
                    }
                    _-9B = _-49.height * 0.5 - _-2.height * 0.5 + _-L;
                    
                    switch(_-0g.toLowerCase())
                    {
                        case _loc_3:
                        {
                            if (!(_loc_3 && _loc_1))
                            {
                            }
                            _-2O = _-49.width * 0.5 - _-2.width * 0.5 + else20;
                        }while (true)
                        ;
                        var _loc_2:String = null;
                        _loc_2--;
                        
                        if (_-2) goto 83;
                        if (!(_loc_3 && PreLoaderManager))
                        {
                            return;
                        }
                        if (_loc_2 || _loc_3)
                        {
                            continue;
                            
                            return;
                        }
                        ;
                        if (_-49) goto 172;
                    }
                    _-0.error("updatePreloaderLocation:>", "Stage has not been Assigned, Need to run PreLoaderManager.init( this )");
                    break;
                }
                default:
                {
                    break;
                }
            }
            if (_loc_2)
            {
                do
                {
                    
                    return;
                    
                    ;
                    _loc_2 = _-2;
                    (false < false).y = _-9B;
                }
            }while (true)
            _-2.x = _-2O;
            return;
        }// end function

        private static function _-05() : void
        {
            ;
            _loc_3--;
            _loc_3++;
            var _loc_3:* = true * (_loc_3 > false);
            var _loc_4:String = null;
            try
            {
                _-49.addChild(_-2);
                ;
                _loc_3 = null[null];
                _loc_2--;
            }
            catch (e)
            {
                ;
                _loc_2 = _loc_2;
                _loc_2++;
                if (!_loc_3)
                {
                    _-0.error("addPreloaderToStage:>", "Failed, Make sure a DisplayObject Stage as been Passed via init Function.");
                }
            }
            return;
            return;
        }// end function

        private static function _-CE(param1:int, param2:Number = 1) : void
        {
            ;
            _loc_4++;
            _loc_3--;
            _loc_4++;
            var _loc_5:* = true >>> (typeof(false));
            var _loc_6:String = null;
            do
            {
                
                _-2K = $colour;
                if (_loc_6 || _loc_3)
                {
                    if (_loc_6)
                    {
                        
                        _-8M = $alpha;
                    }
                }while (true)
                
                if (_loc_6)
                {
                    var $alpha:* = param2;
                    ;
                    _loc_3--;
                    ;
                }
                var $colour:* = param1;
                var _loc_4:* = _-49.graphics;
                with (_-49.graphics)
                {
                    if (_loc_6)
                    {
                        do
                        {
                            
                            endFill();
                        }
                        
                        drawRect(0, 0, _-49.width, _-49.height);
                        if (!_loc_5)
                        {
                        }while (true)
                        
                        ;
                        _loc_4++;
                        (_-2K & _loc_4).beginFill(PreLoaderManager, _-8M);
                        ;
                        clear();
                    }
                }
            }
            return;
            return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        var _loc_2:String = null;
        do
        {
            
            
        }while (true)
        
        ;
        default xml namespace = ~(null % (null + false)) - 1;
        if (!_loc_2)
        {
            do
            {
                
            }
            do
            {
                
                if (!_loc_2)
                {
                    ;
                    _loc_2 = null[null * (null >> (true >= NaN))];
                    _loc_3 = null in null;
                }while (true)
                
            }
        }while (true)
    }
}
