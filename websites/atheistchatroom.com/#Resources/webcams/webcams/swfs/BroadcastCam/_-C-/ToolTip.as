package _-C-
{
    import *.*;
    import _-4Y.*;
    import flash.display.*;
    import flash.events.*;
    import flash.filters.*;
    import flash.geom.*;
    import flash.text.*;
    import flash.utils.*;
    import import.*;

    public class ToolTip extends Sprite
    {
        private var _-49:Stage;
        private var _-6Q:DisplayObject;
        private var _-6o:TextField;
        private var _-3m:TextField;
        private var _-3-:Sprite;
        private var _-3I:TextFormat;
        private var _-4U:TextFormat;
        private var _-8S:StyleSheet;
        private var _-7I:Boolean = false;
        private var _-5d:Boolean = false;
        private var _-B5:Boolean = false;
        private var _-AH:Boolean = false;
        private var _-7y:Boolean = false;
        private var _-5U:Number = 200;
        private var _-8E:Number;
        private var _-3j:Number = 10;
        private var _-CK:String = "center";
        private var _-73:Number = 12;
        private var _-CS:Array;
        private var _-A1:Boolean = false;
        private var _-6a:Boolean = false;
        private var _-1Z:Number = 0;
        private var _-3G:Number = 10;
        private var _-1:Number;
        private var _-4h:Number = 1;
        private var _-8M:Number = 1;
        private var _-Ah:Number;
        private var _-Bd:Number;
        private var _-7h:Timer;
        private var _-0:_-A4;

        public function ToolTip()
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = null >>> -!(null | false);
            _loc_2 = null;
            do
            {
                
                return;
                if (false)
                {
                    
                    this._-7h.addEventListener("timer", this._-3i);
                }while (true)
                
                this._-7h = new Timer(this._-1Z, 1);
                if (_loc_1)
                {
                    do
                    {
                        
                        this.mouseChildren = false;
                    }
                    do
                    {
                        
                        ;
                        this.buttonMode = null >> ((this ^ false) == null) > null;
                        if (_loc_1 || this)
                        {
                        }while (true)
                        
                        this.mouseEnabled = false;
                    }while (true)
                    
                }
                if (!(_loc_2 && _loc_1))
                {
                    do
                    {
                        
                        this._-0 = new _-A4("ToolTip");
                        do
                        {
                            
                            ;
                            null._-CS = [null, 10263708];
                        }
                    }while (true)
                    this._-3- = new Sprite();
                }while (true)
            }
            return;
        }// end function

        public function set align(param1:String) : void
        {
            ;
            _loc_3--;
            _loc_2--;
            _loc_4--;
            var _loc_4:Number = NaN;
            var _loc_5:Boolean = false;
            if (!_loc_4)
            {
            }
            var _loc_2:* = param1.toLowerCase();
            var _loc_3:String = "right left center";
            if (_loc_5)
            {
                do
                {
                    
                    return;
                    ;
                    _loc_3 = true;
                    _loc_3++;
                    
                    this._-CK = _loc_2;
                }
            }while (true)
            if (!(_loc_3.indexOf(param1) == -1)) goto 67;
            ;
            _loc_3++;
            _loc_2--;
            if (_loc_5)
            {
                throw new Error(this + " : Invalid Align Property, options are: \'right\', \'left\' & \'center\'");
            }
            return;
        }// end function

        public function set autoSize(param1:Boolean) : void
        {
            ;
            var _loc_2:Boolean = false;
            _loc_2 = true;
            _loc_2++;
            _loc_2 = null;
            var _loc_3:String = null;
            ;
            _loc_2--;
            if (!(_loc_2 && _loc_3))
            {
                this._-A1 = param1;
            }
            return;
            return;
        }// end function

        public function get _-9i() : Number
        {
            ;
            default xml namespace = this;
            _loc_3 = null >> -null;
            return null._-8M;
            return;
        }// end function

        public function set _-9i(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            var _loc_3:String = null;
            if (!_loc_3)
            {
                this._-8M = param1;
            }
            return;
            return;
        }// end function

        public function set _-7V(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            var _loc_2:Boolean = false;
            var _loc_3:* = _loc_2;
            if (!_loc_3)
            {
                this._-1 = param1;
            }
            return;
            return;
        }// end function

        public function set _-1L(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = -_loc_2;
            _loc_2--;
            _loc_2 = false;
            var _loc_3:* = _loc_2;
            ;
            _loc_2++;
            if (!(_loc_3 && _loc_2))
            {
                this._-4h = param1;
            }
            return;
            return;
        }// end function

        public function get _-1s() : Number
        {
            ;
            _loc_3 = null << null;
            return this._-3j;
            return;
        }// end function

        public function set _-1s(param1:Number) : void
        {
            ;
            _loc_2++;
            var _loc_2:* = param1;
            var _loc_3:* = true instanceof false;
            if (!_loc_2)
            {
                this._-3j = param1;
            }
            return;
            return;
        }// end function

        public function set _-3k(param1:Array) : void
        {
            ;
            var _loc_2:Boolean = false;
            _loc_2++;
            _loc_2++;
            _loc_2 = _loc_2;
            var _loc_3:* = null / (null is true);
            ;
            with (this)
            {
                _loc_2--;
                var _loc_2:* = null - this;
                if (_loc_3 || _loc_3)
                {
                    this._-CS = param1;
                }
                return;
                return;
        }// end function

        public function set _-Cj(param1:Boolean) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            var _loc_3:* = false * _loc_2;
            if (_loc_2)
            {
                this._-7y = param1;
            }
            return;
            return;
        }// end function

        public function set _-4M(param1:TextFormat) : void
        {
            ;
            _loc_2--;
            _loc_2--;
            var _loc_2:* = null + ((true === false) + 1);
            var _loc_3:String = null;
            if (!_loc_2)
            {
                do
                {
                    
                    return;
                    
                    this._-B5 = true;
                    ;
                    _loc_2--;
                    if (!(this && _loc_3))
                    {
                        if (!(_loc_2 && _loc_2))
                        {
                        }while (true)
                        
                        if (!(this._-4U.font == null)) goto 36;
                        ;
                        _loc_2--;
                    }
                    this._-4U.font = "_sans";
                }
                ;
                this._-4U = param1;
            }
            return;
        }// end function

        public function set _-0c(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = false;
            _loc_2--;
            _loc_2++;
            if (!_loc_3)
            {
                this._-73 = param1;
            }
            return;
            return;
        }// end function

        public function set delay(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = false;
            _loc_2--;
            _loc_2--;
            var _loc_3:* = _loc_2;
            ;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            if (!(this && false))
            {
                do
                {
                    
                    return;
                    
                    ;
                    _loc_2--;
                    var _loc_2:* = _loc_2 in param1[this._-7h];
                    ((null instanceof null) >= _loc_3).delay = param1;
                }
            }while (true)
            this._-1Z = param1;
            return;
        }// end function

        public function set _-A0(param1:Boolean) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            var _loc_3:* = _loc_3;
            _loc_3 = (null <= false) - 1;
            if (!_loc_3)
            {
                this._-6a = param1;
            }
            return;
            return;
        }// end function

        public function set _-3g(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2--;
            _loc_2++;
            var _loc_3:* = ~false;
            if (_loc_2)
            {
                this._-3G = param1;
            }
            return;
            return;
        }// end function

        public function set _-M(param1:StyleSheet) : void
        {
            ;
            _loc_2++;
            _loc_2++;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            var _loc_2:Number = false;
            var _loc_3:Boolean = true;
            if (!_loc_2)
            {
                do
                {
                    
                    return;
                    ;
                    _loc_2++;
                    _loc_2--;
                    
                    this._-7I = true;
                    if (!_loc_3)
                    {
                        ;
                        _loc_2++;
                        _loc_2++;
                    }
                }
            }while (true)
            this._-8S = param1;
            ;
            return;
        }// end function

        public function set _-K(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            var _loc_3:* = null as null >>> false;
            if (_loc_2)
            {
                this._-8E = param1;
            }
            return;
            return;
        }// end function

        public function set _20try(param1:Boolean) : void
        {
            var _loc_2:Boolean = true;
            ;
            var _loc_3:* = null - 1;
            if (_loc_2)
            {
                this._-AH = param1;
            }
            return;
            return;
        }// end function

        public function set _-6C(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            var _loc_3:* = true & (_loc_2 - 1);
            ;
            _loc_2--;
            if (!(_loc_3 && param1))
            {
                this._-5U = param1;
            }
            return;
            return;
        }// end function

        public function set _-8f(param1:TextFormat) : void
        {
            ;
            _loc_2++;
            var _loc_2:* = _loc_2;
            var _loc_3:* = null as true * false;
            if (!_loc_2)
            {
                do
                {
                    
                    return;
                    
                    this._-5d = true;
                    ;
                    _loc_2++;
                    _loc_2++;
                    if (!_loc_2)
                    {
                    }while (true)
                    
                    if (!(this._-3I.font == null)) goto 36;
                    ;
                    _loc_2--;
                    _loc_2++;
                    _loc_2--;
                    _loc_2--;
                }
            }
            this._-3I.font = "_sans";
            ;
            this._-3I = param1;
            return;
        }// end function

        public function _-6l(param1:String, param2:String = null) : void
        {
            var _loc_3:Boolean = true;
            ;
            param2--;
            param2 = false;
            var _loc_4:* = param2;
            if (!_loc_4)
            {
                do
                {
                    
                    return;
                    
                    this._-76();
                    if (_loc_3 || this)
                    {
                        continue;
                        _loc_3--;
                        param2++;
                        param2++;
                    }while (true)
                    
                    this._-7p();
                }
                if (_loc_3 || param1)
                {
                    ;
                    ;
                    
                    this._-CU(param1, _loc_2);
                }
                ;
                this.graphics.clear();
            }
            return;
        }// end function

        public function _-p(param1:DisplayObject, param2:String, param3:String = null) : void
        {
            ;
            with (true - false)
            {
                _loc_7++;
                var _loc_7:* = param1 - 1;
                var _loc_8:* = null * null;
                if (!(_loc_7 && param3))
                {
                    this._-49 = param1.stage;
                    if (!(_loc_7 && param1))
                    {
                        this._-6Q = param1;
                    }
                }
                if (!_loc_7)
                {
                }
                var _loc_4:* = this._-5t(this._-3-);
                if (!this._-5t(this._-3-))
                {
                    if (_loc_8 || this)
                    {
                        this.addChild(this._-3-);
                        if (!(_loc_7 && param3))
                        {
                            do
                            {
                                
                                this._-Cc();
                                if (_loc_8)
                                {
                                    
                                    this._-76();
                                }
                            }
                        }
                    }while (true)
                    
                    this._-7p();
                    ;
                    param3++;
                    _loc_5--;
                    param2--;
                    param3++;
                    ;
                }
                this._-CU(param2, param3);
                var _loc_5:* = new Point(this._-6Q.mouseX, this._-6Q.mouseY);
                var _loc_6:* = param1.localToGlobal(_loc_5);
                do
                {
                    
                    return;
                    if (false)
                    {
                        
                        this._-7h.start();
                    }while (true)
                    
                    this._-0S(true);
                    if (_loc_8)
                    {
                        do
                        {
                            
                            this._-6Q.addEventListener(MouseEvent.MOUSE_OUT, this._-AT);
                        }
                        do
                        {
                            
                            this._-49.addChild(this);
                        }while (true)
                        
                        this.alpha = 0;
                    }while (true)
                    
                    if (_loc_8 || param3)
                    {
                    }
                    this.y = _loc_6.y - this.height - 10;
                    ;
                    _loc_5++;
                    _loc_7--;
                    _loc_5--;
                    ;
                    this.x = _loc_6.x + this._-Ah;
                    ;
                }
                return;
        }// end function

        public function _-8V() : void
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = (null ^ (false + 1)) & this;
            ;
            if (!(_loc_2 && _loc_1))
            {
                this._-81(false);
            }
            return;
            return;
        }// end function

        private function _-CU(param1:String, param2:String = null) : void
        {
            var _loc_6:Boolean = true;
            ;
            _loc_5++;
            param2--;
            param2--;
            var _loc_7:* = (-false) / param2;
            var _loc_3:Rectangle = null;
            var _loc_4:Number = NaN;
            if (_loc_6 || param2)
            {
                do
                {
                    
                    do
                    {
                        
                        this._-6o.width = this._-5U - this._-3j * 2;
                        
                    }while (!this._-A1)
                    this._-5U = this._-6o.textWidth + 4 + this._-3j * 2;
                }while (true)
                
                this._-6o.setTextFormat(this._-3I);
            }
            do
            {
                
                if (!_loc_7)
                {
                    if (this._-7I) goto 74;
                    if (this._-5d) goto 107;
                    this._-Ch();
                    do
                    {
                        
                        this._-6o.htmlText = param1;
                    }while (true)
                    
                }while (!this._-7I)
                this._-6o.styleSheet = this._-8S;
                ;
                if (!(this._-6o == null)) goto 195;
                this._-6o = this.finally(this._-AH);
                ;
                var _loc_5:* = this._-3j;
                this._-6o.y = this._-3j;
                this._-6o.x = _loc_5;
                do
                {
                    
                    this._-3m.setTextFormat(this._-4U);
                    if (_loc_6 || param2)
                    {
                        
                        if (!(_loc_7 && param2))
                        {
                            continue;
                            _loc_6--;
                            _loc_6--;
                        }
                    }while (this._-B5)
                    if (_loc_6 || this)
                    {
                        this._-1T();
                    }
                }
                do
                {
                    
                    this._-3m.htmlText = param2;
                    do
                    {
                        
                    }
                }while (!this._-7I)
                this._-3m.styleSheet = this._-8S;
                do
                {
                    
                    if (param2 != null)
                    {
                    }while (this._-3m != null)
                    this._-3m = this.finally(this._-7y);
                    if (!_loc_7)
                    {
                        do
                        {
                            
                            this._-3-.addChild(this._-6o);
                        }
                    }while (true)
                    this._-1h(this._-6o);
                }while (true)
                var _loc_3:* = this.getBounds(this);
                do
                {
                    
                    this._-3-.addChild(this._-3m);
                    if (_loc_6)
                    {
                        
                    }while (true)
                    
                    this._-3m.width = this._-5U - this._-3j * 2;
                    do
                    {
                        
                        if (!_loc_7)
                        {
                        }
                        if (_loc_6)
                        {
                            if (!(_loc_7 && this))
                            {
                            }
                        }
                        this._-5U = _loc_4 > this._-5U ? (if (!_loc_6) goto 665, if (_loc_7 && this) goto 664, _loc_4) : (if (!(_loc_6 || _loc_3)) goto 665, this._-5U);
                    }
                    do
                    {
                        
                        if (!this._-A1) goto 566;
                        _loc_4 = this._-3m.textWidth + 4 + this._-3j * 2;
                    }while (true)
                    
                    this._-1h(this._-3m);
                }while (true)
                
                ;
                this.y = param2;
                ;
                this._-3m.x = this._-3j;
                ;
            }
            return;
            return;
        }// end function

        private function _-5t(param1:DisplayObject) : Boolean
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3 = false - 1;
            _loc_3++;
            var _loc_4:* = (null instanceof null) < null;
            var _loc_2:* = param1.stage;
            ;
            _loc_2--;
            _loc_3++;
            if (undefined || _loc_2)
            {
            }
            if (!(_loc_2 && _loc_3))
            {
            }
            return _loc_2 == null ? (// Jump to 87, _loc_3--, _loc_2++, _loc_3--, _loc_2 = _loc_4, _loc_2--, if (_loc_2 && _loc_3) goto 104, false) : (true);
            return;
        }// end function

        private function _-81(param1:Boolean) : void
        {
            ;
            _loc_2--;
            var _loc_3:* = true - true;
            var _loc_4:Boolean = false;
            if (!_loc_3)
            {
            }
            if (!_loc_3)
            {
            }
            var _loc_2:* = param1 == true ? (if (_loc_3) goto 49, 1) : (if (!_loc_4) goto 50, 0);
            ;
            _loc_2--;
            _loc_2 = null;
            _loc_3++;
            if (_loc_4)
            {
                do
                {
                    
                    return;
                    
                }while (param1)
                if (!_loc_3)
                {
                    this._-7h.reset();
                }
            }
            ;
            ;
            _loc_3++;
            new activation.to(-_loc_3, 0.5, {alpha:_loc_2, onComplete:this._-});
            ;
            return;
        }// end function

        private function _-() : void
        {
            return;
            return;
        }// end function

        private function _-Cc() : void
        {
            ;
            var _loc_10:* = true + false < null;
            _loc_5++;
            var _loc_11:String = null;
            var _loc_12:String = null;
            var _loc_1:Number = 0;
            if (!_loc_11)
            {
            }
            var _loc_2:Number = 0.2;
            var _loc_3:Number = 5;
            var _loc_4:Number = 5;
            var _loc_5:Number = 1;
            ;
            _loc_10--;
            _loc_6++;
            _loc_2 = this;
            _loc_11--;
            var _loc_6:* = null * false;
            var _loc_7:Boolean = false;
            var _loc_8:* = BitmapFilterQuality.HIGH;
            var _loc_9:* = new GlowFilter(_loc_1, _loc_2, _loc_3, _loc_4, _loc_5, _loc_8, _loc_6, _loc_7);
            ;
            _loc_3--;
            _loc_7 = this;
            _loc_10 = null[new Array() is new Array()];
            null.push(_loc_9);
            if (_loc_12)
            {
                filters = _loc_10;
            }
            return;
            return;
        }// end function

        private function _-96() : void
        {
            var _loc_1:Boolean = true;
            ;
            _loc_3 = false;
            var _loc_2:* = (null >= null) % null[new activation];
            if (!_loc_2)
            {
                do
                {
                    
                    return;
                    
                    parent.removeChild(this);
                    if (!_loc_2)
                    {
                    }while (true)
                    
                    removeChild(this._-3-);
                    if (_loc_1)
                    {
                        do
                        {
                            
                            this.graphics.clear();
                        }
                        do
                        {
                            
                            this._-3-.removeChild(this._-3m);
                        }while (true)
                        
                        if (this._-3m == null) goto 76;
                    }
                    ;
                    null._-3m.filters = [];
                }while (true)
                
                this._-6o = null;
            }
            do
            {
                
                this._-3-.removeChild(this._-6o);
                do
                {
                    
                    this.filters = [];
                    if (_loc_1 || _loc_2)
                    {
                    }while (true)
                    
                    this._-6o.filters = [];
                }while (true)
                
                this._-0S(false);
                ;
                ;
                this._-6Q.removeEventListener(MouseEvent.MOUSE_OUT, this._-AT);
            }
            ;
            return;
        }// end function

        private function finally(param1:Boolean) : TextField
        {
            ;
            _loc_3--;
            var _loc_3:* = -_loc_2 + 1 - 1;
            var _loc_4:Boolean = false;
            var _loc_2:* = new TextField();
            do
            {
                
                return _loc_2;
                if (false)
                {
                    
                    _loc_2.wordWrap = true;
                }while (true)
                
                if (this._-A1) goto 34;
                if (_loc_3)
                {
                    ;
                    _loc_2++;
                    _loc_3 = null - true * _loc_3;
                }
                if (!_loc_2)
                {
                    _loc_2.multiline = true;
                    do
                    {
                        
                        _loc_2.selectable = false;
                        do
                        {
                            
                            _loc_2.autoSize = TextFieldAutoSize.LEFT;
                            ;
                            _loc_2--;
                            _loc_3 = null;
                            _loc_2++;
                        }while (true)
                        
                        _loc_2.gridFitType = "pixel";
                    }
                }while (true)
                _loc_2.embedFonts = param1;
                ;
            }
            return;
        }// end function

        private function _-76() : void
        {
            ;
            _loc_8--;
            _loc_3--;
            _loc_5--;
            _loc_4++;
            var _loc_12:* = false in true;
            var _loc_13:String = null;
            var _loc_9:Number = NaN;
            var _loc_10:Number = NaN;
            var _loc_11:Number = NaN;
            if (!(_loc_12 && _loc_3))
            {
                this.graphics.clear();
            }
            var _loc_1:* = this.getBounds(this);
            if (_loc_13 || this)
            {
            }
            if (!_loc_12)
            {
                if (!_loc_12)
                {
                    if (_loc_13)
                    {
                    }
                }
            }
            var _loc_2:* = isNaN(this._-8E) ? (if (_loc_12) goto 131, _loc_1.height + this._-3j * 2) : (if (_loc_12) goto 131, if (!_loc_13) goto 131, this._-8E);
            var _loc_3:* = GradientType.LINEAR;
            var _loc_4:Array = [this._-8M, this._-8M];
            var _loc_5:Array = [0, 255];
            var _loc_6:* = new Matrix();
            if (_loc_13)
            {
            }
            var _loc_7:* = 90 * Math.PI / 180;
            if (!_loc_12)
            {
                _loc_6.createGradientBox(this._-5U, _loc_2, _loc_7, 0, 0);
            }
            var _loc_8:* = SpreadMethod.PAD;
            do
            {
                
                return;
                if (false)
                {
                    
                }while (true)
                
                this.graphics.drawRoundRect(0, 0, this._-5U, _loc_2, this._-73);
                if (_loc_13)
                {
                    do
                    {
                        
                        this.graphics.endFill();
                        if (_loc_13 || _loc_1)
                        {
                            do
                            {
                                
                                this.graphics.curveTo(_loc_9, _loc_10, _loc_9 + this._-73, _loc_10);
                            }
                        }while (true)
                        
                        this.graphics.lineTo(_loc_9, _loc_10 + this._-73);
                        if (!(_loc_12 && this))
                        {
                        }while (true)
                        
                        ;
                        _loc_6++;
                        _loc_2++;
                        _loc_8++;
                        null.curveTo(this.graphics, _loc_9, _loc_10 + _loc_2 is (_loc_9 + 1), _loc_10 + _loc_2 - this._-73);
                        do
                        {
                            
                            this.graphics.lineTo(_loc_9 + this._-73, _loc_10 + _loc_2);
                            do
                            {
                                
                                this.graphics.lineTo(_loc_9 + this._-Bd - this._-3G, _loc_10 + _loc_2);
                            }while (true)
                            
                            this.graphics.lineTo(_loc_9 + this._-Bd, _loc_10 + _loc_2 + this._-3G);
                        }while (true)
                        
                        this.graphics.lineTo(_loc_9 + this._-Bd + this._-3G, _loc_10 + _loc_2);
                    }
                    do
                    {
                        
                        this.graphics.curveTo(_loc_9 + _loc_11, _loc_10 + _loc_2, _loc_9 + _loc_11 - this._-73, _loc_10 + _loc_2);
                    }
                    do
                    {
                        
                        this.graphics.lineTo(_loc_9 + _loc_11, _loc_10 + _loc_2 - this._-73);
                    }while (true)
                    
                    this.graphics.curveTo(_loc_9 + _loc_11, _loc_10, _loc_9 + _loc_11, _loc_10 + this._-73);
                }while (true)
                
                this.graphics.lineTo(_loc_9 + _loc_11 - this._-73, _loc_10);
                do
                {
                    
                    this.graphics.moveTo(_loc_9 + this._-73, _loc_10);
                    do
                    {
                        
                        if (_loc_13 || _loc_3)
                        {
                        }
                        if (!_loc_12)
                        {
                            _loc_11 = this._-5U;
                        }while (true)
                        
                    }
                    if (!_loc_12)
                    {
                        _loc_10 = 0;
                    }while (true)
                    
                    if (!this._-6a) goto 250;
                }
                _loc_9 = 0;
                do
                {
                    
                    this.graphics.beginGradientFill(_loc_3, this._-CS, _loc_4, _loc_5, _loc_6, _loc_8);
                    continue;
                }while (isNaN(this._-1))
                ;
                _loc_6++;
                _loc_9++;
                _loc_7--;
                this.graphics.lineStyle(this._-4h, this._-1, 1);
                ;
            }
            return;
        }// end function

        private function _-8n(event:Event) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2++;
            _loc_2++;
            var _loc_3:* = _loc_2;
            if (!_loc_3)
            {
                this.position();
            }
            return;
            return;
        }// end function

        private function _-0S(param1:Boolean) : void
        {
            ;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            var _loc_2:String = this;
            var _loc_3:Number = NaN;
            if (_loc_3)
            {
                do
                {
                    
                    return;
                    
                }while (true)
                
                ;
                _loc_2++;
                _loc_2++;
                _loc_2--;
                false.removeEventListener(((typeof( >>> Event) - 1)).ENTER_FRAME, this._-8n);
                if (_loc_3 || _loc_2)
                {
                    ;
                    ;
                    _loc_2--;
                    if (!param1) goto 42;
                }
            }
            addEventListener(Event.ENTER_FRAME, this._-8n);
            ;
            return;
        }// end function

        private function _-Ch() : void
        {
            ;
            var _loc_1:* = null * (true * (false + 1));
            var _loc_2:* = typeof(null);
            if (_loc_2)
            {
                do
                {
                    
                    return;
                    
                    this._-3I.color = 3355443;
                    if (_loc_2 || _loc_2)
                    {
                        ;
                    }while (true)
                    
                    this._-3I.size = 20;
                }
                if (!_loc_1)
                {
                    do
                    {
                        
                        this._-3I.bold = true;
                    }
                    do
                    {
                        
                        ;
                        null.font = !_loc_2 < -_loc_2 + (this._-3I >> "_sans" * null);
                        if (_loc_2)
                        {
                        }while (true)
                        this._-3I = new TextFormat();
                    }
                }
            }while (true)
            return;
        }// end function

        private function _-1T() : void
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:Boolean = false;
            with (null)
            {
                _loc_2 = NaN;
                if (!(_loc_2 && _loc_1))
                {
                    do
                    {
                        
                        return;
                        
                        this._-4U.color = 3355443;
                        ;
                    }
                }while (true)
                
                this._-4U.size = 14;
                if (_loc_1 || this)
                {
                    do
                    {
                        
                        this._-4U.bold = false;
                        continue;
                        
                        ;
                        _loc_3 = _loc_3;
                        null._-4U.font = "_sans";
                    }while (true)
                    this._-4U = new TextFormat();
                }
                return;
        }// end function

        private function _-AT(event:MouseEvent) : void
        {
            arguments = true;
            ;
            var _loc_4:* = null % (null % (null is null + false));
            if (_loc_3)
            {
                ;
                ;
                _loc_3--;
                var _loc_3:* = null / (null - 1);
                _loc_3--;
                _loc_3++;
                
                return;
                
                this._-8V();
                if (!_loc_4)
                {
                    ;
                    _loc_3--;
                    _loc_3++;
                    arguments = null;
                    _loc_3--;
                    ;
                    event.currentTarget.removeEventListener(event.type, arguments.callee);
                }
            }
            return;
        }// end function

        private function position() : void
        {
            ;
            _loc_2--;
            with (this)
            {
                var _loc_2:* = ~false;
                var _loc_7:Boolean = true;
                var _loc_8:String = null;
                var _loc_1:Number = 3;
                _loc_2 = new Point(this._-6Q.mouseX, this._-6Q.mouseY);
                var _loc_3:* = this._-6Q.localToGlobal(_loc_2);
                var _loc_4:* = _loc_3.x + this._-Ah;
                if (!(_loc_7 && _loc_3))
                {
                    if (!(_loc_7 && _loc_1))
                    {
                    }
                }
                var _loc_5:* = _loc_3.y - this.height - 10;
                if (!(_loc_7 && this))
                {
                }
                var _loc_6:* = this._-5U + _loc_4;
                if (this._-5U + _loc_4 > stage.stageWidth)
                {
                    ;
                    _loc_6--;
                    _loc_7++;
                    _loc_5--;
                    if (_loc_8 || _loc_1)
                    {
                        _loc_4 = this._-5U - undefined;
                        if (!_loc_7)
                        {
                            do
                            {
                                
                                return;
                                
                                this.y = this.y + (_loc_5 - this.y) / _loc_1;
                            }
                        }while (true)
                        
                        this.x = this.x + (_loc_4 - this.x) / _loc_1;
                        do
                        {
                            
                        }
                        if (!(_loc_5 < 0)) goto 250;
                        if (!(_loc_7 && _loc_3))
                        {
                            _loc_5 = 0;
                        }
                        ;
                        _loc_4++;
                        _loc_7--;
                        _loc_5++;
                        continue;
                    }
                }while (_loc_4 >= 0)
                _loc_4 = 0;
                ;
                return;
        }// end function

        private function _-7p() : void
        {
            ;
            _loc_2++;
            _loc_2++;
            _loc_2++;
            var _loc_3:* = true[false];
            var _loc_2:* = null + 1;
            _loc_3 = null;
            do
            {
                
                if (_loc_3 || _loc_3)
                {
                }
                this._-Bd = this._-5U / 2;
                if (!(_loc_2 && _loc_1))
                {
                    if (_loc_3)
                    {
                        
                        break;
                    }
                    default:
                    {
                        if (!(_loc_2 && _loc_2))
                        {
                        }
                        this._-Ah = -this._-5U / 2;
                    }
                    if (!_loc_2)
                    {
                    }while (true)
                    
                    if (!_loc_2)
                    {
                    }
                    this._-Bd = this._-5U / 2;
                }
                do
                {
                    
                    break;
                }
                case _loc_2:
                {
                    if (_loc_3)
                    {
                        if (!(_loc_2 && _loc_1))
                        {
                        }
                    }
                    this._-Ah = -this._-5U / 2;
                    if (_loc_3)
                    {
                        do
                        {
                            
                            if (!_loc_2)
                            {
                            }
                            this._-Bd = this._-3j * 3 + this._-3G;
                        }
                    }while (true)
                    
                    break;
                }
                case "left":
                {
                    if (_loc_3)
                    {
                    }
                    if (!(_loc_2 && this))
                    {
                    }
                    this._-Ah = -this._-3j * 3 - this._-3G;
                }while (true)
                
                ;
                _loc_2++;
                if (_loc_3 || this)
                {
                    if (!(_loc_2 && this))
                    {
                        if (_loc_3 || _loc_3)
                        {
                        }
                    }
                }
                _loc_2._-Bd = this._-5U - this._-3j * 3 - this._-3G;
                ;
                switch(this._-CK)
                {
                    case _loc_2:
                    {
                        if (!_loc_2)
                        {
                        }
                        if (_loc_3 || _loc_3)
                        {
                        }
                        if (!(_loc_2 && _loc_2))
                        {
                        }
                        this._-Ah = -this._-5U + this._-3j * 3 + this._-3G;
                        break;
                        break;
                    }
                }
            }
            return;
            return;
        }// end function

        private function _-3i(event:TimerEvent) : void
        {
            ;
            var _loc_3:Boolean = NaN;
            ;
            _loc_2 = true[false] << _loc_2 & this;
            if (!(_loc_2 && this))
            {
                this._-81(true);
            }
            return;
            return;
        }// end function

        private function _-1h(param1:TextField) : void
        {
            ;
            default xml namespace = (false - 1);
            var _loc_2:Boolean = true;
            _loc_6++;
            var _loc_12:* = null >>> null;
            var _loc_13:String = null;
            _loc_2 = 0;
            if (_loc_13)
            {
            }
            var _loc_3:Number = 0.35;
            var _loc_4:Number = 2;
            var _loc_5:Number = 2;
            var _loc_6:Number = 1;
            ;
            with (false << undefined)
            {
                _loc_3--;
                var _loc_7:* = _loc_3;
                var _loc_8:Boolean = false;
                var _loc_9:* = BitmapFilterQuality.HIGH;
                var _loc_10:* = new GlowFilter(_loc_2, _loc_3, _loc_4, _loc_5, _loc_6, _loc_9, _loc_7, _loc_8);
                ;
                _loc_4++;
                _loc_3 = new Array();
                var _loc_11:* = _loc_3 > NaN;
                new Array().push(_loc_10);
                if (_loc_13)
                {
                    param1.filters = _loc_11;
                }
                return;
                return;
        }// end function

    }
}
