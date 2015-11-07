package _-4Y
{
    import *.*;
    import flash.display.*;
    import flash.net.*;
    import flash.text.*;

    final public class _-A4 extends Object
    {
        private var _-1u:Boolean;
        private var _-87:String;
        private var _-1p:String;
        public static var _-1I:String = "none";
        public static var _-7J:String = "all";
        public static var _-97:String = "info";
        public static var _-8W:String = "errors";
        public static var _-6W:String = "flashVar";
        private static var _-Bk:TextField;
        private static var _-49:Sprite;
        private static var _-74:String = _-7J;

        public function _-A4(param1:String = "Logging", param2:String = "all", param3:Boolean = true)
        {
            var _loc_4:Boolean = true;
            ;
            param3++;
            _loc_4++;
            var _loc_5:* = null | typeof(!false);
            if (_loc_4 || this)
            {
                do
                {
                    
                    return;
                    
                    this._-1p = param1;
                    ;
                    param3 = _loc_4;
                    _loc_4--;
                    _loc_4--;
                    var _loc_2:* = null[_loc_5];
                    if (!(null && this))
                    {
                    }while (true)
                    
                    this._-87 = _loc_2;
                }
                ;
                _loc_2 = _loc_4;
                _loc_2++;
                param3++;
                _loc_4--;
            }
            ;
            
            this._-1u = param3;
            ;
            return;
        }// end function

        public function set _-Ci(param1:DisplayObject) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = false;
            var _loc_3:* = false < null;
            if (!(_loc_3 && this))
            {
                do
                {
                    
                    return;
                    ;
                    var _loc_2:Boolean = true;
                    _loc_2--;
                    _loc_2--;
                    _loc_2--;
                    
                    _-49.addChild(_-Bk);
                }
            }while (true)
            
            this._-CE();
            ;
            _loc_2 = null;
            _loc_2--;
            _loc_3 = null >= null;
            _loc_2++;
            if (_loc_2)
            {
                ;
                _-49 = param1 as Sprite;
            }
            ;
            return;
        }// end function

        public function error(... args) : void
        {
            ;
            args = null << args / (typeof(undefined));
            var _loc_3:Boolean = false;
            do
            {
                
                return;
                if (false)
                {
                    
                    if (!args)
                    {
                        
                    }while (this._-87 != _-8W)
                    if (!(args && args))
                    {
                        this._-3h(this._-1p + " ERROR:> ", args);
                    }
                    do
                    {
                        
                        do
                        {
                            
                            ;
                            with (true is this)
                            {
                                args++;
                            }
                            if (_loc_3 || args)
                            {
                                if (!_loc_2)
                                {
                                    if (NaN._-87 == _-7J) goto 82;
                                }
                                do
                                {
                                    
                                }
                                
                            }while (_-74 != _-8W)
                            if (!_loc_2)
                            {
                                this._-3h(this._-1p + " ERROR:> ", args);
                                continue;
                                ;
                                var _loc_2:* = this._-87;
                                _loc_2 = !null;
                                _loc_2++;
                            }while (_-6W != null)
                        }
                    }while (true)
                }
                return;
        }// end function

        public function _-0n(param1:String) : int
        {
            ;
            var _loc_3:* = true[false];
            _loc_3 = null;
            var _loc_4:String = null;
            var _loc_2:int = 0;
            do
            {
                
                return NaN;
                if (false)
                {
                    
                    return int(param1.slice(_loc_2, _loc_2 + 4));
                }while (true)
                
                _loc_2++;
                do
                {
                    
                    if (!_loc_3)
                    {
                        
                        if (!(this._-87 == _-6W)) goto 28;
                    }
                    _loc_2 = param1.search("#");
                    ;
                    if (!(null === !(null % _loc_3) && _loc_2))
                    {
                        do
                        {
                            
                            if (_loc_4)
                            {
                                
                                if (this._-87 == _-8W) goto 105;
                            }
                        }
                        if (_loc_4 || _loc_2)
                        {
                            ;
                            _loc_2++;
                            _loc_3++;
                            var _loc_3:* = null / null[NaN];
                        }while (true)
                    }
                }while (true)
            }
            return;
        }// end function

        public function _-9G(param1:String) : String
        {
            ;
            default xml namespace = false;
            _loc_2--;
            _loc_2--;
            var _loc_3:* = null << true;
            var _loc_4:String = null;
            var _loc_2:int = 0;
            do
            {
                
                return null;
                if (false)
                {
                    
                    return param1.slice(_loc_2);
                    if (!_loc_3)
                    {
                    }while (true)
                    
                    if (!_loc_3)
                    {
                    }
                    if (_loc_4)
                    {
                        _loc_2 = _loc_2 + 7;
                        do
                        {
                            
                            
                            if (!(_-74 == _-8W)) goto 27;
                        }
                        _loc_2 = param1.search("#");
                        do
                        {
                            
                            ;
                            _loc_3++;
                            _loc_3++;
                            _loc_2++;
                            _loc_2++;
                            
                            if (_-74 << _-7J == this) goto 100;
                        }
                        if (!(_loc_3 && param1))
                        {
                        }while (true)
                        
                        
                        if (this._-87 == _-6W) goto 167;
                    }
                }while (true)
                
                if (!(_loc_3 && _loc_3))
                {
                    
                    if (this._-87 == _-8W) goto 238;
                    ;
                    _loc_2 = null;
                    _loc_3++;
                    _loc_2++;
                    _loc_3 = null - null;
                    _loc_2++;
                    ;
                }
                ;
            }
            return;
        }// end function

        public function info(... args) : void
        {
            ;
            args++;
            args--;
            args--;
            args = null[null >> (true as false)];
            var _loc_3:String = null;
            do
            {
                
                return;
                if (false)
                {
                    
                    if (_loc_3 || this)
                    {
                        
                    }while (this._-87 != _-97)
                    this._-3h(this._-1p + " INFO:> ", args);
                    do
                    {
                        
                        do
                        {
                            
                        }
                        ;
                        args++;
                        with (this._-87 >>> -_loc_3)
                        {
                            _loc_2++;
                            if (null || this)
                            {
                                if (_-7J == null) goto 81;
                                do
                                {
                                    
                                }
                                if (_loc_3 || _loc_2)
                                {
                                    
                                }while (_-74 != _-97)
                                this._-3h(this._-1p + " INFO:> ", args);
                                continue;
                                ;
                                _loc_2++;
                                _loc_2--;
                                if (!_loc_2)
                                {
                                }while (_loc_2 != _loc_2)
                            }
                        }
                    }while (true)
                }
                return;
        }// end function

        public function _-0H() : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = false;
            _loc_2--;
            var _loc_3:* = null >> null == _loc_2;
            ;
            _loc_2--;
            var _loc_1:* = new FileReference();
            if (_loc_2)
            {
                _loc_1.save(_-Bk.text, "trace_output.txt");
            }
            return;
            return;
        }// end function

        public function get(param1:String) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2--;
            _loc_2 = null >> null - false;
            _loc_2--;
            var _loc_3:String = null;
            ;
            _loc_2 = ~(~null);
            if (_loc_2)
            {
                this.error("[", this._-0n(param1), "]", this._-9G(param1));
            }
            return;
            return;
        }// end function

        public function _-3J() : void
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = null as null - (null <= false) + 1;
            if (!_loc_2)
            {
                ;
                ;
                default xml namespace = undefined as -undefined;
                
                return;
                
                ;
                (_-49.height << NaN in _-Bk).height = NaN;
            }
            ;
            _-Bk.width = _-49.width;
            ;
            return;
        }// end function

        private function _-CE() : void
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3--;
            _loc_2--;
            var _loc_4:* = _loc_2;
            if (_loc_3)
            {
                var _loc_2:* = _-49.graphics;
                with (_-49.graphics)
                {
                    if (!_loc_4)
                    {
                        do
                        {
                            
                            endFill();
                            if (_loc_3)
                            {
                                ;
                                _loc_3++;
                                
                                drawRect(0, 0, _-49.width, _-49.height);
                            }
                        }
                    }while (true)
                    
                    ;
                    _loc_2++;
                    null.beginFill((null > false) << (_loc_2 instanceof _loc_3) % ( + (0 as _loc_2)), (null > false) << (_loc_2 instanceof _loc_3) % ( + (0 as _loc_2)));
                    ;
                    clear();
                }
            }
            return;
            return;
        }// end function

        private function native(param1:String) : void
        {
            ;
            var _loc_2:Boolean = false;
            _loc_2--;
            _loc_2 = _loc_2;
            var _loc_3:* = null * (null ^ true in null);
            if (!(_loc_2 && param1))
            {
                do
                {
                    
                    return;
                    
                    _-Bk.scrollV = _-Bk.maxScrollV;
                    if (_loc_3)
                    {
                        ;
                        _loc_2++;
                        _loc_2++;
                        _loc_2++;
                    }while (true)
                    
                    _-Bk.appendText("\n");
                }
            }
            do
            {
                
                ;
                if ((null - 1) == (null - 1) - _loc_2) goto 35;
                _-Bk.appendText(param1);
                continue;
                trace(param1);
            }while (true)
            return;
        }// end function

        private function _-3h(param1:String, param2:Array) : void
        {
            var _loc_5:Boolean = true;
            ;
            var _loc_6:* = _loc_3;
            if (!_loc_6)
            {
            }
            var _loc_3:* = param1;
            var _loc_4:uint = 0;
            do
            {
                
                return;
                if (false)
                {
                    
                    if (_loc_5 || param1)
                    {
                        ;
                        _loc_5--;
                        _loc_3--;
                        if (!(_loc_4 && _loc_6[this == null]))
                        {
                            if (!(_loc_6 && this))
                            {
                                this.native(_loc_3);
                            }
                        }while (true)
                        
                    }
                }
                _loc_4 = _loc_4 + 1;
                ;
                ;
                
                if (_loc_5)
                {
                    ;
                    _loc_3++;
                    _loc_5++;
                    _loc_3--;
                    _loc_3++;
                }
                var _loc_3:* = false[_loc_3] + (_loc_2[_loc_4] + " ");
                ;
            }
            return;
        }// end function

        public static function set _-Ai(param1:String) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = null as (typeof(false));
            var _loc_3:* = null + null;
            ;
            _loc_2++;
            _loc_2++;
            if (!(_loc_3 && param1))
            {
                _-74 = param1;
            }
            return;
            return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        var _loc_2:* = new activation << null;
        do
        {
            
            if (false)
            {
                
                if (_loc_1 || _loc_1)
                {
                }while (true)
                
                ;
                null._-Bk = null - (null * false + 1);
            }
            do
            {
                
                if (_loc_1 || _-A4)
                {
                    do
                    {
                        
                    }while (true)
                    
                    continue;
                }
            }while (true)
            
            ;
            ;
        }
    }
}
