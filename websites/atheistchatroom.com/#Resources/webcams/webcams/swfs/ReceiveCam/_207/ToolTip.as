package _207
{
    import 19.*;
    import ?<.*;
    import flash.display.*;
    import flash.events.*;
    import flash.filters.*;
    import flash.geom.*;
    import flash.text.*;
    import flash.utils.*;

    public class ToolTip extends Sprite
    {
        private var +7:Stage;
        private var 93:DisplayObject;
        private var ]8:TextField;
        private var ,1:TextField;
        private var -6:Sprite;
        private var ^4:TextFormat;
        private var ,7:TextFormat;
        private var -=:StyleSheet;
        private var function:Boolean = false;
        private var 69:Boolean = false;
        private var ?!:Boolean = false;
        private var 4;:Boolean = false;
        private var ;6:Boolean = false;
        private var _20var:Number = 200;
        private var 0":Number;
        private var 01:Number = 10;
        private var "7:String = "center";
        private var ^-:Number = 12;
        private var %-:Array;
        private var +1:Boolean = false;
        private var ;7:Boolean = false;
        private var 16:Number = 0;
        private var &<:Number = 10;
        private var `%:Number;
        private var 9<:Number = 1;
        private var throw:Number = 1;
        private var >&:Number;
        private var '=:Number;
        private var +8:Timer;
        private var 9,:4;

        public function ToolTip()
        {
            ;
            var _loc_1:* = null[true === false * this][true] as (typeof(null));
            var _loc_2:String = null;
            do
            {
                
                return;
                
                this.+8.addEventListener("timer", this.4-);
                if (_loc_2)
                {
                }while (true)
                
                this.+8 = new Timer(this.16, 1);
            }
            if (_loc_2)
            {
                ;
                do
                {
                    
                    this.mouseChildren = false;
                }
                do
                {
                    
                    this.buttonMode = false;
                }while (true)
                
                this.mouseEnabled = false;
                if (_loc_2 || _loc_1)
                {
                }while (true)
                
                do
                {
                    
                    this.9, = new 4("ToolTip");
                }
                continue;
                
                ;
                (16777215 - (NaN + 1)).%- = [_loc_2 + !_loc_1, 10263708];
            }while (true)
            this.-6 = new Sprite();
            return;
        }// end function

        public function set align(param1:String) : void
        {
            var _loc_4:Boolean = true;
            ;
            _loc_4--;
            _loc_4--;
            _loc_4 = undefined;
            _loc_3++;
            with (false)
            {
                var _loc_3:String = null;
                _loc_4 = null;
                var _loc_5:* = typeof(null);
                if (!_loc_5)
                {
                }
                var _loc_2:* = param1.toLowerCase();
                _loc_3 = "right left center";
                ;
                _loc_3++;
                if (null >>> (null as (null is (_loc_4 - 1))) - 1 || _loc_2)
                {
                    do
                    {
                        
                        return;
                        
                        this."7 = _loc_2;
                        if (!_loc_5)
                        {
                            if (_loc_4)
                            {
                            }while (true)
                            ;
                            _loc_3--;
                            _loc_2--;
                            if (!(_loc_2 == -1)) goto 84;
                        }
                        throw new Error(this + " : Invalid Align Property, options are: \'right\', \'left\' & \'center\'");
                    }
                }
                return;
        }// end function

        public function set autoSize(param1:Boolean) : void
        {
            ;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            _loc_2++;
            var _loc_2:* = _loc_3 > undefined;
            ;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            var _loc_3:* = _loc_2 & (_loc_2 + 1);
            ;
            with (_loc_2)
            {
                var _loc_2:* = _loc_2;
            }
            if (false)
            {
            }
            if (!_loc_3)
            {
                this.+1 = param1;
            }
            return;
            return;
        }// end function

        public function get in20() : Number
        {
            ;
            return (null + (null is null - (((null & this) == null) + 1))).throw;
            return;
        }// end function

        public function set in20(param1:Number) : void
        {
            ;
            _loc_2++;
            _loc_2--;
            _loc_2++;
            var _loc_2:* = _loc_2 + 1;
            var _loc_3:* = true >> false;
            if (_loc_3)
            {
                this.throw = param1;
            }
            return;
            return;
        }// end function

        public function set @+(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            var _loc_3:* = null / (null + ((false - 1) < _loc_2));
            if (_loc_2)
            {
                this.`% = param1;
            }
            return;
            return;
        }// end function

        public function set ,8(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            _loc_2 = null instanceof (null ^ false);
            var _loc_3:String = null;
            if (_loc_2)
            {
                this.9< = param1;
            }
            return;
            return;
        }// end function

        public function get default() : Number
        {
            ;
            _loc_3 = this;
            return (null * (_loc_2 | (true - 1))).01;
            return;
        }// end function

        public function set default(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2--;
            var _loc_3:* = _loc_2;
            if (!_loc_3)
            {
                this.01 = param1;
            }
            return;
            return;
        }// end function

        public function set #1(param1:Array) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = null;
            _loc_2--;
            _loc_2 = ~(null & null);
            _loc_2--;
            _loc_2--;
            _loc_2++;
            var _loc_3:String = null;
            ;
            _loc_2++;
            _loc_2 = _loc_2;
            _loc_2--;
            if (!(_loc_3 && _loc_2))
            {
                this.%- = param1;
            }
            return;
            return;
        }// end function

        public function set switch(param1:Boolean) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2--;
            _loc_2++;
            _loc_2++;
            _loc_2++;
            _loc_2 = null * false;
            _loc_2 = null;
            var _loc_3:String = null;
            if (_loc_2)
            {
                this.;6 = param1;
            }
            return;
            return;
        }// end function

        public function set ^+(param1:TextFormat) : void
        {
            ;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            var _loc_2:Boolean = false;
            _loc_2++;
            _loc_2--;
            var _loc_2:* = _loc_2;
            var _loc_3:String = null;
            if (!_loc_2)
            {
                do
                {
                    
                    return;
                    
                    this.?! = true;
                    ;
                    _loc_2++;
                    _loc_2 = null;
                    _loc_2++;
                    _loc_2--;
                    if (_loc_3)
                    {
                        if (_loc_3 || _loc_2)
                        {
                        }while (true)
                        
                        if (!(this.,7.font == null)) goto 42;
                    }
                    ;
                    with (~null[_loc_2 >>> _loc_2] >= null)
                    {
                        _loc_2--;
                        var _loc_2:String = null;
                        _loc_2 = null >> null;
                        this.,7.font = "_sans";
                    }
                }
                ;
                this.,7 = param1;
                ;
                return;
        }// end function

        public function set !=(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2++;
            var _loc_3:String = this;
            ;
            _loc_2--;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            if (_loc_2 || this)
            {
                this.^- = param1;
            }
            return;
            return;
        }// end function

        public function set delay(param1:Number) : void
        {
            ;
            var _loc_3:* = null + 1;
            _loc_2++;
            with (true)
            {
                _loc_2--;
                var _loc_2:* = null + false;
                _loc_2 = null;
                _loc_3 = null;
                if (!_loc_2)
                {
                    ;
                    ;
                    default xml namespace = undefined;
                    _loc_2 = null + null;
                    _loc_2--;
                    _loc_2--;
                    _loc_2--;
                    
                    return;
                    
                    this.+8.delay = param1;
                    if (_loc_2)
                    {
                        ;
                        default xml namespace = _loc_2;
                        _loc_2 = null;
                        _loc_2--;
                    }
                    if (!this)
                    {
                        ;
                        this.16 = param1;
                    }
                }
                return;
        }// end function

        public function set `8(param1:Boolean) : void
        {
            ;
            _loc_2++;
            _loc_2++;
            _loc_2++;
            _loc_2++;
            _loc_2--;
            var _loc_3:* = null === true;
            if (!_loc_2)
            {
                this.;7 = param1;
            }
            return;
            return;
        }// end function

        public function set ##(param1:Number) : void
        {
            ;
            _loc_2--;
            _loc_2++;
            var _loc_2:* = NaN in (false - 1) in true;
            _loc_2 = null;
            ;
            default xml namespace = undefined;
            var _loc_3:* = _loc_2;
            ;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            if (_loc_2)
            {
            }
            if (!param1)
            {
                this.&< = param1;
            }
            return;
            return;
        }// end function

        public function set @8(param1:StyleSheet) : void
        {
            ;
            _loc_2--;
            _loc_2++;
            var _loc_2:* = (~false in true) <= null >= null;
            _loc_2 = null + null;
            var _loc_3:String = null;
            ;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            if (_loc_3 || param1 < _loc_2 + _loc_2)
            {
                do
                {
                    
                    return;
                    
                    this.function = true;
                    if (_loc_2)
                    {
                        ;
                        var _loc_2:* = _loc_2;
                        _loc_2 = null;
                        _loc_2++;
                        _loc_2++;
                        _loc_2--;
                    }
                }
            }while (true)
            this.-= = param1;
            return;
        }// end function

        public function set "=(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            _loc_2++;
            _loc_2++;
            _loc_2 = null instanceof (typeof((false + 1)));
            var _loc_3:String = null;
            if (_loc_2)
            {
                this.0" = param1;
            }
            return;
            return;
        }// end function

        public function set <=(param1:Boolean) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            with (_loc_2)
            {
                _loc_2++;
                _loc_2 = _loc_2;
                var _loc_3:* = null - (false + _loc_2);
                ;
                _loc_2++;
                _loc_2--;
                _loc_2--;
                if (_loc_2 || _loc_3)
                {
                    this.4; = param1;
                }
                return;
                return;
        }// end function

        public function set ^'(param1:Number) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2++;
            _loc_2 = null[(false - 1)] >> null == null;
            var _loc_3:String = null;
            ;
            _loc_2--;
            _loc_2--;
            _loc_2--;
            _loc_2--;
            if (!(_loc_3 && param1))
            {
                this._20var = param1;
            }
            return;
            return;
        }// end function

        public function set #5(param1:TextFormat) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2--;
            var _loc_3:* = null / (null * (false << _loc_2)) > null;
            if (_loc_2 || _loc_2)
            {
                do
                {
                    
                    return;
                    
                    ;
                    _loc_2--;
                    _loc_2--;
                    var _loc_2:* = this | undefined;
                    _loc_2++;
                    _loc_2 = null + 1;
                    null.69 = true;
                }
            }while (true)
            
            if (!(this.^4.font == null)) goto 46;
            if (!_loc_3)
            {
                ;
                _loc_2++;
                default xml namespace = null + ((this.^4 in null) >= null == null);
                (null >> null % (null + 1)).font = "_sans";
            }
            if (!_loc_3)
            {
                ;
                this.^4 = param1;
            }
            ;
            return;
        }// end function

        public function +>(param1:String, param2:String = null) : void
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3++;
            _loc_3++;
            _loc_3--;
            param2 = false * _loc_3 + 1;
            var _loc_4:String = null;
            if (_loc_3 || param2)
            {
                do
                {
                    
                    return;
                    
                    this.@0();
                    ;
                    _loc_3++;
                    _loc_3--;
                    param2 = null <= null;
                    if (!_loc_4)
                    {
                    }while (true)
                    
                    this._20for();
                }
            }
            ;
            
            this.!>(param1, param2);
            if (_loc_4)
            {
                ;
                _loc_3--;
                param2--;
                param2++;
                param2++;
                param2--;
                _loc_3--;
            }
            if (!this)
            {
                ;
                this.graphics.clear();
            }
            return;
        }// end function

        public function use20(param1:DisplayObject, param2:String, param3:String = null) : void
        {
            ;
            with (false)
            {
                _loc_5++;
                param2 = true;
                param2++;
                param3 = null;
                var _loc_7:String = null;
                var _loc_8:String = null;
                if (_loc_8)
                {
                    this.+7 = param1.stage;
                    if (!_loc_7)
                    {
                        this.93 = param1;
                    }
                }
                if (!(_loc_7 && param2))
                {
                }
                var _loc_4:* = this.1>(this.-6);
                if (!this.1>(this.-6))
                {
                    if (!_loc_7)
                    {
                        this.addChild(this.-6);
                    }
                    do
                    {
                        
                        this.>7();
                        if (_loc_8 || this)
                        {
                            
                            this.@0();
                        }
                    }while (true)
                    
                    this._20for();
                    ;
                }
                ;
                var _loc_5:* = null >>> ((param2 === param3) < this);
                param2--;
                param3--;
                null.!>(null, null[null instanceof null]);
                ;
                _loc_5 = new Point(this.93.mouseX, this.93.mouseY);
                var _loc_6:* = param1.localToGlobal(_loc_5);
                do
                {
                    
                    return;
                    if (false)
                    {
                        
                        this.+8.start();
                    }while (true)
                    
                    this.=#(true);
                    do
                    {
                        
                        this.93.addEventListener(MouseEvent.MOUSE_OUT, this.true);
                        if (!(_loc_7 && param3))
                        {
                            do
                            {
                                
                                this.+7.addChild(this);
                            }
                        }while (true)
                        
                        this.alpha = 0;
                    }while (true)
                    
                    if (!_loc_7)
                    {
                    }
                    this.y = _loc_6.y - this.height - 10;
                    if (_loc_8 || this)
                    {
                        ;
                        param3--;
                        _loc_7--;
                        _loc_4++;
                        default xml namespace = null === ((null < null) >>> _loc_5) + 1;
                        ;
                        this.x = _loc_6.x + this.>&;
                    }
                    ;
                }
                return;
        }// end function

        public function 9%() : void
        {
            var _loc_1:Boolean = true;
            ;
            default xml namespace = !true;
            var _loc_2:Boolean = false;
            _loc_2 = false;
            ;
            if (!(_loc_2 && _loc_1))
            {
                this.[<(false);
            }
            return;
            return;
        }// end function

        private function !>(param1:String, param2:String = null) : void
        {
            ;
            param2 = param2;
            var _loc_6:* = typeof(_loc_3);
            var _loc_7:* = NaN[_loc_6];
            var _loc_3:Rectangle = null;
            var _loc_4:Number = NaN;
            do
            {
                
                do
                {
                    
                    this.]8.width = this._20var - this.01 * 2;
                    if (false)
                    {
                        
                    }while (!this.+1)
                    this._20var = this.]8.textWidth + 4 + this.01 * 2;
                    if (_loc_7 || this)
                    {
                    }while (true)
                    
                    this.]8.setTextFormat(this.^4);
                    do
                    {
                        
                        if (this.function) goto 62;
                    }
                    if (this.69) goto 114;
                    this.+!();
                    do
                    {
                        
                        this.]8.htmlText = param1;
                    }while (true)
                    
                }while (!this.function)
                this.]8.styleSheet = this.-=;
                ;
                if (!(this.]8 == null)) goto 210;
                if (_loc_7)
                {
                    this.]8 = this.+<(this.4;);
                }
                ;
            }
            var _loc_5:* = this.01;
            this.]8.y = this.01;
            this.]8.x = _loc_5;
            do
            {
                
                this.,1.setTextFormat(this.,7);
                if (!_loc_6)
                {
                    
                    if (_loc_7)
                    {
                    }
                }while (this.?!)
                this.];();
                do
                {
                    
                    this.,1.htmlText = param2;
                }
                if (!_loc_6)
                {
                    do
                    {
                        
                        ;
                        _loc_5--;
                        param2++;
                    }while (!false[!(-this) == new activation].function)
                    this.,1.styleSheet = this.-=;
                    do
                    {
                        
                    }while (this.,1 != null)
                }
                this.,1 = this.+<(this.;6);
                do
                {
                    
                    this.-6.addChild(this.]8);
                }while (true)
                this.63(this.]8);
            }while (true)
            _loc_3 = this.getBounds(this);
            do
            {
                
                this.-6.addChild(this.,1);
                if (_loc_7 || _loc_3)
                {
                    
                }while (true)
                
                this.,1.width = this._20var - this.01 * 2;
            }
            if (!(_loc_6 && this))
            {
                do
                {
                    
                    if (_loc_7 || param2)
                    {
                    }
                    if (!(_loc_6 && param2))
                    {
                    }
                    if (!_loc_6)
                    {
                    }
                    this._20var = _loc_4 > this._20var ? (if (_loc_6 && param2) goto 622, if (!(_loc_7 || param1)) goto 636, _loc_4) : (if (_loc_6) goto 636, this._20var);
                    do
                    {
                        
                        if (!this.+1) goto 517;
                        if (_loc_7)
                        {
                            _loc_4 = this.,1.textWidth + 4 + this.01 * 2;
                        }
                    }while (true)
                    
                    this.63(this.,1);
                }while (true)
                
                ;
                _loc_5++;
                with (_loc_6)
                {
                    null.y = true ^ (this.,1 < this.]8.y + this.]8.textHeight) + 1;
                }
                ;
                this.,1.x = this.01;
                ;
                return;
                return;
        }// end function

        private function 1>(param1:DisplayObject) : Boolean
        {
            ;
            _loc_2++;
            _loc_3++;
            var _loc_3:* = _loc_2;
            var _loc_4:* = _loc_3 == false;
            var _loc_2:* = param1.stage;
            ;
            _loc_2++;
            _loc_3--;
            _loc_3++;
            _loc_3--;
            _loc_2++;
            _loc_3++;
            if (true)
            {
                typeof(_loc_4);
            }
            if (param1)
            {
                ;
                with (_loc_3)
                {
                    _loc_3++;
                    _loc_2++;
                }
                if (_loc_4)
                {
                }
                return true ? (if (!_loc_4) goto 114, false) : (true);
                return;
        }// end function

        private function [<(param1:Boolean) : void
        {
            var _loc_3:Boolean = true;
            ;
            with (null is false)
            {
                _loc_2++;
                var _loc_4:Boolean = false;
                if (_loc_3 || this)
                {
                }
                if (_loc_3 || _loc_3)
                {
                    if (_loc_3)
                    {
                    }
                }
                _loc_2 = param1 == true ? (if (!(_loc_3 || _loc_3)) goto 87, null) : (// Jump to 81, var _loc_2:* = !true | 1[0] + 1, _loc_2++, _loc_3--, _loc_2--, if (!_loc_3) goto 87, null);
                if (_loc_3)
                {
                    do
                    {
                        
                        return;
                        
                    }while (param1)
                }
                this.+8.reset();
                if (_loc_3)
                {
                    ;
                    ;
                    _loc_3++;
                    _loc_2++;
                    _loc_3.&,(_loc_3 << (typeof(_loc_2)), 0.5, {alpha:_loc_2, onComplete:this.7+});
                }
                ;
                return;
        }// end function

        private function 7+() : void
        {
            return;
            return;
        }// end function

        private function >7() : void
        {
            var _loc_11:Boolean = true;
            ;
            _loc_5--;
            _loc_8--;
            _loc_7--;
            var _loc_12:Boolean = true;
            var _loc_1:Number = 0;
            if (_loc_11 || this)
            {
            }
            var _loc_2:Number = 0.2;
            var _loc_3:Number = 5;
            var _loc_4:Number = 5;
            var _loc_5:Number = 1;
            ;
            _loc_2 = null >>> _loc_2;
            _loc_4++;
            _loc_4 = null[null];
            var _loc_6:Boolean = false;
            var _loc_7:Boolean = false;
            var _loc_8:* = BitmapFilterQuality.HIGH;
            var _loc_9:* = new GlowFilter(_loc_1, _loc_2, _loc_3, _loc_4, _loc_5, _loc_8, _loc_6, _loc_7);
            var _loc_10:* = new Array();
            new Array().push(_loc_9);
            ;
            _loc_11 = _loc_12;
            _loc_3++;
            _loc_4 = _loc_3 >> _loc_12;
            _loc_4--;
            if (null + (null >> null))
            {
            }
            if (!this)
            {
                filters = _loc_10;
            }
            return;
            return;
        }// end function

        private function 02() : void
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:Boolean = true;
            _loc_2 = _loc_3;
            do
            {
                
                return;
                if (false)
                {
                    
                    parent.removeChild(this);
                    if (_loc_1)
                    {
                    }while (true)
                    
                    removeChild(this.-6);
                    do
                    {
                        
                        this.graphics.clear();
                        do
                        {
                            
                            this.-6.removeChild(this.,1);
                        }while (true)
                        do
                        {
                            
                            if (this.,1 == null) goto 64;
                            this.,1.filters = [];
                        }
                    }while (true)
                    
                    this.]8 = null;
                }while (true)
                
                this.-6.removeChild(this.]8);
                do
                {
                    
                    this.filters = [];
                    do
                    {
                        
                        this.]8.filters = [];
                    }while (true)
                    
                    this.=#(false);
                    continue;
                }while (true)
                this.93.removeEventListener(MouseEvent.MOUSE_OUT, this.true);
                ;
            }
            return;
        }// end function

        private function +<(param1:Boolean) : TextField
        {
            ;
            _loc_2--;
            _loc_3--;
            var _loc_2:String = false;
            var _loc_3:* = null >> (true | true);
            var _loc_4:String = null;
            _loc_2 = new TextField();
            if (!(_loc_3 && this))
            {
                do
                {
                    
                    return _loc_2;
                    ;
                    _loc_3--;
                    _loc_2++;
                    _loc_3++;
                    
                    _loc_2.wordWrap = true;
                }while (true)
                
                if (this.+1) goto 50;
                _loc_2.multiline = true;
                if (_loc_4)
                {
                    do
                    {
                        
                        _loc_2.selectable = false;
                    }
                }
                do
                {
                    
                    _loc_2.autoSize = TextFieldAutoSize.LEFT;
                    ;
                    _loc_2++;
                    _loc_2--;
                    _loc_2 = NaN;
                    _loc_2--;
                }while (true)
                
                _loc_2.gridFitType = "pixel";
            }while (true)
            _loc_2.embedFonts = param1;
            ;
            return;
        }// end function

        private function @0() : void
        {
            var _loc_12:Boolean = true;
            ;
            var _loc_7:* = _loc_2;
            _loc_9++;
            var _loc_13:* = null % (false + _loc_6) - 1;
            var _loc_9:Number = NaN;
            var _loc_10:Number = NaN;
            var _loc_11:Number = NaN;
            if (_loc_12 || this)
            {
                this.graphics.clear();
            }
            var _loc_1:* = this.getBounds(this);
            if (_loc_12 || this)
            {
            }
            if (_loc_12)
            {
                if (_loc_12 || _loc_1)
                {
                }
            }
            var _loc_2:* = isNaN(this.0") ? (if (!_loc_12) goto 146, _loc_1.height + this.01 * 2) : (if (!(_loc_12 || _loc_1)) goto 146, if (!(_loc_12 || _loc_2)) goto 147, this.0");
            var _loc_3:* = GradientType.LINEAR;
            var _loc_4:Array = [this.throw, this.throw];
            var _loc_5:Array = [0, 255];
            var _loc_6:* = new Matrix();
            if (_loc_12 || _loc_3)
            {
                if (!(_loc_13 && _loc_3))
                {
                }
            }
            _loc_7 = 90 * Math.PI / 180;
            if (_loc_12 || _loc_3)
            {
                _loc_6.createGradientBox(this._20var, _loc_2, _loc_7, 0, 0);
            }
            var _loc_8:* = SpreadMethod.PAD;
            if (_loc_12)
            {
                do
                {
                    
                    return;
                    
                }while (true)
                
                this.graphics.drawRoundRect(0, 0, this._20var, _loc_2, this.^-);
                if (!(_loc_13 && _loc_3))
                {
                    do
                    {
                        
                        this.graphics.endFill();
                    }
                    do
                    {
                        
                        this.graphics.curveTo(_loc_9, _loc_10, _loc_9 + this.^-, _loc_10);
                    }while (true)
                    
                    this.graphics.lineTo(_loc_9, _loc_10 + this.^-);
                }
            }while (true)
            
            ;
            _loc_7 = (_loc_2 instanceof _loc_1) + (_loc_3 >= _loc_8);
            null.curveTo(null, this.graphics, _loc_9, _loc_10 + _loc_2 + _loc_9[_loc_10] - this.^-);
            do
            {
                
                this.graphics.lineTo(_loc_9 + this.^-, _loc_10 + _loc_2);
                do
                {
                    
                    this.graphics.lineTo(_loc_9 + this.'= - this.&<, _loc_10 + _loc_2);
                }while (true)
                
                this.graphics.lineTo(_loc_9 + this.'=, _loc_10 + _loc_2 + this.&<);
            }while (true)
            
            this.graphics.lineTo(_loc_9 + this.'= + this.&<, _loc_10 + _loc_2);
            do
            {
                
                this.graphics.curveTo(_loc_9 + _loc_11, _loc_10 + _loc_2, _loc_9 + _loc_11 - this.^-, _loc_10 + _loc_2);
                if (_loc_12 || _loc_3)
                {
                    do
                    {
                        
                        this.graphics.lineTo(_loc_9 + _loc_11, _loc_10 + _loc_2 - this.^-);
                    }while (true)
                    
                    this.graphics.curveTo(_loc_9 + _loc_11, _loc_10, _loc_9 + _loc_11, _loc_10 + this.^-);
                }while (true)
                
                this.graphics.lineTo(_loc_9 + _loc_11 - this.^-, _loc_10);
                do
                {
                    
                    this.graphics.moveTo(_loc_9 + this.^-, _loc_10);
                    do
                    {
                        
                        if (_loc_12 || _loc_3)
                        {
                        }
                        if (!(_loc_13 && _loc_1))
                        {
                            _loc_11 = this._20var;
                        }while (true)
                        
                    }
                    _loc_10 = 0;
                }
                if (!_loc_13)
                {
                }while (true)
                
                if (!this.;7) goto 296;
                if (!_loc_13)
                {
                    _loc_9 = 0;
                }
                do
                {
                    
                    this.graphics.beginGradientFill(_loc_3, this.%-, _loc_4, _loc_5, _loc_6, _loc_8);
                    continue;
                }while (isNaN(this.`%))
                ;
                _loc_6++;
                _loc_2++;
            }
            this.graphics.lineStyle(this.9<, this.`%, 1);
            ;
            return;
        }// end function

        private function ,#(event:Event) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2++;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            var _loc_3:Number = NaN;
            if (_loc_2)
            {
                this.position();
            }
            return;
            return;
        }// end function

        private function =#(param1:Boolean) : void
        {
            ;
            _loc_2++;
            _loc_2--;
            var _loc_2:String = this;
            var _loc_3:String = null;
            if (_loc_3)
            {
                do
                {
                    
                    return;
                    
                }while (true)
                
                ;
                _loc_2++;
                _loc_2++;
                default xml namespace = Event.ENTER_FRAME;
                _loc_2++;
                var _loc_2:* = ~;
                null.removeEventListener(null is (null - 1), this.,#);
            }
            ;
            if (!param1) goto 44;
            ;
            _loc_2 = param1;
            _loc_2++;
            if (!(null && !(_loc_2 * _loc_2)))
            {
                addEventListener(Event.ENTER_FRAME, this.,#);
            }
            ;
            return;
        }// end function

        private function +!() : void
        {
            ;
            _loc_3 = null;
            var _loc_1:* = -NaN;
            var _loc_2:* = ~undefined;
            if (!_loc_1)
            {
                do
                {
                    
                    return;
                    
                    this.^4.color = 3355443;
                    if (!_loc_1)
                    {
                        ;
                        if (null - null[null << null + (null % (true * ((false + 1) - 1) - (_loc_1 - _loc_1)) + 1 > null)])
                        {
                        }
                    }while (true)
                    
                    this.^4.size = 20;
                }
            }
            do
            {
                
                this.^4.bold = true;
                if (_loc_2)
                {
                    continue;
                    
                    ;
                    _loc_2 = _loc_3 - 1;
                    null.font = null / (this.^4 / (("_sans" as (this - 1)) - 1));
                }
                if (_loc_2)
                {
                }while (true)
                this.^4 = new TextFormat();
            }
            return;
        }// end function

        private function ];() : void
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = null * (null - (null + 1)) >= (_loc_3 - 1) < null;
            if (_loc_1 || _loc_1)
            {
                do
                {
                    
                    return;
                    
                    ;
                    default xml namespace = null;
                    null.color = -null;
                    if (_loc_1)
                    {
                    }while (true)
                    
                    this.,7.size = 14;
                }
            }
            do
            {
                
                this.,7.bold = false;
                if (_loc_1)
                {
                    do
                    {
                        
                        ;
                        ((null << null * (null - (-this))) + 1).,7.font = "_sans";
                    }while (true)
                    this.,7 = new TextFormat();
                }
            }while (true)
            return;
        }// end function

        private function true(event:MouseEvent) : void
        {
            arguments = true;
            ;
            _loc_2++;
            var _loc_4:Boolean = false;
            ;
            arguments = _loc_4;
            _loc_2--;
            _loc_2++;
            with (this)
            {
                arguments++;
                arguments--;
                if (!(arguments && arguments))
                {
                    do
                    {
                        
                        return;
                        
                        this.9%();
                        if (arguments)
                        {
                            continue;
                            arguments++;
                            default xml namespace = (!false > true[undefined] < null == null) >= null;
                            _loc_2--;
                            arguments--;
                            _loc_2--;
                        }while (true)
                        event.currentTarget.removeEventListener(event.type, _loc_2.callee);
                    }
                }
                return;
        }// end function

        private function position() : void
        {
            ;
            _loc_5++;
            _loc_2++;
            _loc_7--;
            var _loc_7:* = false + _loc_5;
            _loc_3--;
            _loc_7 = ~true;
            var _loc_8:String = null;
            var _loc_1:Number = 3;
            var _loc_2:* = new Point(this.93.mouseX, this.93.mouseY);
            var _loc_3:* = this.93.localToGlobal(_loc_2);
            var _loc_4:* = _loc_3.x + this.>&;
            if (_loc_8)
            {
            }
            var _loc_5:* = _loc_3.y - this.height - 10;
            if (_loc_8 || this)
            {
            }
            var _loc_6:* = this._20var + _loc_4;
            ;
            with (!(this + 1))
            {
                if (null >>> (null >> (this._20var + _loc_4 >> (_loc_4 - 1))) > stage.stageWidth)
                {
                    _loc_4 = stage.stageWidth - this._20var;
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
                        
                        if (!(_loc_5 < 0)) goto 258;
                        ;
                        _loc_7++;
                        _loc_2++;
                        _loc_2 = typeof(new activation);
                        _loc_5 = null * (null instanceof null + (null is 0));
                        continue;
                    }
                }while (_loc_4 >= 0)
                _loc_4 = 0;
                ;
                return;
        }// end function

        private function _20for() : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            var _loc_3:* = null + (_loc_2 >= false in null);
            do
            {
                
                if (!_loc_3)
                {
                }
                this.'= = this._20var / 2;
                if (_loc_2)
                {
                    
                    break;
                }
                default:
                {
                    if (_loc_2 || _loc_3)
                    {
                        if (!(_loc_3 && _loc_1))
                        {
                        }
                    }
                    this.>& = -this._20var / 2;
                }while (true)
                
                if (_loc_2 || _loc_1)
                {
                }
                this.'= = this._20var / 2;
            }
            if (!_loc_3)
            {
                do
                {
                    
                    break;
                }
                case _loc_2:
                {
                    if (!_loc_3)
                    {
                    }
                    this.>& = -this._20var / 2;
                    do
                    {
                        
                        if (_loc_2 || _loc_1)
                        {
                            if (_loc_2)
                            {
                            }
                        }
                        this.'= = this.01 * 3 + this.&<;
                    }while (true)
                    
                    break;
                }
                case "right":
                {
                    if (_loc_2)
                    {
                    }
                    if (_loc_3)
                    {
                        ;
                        _loc_2 = _loc_3;
                        _loc_2--;
                        _loc_2 = _loc_2;
                        default xml namespace = _loc_2;
                        _loc_2--;
                    }
                    if (!this)
                    {
                    }
                    null.>& = (this is -this.01 * 3) - this.&<;
                }while (true)
                
                if (!_loc_3)
                {
                }
                this.'= = this._20var - this.01 * 3 - this.&<;
            }
            if (_loc_2 || _loc_3)
            {
                ;
                switch(this."7)
                {
                    case "left":
                    {
                        if (_loc_2)
                        {
                            if (_loc_2 || this)
                            {
                                if (!(_loc_3 && _loc_2))
                                {
                                }
                            }
                        }
                        this.>& = -this._20var + this.01 * 3 + this.&<;
                    }
                    continue;
                    break;
                    break;
                }
            }
            return;
            return;
        }// end function

        private function 4-(event:TimerEvent) : void
        {
            ;
            _loc_2--;
            _loc_2--;
            var _loc_2:* = _loc_2;
            var _loc_3:* = true + false > null > null;
            if (_loc_3)
            {
                this.[<(true);
            }
            return;
            return;
        }// end function

        private function 63(param1:TextField) : void
        {
            var _loc_12:Boolean = true;
            ;
            _loc_7++;
            _loc_4--;
            _loc_11++;
            var _loc_4:* = !(null >>> null + (-false));
            var _loc_13:* = null === null;
            var _loc_2:Number = 0;
            if (_loc_12)
            {
            }
            var _loc_3:Number = 0.35;
            _loc_4 = 2;
            var _loc_5:Number = 2;
            var _loc_6:Number = 1;
            ;
            _loc_11++;
            _loc_10++;
            with (null)
            {
                _loc_6 = null;
                _loc_8--;
                var _loc_7:Boolean = false;
                var _loc_8:Boolean = false;
                var _loc_9:* = BitmapFilterQuality.HIGH;
                var _loc_10:* = new GlowFilter(_loc_2, _loc_3, _loc_4, _loc_5, _loc_6, _loc_9, _loc_7, _loc_8);
                break;
            }
            _loc_6--;
            _loc_9--;
            _loc_11--;
            var _loc_11:* = new Array() - new Array() is (this ^ _loc_5);
            param1.push(_loc_10);
            if (!_loc_13)
            {
                param1.filters = _loc_11;
            }
            return;
            return;
        }// end function

    }
}
