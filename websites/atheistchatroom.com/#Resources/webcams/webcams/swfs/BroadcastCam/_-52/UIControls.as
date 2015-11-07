package _-52
{
    import *.*;
    import _-0A.*;
    import _-30.*;
    import _-4Y.*;
    import _-C-.*;
    import flash.display.*;
    import flash.events.*;

    public class UIControls extends SkinnableComponent
    {
        protected var _-7a:Boolean = false;
        protected var _-4n:ToggleButton;
        protected var _-Cg:String = "tog_btn_camera";
        protected var _-AK:ToggleButton;
        protected var _-9g:String = "tog_btn_microphone";
        protected var _-0I:Button3;
        protected var _-63:String = "btn_pressToTalk";
        protected var _-w:Button3;
        protected var _-0K:String = "btn_preview";
        protected var _-A2:Button3;
        protected var _-6t:String = "btn_reboot";
        protected var _-3C:Object;
        protected var do20:String = "sldr_volume";
        protected var _-9D:Button3;
        protected var _-1y:String = "btn_snapShot";
        protected var _-1c:ToggleButton;
        protected var _-6n:String = "tog_btn_speaker";
        private var _-0:_-A4;
        private var _-AI:Number;
        private var _-93:Number;

        public function UIControls(param1:Number = NaN, param2:Number = NaN)
        {
            ;
            var _loc_3:* = null - (null as true[false]);
            param2 = null << null;
            _loc_3 = null;
            var _loc_4:String = null;
            do
            {
                
                return;
                if (false)
                {
                    
                    super(param1, param2);
                    if (!_loc_3)
                    {
                    }while (true)
                    
                    this._-93 = 1;
                }
                ;
                ;
                param2 = null;
                param2++;
                var _loc_3:* = null & null;
                
                this._-AI = 0;
                do
                {
                    
                    if (isNaN(param2)) goto 67;
                    height = param2;
                    do
                    {
                        
                    }while (isNaN(param1))
                    width = param1;
                    ;
                    param2--;
                    param2--;
                    _loc_3++;
                    continue;
                    this._-0 = new _-A4("UIControls", _-A4._-8W);
                }while (true)
            }
            return;
        }// end function

        public function get _-8() : Number
        {
            ;
            return (null << (null instanceof (this in null) == null == null))._-AI;
            return;
        }// end function

        public function set _-8(param1:Number) : void
        {
            ;
            _loc_2++;
            _loc_2++;
            var _loc_2:* = _loc_2 + 1;
            var _loc_3:* = true > false;
            ;
            _loc_2 = _loc_2;
            if ((null as null - _loc_3) << null || param1)
            {
                if (!_loc_2)
                {
                }
                this._-AI = param1 / 100;
            }
            return;
            return;
        }// end function

        public function get _-B3() : Number
        {
            ;
            return (null | null + (null + this))._-93;
            return;
        }// end function

        public function set _-B3(param1:Number) : void
        {
            ;
            _loc_2++;
            var _loc_2:Boolean = false;
            _loc_2++;
            _loc_2++;
            _loc_2 = _loc_2;
            var _loc_3:Boolean = true;
            ;
            _loc_2 = new activation;
            _loc_2--;
            _loc_2--;
            if (_loc_3)
            {
                if (_loc_3)
                {
                }
                this._-93 = param1 / 100;
            }
            return;
            return;
        }// end function

        public function _-7g(param1:String) : void
        {
            ;
            _loc_5--;
            var _loc_5:* = null + (-null % (true >>> false));
            var _loc_6:String = null;
            if (!(_loc_5 && param1))
            {
                this._-0.info("addAllComponent:>", "/n", _-0L.elements("*"));
            }
            var _loc_2:* = _-0L.elements("*");
            var _loc_3:* = _loc_2.length();
            ;
            _loc_2 = 0;
            _loc_3++;
            var _loc_4:Number = NaN;
            do
            {
                
                if (_loc_6)
                {
                    return;
                    
                    if (!(_loc_5 && _loc_2))
                    {
                    }
                }
                _loc_4 = _loc_4 + 1;
                if (_loc_6)
                {
                }while (true)
                ;
                ;
                
                this._-6b(_loc_2[_loc_4].name());
            }
            return;
        }// end function

        public function _-6b(param1:DisplayObject, param2:Boolean = false) : void
        {
            var _loc_3:Boolean = true;
            ;
            param2++;
            param2++;
            var _loc_4:* = _loc_3;
            if (!(_loc_4 && param2))
            {
                do
                {
                    
                    return;
                    ;
                    
                }while (param2)
                if (_loc_3 || _loc_3)
                {
                    ;
                    _loc_3--;
                    var _loc_3:* = _loc_4;
                    _loc_3++;
                    param1.visible = false;
                }
                ;
                this.addChild(param1);
            }
            ;
            return;
        }// end function

        public function _-5q(param1:String) : Boolean
        {
            var _loc_2:Boolean = true;
            ;
            var _loc_3:* = new activation - 1;
            if (_loc_2)
            {
                ;
                _loc_2++;
                _loc_2++;
            }
            ;
            if (!(NaN && this))
            {
                return _loc_3 > new activation[_loc_2];
            }
            return false;
            return;
        }// end function

        public function _-A-() : void
        {
            return;
            return;
        }// end function

        public function _-8g(param1:DisplayObject) : void
        {
            var _loc_4:Boolean = true;
            ;
            _loc_4 = false;
            var _loc_2:String = null;
            _loc_2--;
            _loc_2--;
            var _loc_5:* = null[null];
            _loc_2 = new activation;
            var $obj:* = param1;
            try
            {
                this.removeChild();
            }
            catch (e)
            {
                ;
                var _loc_3:String = this;
                _loc_3++;
                _loc_3 = new catch0;
                $obj;
                if (_loc_4 || this)
                {
                    ;
                    _loc_3++;
                    _loc_3--;
                    _-0.error("removeCTRLComponent:", e, "doesnt exist");
                }
            }
            return;
            return;
        }// end function

        public function _-AO() : Boolean
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:String = null;
            if (_loc_1 || _loc_1)
            {
                do
                {
                    
                    ;
                    return null * (null - null);
                    
                    this._-8g(this._-w);
                    ;
                    if (!(_loc_2 - _loc_1 < NaN && this))
                    {
                    }while (true)
                    if (this._-w) goto 64;
                }
            }
            return false;
            ;
            return;
        }// end function

        public function _-3E(param1:String)
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3++;
            _loc_2++;
            _loc_3--;
            var _loc_4:* = null >>> (null in null);
            ;
            var _loc_2:* = null - this.getChildByName(param1);
            _loc_2--;
            _loc_2 = null + 1;
            if (!(_loc_4 && param1))
            {
                ;
                default xml namespace = null * null;
                _loc_3--;
                _loc_3--;
            }
            return _loc_2;
            return null;
            return;
        }// end function

        public function _-A3(param1:String, param2:String = "cc") : String
        {
            ;
            _loc_3++;
            param2 = true + false;
            _loc_4++;
            _loc_3++;
            _loc_3++;
            var _loc_4:String = null;
            var _loc_5:String = null;
            var _loc_3:* = _-0L.elements(param1).location.grid;
            if (!_loc_4)
            {
                do
                {
                    
                    if (_loc_5 || _loc_3)
                    {
                        return param2;
                        
                        ;
                        _loc_4--;
                        _loc_3++;
                        if (!(_loc_3 && (_loc_4 is _loc_3) + 1))
                        {
                            if (!(_loc_4 && param1))
                            {
                            }
                            
                        }while (null == "")
                    }
                }
                return _loc_3;
                if (!(_loc_4 && param2))
                {
                    ;
                    _loc_3++;
                    ;
                }
            }
            ;
            return;
        }// end function

        public function _-4t(param1:String, param2:String = "horizontal") : String
        {
            var _loc_4:Boolean = true;
            ;
            param2--;
            param2 = false ^ _loc_3;
            param2--;
            var _loc_5:* = null - null;
            var _loc_3:* = _-0L.elements(param1).orientation;
            if (!_loc_5)
            {
                do
                {
                    
                    if (_loc_4)
                    {
                        return param2;
                        
                        if (_loc_4 || this)
                        {
                            ;
                            _loc_4++;
                            if (_loc_2)
                            {
                            }
                            if (!_loc_3)
                            {
                                
                            }
                        }while (null)
                    }
                }
                return _loc_3;
            }
            ;
            ;
            _loc_4--;
            if (!_loc_5)
            {
            }
            ;
            return;
        }// end function

        public function _-Bp(param1:String, param2:int = 0) : int
        {
            var _loc_4:Boolean = true;
            ;
            _loc_3--;
            param2 = false;
            _loc_4++;
            var _loc_5:* = null >>> param1;
            ;
            _loc_4++;
            var _loc_3:* = null + (int(_-0L.elements(param1).location.xOffSet) <= null);
            param2--;
            _loc_3 = null;
            if (!_loc_5)
            {
            }
            ;
            _loc_2++;
            _loc_3++;
            var _loc_4:* = typeof(_loc_5);
            if (!(_loc_3 && this))
            {
                return _loc_3;
            }
            return _loc_2;
            return;
        }// end function

        public function _-AB(param1:String, param2:int = 0) : int
        {
            var _loc_4:Boolean = true;
            ;
            param2 = false;
            var _loc_5:* = null / null + 1;
            ;
            _loc_4++;
            _loc_4--;
            var _loc_3:* = -int(_-0L.elements(param1).location.yOffSet);
            param2++;
            _loc_3 = null;
            if (!_loc_5)
            {
            }
            ;
            param2--;
            if (_loc_3 || param1)
            {
                return undefined;
            }
            return param2;
            return;
        }// end function

        public function _-0D(param1:String) : void
        {
            ;
            var _loc_3:* = !(false + 1);
            var _loc_3:String = null;
            var _loc_4:String = null;
            ;
            var _loc_2:* = this.getChildByName(param1);
            _loc_2 = (null as null) - 1 > null;
            if (!_loc_3)
            {
                if (_loc_2 != null)
                {
                    ;
                    _loc_2 = _loc_4;
                    if ((null is _loc_4) > NaN)
                    {
                    }
                    if (this)
                    {
                        _loc_2.visible = false;
                    }
                }
            }
            return;
            return;
        }// end function

        public function _-Av() : void
        {
            return;
            return;
        }// end function

        public function do(param1, param2:String) : void
        {
            ;
            var _loc_3:* = param2;
            var _loc_4:* = param2 < undefined;
            if (!(_loc_3 && _loc_3))
            {
                ;
                _loc_3 = true >= false;
                do
                {
                    
                    return;
                    
                    this._-0.info("createSliderComponent:>", _-0L.elements(_loc_2));
                    ;
                    _loc_3--;
                    _loc_2--;
                    _loc_2--;
                    _loc_3++;
                    if (!_loc_3)
                    {
                    }while (true)
                    param1.setSkin(_-0L.elements(_loc_2));
                }
            }
            return;
        }// end function

        public function _-4P(param1:DisplayObject, param2:Number = 1) : void
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3--;
            param2--;
            _loc_3++;
            param2++;
            var _loc_4:Boolean = false;
            if (_loc_3 || _loc_3)
            {
                do
                {
                    
                    return;
                    ;
                    with (null)
                    {
                        _loc_3 = _loc_3;
                        default xml namespace = ~this;
                        
                        param1.scaleY = param2;
                        if (!_loc_4)
                        {
                        }while (true)
                        
                        param1.scaleX = param2;
                    }
                    if (!_loc_4)
                    {
                        ;
                        ;
                        param2--;
                        param2++;
                        if (_loc_3)
                        {
                            if (!(param2 < 1)) goto 77;
                        }
                        param2 = 1;
                    }
                }
                ;
                return;
        }// end function

        public function _-C1(param1:DisplayObject, param2:String) : void
        {
            var _loc_7:Boolean = true;
            ;
            _loc_7--;
            param2--;
            param2--;
            _loc_6++;
            var _loc_8:String = null;
            if (!_loc_8)
            {
            }
            var _loc_3:* = this._-A3(param2);
            if (!_loc_8)
            {
            }
            var _loc_4:* = this._-Bp(param2);
            if (!_loc_8)
            {
            }
            var _loc_5:* = this._-AB(param2);
            do
            {
                
                param1.y = this.height - param1.height - _loc_5;
                if (!_loc_8)
                {
                    
                    break;
                }
                case :
                {
                    param1.x = this.width - param1.width - _loc_4;
                }
                if (!_loc_8)
                {
                }while (true)
                
                param1.y = this.height - param1.height - _loc_5;
                do
                {
                    
                    break;
                }
                case "bl":
                {
                    param1.x = this.width * 0.5 - param1.width * 0.5;
                }
                if (_loc_7)
                {
                    do
                    {
                        
                        param1.y = this.height - param1.height - _loc_5;
                    }
                    if (_loc_7 || param2)
                    {
                    }while (true)
                    
                    break;
                }
                case _loc_7:
                {
                    param1.x = _loc_4;
                    if (!_loc_8)
                    {
                    }while (true)
                    
                    param1.y = this.height * 0.5 - param1.height * 0.5;
                    do
                    {
                        
                        break;
                    }
                    case "cr":
                    {
                        param1.x = this.width - param1.width - _loc_4;
                        do
                        {
                            
                            param1.y = this.height * 0.5 - param1.height * 0.5;
                        }while (true)
                        
                        break;
                    }
                    case "cc":
                    {
                    }
                    default:
                    {
                        ;
                        _loc_7--;
                        _loc_3++;
                        param1.x = this.width * 0.5 - param1.width * 0.5;
                    }while (true)
                    
                    param1.y = this.height * 0.5 - param1.height * 0.5;
                    if (_loc_7)
                    {
                        do
                        {
                            
                            break;
                        }
                        case "cl":
                        {
                            param1.x = _loc_4;
                            do
                            {
                                
                                param1.y = _loc_5;
                            }while (true)
                            
                            break;
                        }
                        case "tr":
                        {
                            param1.x = this.width - param1.width - _loc_4;
                        }
                    }while (true)
                    
                    param1.y = _loc_5;
                }
                do
                {
                    
                    break;
                }
                case "tc":
                {
                    param1.x = this.width * 0.5 - param1.width * 0.5;
                    do
                    {
                        
                        param1.y = _loc_5;
                    }
                }while (true)
                switch(_loc_3.toLowerCase())
                {
                    case "tl":
                    {
                        param1.x = _loc_4;
                    }while (true)
                    break;
                    break;
                }
            }
            return;
            return;
        }// end function

        public function _-5B(param1:String) : void
        {
            ;
            var _loc_3:Boolean = false;
            _loc_3 = true;
            var _loc_2:String = null;
            _loc_2++;
            _loc_2--;
            _loc_3 = null + null;
            var _loc_4:String = null;
            _loc_2 = this.getChildByName(param1);
            ;
            _loc_3++;
            _loc_2 = this;
            _loc_2--;
            if (_loc_2 || _loc_2)
            {
                if (_loc_2 != null)
                {
                    ;
                    _loc_2++;
                    _loc_2++;
                    _loc_2++;
                    with (_loc_3)
                    {
                        _loc_2--;
                        if (_loc_3)
                        {
                        }
                        if (!_loc_2)
                        {
                            _loc_2.visible = true;
                        }
                    }
                }
                return;
                return;
        }// end function

        override protected function rollOutHandler(event:MouseEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            _loc_2++;
            var _loc_3:String = null;
            ;
            _loc_2--;
            var _loc_2:* = _loc_2;
            if (!(_loc_3 && _loc_3))
            {
                alpha = this._-AI;
            }
            return;
            return;
        }// end function

        override protected function rollOverHandler(event:MouseEvent) : void
        {
            ;
            _loc_2--;
            var _loc_2:* = typeof((_loc_2 + 1)) in false;
            var _loc_3:Boolean = true;
            ;
            _loc_2++;
            _loc_2++;
            if (_loc_3 || event)
            {
                alpha = this._-93;
            }
            return;
            return;
        }// end function

        override protected function update() : void
        {
            ;
            var _loc_1:* = null / (true / (this in -false));
            var _loc_2:String = null;
            if (_loc_2 || _loc_2)
            {
                do
                {
                    
                    return;
                    
                }while (!this._-1c)
                if (_loc_2)
                {
                    this._-C1(this._-1c, this._-6n);
                }
                do
                {
                    
                    if (!this._-9D) goto 41;
                    if (_loc_2 || _loc_2)
                    {
                        this._-C1(this._-9D, this._-1y);
                        do
                        {
                            
                        }while (!this._-3C)
                        ;
                        this._-3C._-C1(this >>> -null, this.do20);
                        do
                        {
                            
                        }while (!this._-A2)
                    }
                    this._-C1(this._-A2, this._-6t);
                    do
                    {
                        
                    }while (!this._-w)
                    this._-C1(this._-w, this._-0K);
                    if (_loc_2 || _loc_2)
                    {
                        do
                        {
                            
                        }while (!this._-0I)
                        if (_loc_2 || this)
                        {
                            this._-C1(this._-0I, this._-63);
                        }
                    }
                    if (!(_loc_1 && _loc_1))
                    {
                        do
                        {
                            
                        }while (!this._-AK)
                        this._-C1(this._-AK, this._-9g);
                        do
                        {
                            
                        }while (!this._-4n)
                    }
                    ;
                    (null * (this > this) >> null)._-C1(this._-4n, this._-Cg);
                }
                continue;
                super.update();
            }while (true)
            return;
        }// end function

    }
}
