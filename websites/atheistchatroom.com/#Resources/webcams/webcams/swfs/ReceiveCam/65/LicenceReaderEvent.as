package 65
{
    import flash.events.*;

    public class LicenceReaderEvent extends Event
    {
        public var params:Object;
        public static const ERROR:String = "error";
        public static const 7!:String = "loaded";
        public static const SECURITY_ERROR:String = "securityError";

        public function LicenceReaderEvent(param1:String, param2:Object, param3:Boolean = false, param4:Boolean = false)
        {
            ;
            param4 = false;
            param2++;
            param2--;
            _loc_5++;
            param3 = param3 instanceof true;
            param4++;
            var _loc_5:String = null;
            var _loc_6:String = null;
            ;
            param2++;
            _loc_5++;
            _loc_5++;
            _loc_5--;
            _loc_5--;
            if (!(null && (_loc_5 - param3) * param4))
            {
                do
                {
                    
                    return;
                    
                    this.params = _loc_2;
                    ;
                    _loc_5--;
                    _loc_2--;
                    param3++;
                    var _loc_4:* = param3 in _loc_2;
                }
            }while (true)
            super(param1, param3, _loc_4);
            ;
            return;
        }// end function

        override public function clone() : Event
        {
            ;
            with (null | )
            {
                default xml namespace = null;
                return new (((null === null) > null) - 1).LicenceReaderEvent(type, this.params, bubbles, cancelable);
                return;
        }// end function

        override public function toString() : String
        {
            ;
            return _loc_3.formatToString("LicenceReaderEvent", "type", "params", "bubbles", "cancelable", "eventPhase");
            return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        var _loc_2:* = (NaN as new activation) + 1;
        if (_loc_1 || _loc_1)
        {
            ;
            do
            {
                
                
                if (_loc_1)
                {
                }while (true)
                
            }
            if (!_loc_1)
            {
            }
            else
            {
                if (LicenceReaderEvent)
                {
                    ;
                }
            }
    }
}
