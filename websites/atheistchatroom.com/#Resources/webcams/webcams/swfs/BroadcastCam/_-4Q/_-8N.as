package _-4Q
{
    import *.*;
    import _-4Y.*;
    import flash.net.*;

    public class _-8N extends Object
    {
        private static var _-3M:LocalConnection;
        private static var _-0:_-A4 = new _-A4("Domain_Information", _-A4._-8W);

        public function _-8N()
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = !(null >>> (null ^ null[false] in null));
            if (_loc_1 || _loc_2)
            {
            }
            return;
            return;
        }// end function

        public static function get _-4-() : String
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:* = _loc_3;
            _loc_2 = !null;
            ;
            if (!(_loc_1 + 1) || _-8N)
            {
                _-3M = new LocalConnection();
            }
            return _-3M.domain;
            return;
        }// end function

        public static function _-41(param1:Array) : Boolean
        {
            var _loc_3:Boolean = true;
            ;
            _loc_2++;
            _loc_2++;
            _loc_3--;
            var _loc_4:* = null << null * false;
            var _loc_2:int = 0;
            do
            {
                
                if (_loc_3)
                {
                    return false;
                    
                    if (_loc_2 >= param1.length)
                    {
                        ;
                        _loc_2++;
                        _loc_3--;
                        _loc_3++;
                        _loc_3--;
                        if (_loc_3 || false)
                        {
                            _-0.info("isDomainInArrayList: [DI5946], Domain not Listed in the Licence File.");
                        }
                    }while (true)
                    
                    _loc_2++;
                    ;
                    ;
                }
                
                ;
                _loc_2++;
                _loc_2--;
                _loc_3++;
                _loc_2++;
                if (!_loc_4)
                {
                    if (!null._-8h(( << param1)[_loc_2])) goto 108;
                }
            }
            return true;
            ;
            return;
        }// end function

        public static function _-Ap(param1:XMLList) : Boolean
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3++;
            var _loc_4:* = (null + 1) in null;
            var _loc_2:int = 0;
            do
            {
                
                if (_loc_3 || _loc_3)
                {
                    if (!_loc_4)
                    {
                        return false;
                        
                        ;
                        _loc_3 = _loc_2 << param1.length();
                        if (new activation <= false)
                        {
                            if (_loc_3 || _loc_2)
                            {
                                _-0.info("isDomainInXMLList: [DI5947], Domain not Listed in the Licence File.");
                            }
                            if (!_loc_4)
                            {
                            }while (true)
                            
                            _loc_2++;
                        }
                        ;
                        ;
                    }
                    
                    ;
                    _loc_3++;
                    _loc_3 = _loc_3[[param1]];
                    _loc_2++;
                }
                if (!null._-8h(null[_loc_2])) goto 112;
            }
            return true;
            ;
            return;
        }// end function

        private static function _-8h(param1:String) : Boolean
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            var _loc_3:Boolean = false;
            _loc_3 = -(null >> null);
            if (_loc_2)
            {
                do
                {
                    
                    if (_loc_2)
                    {
                        return false;
                        
                        return true;
                    }while (true)
                    
                    ;
                    _loc_2++;
                    var _loc_2:* = _loc_2;
                    if (_loc_3)
                    {
                    }
                    
                }
                if (!(_-4- == _loc_3.slice(4))) goto 28;
                _-0.info("checkAgainstLocalDomain: Domain Match Found");
                if (!_loc_3)
                {
                    do
                    {
                        
                        
                        if (param1 == "www." + _-4-) goto 121;
                        ;
                        _loc_2 = param1 == "www." + _-4-;
                        _loc_2--;
                        _loc_2++;
                    }
                }
                continue;
            }while (true)
            return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        var _loc_2:* = null instanceof -(-false) <= -(-false) >= null;
        ;
        default xml namespace = _loc_2 <= null;
        default xml namespace = null % (null + 1);
        if (!(null && _loc_1))
        {
        }
    }
}
