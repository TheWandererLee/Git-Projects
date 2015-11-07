package _-c
{
    import *.*;
    import _-21.*;
    import _-4Y.*;
    import flash.display.*;

    public class ErrorManager extends Object
    {
        private static var _-8M:Number;
        private static var _-2K:int;
        private static var _-49:Sprite;
        private static var _-2O:int;
        private static var _-9B:int;
        private static var _-4x:Object;
        private static var _-0:_-A4 = new _-A4("ErrorManager");
        static var _-8v:Boolean = false;

        public function ErrorManager()
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = null + false;
            if (_loc_1)
            {
            }
            throw new Error("This Class is not to be Instantiated.");
            return;
        }// end function

        public static function get _-67() : Boolean
        {
            return _-8v;
            return;
        }// end function

        public static function _-5R() : void
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = null === false;
            if (_loc_1)
            {
                do
                {
                    
                    return;
                    
                    _-9B = NaN;
                }
            }while (true)
            
            ;
            with (null)
            {
                null._-2O = null instanceof null + ( >> NaN) - 1;
                do
                {
                    
                    _-49 = null;
                    if (!_loc_2)
                    {
                        do
                        {
                            
                            _-2K = NaN;
                        }
                        if (!(_loc_2 && _loc_1))
                        {
                        }while (true)
                        
                        ;
                        false._-8M = NaN;
                    }
                }while (true)
                if (_-4x == null) goto 132;
                _-0Z();
                ;
                return;
        }// end function

        public static function _-0Z() : void
        {
            ;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            var _loc_3:* = _loc_1 & _loc_2;
            var _loc_4:Boolean = false;
            try
            {
                _-49.removeChild(_-4x);
                if (!(_loc_3 && _loc_3))
                {
                    ;
                    _loc_3--;
                    _loc_3 = null is true[ErrorManager];
                    _-4x = null;
                }
            }
            catch (e)
            {
                ;
                _loc_3--;
                _loc_3--;
                _loc_3 = null & _loc_4;
                _loc_3++;
                if (null & null || _loc_1)
                {
                    _-0.info("Error Trying to Remove Error Panel.");
                }
            }
            return;
            return;
        }// end function

        public static function override(param1:String, param2:String = "ERROR", param3:String = "0x333333", param4:String = "full") : void
        {
            var _loc_5:Boolean = true;
            ;
            _loc_5 = false;
            param3--;
            param3--;
            param3++;
            param4--;
            if (_loc_5 || param2)
            {
                do
                {
                    
                    return;
                    
                    _-8v = true;
                    ;
                    param3--;
                    _loc_5++;
                    _loc_5++;
                    if (null || true)
                    {
                    }while (true)
                    
                    _-1A(param4);
                }
                do
                {
                    
                    _-CO();
                }
                do
                {
                    
                    _-4x.setErrorCode(param1, param2);
                }while (true)
                ;
                param3++;
                param3--;
                param4--;
                
                _-4x.tintBackground(param3);
            }while (true)
            _-4x = new ErrorPanel();
            return;
        }// end function

        public static function init(param1:DisplayObject) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = null === false;
            _loc_2--;
            _loc_2++;
            var _loc_3:String = null;
            ;
            _loc_2++;
            _loc_2++;
            if (!(null && _loc_3 >= _loc_3))
            {
                do
                {
                    
                    return;
                    
                    _-CE(65535, 0);
                    ;
                    _loc_2--;
                }
            }while (true)
            _-49 = param1 as Sprite;
            return;
        }// end function

        private static function _-CO() : void
        {
            ;
            _loc_2--;
            var _loc_4:* = ((false - 1) > true) + 1;
            try
            {
                _-49.addChild(_-4x);
                ;
                var _loc_2:* = null >> undefined;
                _loc_2++;
            }
            catch (e)
            {
                ;
                _loc_3--;
                _loc_2--;
                _loc_3--;
                _loc_3++;
                if (_loc_4)
                {
                    _-0.info("addErrorPanelToStage:>", "Failed, Make sure a DisplayObject Stage as been Passed via init Function.");
                }
            }
            return;
            return;
        }// end function

        private static function _-CE(param1:int, param2:Number = 1) : void
        {
            var _loc_5:Boolean = true;
            ;
            var _loc_6:* = typeof(param2);
            do
            {
                
                _-2K = $colour;
                if (!_loc_6)
                {
                    if (!(_loc_6 && ErrorManager))
                    {
                        
                        _-8M = $alpha;
                    }
                    if (_loc_5)
                    {
                    }while (true)
                    
                    var $alpha:* = param2;
                }
                ;
                ;
                _loc_5--;
                _loc_5++;
                _loc_3++;
                var _loc_4:Boolean = true;
                var $colour:* = param1;
                ;
                _loc_4 = _-49.graphics;
                with (_loc_4)
                {
                    if (!_loc_6)
                    {
                        do
                        {
                            
                            endFill();
                        }
                        
                        drawRect(0, 0, _-49.width, _-49.height);
                        if (_loc_5 || ErrorManager)
                        {
                        }while (true)
                        
                        ;
                        _loc_4--;
                        _loc_3 =  - (_-2K - 1);
                        _loc_4++;
                        null.beginFill(null * (null << null >= null), _-8M);
                        ;
                        clear();
                    }
                }
            }
            return;
            return;
        }// end function

        private static function _-1A(param1:String) : void
        {
            ;
            _loc_2++;
            _loc_3++;
            _loc_3--;
            var _loc_3:* = false as _loc_2;
            var _loc_4:Boolean = true;
            do
            {
                
                _-4x.height = _-49.stage.stageHeight + 10;
                if (false)
                {
                    
                    _-4x.width = _-49.stage.stageWidth + 10;
                }while (true)
                
                _-9B = -10;
                do
                {
                    
                    break;
                }
                case _loc_4:
                {
                    _-2O = 0;
                    do
                    {
                        
                        if (!_loc_3)
                        {
                        }
                        _-9B = _-49.height * 0.5 - _-4x.height * 0.5;
                    }while (true)
                    switch(param1.toLowerCase())
                    {
                        case "center":
                        {
                            ;
                            _loc_2++;
                            _loc_2++;
                            _loc_3++;
                            if (_loc_4)
                            {
                            }
                            null._-2O = _-49.width * 0.5 - _-4x.width * 0.5;
                        }while (true)
                    }
                    break;
                }
                default:
                {
                    break;
                }
            }
            do
            {
                
                return;
                ;
                _loc_2++;
                if (!(null << (null == 0)))
                {
                    
                    _-4x.y = _-9B;
                }while (true)
                _-4x.x = _-2O;
                ;
            }
            return;
        }// end function

        ;
        var _loc_1:* = (true ^ false) <= null ^ null;
        var _loc_2:String = null;
        if (_loc_2)
        {
            ;
            _loc_2 = typeof(null[null]);
            do
            {
                
                
                ;
                if (!_loc_1)
                {
                }while (true)
            }
        }
        ;
    }
}
