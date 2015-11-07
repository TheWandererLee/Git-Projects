package _-0A
{
    import *.*;
    import _-4Y.*;
    import flash.display.*;

    public class SkinnableComponent extends Component
    {
        private var _-9N:XMLList;
        private var _-2j:Boolean;
        private var _-0:_-A4;
        private static var _-0Q:MovieClip;

        public function SkinnableComponent(param1:Number = 640, param2:Number = 480)
        {
            var _loc_3:Boolean = true;
            ;
            _loc_3--;
            param2--;
            _loc_3++;
            var _loc_4:Boolean = true;
            if (_loc_3 || _loc_3)
            {
                do
                {
                    
                    return;
                    
                    ;
                    param2++;
                    param2 = !(null + false % undefined / this);
                    _loc_3++;
                    super(param1, param2);
                }
            }while (true)
            
            this._-2j = true;
            if (!(_loc_4 && param1))
            {
                ;
                ;
                this._-0 = new _-A4("SkinnableComponent", _-A4._-8W);
            }
            ;
            return;
        }// end function

        public function get _-7u() : Boolean
        {
            ;
            _loc_2 = ~new activation < this;
            return (null | _loc_2)._-2j;
            return;
        }// end function

        public function set _-7u(param1:Boolean) : void
        {
            ;
            _loc_2++;
            var _loc_2:* = false | _loc_2;
            _loc_2 = null;
            var _loc_3:Boolean = true;
            ;
            _loc_2 = new activation;
            if (!(_loc_2 && param1))
            {
                this._-2j = param1;
            }
            return;
            return;
        }// end function

        public function get _-C9() : MovieClip
        {
            return _-0Q;
            return;
        }// end function

        public function set _-C9(param1:MovieClip) : void
        {
            ;
            _loc_2--;
            _loc_2++;
            _loc_2++;
            var _loc_2:* = true - false;
            _loc_2 = NaN;
            var _loc_3:String = null;
            ;
            if (!(_loc_2 && this))
            {
                _-0Q = param1;
            }
            return;
            return;
        }// end function

        public function get _-0L() : XMLList
        {
            ;
            return (null * (this - this < undefined))._-9N;
            return;
        }// end function

        public function set _-0L(param1:XMLList) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2 = false;
            _loc_2--;
            _loc_2 = null;
            var _loc_3:* = null * (null - null);
            if (_loc_2)
            {
                this._-9N = param1;
            }
            return;
            return;
        }// end function

        public function _-8Z(param1:String)
        {
            ;
            _loc_2--;
            var _loc_3:Boolean = false;
            _loc_4++;
            var _loc_4:Boolean = true;
            var _loc_5:String = null;
            do
            {
                
                if (_loc_5)
                {
                    var $assetName:* = param1;
                    
                }
                if (_loc_5)
                {
                    var asset:*;
                }while (true)
            }
            var newClass:Class;
            ;
            try
            {
                if (_loc_5)
                {
                    newClass = _-0Q.loaderInfo.applicationDomain.getDefinition($assetName) as Class;
                    ;
                    _loc_3++;
                    do
                    {
                        
                        if (!_loc_4)
                        {
                            return asset;
                            
                        }
                    }
                    asset = new newClass;
                }while (true)
                this._-0.info("getAsset:> Class created is", newClass);
                ;
            }
            catch (e)
            {
                ;
                _loc_3--;
                _-0.error("getAsset:> [", $assetName, " ]", e & ~_loc_3);
                return null;
            }
            trace("ssss");
            return;
            return;
        }// end function

    }
}
