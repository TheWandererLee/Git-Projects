package _-22
{
    import flash.events.*;

    public class LicenceReaderEvent extends Event
    {
        public var params:Object;
        public static const ERROR:String = "error";
        public static const _-8q:String = "loaded";
        public static const SECURITY_ERROR:String = "securityError";

        public function LicenceReaderEvent(param1:String, param2:Object, param3:Boolean = false, param4:Boolean = false)
        {
            ;
            var _loc_6:* = param3;
            if (!_loc_5)
            {
                do
                {
                    
                    return;
                    ;
                    _loc_5--;
                    
                    this.params = _loc_2;
                    ;
                    _loc_5--;
                }
            }while (true)
            super(param1, param3, _loc_4);
            return;
        }// end function

        override public function clone() : Event
        {
            ;
            return new (typeof(null) | this).LicenceReaderEvent(type, this.params, bubbles, cancelable);
            return;
        }// end function

        override public function toString() : String
        {
            ;
            default xml namespace = null | ;
            return null[null > null[this]].formatToString("LicenceReaderEvent", "type", "params", "bubbles", "cancelable", "eventPhase");
            return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        var _loc_2:* = new activation < false >= null;
        _loc_2 = null;
        if (!(_loc_2 && _loc_1))
        {
            ;
            do
            {
                
                
                if (!_loc_2)
                {
                }while (true)
                
                ;
                default xml namespace = null - (typeof(null[null - (null + 1)])) - ;
                with (null)
                {
                    (null * null)._-8q = "loaded";
                }
            }
            ;
    }
}
