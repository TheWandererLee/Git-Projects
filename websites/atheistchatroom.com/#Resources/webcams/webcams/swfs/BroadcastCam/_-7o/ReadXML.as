package _-7o
{
    import *.*;
    import _-22.*;
    import _-4Y.*;
    import _-BG.*;
    import flash.events.*;
    import flash.net.*;

    public class ReadXML extends EventDispatcher
    {
        protected var _-1p:String;
        protected var _-6M:Boolean = false;
        protected var _-5s:Boolean = true;
        protected var _-3Z:XML;
        private var _-0:_-A4;

        public function ReadXML(param1:String = null)
        {
            ;
            _loc_2++;
            _loc_2++;
            _loc_2++;
            var _loc_2:* = _loc_2;
            var _loc_3:Boolean = false;
            if (_loc_3)
            {
                do
                {
                    
                    return;
                    
                }while (true)
                
                this._-1p = param1;
                ;
                _loc_2--;
                var _loc_2:* = _loc_3 - 1;
                if (-true || _loc_3)
                {
                    do
                    {
                        
                        if (!(param1 == null)) goto 41;
                    }
                }
                this._-1p = "ReadXMLFile";
                continue;
                continue;
                _loc_2 = null;
                _loc_2++;
                _loc_2 = null;
                _loc_2++;
                _loc_2 = null / null;
                
            }while (true)
            this._-0 = new _-A4("ReadXML");
            ;
            return;
        }// end function

        public function get _-5P() : String
        {
            ;
            _loc_2 = (this - 1)[new activation];
            return null._-1p;
            return;
        }// end function

        public function set _-5P(param1:String) : void
        {
            ;
            _loc_2++;
            _loc_2--;
            var _loc_2:Boolean = true;
            var _loc_3:* = param1;
            ;
            _loc_2 = this;
            _loc_2++;
            default xml namespace = ~(-((true & false) + 1));
            if (!(_loc_2 && _loc_3))
            {
                this._-1p = param1;
            }
            return;
            return;
        }// end function

        public function get _-0Y() : Boolean
        {
            ;
            return (this / (this >>> null))._-6M;
            return;
        }// end function

        public function set _-0Y(param1:Boolean) : void
        {
            ;
            _loc_2++;
            _loc_2++;
            var _loc_2:* = _loc_2 >>> (_loc_2 + 1);
            var _loc_3:Boolean = false;
            ;
            _loc_2--;
            _loc_2++;
            _loc_2++;
            if (!(_loc_2 && param1))
            {
                this._-6M = param1;
            }
            return;
            return;
        }// end function

        public function get _-B0() : Boolean
        {
            ;
            with (true)
            {
                return (-~null[this])._-5s;
                return;
        }// end function

        public function set _-B0(param1:Boolean) : void
        {
            ;
            _loc_2--;
            var _loc_2:* = true >= false == null;
            var _loc_3:String = null;
            if (!_loc_2)
            {
                this._-5s = param1;
            }
            return;
            return;
        }// end function

        public function get xmlData() : XML
        {
            ;
            default xml namespace = null as null % this;
            return (null instanceof _loc_1)._-3Z;
            return;
        }// end function

        public function set xmlData(param1:XML) : void
        {
            ;
            _loc_2--;
            _loc_2--;
            _loc_2++;
            _loc_2++;
            var _loc_2:Number = false;
            var _loc_3:Boolean = true;
            ;
            _loc_2++;
            _loc_2--;
            if (!(_loc_2 && _loc_2))
            {
                this._-3Z = param1;
            }
            return;
            return;
        }// end function

        public function _-8j() : void
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = null - (null & typeof(null[~false]));
            if (_loc_1)
            {
                do
                {
                    
                    return;
                    
                    trace("***********************************");
                    ;
                    default xml namespace = (null is null) >= null;
                    if (!_loc_2)
                    {
                    }while (true)
                    
                    ;
                    null.trace((((typeof(null) in null) - 1) * ( >  == undefined) + 1 + 1).XML(this._-3Z));
                }
            }
            ;
            trace("resultHandler: ********************");
            ;
            return;
        }// end function

        public function _-CA(param1:String, param2:String, param3:String = ".xml") : void
        {
            var _loc_4:Boolean = true;
            ;
            param3++;
            _loc_4--;
            param3 = false << new activation;
            param3++;
            var _loc_5:String = null;
            if (_loc_4 || param3)
            {
                do
                {
                    
                    return;
                    
                    this.readXMLFromURL2(param1 + param2 + param3);
                    if (!_loc_5)
                    {
                    }while (true)
                    
                    if (_loc_4 || param2)
                    {
                        ;
                        param3++;
                        param3 = _loc_5;
                        param2++;
                        _loc_4--;
                        if (null.charAt(0) == ".") goto 46;
                    }
                    param3 = "." + param3;
                }
                if (_loc_4 || param1)
                {
                    ;
                    if (!(param1.length > 0)) goto 67;
                }
                if (param1.charAt((param1.length - 1)) == "/") goto 67;
                if (!_loc_4)
                {
                    ;
                    _loc_2--;
                    var _loc_2:* = param2;
                }
                if (param1)
                {
                    param1 = param1 + "/";
                }
            }
            ;
            return;
        }// end function

        public function readXMLFromURL2(param1:String) : void
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3 = false;
            var _loc_2:String = null;
            _loc_2--;
            _loc_2 = null;
            var _loc_4:String = null;
            if (!_loc_4)
            {
            }
            if (_loc_3 || param1)
            {
            }
            param1 = param1 + ("?cachebuster=" + Math.round(Math.random() * 10000));
            _loc_2 = new URLLoader();
            ;
            _loc_3 = _loc_2;
            _loc_2 = param1;
            _loc_2++;
            if (null & _loc_3 || param1)
            {
                do
                {
                    
                    return;
                    
                    _loc_2.load(new URLRequest(param1));
                }
            }while (true)
            
            _loc_2.addEventListener(SecurityErrorEvent.SECURITY_ERROR, this._-Bi);
            do
            {
                
                _loc_2.addEventListener(IOErrorEvent.IO_ERROR, this._-2A);
                ;
                _loc_3++;
                _loc_3 = (-_loc_3 == null) * _loc_2;
                if (null)
                {
                    continue;
                    _loc_2.addEventListener(Event.COMPLETE, this._-Ca);
                }
            }while (true)
            return;
        }// end function

        protected function _-Ca(event:Event) : void
        {
            ;
            with (false)
            {
                _loc_2--;
                var _loc_4:* = _loc_3;
                var _loc_5:* = event & _loc_2;
                var $e:* = event;
                try
                {
                    this._-3Z = new XML(currentTarget.data);
                    if (_loc_5)
                    {
                        ;
                        _loc_4--;
                        null.dispatchEvent(new true.ReadXMLEvent( >= ( < ReadXMLEvent._-0R * _loc_3), {}));
                    }
                }
                catch (e)
                {
                    ;
                    _loc_2--;
                    ReadXMLEvent._-9Q.dispatchEvent(new "errorID".ReadXMLEvent(_-0._-0n($e), {errorText:_-0, this:_loc_3._-9G($e)}));
                }
                return;
                return;
        }// end function

        protected function _-2A(event:IOErrorEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2++;
            var _loc_3:* = (_loc_2 + 1) >>> new activation;
            if (!_loc_3)
            {
                do
                {
                    
                    return;
                    
                    this._-0.get(event.text);
                    ;
                    _loc_2++;
                    _loc_2++;
                    _loc_2++;
                    _loc_2--;
                    _loc_2 = _loc_2 - _loc_2;
                    if (null || false)
                    {
                    }while (true)
                    
                    ;
                    _loc_2 = event.text;
                    _loc_2--;
                    null.dispatchEvent(new null.ReadXMLEvent(null, {:, ReadXMLEvent._-9A:"errorID"._-9G(this._-0._-0n(event.text) + (this._-0 in "errorText" as _loc_2))}));
                }
            }
            ;
            this._-6M = false;
            return;
        }// end function

        protected function _-Bi(event:SecurityErrorEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = null[false];
            var _loc_3:Number = NaN;
            if (!_loc_3)
            {
                do
                {
                    
                    return;
                    
                    ;
                    _loc_2++;
                    _loc_2--;
                    dispatchEvent(new ReadXMLEvent(ReadXMLEvent._-V, {typeof("errorID" >= this):_loc_2._-0._-0n(event.text), errorText:this._-0._-9G(event.text)}));
                    if (!_loc_2)
                    {
                        ;
                        _loc_2++;
                        _loc_2--;
                        _loc_2++;
                    }
                }
            }while (true)
            this._-6M = false;
            return;
        }// end function

    }
}
