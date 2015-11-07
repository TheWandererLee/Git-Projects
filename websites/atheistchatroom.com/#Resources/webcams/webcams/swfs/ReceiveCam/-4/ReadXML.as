package -4
{
    import "%.*;
    import 19.*;
    import 65.*;
    import flash.events.*;
    import flash.net.*;

    public class ReadXML extends EventDispatcher
    {
        protected var _20$:String;
        protected var 66:Boolean = false;
        protected var set20:Boolean = true;
        protected var ^!:XML;
        private var 9,:4;

        public function ReadXML(param1:String = null)
        {
            ;
            _loc_2--;
            _loc_2--;
            var _loc_2:* = -(true >> _loc_2) in _loc_2;
            var _loc_3:Boolean = false;
            if (!(_loc_2 && param1))
            {
                do
                {
                    
                    return;
                    
                }while (true)
                
                this._20$ = param1;
                ;
                _loc_2++;
                _loc_2++;
                _loc_2++;
                if (!(-true))
                {
                }
                if (param1)
                {
                    do
                    {
                        
                        if (!(param1 == null)) goto 52;
                        if (!_loc_2)
                        {
                            this._20$ = "ReadXMLFile";
                        }
                    }
                    if (!(_loc_2 && _loc_2))
                    {
                        continue;
                        continue;
                        _loc_2++;
                        _loc_2 = new activation;
                        _loc_2--;
                        _loc_2++;
                        _loc_2--;
                        
                    }
                }
            }while (true)
            this.9, = new 4("ReadXML");
            ;
            return;
        }// end function

        public function get 3-() : String
        {
            ;
            return (null === null - ((null as ~(null - (null <= this == null) >= null)) > null))._20$;
            return;
        }// end function

        public function set 3-(param1:String) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = ~false;
            _loc_2--;
            _loc_2--;
            var _loc_3:* = null ^ null - (null as null);
            if (_loc_2)
            {
                this._20$ = param1;
            }
            return;
            return;
        }// end function

        public function get ]() : Boolean
        {
            ;
            _loc_2 = _loc_1;
            return (null - ((null & !this == null) == null) > null).66;
            return;
        }// end function

        public function set ](param1:Boolean) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2--;
            _loc_2--;
            var _loc_2:* = _loc_2;
            _loc_2--;
            var _loc_3:* = false - _loc_2;
            ;
            _loc_2++;
            _loc_2 = null;
            _loc_2--;
            _loc_2--;
            if (!(_loc_3 && _loc_3))
            {
                this.66 = param1;
            }
            return;
            return;
        }// end function

        public function get _20get() : Boolean
        {
            ;
            return ((_loc_2 | _loc_3) - 1).set20;
            return;
        }// end function

        public function set _20get(param1:Boolean) : void
        {
            ;
            _loc_2--;
            _loc_2--;
            _loc_2++;
            var _loc_2:* = ~(!(null - null * (true * false)));
            var _loc_3:String = null;
            if (_loc_3)
            {
                this.set20 = param1;
            }
            return;
            return;
        }// end function

        public function get xmlData() : XML
        {
            ;
            return _loc_1.^!;
            return;
        }// end function

        public function set xmlData(param1:XML) : void
        {
            var _loc_2:Boolean = true;
            ;
            var _loc_3:* = null & false << new activation;
            _loc_2--;
            _loc_3 = null * (null in null);
            ;
            var _loc_2:String = null;
            with (param1)
            {
                _loc_2 = null;
                _loc_2--;
            }
            if (!(_loc_3 && _loc_2))
            {
                this.^! = param1;
            }
            return;
            return;
        }// end function

        public function =$() : void
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = null * ((!false is this === (undefined + 1)) <= null);
            if (_loc_1)
            {
                do
                {
                    
                    return;
                    
                    ;
                    (null >> ((( + 1) | this) << (_loc_3 + 1))).trace("***********************************");
                    if (_loc_1)
                    {
                    }while (true)
                    
                    trace(XML(this.^!));
                }
                if (!_loc_1)
                {
                    ;
                    _loc_3 = null[null + null][true];
                }
                if (this)
                {
                    ;
                    trace("resultHandler: ********************");
                }
            }
            ;
            return;
        }// end function

        public function 4!(param1:String, param2:String, param3:String = ".xml") : void
        {
            ;
            param3--;
            param3++;
            param2--;
            var _loc_4:Number = undefined;
            var _loc_5:* = param2;
            do
            {
                
                return;
                if (false)
                {
                    
                    this.readXMLFromURL2(param1 + param2 + param3);
                    if (!_loc_4)
                    {
                        if (!_loc_4)
                        {
                        }while (true)
                        
                        ;
                        param3 = this;
                        param3--;
                        param2--;
                        if (null.charAt(0) == ".") goto 36;
                    }
                    param3 = "." + param3;
                }
                ;
                if (!(param1.length > 0)) goto 63;
                ;
                param2 = param1.length;
                _loc_4--;
                param3 = -param1;
                _loc_4 = param2;
                if (param1.charAt((_loc_4 - 1)) == "/") goto 63;
                param1 = param1 + "/";
                ;
            }
            return;
        }// end function

        public function readXMLFromURL2(param1:String) : void
        {
            var _loc_3:Boolean = true;
            ;
            _loc_2--;
            _loc_2--;
            var _loc_2:Boolean = false;
            var _loc_3:Boolean = false;
            _loc_2++;
            var _loc_4:String = null;
            if (_loc_3 || param1)
            {
                if (this.set20)
                {
                    if (!(_loc_4 && _loc_3))
                    {
                        if (_loc_3 || _loc_2)
                        {
                            ;
                            _loc_2++;
                            _loc_3 = Math.round(Math.random() * 10000);
                            _loc_2++;
                            _loc_3--;
                            _loc_3++;
                            _loc_2++;
                        }
                        param1 = null + (null + (param1 + ("?cachebuster=" - 1)));
                    }
                }
            }
            _loc_2 = new URLLoader();
            if (!_loc_4)
            {
                do
                {
                    
                    return;
                    
                    _loc_2.load(new URLRequest(param1));
                    if (_loc_3)
                    {
                    }while (true)
                    
                    _loc_2.addEventListener(SecurityErrorEvent.SECURITY_ERROR, this.]5);
                }
            }
            do
            {
                
                ;
                _loc_2 = this.75 + 1;
                _loc_2 = _loc_2 % IOErrorEvent.IO_ERROR;
                _loc_2++;
                _loc_2++;
                _loc_2++;
                _loc_3--;
                null.addEventListener(null, null);
                continue;
                _loc_2.addEventListener(Event.COMPLETE, this.^9);
            }while (true)
            return;
        }// end function

        protected function ^9(event:Event) : void
        {
            ;
            with (false)
            {
                var _loc_4:Boolean = true;
                _loc_4--;
                _loc_4++;
                _loc_4 = _loc_4;
                var _loc_5:Boolean = true;
                var $e:* = event;
                try
                {
                    this.^! = new XML(currentTarget.data);
                    if (_loc_5 || _loc_3)
                    {
                        ;
                        _loc_3--;
                        with (null & -(-~null) instanceof -null)
                        {
                            _loc_3--;
                            dispatchEvent(new ReadXMLEvent(ReadXMLEvent.?&, {}));
                        }
                    }
                    catch (e)
                    {
                        ;
                        _loc_4++;
                        _loc_4--;
                        _loc_3--;
                        _loc_2++;
                        dispatchEvent(new ReadXMLEvent(ReadXMLEvent.%3, {errorID:9,.3%($e), errorText:(9, - (-_loc_4 + 1)).4"($e)}));
                    }
                    return;
                    return;
        }// end function

        protected function 75(event:IOErrorEvent) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            _loc_2--;
            _loc_2--;
            _loc_2++;
            var _loc_3:* = _loc_2;
            if (!(_loc_3 && _loc_3))
            {
                do
                {
                    
                    return;
                    
                    this.9,.do20(event.text);
                    ;
                    _loc_2--;
                    _loc_2--;
                    var _loc_2:Number = NaN;
                    if (!(event && event))
                    {
                    }while (true)
                    
                    ;
                    _loc_2++;
                    _loc_2--;
                    _loc_2++;
                    dispatchEvent(new (ReadXMLEvent."8 instanceof {errorID:this.9,.3%(event.text), errorText:this.9,.4"(event.text)}).ReadXMLEvent(NaN, _loc_2 << true));
                }
                if (_loc_2)
                {
                    ;
                    this.66 = false;
                }
            }
            return;
        }// end function

        protected function ]5(event:SecurityErrorEvent) : void
        {
            ;
            default xml namespace = true * false;
            var _loc_2:* = null % (null >> null)[_loc_2];
            _loc_2--;
            _loc_2 = null + null;
            var _loc_3:String = null;
            if (_loc_3 || _loc_2)
            {
                do
                {
                    
                    return;
                    
                    ;
                    _loc_2++;
                    _loc_2 = _loc_2;
                    _loc_2++;
                    _loc_2++;
                    _loc_2++;
                    dispatchEvent(new _loc_2.ReadXMLEvent(ReadXMLEvent.?0, {errorID:this.9,.3%(event.text), errorText:this.9,.4"(event.text)}));
                    if (!_loc_3)
                    {
                        ;
                        var _loc_2:* = _loc_3;
                        _loc_2++;
                        _loc_2++;
                    }
                    if (_loc_2)
                    {
                    }while (true)
                    this.66 = false;
                }
            }
            ;
            return;
        }// end function

    }
}
