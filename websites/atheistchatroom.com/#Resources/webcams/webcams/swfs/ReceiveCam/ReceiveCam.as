package 
{
    import !$.*;
    import "5.*;
    import 19.*;
    import 4#.*;
    import ;".*;
    import ?#.*;
    import ReceiveCam.*;
    import ]$.*;
    import _20null.*;
    import flash.events.*;

    public class ReceiveCam extends Application
    {
        private var '3:Receiver;
        private var 9':ReceiverControls;
        private var 1=:Boolean;
        private var #:Boolean;
        private var _200:Boolean;
        private var ?":Boolean;
        private var 9,:4;

        public function ReceiveCam()
        {
            ;
            var _loc_2:* = -false;
            _loc_2++;
            _loc_2++;
            _loc_2 = null;
            var _loc_3:String = null;
            if (!_loc_2)
            {
                do
                {
                    
                    8+(,&.,;("settingsURL", ""), ,&.,;("settingsFile", "settings"));
                }
                
                if (!(_loc_2 && this))
                {
                }while (true)
                
                ;
                _loc_2++;
                _loc_2 = _loc_2;
                _loc_2--;
                _loc_2++;
                stage.setSize(-!null, _loc_1.stageHeight);
            }
            ;
            this.9, = new 4("ReceiveCam", false);
            var _loc_1:* = ,&.,;("assets", "demoAssets");
            if (_loc_3 || _loc_1)
            {
                do
                {
                    
                    return;
                    
                    addEventListener(ApplicationEvent.COMPLETE, this._20%);
                    if (!_loc_2)
                    {
                    }while (true)
                    
                    PreLoaderManager.0>();
                }
                if (_loc_2)
                {
                    ;
                    _loc_2--;
                    _loc_2++;
                    _loc_2--;
                }
                if (!_loc_1)
                {
                    ;
                    this.[8(_loc_1);
                }
            }
            return;
        }// end function

        public function loadEffect(param1:String) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2++;
            _loc_2--;
            var _loc_3:* = _loc_2;
            if (!_loc_3)
            {
                this.'3.loadEffect(param1);
            }
            return;
            return;
        }// end function

        private function _20%(event:ApplicationEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2--;
            _loc_2++;
            var _loc_3:* = -(_loc_2 < _loc_2);
            if (_loc_2)
            {
                do
                {
                    
                    return;
                    
                    this.resize_stage(null);
                    ;
                    _loc_2--;
                    _loc_2--;
                    var _loc_2:* = _loc_2 < NaN;
                    _loc_2--;
                    if (false || this ^ _loc_2)
                    {
                    }while (true)
                    
                    this.'3.connectToFMS();
                }
                if (!_loc_3)
                {
                    do
                    {
                        
                        if (!this.==()) goto 39;
                        ;
                        var _loc_2:Boolean = false;
                        _loc_2--;
                        _loc_2--;
                        NaN.info("completeHandler:>", "Trying to Connect To FMS.");
                    }
                }
                continue;
            }while (this.&6())
            return;
            ;
            return;
        }// end function

        private function ==() : Boolean
        {
            ;
            var _loc_1:* = -false;
            var _loc_2:Boolean = false;
            do
            {
                
                return true;
                
                this.1= = this.9'.#'("micVolume", this.'3.microphone.gain);
                if (!(_loc_1 && this))
                {
                }while (true)
                
                this.?" = this.9'.!5("snapShotButton");
            }
            do
            {
                
                this._200 = this.9'.35("spkrButton");
                if (!(_loc_1 && _loc_2))
                {
                    do
                    {
                        
                        this.# = this.9'.[9("camButton");
                        ;
                        if (!_loc_1)
                        {
                        }while (true)
                        
                        if (_loc_2 || _loc_2)
                        {
                            this.9'.4+ = @4.general_settings.ui_controls.roll_over;
                        }while (true)
                        
                    }
                    this.9'.2< = @4.general_settings.ui_controls.roll_out;
                }
                do
                {
                    
                    this.9'.#6 = @4.receive;
                    do
                    {
                        
                        addChild(this.9');
                    }while (true)
                    
                    this.9'.addEventListener(WebcamControlsEvent.7&, this.;=);
                }
            }while (true)
            
            ;
            with (WebcamControlsEvent.>! + this.8#)
            {
                _loc_3 = undefined;
                _loc_2 = typeof(false);
                null.addEventListener(null, (null * (null + null * (true & -false % _loc_3)) + (this ^ this) <= this as this.9') < null);
                ;
                this.9' = new ReceiverControls(width, height);
                return;
        }// end function

        private function &6() : Boolean
        {
            var _loc_7:Boolean = true;
            ;
            _loc_2++;
            _loc_7--;
            _loc_6++;
            _loc_2--;
            do
            {
                
                if (!_loc_8)
                {
                    this.'3.%, = ,$.applicationID;
                    
                }
                if (_loc_7)
                {
                    this.'3.56 = ,$.serverURL;
                }while (true)
                
                this.'3.rtmpType = ,$.rtmpType;
                do
                {
                    
                }
                this.'3.&1 = ,&.,;("streamName", null);
                if (_loc_7 || _loc_1)
                {
                    do
                    {
                        
                        this.'3.addEventListener(RemoteWebcamEvent.+-, this.6');
                    }
                }while (true)
                
                this.'3.addEventListener(RemoteWebcamEvent.>", this.in);
            }while (true)
            this.'3 = new Receiver();
            ;
            if (!(_loc_8 && this))
            {
                if (_loc_7)
                {
                }
            }
            var _loc_1:* = ,$.camera.width == undefined ? (if (_loc_8 && this) goto 308, 320) : (if (!_loc_7) goto 308, ,$.camera.width);
            if (_loc_7 || this)
            {
            }
            if (_loc_7 || this)
            {
                if (!_loc_8)
                {
                }
            }
            var _loc_2:* = ,$.camera.height == undefined ? (if (!(_loc_7 || this)) goto 376, 240) : (if (_loc_8) goto 376, ,$.camera.height);
            ;
            var _loc_3:String = this;
            _loc_6++;
            _loc_4++;
            if (~(null instanceof (null is false) + _loc_7) || null)
            {
            }
            if (_loc_7 || _loc_2)
            {
            }
            _loc_3 = ,$.camera.fps == undefined ? (if (!(_loc_7 || _loc_2)) goto 466, 15) : (if (_loc_8 && _loc_1) goto 467, ,$.camera.fps);
            if (_loc_7)
            {
            }
            if (_loc_7 || _loc_1)
            {
                if (_loc_7 || _loc_3)
                {
                }
            }
            var _loc_4:* = ,$.camera.fav_area == undefined ? (if (!(_loc_7 || _loc_1)) goto 538, false) : (if (!(_loc_7 || _loc_3)) goto 538, ,$.camera.fav_area);
            if (_loc_7 || this)
            {
                this.'3.'-(_loc_1, _loc_2, _loc_3, _loc_4);
            }
            if (_loc_7 || _loc_3)
            {
                if (_loc_7)
                {
                }
            }
            var _loc_5:* = ,$.bandWidth == undefined ? (if (!(_loc_7 || _loc_3)) goto 626, 0) : (if (!_loc_7) goto 626, ,$.bandWidth);
            if (!(_loc_8 && _loc_3))
            {
            }
            if (_loc_7 || this)
            {
                if (!(_loc_8 && _loc_3))
                {
                }
            }
            var _loc_6:* = ,$.quality == undefined ? (if (!(_loc_7 || this)) goto 696, 75) : (if (_loc_8 && _loc_3) goto 696, ,$.quality);
            if (_loc_7 || _loc_2)
            {
                do
                {
                    
                    return true;
                    
                    addChild(this.'3);
                    ;
                    _loc_3++;
                    _loc_3 = this;
                    _loc_2++;
                    var _loc_2:* = _loc_3;
                    if (!(_loc_8 && true))
                    {
                    }while (true)
                    this.'3.<,(_loc_5, _loc_6);
                }
            }
            return;
        }// end function

        private function 8#(event:WebcamControlsEvent) : void
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3--;
            _loc_2++;
            _loc_3++;
            _loc_2++;
            var _loc_4:String = this;
            switch(event.params.component)
            {
                case -NaN:
                {
                    if (_loc_3)
                    {
                        this.'3.88();
                        break;
                    }
                    case "camButton":
                    {
                    }
                    this.'3."<();
                    if (_loc_3)
                    {
                        break;
                    }
                    default:
                    {
                        break;
                    }
                }
            }
            return;
            return;
        }// end function

        private function ;=(event:WebcamControlsEvent) : void
        {
            ;
            var _loc_2:* = (false >> new activation) + 1;
            default xml namespace = true in null;
            _loc_2 = event;
            var _loc_3:String = null;
            if (!_loc_2)
            {
                do
                {
                    
                    return;
                    
                    ;
                    _loc_2--;
                    var _loc_2:* = _loc_2;
                    _loc_2.74.volume = event.params.value / 100;
                }
            }while (true)
            ;
            _loc_2++;
            var _loc_2:* = null ^ null[this.'3] * _loc_2 * this;
            _loc_2 = null;
            _loc_2++;
            this.9,.info("uiCtrls_sldrVolume_valueChangedHandler:>", event.params.value / 100);
            return;
        }// end function

        private function in(event:RemoteWebcamEvent) : void
        {
            ;
            _loc_2++;
            _loc_2++;
            _loc_2--;
            var _loc_2:* = null is true + (false - 1);
            _loc_2 = null ^ null;
            var _loc_3:String = null;
            if (!_loc_2)
            {
                this.'3.initSharedObjects();
            }
            return;
            return;
        }// end function

        private function 6'(event:RemoteWebcamEvent) : void
        {
            return;
            return;
        }// end function

        override protected function resize_stage(event:Event) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            _loc_3 = false + 1;
            if (_loc_2)
            {
                do
                {
                    
                    return;
                    
                    PreLoaderManager.0();
                }while (true)
                
                PreLoaderManager._20>(this);
                do
                {
                    
                    if (!_loc_3)
                    {
                        if (!this.9') goto 50;
                    }
                    ;
                    _loc_2--;
                    _loc_2--;
                    _loc_2--;
                    _loc_2.setSize(_loc_2.stageWidth, stage.stageHeight);
                }
                do
                {
                    
                    if (!(_loc_3 && event))
                    {
                    }while (!this.'3)
                }
                this.'3.setSize(stage.stageWidth, stage.stageHeight);
                do
                {
                    
                    super.resize_stage(event);
                }while (true)
                
                ;
                with ()
                {
                    _loc_2--;
                    _loc_2++;
                    _loc_2++;
                    (this is -NaN).height = stage.stageHeight;
                }while (true)
                width = stage.stageWidth;
                ;
                return;
        }// end function

    }
}
