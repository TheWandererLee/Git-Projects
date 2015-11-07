package 
{
    import *.*;
    import BroadcastCam.*;
    import _-0A.*;
    import _-2C.*;
    import _-4Q.*;
    import _-4Y.*;
    import _-5i.*;
    import _-7b.*;
    import _-BX.*;
    import _-CL.*;
    import flash.display.*;
    import flash.events.*;
    import flash.external.*;

    public class BroadcastCam extends Application
    {
        private var _-2H:Boolean;
        private var _-Cm:Boolean;
        private var default:Boolean;
        private var _-46:Boolean;
        private var _-34:Boolean;
        private var _-Z:Boolean;
        private var _-R:Boolean;
        private var _-0:_-A4;
        private var _-BR:BroadcastControls;
        private var _-4B:Broadcaster;

        public function BroadcastCam()
        {
            ;
            _loc_2--;
            var _loc_2:Number = NaN;
            var _loc_3:* = true == false;
            if (!_loc_2)
            {
                do
                {
                    
                    _-84(_-2L._-3t("settingsURL", "settings.xml"));
                    if (!_loc_2)
                    {
                        
                        _-2n("http://prochatrooms.com/licences/webcam_v3", "wcz3");
                    }
                }while (true)
                
            }
            do
            {
                
                ;
                _loc_2++;
                _loc_2--;
                null.setSize((null - ( < stage >= this)).stageWidth, stage.stageHeight);
                continue;
                this._-0 = new _-A4("BroadcastCam", _-A4._-8W);
            }while (true)
            var _loc_1:* = _-2L._-3t("assets", "demoAssets");
            if (_loc_3 || this)
            {
                do
                {
                    
                    return;
                    
                    this.addEventListener(ApplicationEvent.COMPLETE, this._-2R);
                    if (!_loc_2)
                    {
                    }while (true)
                    
                    ;
                    _loc_2++;
                    _loc_2 = typeof(PreLoaderManager);
                    (null ^ null[null])._-9E();
                }
            }
            do
            {
                
                this._-2E();
                continue;
                this._-2F(_loc_1);
            }while (true)
            return;
        }// end function

        public function _-8R() : void
        {
            ;
            var _loc_1:* = ~((false in true instanceof null) >= null);
            var _loc_2:String = null;
            if (_loc_2)
            {
                do
                {
                    
                    return;
                    
                    ;
                    if (_loc_2)
                    {
                    }
                    _loc_1.selected = !(!_loc_2).selected;
                    ;
                    if (!(NaN && (true - 1)))
                    {
                    }while (true)
                    if (!this._-Cm) goto 26;
                }
            }
            this.liveCamPause();
            ;
            return;
        }// end function

        public function _-5V() : void
        {
            var _loc_1:Boolean = true;
            ;
            _loc_3 = false;
            default xml namespace = null;
            var _loc_2:* = null === null / null;
            if (_loc_1 || _loc_1)
            {
                do
                {
                    
                    return;
                    
                    ;
                    _loc_2 = this + !null;
                    if (!(_loc_2 && _loc_1))
                    {
                    }
                    null.selected = !(this._-BR._-3 <= null)._-BR._-3.selected;
                    if (_loc_1)
                    {
                        ;
                        if (null || null * (_loc_1 * (_loc_1 is ~new activation)))
                        {
                        }while (true)
                        if (!this.default) goto 33;
                    }
                    this.liveMicPause();
                }
            }
            ;
            return;
        }// end function

        public function _-X(param1:String) : void
        {
            ;
            _loc_2++;
            var _loc_2:* = typeof(true % false);
            var _loc_3:String = null;
            ;
            _loc_2++;
            _loc_2--;
            if (!(_loc_2 && _loc_2))
            {
                this._-4B.loadEffect(param1);
            }
            return;
            return;
        }// end function

        public function _-8p(param1:uint) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2--;
            var _loc_3:* = -false > null;
            if (!_loc_3)
            {
                do
                {
                    
                    return;
                    
                    this._-BR._-3q.value = param1;
                    if (_loc_2)
                    {
                        if (!_loc_3)
                        {
                        }while (true)
                        
                        ;
                        _loc_2--;
                        var _loc_2:* = _loc_2;
                        _loc_2++;
                        
                        if (!(null <= null)) goto 29;
                    }
                    this._-4B.microphone.gain = param1;
                }
                ;
                if (!this._-2H) goto 29;
                ;
                default xml namespace = null;
                _loc_2--;
                var _loc_2:Number = NaN;
            }
            ;
            return;
        }// end function

        public function _-By() : void
        {
            ;
            _loc_4++;
            _loc_3--;
            var _loc_2:* = _loc_4;
            var _loc_4:* = false;
            var _loc_5:Boolean = true;
            var _loc_1:String = null;
            _loc_2 = null;
            var _loc_3:String = null;
            if (!_loc_4)
            {
            }
            trace("take1");
            if (!_loc_4)
            {
                if (_loc_5)
                {
                    _loc_1 = _-2L._-3t("snapShotURL", null);
                }
                ;
                _loc_2++;
                _loc_2++;
                _loc_4++;
                _loc_3 = NaN;
            }
            _loc_2 = this._-4B._-4X(true);
            if (_loc_5)
            {
                do
                {
                    
                    trace("take2");
                    if (_loc_5 || _loc_3)
                    {
                        
                        _-E._-7C(_loc_3, this._-4B._-6x, _loc_1, false);
                    }
                }
            }while (true)
            ;
            _loc_4++;
            _loc_4++;
            if (_loc_5)
            {
            }
            var _loc_3:* = _-E._-t(_loc_2);
            return;
            return;
        }// end function

        private function _-2E() : void
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = !(null instanceof (null is false)) < null;
            _loc_2 = null;
            if (_loc_1)
            {
                do
                {
                    
                    return;
                    
                    ExternalInterface.addCallback("takeSnapShot", this._-By);
                    if (_loc_1 || _loc_1)
                    {
                        if (_loc_2)
                        {
                        }
                        else
                        {
                        }while (true)
                        
                        ExternalInterface.addCallback("setVolume", this._-8p);
                    }
                    do
                    {
                        
                        ExternalInterface.addCallback("loadEffect", this._-X);
                        if (_loc_1)
                        {
                            continue;
                            
                            ;
                            "liveMicPause".addCallback(this >>> (_loc_3 | true), (this >>> (_loc_3 | true))._-5V);
                        }
                    }while (true)
                    ExternalInterface.addCallback("liveCamPause", this._-8R);
                }
                return;
        }// end function

        private function _-2R(event:ApplicationEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            var _loc_3:String = null;
            do
            {
                
                return;
                if (false)
                {
                    
                    this.resize_stage(null);
                    if (_loc_2)
                    {
                    }while (true)
                    
                    if (!this._-2H) goto 27;
                }
                if (!(_loc_3 && event))
                {
                    if (!_loc_3)
                    {
                        this._-BR._-3q.enabled = false;
                        do
                        {
                            
                            if (!this._-46) goto 56;
                        }
                        this._-BR.pressToTalkButton.enabled = false;
                    }
                    do
                    {
                        
                    }while (!this.default)
                    if (_loc_2)
                    {
                        ;
                        _loc_2--;
                        _loc_2++;
                        false.enabled = ~this;
                        do
                        {
                            
                        }
                        this._-BR._20in.enabled = false;
                        if (_loc_2 || this)
                        {
                        }while (true)
                        
                        do
                        {
                            
                            if (!(_loc_3 && _loc_3))
                            {
                                if (!this._-Cm) goto 135;
                                if (!(_loc_3 && _loc_3))
                                {
                                    this._-4B._-6();
                                }while (true)
                                
                            }while (this._-34)
                        }
                        this._-4B.connectToFMS();
                        do
                        {
                            
                        }
                        if (!this._-7K()) goto 27;
                        this._-0.info("cam", this._-Cm, "mic", this.default);
                        ;
                        _loc_2--;
                        _loc_2 = this._-BR._-3;
                        _loc_2--;
                        _loc_2++;
                        do
                        {
                            
                        }while (this._-9z())
                    }
                    return;
                    continue;
                    PreLoaderManager._-3o();
                }while (true)
            }
            return;
        }// end function

        private function _-7K() : Boolean
        {
            ;
            with (false)
            {
                var _loc_1:* = this;
                var _loc_2:String = true;
                if (_loc_2)
                {
                    do
                    {
                        
                        return true;
                        
                        this._-2H = this._-BR._-37("micVolume", this._-4B.microphone.gain);
                    }
                }while (true)
                
                this._-R = this._-BR._-6d("snapShotButton");
                do
                {
                    
                    this._-Z = this._-BR._-4R("rebootButton");
                    do
                    {
                        
                        this._-34 = this._-BR._-45("previewButton");
                    }while (true)
                    
                    if (_loc_2)
                    {
                        if (!(_loc_1 && _loc_1))
                        {
                            
                        }while (this._-BR._-3.selected != false)
                        this._-4B._-6i = true;
                        do
                        {
                            
                        }
                        if (!_loc_1)
                        {
                            do
                            {
                                
                                if (this._-46) goto 131;
                            }
                            ;
                            with (null)
                            {
                                this.default = this._-BR.set20("micButton");
                            }while (true)
                            
                            this._-46 = this._-BR._-50("pressToTalkButton");
                        }while (true)
                        
                        if (!this._-Cm) goto 329;
                        this._-4B._-2o = true;
                        do
                        {
                            
                            this._-Cm = this._-BR._-58("camButton");
                            do
                            {
                                
                                if (_loc_2 || this)
                                {
                                    this._-BR._-B3 = _-0J.general_settings.ui_controls.roll_over;
                                }while (true)
                                
                                this._-BR._-8 = _-0J.general_settings.ui_controls.roll_out;
                            }while (true)
                            
                        }
                        this._-BR._-0L = _-0J.broadcast;
                        do
                        {
                            
                            addChild(this._-BR);
                            do
                            {
                                
                                if (_loc_2)
                                {
                                    this._-BR.addEventListener(WebcamControlsEvent._-AP, this._-19);
                                }while (true)
                                
                            }
                            this._-BR.addEventListener(WebcamControlsEvent.extends, this._-9a);
                        }while (true)
                        
                    }
                    if (!(_loc_1 && this))
                    {
                        this._-BR.addEventListener(WebcamControlsEvent._-6c, this._-9a);
                        do
                        {
                            
                        }
                        this._-BR.addEventListener(WebcamControlsEvent.for, this._-9a);
                        continue;
                        ;
                        this._-BR = new BroadcastControls(this.width, this.height);
                    }while (true)
                    return;
        }// end function

        private function _-9z(param1:Boolean = false) : Boolean
        {
            var _loc_8:Boolean = true;
            ;
            _loc_3++;
            default xml namespace = false;
            _loc_8++;
            _loc_2++;
            _loc_7--;
            var _loc_9:String = null;
            do
            {
                
                if (_loc_8)
                {
                    this._-4B._-Bq = _-Az.applicationID;
                    
                }
                if (_loc_8)
                {
                    this._-4B._-4T = _-Az.serverURL;
                }while (true)
                
            }
            this._-4B.rtmpType = _-Az.rtmpType;
            do
            {
                
                if (_loc_8)
                {
                    if (param1) goto 92;
                    this._-4B._-6x = _-2L._-3t("streamName", null);
                    do
                    {
                        
                        if (!(_loc_9 && param1))
                        {
                            this._-4B.addEventListener(RemoteWebcamEvent._-1X, this._-B6);
                        }while (true)
                        
                    }
                    this._-4B.addEventListener(WebcamEvent._-3N, this._-92);
                    if (_loc_8 || _loc_3)
                    {
                    }while (true)
                    
                    this._-4B.addEventListener(WebcamEvent.use20, this._-2P);
                    ;
                    this._-4B = new Broadcaster();
                }
                ;
            }
            if (_loc_8)
            {
                if (!_loc_9)
                {
                }
            }
            var _loc_2:* = _-Az.camera.width == undefined ? (if (!_loc_8) goto 294, 320) : (if (_loc_9) goto 294, _-Az.camera.width);
            if (_loc_8 || _loc_2)
            {
            }
            if (_loc_8 || this)
            {
            }
            var _loc_3:* = _-Az.camera.height == undefined ? (if (!(_loc_8 || this)) goto 369, 240) : (if (_loc_9 && _loc_2) goto 370, _-Az.camera.height);
            ;
            _loc_7--;
            _loc_2 = _loc_9;
            _loc_5++;
            if (!(null >> -(null + null) && param1))
            {
            }
            if (!(_loc_9 && _loc_3))
            {
                if (_loc_8 || _loc_2)
                {
                }
            }
            var _loc_4:* = _-Az.camera.fps == undefined ? (if (_loc_9 && _loc_3) goto 457, 15) : (if (!(_loc_8 || _loc_2)) goto 457, _-Az.camera.fps);
            if (!_loc_9)
            {
            }
            if (_loc_8 || _loc_3)
            {
                if (!(_loc_9 && _loc_3))
                {
                }
            }
            var _loc_5:* = _-Az.camera.fav_area == undefined ? (if (!(_loc_8 || _loc_3)) goto 537, false) : (if (_loc_9 && _loc_3) goto 537, _-Az.camera.fav_area);
            if (_loc_8)
            {
                this._-4B.break(_loc_2, _loc_3, _loc_4, _loc_5);
                if (!(_loc_9 && this))
                {
                }
            }
            if (!(_loc_9 && this))
            {
            }
            var _loc_6:* = _-Az.bandWidth == undefined ? (if (_loc_9 && this) goto 617, 0) : (if (!_loc_8) goto 618, _-Az.bandWidth);
            if (_loc_8)
            {
            }
            if (!(_loc_9 && _loc_3))
            {
            }
            var _loc_7:* = _-Az.quality == undefined ? (if (_loc_9 && _loc_3) goto 679, 75) : (if (_loc_9 && this) goto 680, _-Az.quality);
            if (!(_loc_9 && _loc_3))
            {
                do
                {
                    
                    return true;
                    
                    addChild(this._-4B);
                    ;
                    _loc_4 = null;
                    _loc_2 = (null instanceof null) + 1 + _loc_3;
                    if (_loc_8)
                    {
                    }while (true)
                    this._-4B._-5a(_loc_6, _loc_7);
                }
            }
            ;
            return;
        }// end function

        private function liveCamPause() : void
        {
            ;
            _loc_3--;
            _loc_3--;
            var _loc_3:* = null as true * false;
            var _loc_4:String = null;
            if (!_loc_3)
            {
            }
            this._-4B._20var();
            try
            {
                if (_loc_4)
                {
                    if (!_loc_3)
                    {
                    }
                    ;
                    _loc_2++;
                    _loc_3++;
                }
                if (!_loc_3)
                {
                }
                if (this._-BR._20in.selected == true)
                {
                    if (!_loc_3)
                    {
                        this._-BR._-3.selected = false;
                    }
                }
            }
            catch (e)
            {
                ;
                _loc_2--;
                _loc_3++;
            }
            ExternalInterface.call("recievedFromFlash", "camera", this._-4B._-1P);
            return;
            return;
        }// end function

        private function liveMicPause() : void
        {
            ;
            var _loc_1:Boolean = false;
            var _loc_2:* = true is (typeof(false));
            if (!(_loc_1 && _loc_1))
            {
                do
                {
                    
                    return;
                    
                    ;
                    (ExternalInterface + (-"recievedFromFlash")).call(_loc_2, "microphone", this._-4B._-9e);
                }while (true)
                if (!this.default) goto 34;
                ;
                default xml namespace = _loc_2;
                with (_loc_2 % NaN + 1)
                {
                    if (!null)
                    {
                    }
                }
                this._-4B.liveMicPause();
                ;
                return;
        }// end function

        private function _-6F() : void
        {
            var _loc_1:Boolean = true;
            ;
            if (_loc_1)
            {
                ExternalInterface.call("recievedFromFlash", "reboot", true);
            }
            return;
            return;
        }// end function

        private function _-9a(event:WebcamControlsEvent) : void
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3--;
            var _loc_4:String = null;
            do
            {
                
                return;
                if (!_loc_4)
                {
                    if (_loc_3 || event)
                    {
                    }
                    case "previewButton":
                    {
                        this._-6F();
                    }while (true)
                    
                    return;
                    do
                    {
                    }
                    case _loc_4:
                    {
                        this._-By();
                        do
                        {
                            
                            return;
                        }while (true)
                        
                        this._-4B.connectToFMS();
                    }while (true)
                    
                    if (!this._-2H) goto 86;
                    this._-BR._-3q.enabled = true;
                }
                do
                {
                    
                    if (_loc_3)
                    {
                        if (!this._-46) goto 112;
                        this._-BR.pressToTalkButton.enabled = true;
                        do
                        {
                            
                        }while (!this.default)
                        this._-BR._-3.enabled = true;
                        do
                        {
                            
                        }
                    }while (!this._-Cm)
                    if (!_loc_4)
                    {
                        this._-BR._20in.enabled = true;
                        if (_loc_3 || event)
                        {
                            do
                            {
                            }
                            case "micButton":
                            {
                                this._-34 = this._-BR._-AO();
                            }while (true)
                            
                            return;
                        }while (true)
                        
                        this.liveMicPause();
                        do
                        {
                        }
                        case _loc_4:
                        {
                            this._-4B._-6i = true;
                            do
                            {
                                
                                return;
                            }while (true)
                            switch(event.type)
                            {
                                case _loc_3:
                                {
                                    switch(event.params.component)
                                    {
                                        case "camButton":
                                        {
                                            this.liveCamPause();
                                            if (_loc_3)
                                            {
                                            }while (true)
                                        }
                                        default:
                                        {
                                            break;
                                        }
                                    }
                                }
                                do
                                {
                                    
                                    return;
                                    
                                    this._-4B._-5m();
                                }
                            }while (true)
                            break;
                        }
                        case "buttonClicked":
                        {
                            switch(event.params.component)
                            {
                                case _loc_3:
                                {
                                    this._-4B._-6i = true;
                                }
                            }
                            continue;
                        }
                        default:
                        {
                            break;
                        }
                    }
                    if (!_loc_4)
                    {
                        do
                        {
                            
                            return;
                            if (_loc_3 || _loc_3)
                            {
                                if (false)
                                {
                                    
                                    if (!_loc_4)
                                    {
                                        this._-4B._-6i = false;
                                    }while (true)
                                    break;
                                }
                                case _loc_4:
                                {
                                    switch(event.params.component)
                                    {
                                        case "pressToTalkButton":
                                        {
                                        }
                                        this._-4B._-7r.clearAttachedMicrophone();
                                        continue;
                                    }
                                }
                                default:
                                {
                                    break;
                                }
                            }
                        }
                    }
                    break;
                }
                default:
                {
                    break;
                }
            }
            return;
            return;
        }// end function

        private function _-19(event:WebcamControlsEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            default xml namespace = null > false;
            _loc_2++;
            var _loc_3:* = null - 1;
            if (!(_loc_3 && this))
            {
                ;
                ;
                _loc_2++;
                _loc_2--;
                var _loc_2:* = null >> (_loc_3 - 1);
                
                return;
                
                this._-4B.microphone.gain = event.params.value;
                if (!_loc_3)
                {
                    ;
                    _loc_2--;
                    _loc_2++;
                    default xml namespace = null[null];
                    ;
                    this._-0.info("uiCtrls_sldrVolume_valueChangedHandler:>", event.params.value);
                }
            }
            ;
            return;
        }// end function

        private function _-2P(event:WebcamEvent) : void
        {
            ;
            _loc_2++;
            var _loc_2:* = true[false];
            var _loc_3:String = null;
            do
            {
                
                return;
                if (false)
                {
                    
                    if (_loc_3)
                    {
                        this._-4B.connectToFMS();
                        if (!(_loc_2 && this))
                        {
                        }while (true)
                        
                        if (!this._-2H) goto 30;
                    }
                    this._-BR._-3q.enabled = true;
                    do
                    {
                        
                    }
                    if (!_loc_2)
                    {
                        ;
                        _loc_2 = this._-4B;
                        _loc_2++;
                        (_loc_3 == _loc_2)._-7r.clearAttachedMicrophone();
                        do
                        {
                            
                            if (_loc_3)
                            {
                                if (!this._-46) goto 65;
                                if (!(_loc_2 && event))
                                {
                                    if (_loc_3)
                                    {
                                        this._-BR.pressToTalkButton.enabled = true;
                                    }while (true)
                                    
                                }while (!this.default)
                            }
                            this._-BR._-3.enabled = true;
                        }
                        do
                        {
                            
                            do
                            {
                                
                            }
                            if (!this._-Cm) goto 214;
                            this._-BR._20in.enabled = true;
                            continue;
                            ;
                            _loc_2++;
                            with (_loc_2)
                            {
                                if (null <= null) goto 23;
                            }
                        }while (!this._-4B.implements)
                        this.liveCamPause();
                    }while (true)
                }
                return;
        }// end function

        private function _-92(event:WebcamEvent) : void
        {
            ;
            _loc_2++;
            _loc_2++;
            var _loc_2:* = (true >= false) + (_loc_2 + 1);
            var _loc_3:String = null;
            ;
            _loc_2++;
            _loc_2++;
            if (!(null % _loc_2[null % _loc_2] && this))
            {
                if (this._-4B.implements)
                {
                    ;
                    _loc_2++;
                    _loc_2++;
                    _loc_2 = typeof(_loc_2);
                    if (!(null - event && this))
                    {
                        this.liveCamPause();
                    }
                }
            }
            return;
            return;
        }// end function

        private function _-B6(event:RemoteWebcamEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            _loc_2++;
            var _loc_3:String = null;
            if (!(_loc_3 && _loc_3))
            {
                do
                {
                    
                    return;
                    ;
                    _loc_2++;
                    
                    ExternalInterface.call("recievedFromFlash", "camera", "on");
                    if (_loc_2)
                    {
                    }while (true)
                    
                    ;
                    _loc_2++;
                    _loc_2--;
                    _loc_2--;
                    _loc_2--;
                    this._-4B.initSharedObjects();
                }
            }
            ;
            this._-4B._-68();
            return;
        }// end function

        override protected function resize_stage(event:Event) : void
        {
            ;
            _loc_2++;
            var _loc_2:* = true - false;
            _loc_2 = _loc_2;
            var _loc_3:String = null;
            do
            {
                
                return;
                if (false)
                {
                    
                    PreLoaderManager._-2Y();
                }while (true)
                
                PreLoaderManager.init(this);
                do
                {
                    
                    if (!_loc_2)
                    {
                        if (!this._-BR) goto 42;
                    }
                    ;
                    _loc_2 = stage;
                    _loc_2--;
                    _loc_2 = stage.stageWidth + 1;
                    null.setSize(this._-BR, _loc_2.stageHeight);
                    if (_loc_3)
                    {
                        do
                        {
                            
                            if (_loc_3)
                            {
                            }while (!this._-4B)
                        }
                        this._-4B.setSize(stage.stageWidth, stage.stageHeight);
                    }
                    if (_loc_3)
                    {
                        do
                        {
                            
                            super.resize_stage(event);
                        }while (true)
                        
                        ;
                        _loc_2--;
                        default xml namespace = null % ;
                        _loc_2++;
                        _loc_2++;
                        false.height = stage.stageHeight;
                    }
                }while (true)
                width = stage.stageWidth;
                ;
            }
            return;
        }// end function

        override protected function addRightClickMenu() : void
        {
            ;
            var _loc_1:* = null is null % (null ^ null / true[false]);
            var _loc_2:String = null;
            if (_loc_2)
            {
                do
                {
                    
                    return;
                    ;
                    default xml namespace = null;
                    _loc_3 = null;
                    
                    _-Bw._-5T("3.0.19911", true);
                    ;
                    if (!(((null === null) - (_loc_1 <= (_loc_2 >= _loc_2) - 1) <= null) + 1))
                    {
                    }
                }
            }while (true)
            super.addRightClickMenu();
            return;
        }// end function

    }
}
