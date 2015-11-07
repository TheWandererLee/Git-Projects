package !$
{
    import !3.*;
    import -<.*;
    import 19.*;
    import 5+.*;
    import ]-.*;
    import _207.*;
    import _20null.*;
    import flash.display.*;
    import flash.events.*;

    public class ReceiverControls extends UIControls
    {
        private var <':Boolean = false;
        private var +2:ToggleButton;
        private var 60:String = "tog_btn_camera";
        private var ?>:ToggleButton;
        private var 84:String = "tog_btn_speaker";
        private var #>:Object;
        private var @%:String = "sldr_volume";
        private var [>:Button3;
        private var =-:String = "btn_snapShot";
        private var 9,:4;
        public static const [1:String = "cameraToggleButton";
        public static const _20<:String = "snapShotButton";
        public static const try20:String = "speakerToggleButton";
        public static const &:String = "volumeSlider";

        public function ReceiverControls(param1:Number, param2:Number)
        {
            ;
            _loc_3--;
            param2--;
            var _loc_3:* = null[null === true - false];
            param2++;
            param2++;
            _loc_3 = null;
            var _loc_4:String = null;
            if (_loc_4)
            {
                do
                {
                    
                    return;
                    
                    ;
                    var _loc_2:Number = NaN;
                    _loc_2--;
                    _loc_2++;
                    this.%=();
                }
            }while (true)
            
            ;
            _loc_2 = _loc_3;
            _loc_2--;
            _loc_3--;
            _loc_3--;
            super(null,  < (typeof(param1 <= _loc_2) in this));
            ;
            this.9, = new 4("ReceiverControls", false);
            ;
            return;
        }// end function

        public function [9(param1:String, param2:Boolean = false) : Boolean
        {
            var _loc_7:Boolean = true;
            ;
            _loc_6++;
            _loc_5++;
            var _loc_8:* = param2;
            var _loc_4:SimpleButton = null;
            var _loc_5:SimpleButton = null;
            var _loc_6:Boolean = false;
            if (_loc_7 || param2)
            {
            }
            var _loc_3:* = this.60;
            if (!_loc_8)
            {
            }
            _loc_4 = ]%(#6.elements(_loc_3).asset);
            _loc_5 = ]%(#6.elements(_loc_3).assetSelected);
            if (!_loc_8)
            {
                do
                {
                    
                    if (!(_loc_8 && param2))
                    {
                        return true;
                        if (!(_loc_8 && param1))
                        {
                            
                            !#(this.+2, _loc_3);
                        }while (true)
                        
                        ;
                        _loc_2++;
                        _loc_6--;
                        _loc_4--;
                        (null + (param2 as (param2 ^ ) in null + (false ^ _loc_7))).,'(this.+2, _loc_6);
                    }
                    do
                    {
                        
                        if (!(_loc_8 && _loc_3))
                        {
                        }
                    }
                    var _loc_6:* = #6.elements(_loc_3).display == "yes" ? (if (_loc_8 && _loc_3) goto 274, true) : (if (!(_loc_7 || _loc_3)) goto 275, false);
                    do
                    {
                        
                        if (_loc_7 || param1)
                        {
                            this.+2.selected = _loc_2;
                        }while (true)
                        
                    }
                    this.+2.]&(_loc_4, _loc_5);
                }while (true)
                
                if (_loc_7)
                {
                    this.+2.name = param1;
                    ;
                    
                }
                ;
                _loc_2--;
                _loc_3--;
                _loc_6--;
                _loc_7++;
                (null - (MouseEvent.CLICK + this.button_clickedHandler in this.+2)).addEventListener(this, param1);
                ;
                this.+2 = new ToggleButton();
            }
            return false;
            return;
        }// end function

        public function 35(param1:String, param2:Boolean = false) : Boolean
        {
            ;
            _loc_7--;
            var _loc_2:* = param2;
            var _loc_7:* = param2;
            var _loc_8:Number = undefined;
            var _loc_4:SimpleButton = null;
            var _loc_5:SimpleButton = null;
            var _loc_6:Boolean = false;
            if (_loc_8 || _loc_2)
            {
            }
            var _loc_3:* = this.84;
            if (_loc_8 || param1)
            {
            }
            this.9,.info("createToggleButtonComponent:>", "Creating Toggle Button:>", param1);
            _loc_4 = ]%(#6.elements(_loc_3).asset);
            _loc_5 = ]%(#6.elements(_loc_3).assetSelected);
            do
            {
                
                if (_loc_8)
                {
                    if (_loc_8)
                    {
                        return true;
                        if (_loc_8 || _loc_3)
                        {
                            ;
                            _loc_3++;
                            _loc_4 = true > false is _loc_2;
                            _loc_4--;
                            
                            !#(this.?>, _loc_3);
                        }
                    }while (true)
                    
                    ,'(this.?>, _loc_6);
                    do
                    {
                        
                    }
                    if (_loc_8)
                    {
                    }
                }
                _loc_6 = #6.elements(_loc_3).display == "yes" ? (if (!_loc_8) goto 344, if (!(_loc_8 || param1)) goto 366, if (_loc_7 && _loc_3) goto 378, if (_loc_7 && _loc_2) goto 414, true) : (if (!_loc_8) goto 318, false);
                do
                {
                    
                    if (!_loc_7)
                    {
                        this.?>.selected = _loc_2;
                    }while (true)
                    
                }
                if (!_loc_7)
                {
                    this.?>.]&(_loc_4, _loc_5);
                }while (true)
                
                this.?>.name = param1;
                do
                {
                    
                }
                ;
                _loc_3--;
                _loc_4++;
                _loc_3 = undefined;
                _loc_2++;
                this.?>.addEventListener(MouseEvent.CLICK, this.button_clickedHandler);
                continue;
                this.?> = new ToggleButton();
            }while (true)
            return false;
            return;
        }// end function

        public function !5(param1:String) : Boolean
        {
            ;
            var _loc_4:* = true >= false;
            _loc_5--;
            var _loc_2:String = null;
            _loc_2++;
            var _loc_5:* = null >= null;
            var _loc_6:String = null;
            var _loc_3:SimpleButton = null;
            var _loc_4:Boolean = false;
            if (_loc_6 || _loc_3)
            {
            }
            _loc_2 = this.=-;
            if (!_loc_5)
            {
                if (_loc_6)
                {
                    this.9,.info("createToggleButtonComponent:>", "Creating Toggle Button:>", param1);
                }
            }
            _loc_3 = ]%(#6.elements(_loc_2).asset);
            if (_loc_6 || _loc_2)
            {
                do
                {
                    
                    ;
                    _loc_4--;
                    _loc_4--;
                    _loc_2--;
                    return null + (null - true < null | false);
                }
                if (false)
                {
                    
                    !#(this.[>, _loc_2);
                }while (true)
                
                ,'(this.[>, _loc_4);
                do
                {
                    
                    if (!(_loc_5 && _loc_2))
                    {
                    }
                    _loc_4 = #6.elements(_loc_2).display == "yes" ? (true) : (if (_loc_5 && _loc_2) goto 243, false);
                    do
                    {
                        
                        if (!(_loc_5 && _loc_3))
                        {
                            this.[>.setSkin(_loc_3);
                        }while (true)
                        
                    }
                    if (_loc_6 || param1)
                    {
                        this.[>.name = param1;
                    }while (true)
                    
                }
                ;
                _loc_3--;
                _loc_4++;
                null.addEventListener(!(this.[> ^ MouseEvent.CLICK >>> this.button_clickedHandler) in null == null, _loc_2);
                ;
                this.[> = new Button3();
                ;
            }
            return false;
            return;
        }// end function

        public function #'(param1:String, param2:uint = 0) : Boolean
        {
            ;
            _loc_5--;
            param2 = false;
            param2 = true;
            param2--;
            _loc_6--;
            _loc_4++;
            var _loc_6:String = null;
            var _loc_7:* = null ^ undefined;
            var _loc_4:* = undefined;
            var _loc_5:String = null;
            if (!_loc_6)
            {
            }
            var _loc_3:* = this.@%;
            do
            {
                
                if (_loc_7 || param2)
                {
                    return false;
                    
                }
                return true;
                if (!_loc_6)
                {
                }while (true)
                
                ,'(this.#>, true);
                do
                {
                    
                    !#(this.#>, _loc_3);
                    do
                    {
                        
                        this.#>.thumbPlacement(_loc_5);
                    }while (true)
                    
                    if (!(_loc_6 && this))
                    {
                    }
                    _loc_5 = #6.elements(_loc_3).thumbPosition != undefined ? (if (_loc_6 && this) goto 183, #6.elements(_loc_3).thumbPosition) : ("center");
                }
            }while (true)
            
            this.#>.value = param2;
            if (_loc_7 || this)
            {
                do
                {
                    
                    ;
                    _loc_4++;
                    param2++;
                    _loc_6++;
                    _loc_5--;
                    param2++;
                    (this | param1).#>.snapInterval = #6.elements(_loc_3).snapInterval != undefined ? (#6.elements(_loc_3).snapInterval) : (5);
                    do
                    {
                        
                        this.#>.maximum = #6.elements(_loc_3).maximum != undefined ? (#6.elements(_loc_3).maximum) : (100);
                    }
                    if (_loc_7 || this)
                    {
                    }while (true)
                    
                    this.#>.minimum = #6.elements(_loc_3).minimum != undefined ? (#6.elements(_loc_3).minimum) : (0);
                }while (true)
                
                if (#6.elements(_loc_3) == undefined) goto 347;
            }
            this.#>.setSkin(#6.elements(_loc_3));
            do
            {
                
                this.#>.addEventListener(else20.7&, this.+=);
                do
                {
                    
                }while (true)
                
                this.#> = new VSlider();
                continue;
                if (!]6(_loc_3)) goto 50;
                ;
                default xml namespace = _loc_3;
                param2++;
                _loc_3 =  + 1;
                _loc_4 = null >= this;
                if (!((null * null).!(new activation <= _loc_5) == "2.!%)) goto 460;
                this.#> = new HSlider();
            }while (true)
            return;
        }// end function

        public function setVolume(param1:uint) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            var _loc_3:* = _loc_2;
            if (_loc_2)
            {
                this.#>.value = param1;
            }
            return;
            return;
        }// end function

        public function 9!() : void
        {
            ;
            var _loc_1:* = null * (null is _loc_2 < false >= true) is _loc_2;
            var _loc_2:String = null;
            if (!_loc_2)
            {
                ;
                _loc_2 = (null as _loc_2) - 1 in null;
            }
            if (this)
            {
                ;
                if (this || _loc_2)
                {
                }
                null.selected = !((this.+2 < this.+2.selected * (_loc_2 + new activation)) + this);
            }
            return;
            return;
        }// end function

        public function set() : void
        {
            ;
            var _loc_2:* = -new activation >> false;
            var _loc_1:* = _loc_1;
            _loc_2 = undefined - 1;
            ;
            if (!_loc_1)
            {
                ;
                if (this.?> - ((this.?>.selected as _loc_2 === this) - 1 is !_loc_3) || this)
                {
                }
                (null ^ (null & -~((true === typeof(false)) + 1)) - 1).selected = !_loc_2;
            }
            return;
            return;
        }// end function

        private function button_clickedHandler(event:MouseEvent) : void
        {
            ;
            default xml namespace = _loc_2;
            _loc_2++;
            var _loc_2:* = true / false;
            _loc_2 = null & (null - 1);
            var _loc_3:String = null;
            if (!(_loc_2 && this))
            {
                do
                {
                    
                    return;
                    ;
                    _loc_2--;
                    _loc_2--;
                    _loc_2++;
                    _loc_2--;
                    
                    dispatchEvent(new WebcamControlsEvent(WebcamControlsEvent.>!, {component:event.currentTarget.name}));
                    continue;
                    _loc_2--;
                    _loc_2--;
                    _loc_3 = null * ((null - null[null] ^ _loc_2) <= _loc_2);
                }
            }while (true)
            this.9,.info("button_clickedHandler", event.currentTarget.name);
            return;
        }// end function

        private function +=(param1:else20) : void
        {
            var _loc_2:Boolean = true;
            ;
            var _loc_2:* = null - true;
            _loc_2++;
            var _loc_3:String = null;
            ;
            var _loc_2:* = _loc_2;
            _loc_2 = (null >> param1) % _loc_2;
            _loc_2++;
            _loc_2 = null[null];
            if (!_loc_2)
            {
            }
            if (_loc_3)
            {
                ;
                _loc_2--;
                _loc_2++;
                _loc_3 = WebcamControlsEvent / _loc_2 in ;
                null.dispatchEvent(new null.WebcamControlsEvent(7&, {value:param1.params.value}));
            }
            return;
            return;
        }// end function

        override protected function update() : void
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = -!null >> (false + 1);
            if (_loc_1 || this)
            {
                do
                {
                    
                    return;
                    
                }while (!this.#>)
                if (!(_loc_2 && this))
                {
                    !#(this.#>, this.@%);
                    ;
                    default xml namespace = null;
                }
                do
                {
                    
                    if (!this.[>) goto 43;
                    !#(this.[>, this.=-);
                    if (_loc_1)
                    {
                        do
                        {
                            
                        }while (!this.?>)
                        !#(this.?>, this.84);
                    }
                }
                do
                {
                    
                }while (!this.+2)
                ;
                (null + null % (null << (null >>> null - (!null + 1))) <= _loc_2 <= null).!#(this.+2, this.60);
                continue;
                super.update();
            }while (true)
            return;
        }// end function

        ;
        var _loc_1:* = null as (null === ~((null >> (true instanceof false | null)) + 1));
        var _loc_2:String = null;
        if (!(_loc_1 && _loc_1))
        {
            do
            {
                
                ;
                _loc_3 = null;
                
                if (!_loc_1)
                {
                }while (true)
                
            }
            if (_loc_2)
            {
                ;
                ;
                
            }
        }
        ;
    }
}
