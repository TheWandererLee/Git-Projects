package 4#
{
    import "5.*;
    import %2.*;
    import -4.*;
    import 19.*;
    import 25.*;
    import 65.*;
    import ;".*;
    import ;&.*;
    import ?#.*;
    import ?,.*;
    import ]$.*;
    import flash.display.*;
    import flash.events.*;

    public class Application extends SkinnableComponent
    {
        private var -:<>;
        private var ^5:Boolean = false;
        private var 9,:4;
        private var !<:77;
        private var 7=:1';
        private var -+:5#;
        private var ^<:XML;

        public function Application()
        {
            ;
            with (true / (-false))
            {
                var _loc_1:* = null - 1;
                var _loc_2:* = (null > null) + 1;
                do
                {
                    
                    return;
                    if (false)
                    {
                        
                        addEventListener(Event.ENTER_FRAME, this.07);
                    }while (true)
                    
                    addEventListener(Event.ENTER_FRAME, this.><);
                    if (_loc_2 || _loc_1)
                    {
                        do
                        {
                            
                            stage.addEventListener(KeyboardEvent.KEY_UP, this.34);
                            do
                            {
                                
                                stage.addEventListener(KeyboardEvent.KEY_DOWN, this.;8);
                            }
                        }while (true)
                        
                        this.[+();
                        if (_loc_2)
                        {
                        }while (true)
                        
                        stage.addEventListener(Event.RESIZE, this.resize_stage);
                        if (!_loc_1)
                        {
                            do
                            {
                                
                                super(width, height);
                                do
                                {
                                    
                                    ;
                                    null.3= = null * !(true in this.-+)[NaN / true];
                                }while (true)
                                
                                this.-+ = new 5#();
                            }
                        }while (true)
                        
                        this.7=.3= = true;
                        if (!(_loc_1 && _loc_2))
                        {
                            do
                            {
                                
                                this.7= = new 1'();
                                do
                                {
                                    
                                    if (_loc_2)
                                    {
                                        this.-.'+ = true;
                                    }while (true)
                                    
                                }
                                this.-.!' = true;
                            }
                            if (_loc_2 || this)
                            {
                            }while (true)
                            
                            this.- = new <>();
                        }
                        do
                        {
                            
                            PreLoaderManager._20>(this);
                            do
                            {
                                
                                ErrorManager._20>(this);
                            }while (true)
                            
                            ,&._20>(this.root.loaderInfo.parameters);
                        }while (true)
                        
                        this.stage.align = StageAlign.TOP_LEFT;
                        do
                        {
                            
                            ;
                            _loc_2 = NaN;
                            null.scaleMode = ((null | null === (this.stage === StageScaleMode.NO_SCALE | _loc_2)) > null) - 1;
                            continue;
                            this.9, = new 4("Application", false);
                        }
                    }while (true)
                }
                return;
        }// end function

        public function get case() : AssetsLoader
        {
            ;
            return (this ^ (null | (NaN | (null | this)))).-.loader;
            return;
        }// end function

        public function set case(param1:AssetsLoader) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            var _loc_3:* = _loc_2;
            if (!_loc_3)
            {
                this.-.loader = param1;
            }
            return;
            return;
        }// end function

        public function get @4() : XML
        {
            ;
            return null.-.xml;
            return;
        }// end function

        public function set @4(param1:XML) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2 = null <= false >= null;
            _loc_2 = null << null;
            var _loc_3:String = null;
            if (_loc_2)
            {
                this.-.xml = param1;
            }
            return;
            return;
        }// end function

        public function get licence() : 77
        {
            ;
            return NaN.!<;
            return;
        }// end function

        public function get %6() : 1'
        {
            ;
            return (null - (null | null + ~this > (NaN + 1))).7=;
            return;
        }// end function

        public function get ],() : 5#
        {
            ;
            return (!(typeof(null | this >> new activation >>> _loc_3) + 1)).-+;
            return;
        }// end function

        public function get ,$() : XML
        {
            ;
            return (null & null * (null - (this - 1)) in null in null).^<;
            return;
        }// end function

        private function [+() : void
        {
            ;
            var _loc_1:Boolean = false;
            ;
            var _loc_2:* = null + (null & null / (null + (null as (null instanceof true / false >= null >= !null + 1) + 1))) + 1;
            ;
            if ((undefined - 1) * (_loc_1 == _loc_2))
            {
            }
            if (!_loc_1)
            {
                20._20>(this);
            }
            return;
            return;
        }// end function

        private function 31(event:AssetsLoaderEvent) : void
        {
            ;
            _loc_2++;
            var _loc_2:* = _loc_2;
            _loc_2 = (true & false) % _loc_2 is false;
            var _loc_3:String = null;
            if (_loc_3)
            {
                do
                {
                    
                    return;
                    
                    ;
                    _loc_2++;
                    _loc_2++;
                    _loc_2--;
                    null.'+ = this.- >>> true is _loc_2;
                    if (!_loc_2)
                    {
                    }while (true)
                    
                    =" = this.-.loader.]4(0);
                }
                ;
                _loc_2++;
                var _loc_2:* = _loc_2;
                _loc_2--;
                _loc_2--;
            }
            ;
            this.9,.info("assetsLoader_LoadedHandler:>", "All Assets loaded.");
            return;
        }// end function

        private function assetXML_ErrorHandler(event:ReadXMLEvent) : void
        {
            ;
            _loc_2--;
            var _loc_2:String = null;
            _loc_2 = _loc_2;
            _loc_2 = null >> (null as true >= false);
            var _loc_3:String = null;
            if (!_loc_2)
            {
                do
                {
                    
                    return;
                    
                    ErrorManager.^"(event.params.errorID, "AXMLE", "0xFF0000");
                    ;
                    _loc_2--;
                }
            }while (true)
            
            if (_loc_3 || event)
            {
                this.9,.error("assetXML_ErrorHandler", "Error Text:", event.params.errorText);
                ;
                ;
                _loc_2++;
                _loc_2--;
                _loc_2--;
            }
            this.9,.error("assetXML_ErrorHandler", "Error ID", event.params.errorID);
            return;
        }// end function

        private function null(event:ReadXMLEvent) : void
        {
            ;
            _loc_2++;
            _loc_2++;
            _loc_2++;
            var _loc_2:* = null[false / true];
            _loc_2--;
            _loc_2 = null;
            var _loc_3:String = null;
            if (!_loc_2)
            {
                do
                {
                    
                    return;
                    
                    this.9,.info("assetXML_LoadedHandler:>", "Assets XML loaded.");
                }while (true)
                
                if (_loc_3 || _loc_2)
                {
                    this.-.!' = true;
                    ;
                    _loc_2--;
                    _loc_2++;
                    _loc_2--;
                    do
                    {
                        
                    }
                    this.-.xml = event.currentTarget.xmlData;
                    if (_loc_3 || this)
                    {
                        do
                        {
                            
                            event.currentTarget.removeEventListener(ReadXMLEvent.?0, this.assetXML_SecurityErrorHandler);
                        }while (true)
                        
                        event.currentTarget.removeEventListener(ReadXMLEvent.%3, this.assetXML_ErrorHandler);
                        continue;
                        _loc_2++;
                        _loc_2++;
                        _loc_2++;
                        var _loc_2:* = _loc_2;
                        _loc_2++;
                    }while (true)
                    event.currentTarget.removeEventListener(ReadXMLEvent.?&, this.null);
                }
            }
            return;
        }// end function

        private function assetXML_SecurityErrorHandler(event:ReadXMLEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2++;
            var _loc_3:Number = NaN;
            if (!(_loc_3 && _loc_3))
            {
                do
                {
                    
                    return;
                    
                    ErrorManager.^"(event.params.errorID, "AXMLSE", "0xFF0000");
                    if (_loc_2)
                    {
                        continue;
                        _loc_2 = _loc_3;
                        _loc_2++;
                        _loc_2++;
                        _loc_2++;
                        _loc_2++;
                        _loc_2--;
                    }while (true)
                    
                    this.9,.error("assetXML_SecurityErrorHandler", "Error Text:", event.params.errorText);
                }
                if (!(_loc_3 && _loc_3))
                {
                    ;
                    ;
                    _loc_2--;
                    _loc_3 = null is null + (null + ((null << false) + null));
                    _loc_2--;
                    _loc_2--;
                    _loc_2--;
                    this.9,.error("assetXML_SecurityErrorHandler", "Error ID", event.params.errorID);
                }
            }
            ;
            return;
        }// end function

        private function 07(event:Event) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = false;
            _loc_2++;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            _loc_2--;
            _loc_2--;
            var _loc_3:* = _loc_2 < null;
            if (!(_loc_3 && this))
            {
                do
                {
                    
                    return;
                    
                    this.9,.info("assets_EnterFrameHandler:>", "Assets and XML Data Have Been Received.....");
                }
            }while (true)
            
            this.^5 = true;
            if (_loc_2 || event)
            {
                ;
                ;
                _loc_2++;
                _loc_2++;
                
                dispatchEvent(new ApplicationEvent(ApplicationEvent.@", {}));
            }
            do
            {
                
                if (_loc_2)
                {
                    if (_loc_2 || this)
                    {
                    }
                    
                    if (!this.-.!') goto 42;
                    removeEventListener(Event.ENTER_FRAME, this.07);
                    continue;
                }
                if (!_loc_2)
                {
                    ;
                    _loc_2--;
                    _loc_2++;
                    _loc_2--;
                    _loc_2--;
                    _loc_2++;
                    var _loc_2:* = this.-.'+ ^ (_loc_2 + 1);
                }
                if (event)
                {
                }
            }while (true)
            return;
        }// end function

        private function ><(event:Event) : void
        {
            ;
            default xml namespace = NaN;
            _loc_2++;
            var _loc_2:* = null[null as null * (null as true >= false)];
            var _loc_3:String = null;
            if (_loc_3)
            {
                do
                {
                    
                    return;
                    
                    dispatchEvent(new ApplicationEvent(ApplicationEvent.COMPLETE, {}));
                    if (_loc_3 || this)
                    {
                    }while (true)
                    
                    if (_loc_3 || this)
                    {
                    }
                    
                    if (!this.^5) goto 31;
                    ;
                    var _loc_2:* = _loc_2 * _loc_2 >= null;
                    if (!_loc_2)
                    {
                        removeEventListener(Event.ENTER_FRAME, this.><);
                    }
                }
                if (_loc_3 || _loc_3)
                {
                    do
                    {
                        
                        if (!_loc_2)
                        {
                            
                        }
                        if (!this.7=.3=) goto 107;
                    }
                    if (!(_loc_2 && _loc_3))
                    {
                        ;
                        _loc_2--;
                        _loc_2 = null - (null << null);
                        _loc_2++;
                        continue;
                    }
                }
            }while (true)
            return;
        }// end function

        private function licence_ErrorHandler(event:LicenceReaderEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            with (false)
            {
                _loc_2++;
                _loc_2++;
                _loc_2++;
                _loc_2--;
                var _loc_3:* = !((null == null) - 1);
                if (_loc_2 || _loc_3)
                {
                    do
                    {
                        
                        return;
                        
                        if (!(_loc_3 && this))
                        {
                            this.9,.error("licence_ErrorHandler", "Error Text:", event.params.errorText);
                        }while (true)
                        
                    }
                    ;
                    _loc_2--;
                    _loc_2--;
                    _loc_2++;
                    _loc_2++;
                    _loc_2--;
                    null.error(null >>> null, "Error ID", event.params.errorID);
                    if (!_loc_3)
                    {
                        do
                        {
                            
                            ErrorManager.^"(event.params.errorID, "LXMLE", "0xFF0000");
                        }
                        do
                        {
                            
                            this.!<.removeEventListener(LicenceReaderEvent.SECURITY_ERROR, this.licence_SecurityErrorHandler);
                        }
                    }while (true)
                    
                    this.!<.removeEventListener(LicenceReaderEvent.7!, this._204);
                    continue;
                    _loc_2 = null;
                    _loc_2--;
                    _loc_2--;
                    _loc_2++;
                    _loc_2--;
                    _loc_2++;
                }while (true)
                this.!<.removeEventListener(LicenceReaderEvent.ERROR, this.licence_ErrorHandler);
                return;
        }// end function

        private function _204(event:LicenceReaderEvent) : void
        {
            ;
            _loc_2++;
            _loc_2--;
            _loc_4++;
            _loc_2++;
            var _loc_4:Number = false;
            var _loc_5:* = _loc_3;
            if (!(_loc_4 && this))
            {
                do
                {
                    
                    if (_loc_5)
                    {
                        this.!<.removeEventListener(LicenceReaderEvent.SECURITY_ERROR, this.licence_SecurityErrorHandler);
                        
                    }
                    this.!<.removeEventListener(LicenceReaderEvent.7!, this._204);
                }
            }while (true)
            this.!<.removeEventListener(LicenceReaderEvent.ERROR, this.licence_ErrorHandler);
            ;
            var _loc_2:* = event.currentTarget.status;
            do
            {
                
                break;
            }
            case "active":
            {
            }
            default:
            {
                ErrorManager.^"("010010", "LXMLE", "0xFF0000");
                if (_loc_4)
                {
                    ;
                    _loc_2++;
                    _loc_2 = _loc_3;
                    _loc_4--;
                }
                if (!_loc_2)
                {
                    
                    ErrorManager.^"("020320", "DXMLE", "0xFF0000");
                }while (true)
                
                do
                {
                    
                    this.9,.error("licence_LoadedHandler:>", "Domain was not found in Licence File.");
                    do
                    {
                        
                        dispatchEvent(new ApplicationEvent(ApplicationEvent.^$, {}));
                    }
                    continue;
                    switch(_loc_2.toLowerCase())
                    {
                        case _loc_4:
                        {
                        }while (!?6.=!(event.currentTarget.domains))
                        this.7=.3= = true;
                    }while (true)
                    break;
                }
            }
            return;
            return;
        }// end function

        private function 40(param1:String, param2:String) : void
        {
            ;
            param2 = _loc_3 - 1;
            var _loc_3:* = false + _loc_3 < true;
            var _loc_4:String = null;
            if (!_loc_3)
            {
                do
                {
                    
                    return;
                    
                    this.!<.addEventListener(LicenceReaderEvent.SECURITY_ERROR, this.licence_SecurityErrorHandler);
                    ;
                    with (_loc_3)
                    {
                        _loc_2++;
                        _loc_2++;
                    }
                }while (true)
                
                if (_loc_4)
                {
                    this.!<.addEventListener(LicenceReaderEvent.7!, this._204);
                    do
                    {
                        
                    }
                    this.!<.addEventListener(LicenceReaderEvent.ERROR, this.licence_ErrorHandler);
                    continue;
                    
                    this.!<.]#(param1, _loc_2);
                    ;
                    _loc_2++;
                    _loc_3++;
                    _loc_3++;
                    _loc_3++;
                    if (_loc_4 & _loc_3[_loc_2] || param1)
                    {
                    }while (true)
                    this.!< = new 77();
                }
                return;
        }// end function

        private function licence_SecurityErrorHandler(event:LicenceReaderEvent) : void
        {
            ;
            var _loc_2:* = null + 1;
            var _loc_2:String = null;
            var _loc_3:* = (false in true) > null;
            do
            {
                
                return;
                
                if (_loc_3 || _loc_2)
                {
                    this.9,.error("licence_SecurityErrorHandler", "Error Text:", event.params.errorText);
                }while (true)
                
            }
            this.9,.error("licence_SecurityErrorHandler", "Error ID", event.params.errorID);
            ;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            if (!(null && null - ((_loc_2 as this) + 1) > null))
            {
                do
                {
                    
                    ErrorManager.^"(event.params.errorID, "LXMLSE", "0xFF0000");
                }
                if (_loc_3 || _loc_3)
                {
                    do
                    {
                        
                        this.!<.removeEventListener(LicenceReaderEvent.SECURITY_ERROR, this.licence_SecurityErrorHandler);
                    }
                }while (true)
                
                if (!_loc_2)
                {
                    this.!<.removeEventListener(LicenceReaderEvent.7!, this._204);
                    continue;
                    _loc_2 = _loc_2 - new activation;
                }while (true)
            }
            this.!<.removeEventListener(LicenceReaderEvent.ERROR, this.licence_ErrorHandler);
            return;
        }// end function

        private function settings_ErrorHandler(event:ReadXMLEvent) : void
        {
            ;
            var _loc_2:Boolean = false;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            var _loc_3:String = this;
            _loc_2++;
            _loc_2 = _loc_2 + 1;
            _loc_3 = true;
            do
            {
                
                return;
                
                if (_loc_3)
                {
                    this.9,.error("settings_ErrorHandler", "Error Text:", event.params.errorText);
                    ;
                    default xml namespace = _loc_2;
                    _loc_2--;
                    _loc_2 = _loc_2;
                    _loc_2++;
                    _loc_2--;
                    _loc_2++;
                    _loc_2++;
                }while (true)
                
            }
            this.9,.error("settings_ErrorHandler", "Error ID", event.params.errorID);
            do
            {
                
                ErrorManager.^"(event.params.errorID, "SXMLE", "0xFF0000");
                do
                {
                    
                    event.currentTarget.removeEventListener(ReadXMLEvent.?0, this.settings_SecurityErrorHandler);
                }while (true)
                
                event.currentTarget.removeEventListener(ReadXMLEvent.%3, this.settings_ErrorHandler);
                continue;
                _loc_2++;
                _loc_2--;
                _loc_2--;
                _loc_2++;
                _loc_2 = null;
                _loc_2 = null + 1;
            }while (true)
            event.currentTarget.removeEventListener(ReadXMLEvent.?&, this.<4);
            return;
        }// end function

        private function <4(event:ReadXMLEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2--;
            _loc_2 = null >>> false;
            _loc_2++;
            var _loc_3:* = null + (null + null);
            if (_loc_2)
            {
                do
                {
                    
                    return;
                    
                }while (this.7=.3= != false)
            }
            ;
            _loc_2 = _loc_2;
            _loc_2--;
            if (!(this / !(null + 1) && _loc_2))
            {
            }
            this.7=.location.40(this.7=."# + "_", _loc_3 + this.7=."");
            do
            {
                
                this.-+.3= = true;
                do
                {
                    
                    this.7=."" = this.^<.licence;
                    if (_loc_2)
                    {
                    }while (true)
                    
                    this.^< = event.currentTarget.xmlData;
                }while (true)
                
                event.currentTarget.removeEventListener(ReadXMLEvent.?0, this.settings_SecurityErrorHandler);
                do
                {
                    
                    event.currentTarget.removeEventListener(ReadXMLEvent.%3, this.settings_ErrorHandler);
                    ;
                    _loc_2 = _loc_2;
                    _loc_2 = _loc_2;
                    _loc_2--;
                    _loc_2++;
                }
                continue;
                event.currentTarget.removeEventListener(ReadXMLEvent.?&, this.<4);
            }while (true)
            return;
        }// end function

        private function ]2(param1:String, param2:String = "settings", param3:String = "xml") : void
        {
            ;
            param2++;
            param3++;
            _loc_5--;
            param2--;
            var _loc_5:* = param2;
            var _loc_6:* = _loc_3;
            var _loc_4:* = new ReadXML();
            new ReadXML().4!(param1, param2, _loc_3);
            if (!_loc_5)
            {
                do
                {
                    
                    return;
                    ;
                    _loc_4--;
                    param2--;
                    
                    _loc_4.addEventListener(ReadXMLEvent.?0, this.settings_SecurityErrorHandler);
                }
            }while (true)
            
            ;
            _loc_3--;
            _loc_4--;
            _loc_4 = new activation;
            param2--;
            (_loc_5 << _loc_5).addEventListener(_loc_4, ReadXMLEvent.%3[param2]);
            ;
            _loc_4.addEventListener(ReadXMLEvent.?&, this.<4);
            return;
        }// end function

        private function settings_SecurityErrorHandler(event:ReadXMLEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            var _loc_3:* = _loc_2;
            do
            {
                
                return;
                
                if (!(_loc_3 && this))
                {
                    this.9,.error("settings_SecurityErrorHandler", "Error Text:", event.params.errorText);
                    continue;
                    var _loc_2:* = _loc_2;
                    _loc_2++;
                    _loc_2--;
                }while (true)
                
            }
            this.9,.error("settings_SecurityErrorHandler", "Error ID", event.params.errorID);
            do
            {
                
                ErrorManager.^"(event.params.errorID, "SXMLSE", "0xFF0000");
                do
                {
                    
                    event.currentTarget.removeEventListener(ReadXMLEvent.?0, this.settings_SecurityErrorHandler);
                }while (true)
                
                event.currentTarget.removeEventListener(ReadXMLEvent.%3, this.settings_ErrorHandler);
                continue;
                _loc_2--;
                _loc_2--;
                _loc_2--;
                _loc_2--;
                _loc_2++;
                _loc_2--;
            }while (true)
            event.currentTarget.removeEventListener(ReadXMLEvent.?&, this.<4);
            return;
        }// end function

        protected function 5,(param1:String, param2:String, param3:String = "TFC Software") : void
        {
            ;
            param3--;
            var _loc_4:Boolean = false;
            _loc_4++;
            param2++;
            _loc_4 = true;
            _loc_4++;
            param3--;
            _loc_4 = null;
            var _loc_5:String = null;
            if (_loc_5)
            {
                do
                {
                    
                    return;
                    
                    if (_loc_5)
                    {
                        this.7=."" = param3;
                        ;
                        with (null)
                        {
                            param2++;
                            _loc_4--;
                        }while (true)
                        
                    }
                    this.7=.3= = false;
                }
                ;
                
                ;
                param3 = typeof(this)[this];
                param3--;
                param3--;
                (_loc_4 > _loc_2).7=.location = param1;
                ;
                this.7=."# = _loc_2;
                return;
        }// end function

        protected function 8+(param1:String, param2:String, param3:String = "xml") : void
        {
            var _loc_4:Boolean = true;
            ;
            param2--;
            param2++;
            default xml namespace = null * (null << (typeof(false)));
            param3 = null;
            param2--;
            var _loc_5:String = null;
            if (!(_loc_5 && param1))
            {
                do
                {
                    
                    return;
                    
                    this.]2(this.-+.#8, this.-+.,2, this.-+.%);
                    if (!(_loc_5 && param2))
                    {
                        ;
                        _loc_4--;
                        param2--;
                        _loc_4 = _loc_4;
                        with (null)
                        {
                            param2++;
                        }while (true)
                        
                        this.-+.3= = false;
                    }
                }
                do
                {
                    
                    if (_loc_4)
                    {
                        if (!_loc_5)
                        {
                            this.-+.#8 = param1;
                            continue;
                            
                        }
                        ;
                        param3 = undefined;
                        param2--;
                        param2++;
                        ((this + 1)).,2 = param1;
                    }while (true)
                }
                this.-+.% = param3;
                return;
        }// end function

        protected function [8(param1:String) : void
        {
            ;
            var _loc_2:* = _loc_3 * null;
            var _loc_3:Boolean = false;
            var _loc_4:Boolean = true;
            do
            {
                
                if (!_loc_3)
                {
                    if (!(_loc_3 && _loc_3))
                    {
                        this.-.loader.73();
                        
                    }
                    if (!(_loc_3 && _loc_3))
                    {
                        this.-.loader.addEventListener(AssetsLoaderEvent.7!, this.31);
                    }while (true)
                    
                }
                this.-.loader._203(this.-.`4 + ".swf");
                do
                {
                    
                    this.9,.info("loadSWFAssets Getting Asset:", this.-.`4 + ".swf");
                    continue;
                    ;
                    _loc_3 = null;
                    _loc_2++;
                    _loc_3++;
                    _loc_2--;
                    
                }
                this.-.`4 = param1;
                if (_loc_4)
                {
                }while (true)
                
                if (!(_loc_3 && _loc_3))
                {
                    this.-.!' = false;
                    ;
                    
                }
                this.-.'+ = false;
            }
            ;
            this.-.loader = new AssetsLoader();
            var _loc_2:* = new ReadXML();
            if (!_loc_3)
            {
                do
                {
                    
                    return;
                    
                    _loc_2.addEventListener(ReadXMLEvent.?0, this.assetXML_SecurityErrorHandler);
                    if (!_loc_3)
                    {
                    }while (true)
                    
                    _loc_2.addEventListener(ReadXMLEvent.%3, this.assetXML_ErrorHandler);
                }
            }
            ;
            
            ;
            _loc_3 = this.null;
            _loc_3 = ReadXMLEvent.?&;
            _loc_2++;
            _loc_3 = (_loc_3 < NaN > _loc_2) - null;
            null.addEventListener(null, undefined);
            ;
            _loc_2.4!("", this.-.`4);
            return;
        }// end function

        protected function resize_stage(event:Event) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2--;
            var _loc_2:Number = NaN;
            _loc_2 = this;
            ;
            _loc_2 = null + null % false;
            var _loc_3:* = null + null > null;
            _loc_2++;
            _loc_3 = null as null;
            if (!(_loc_3 && _loc_2))
            {
                update();
            }
            return;
            return;
        }// end function

        protected function ;8(event:KeyboardEvent) : void
        {
            return;
            return;
        }// end function

        protected function 34(event:KeyboardEvent) : void
        {
            return;
            return;
        }// end function

    }
}
