package _-22
{
    import flash.events.*;

    public class ReadXMLEvent extends Event
    {
        public var params:Object;
        public static const _-9Q:String = "error";
        public static const _-9A:String = "io_error";
        public static const _-0R:String = "loaded";
        public static const _-V:String = "s_error";

        public function ReadXMLEvent(param1:String, param2:Object, param3:Boolean = false, param4:Boolean = false)
        {
            ;
            _loc_5--;
            param2 = true & false;
            var _loc_5:* = null ^ null;
            var _loc_6:String = null;
            if (!_loc_5)
            {
                do
                {
                    
                    return;
                    ;
                    param2--;
                    _loc_4++;
                    
                    this.params = param2;
                    ;
                    param3--;
                    _loc_3++;
                    if (!(_loc_4 && (undefined - 1)))
                    {
                    }while (true)
                    super(param1, _loc_3, _loc_4);
                }
            }
            return;
        }// end function

        override public function clone() : Event
        {
            ;
            with (NaN)
            {
                return new new activation.ReadXMLEvent(type, this.params, bubbles, cancelable);
                return;
        }// end function

        override public function toString() : String
        {
            ;
            return (null * (((null as null[]) + 1 in null) < null)).formatToString("ReadXMLEvent", "type", "params", "bubbles", "cancelable", "eventPhase");
            return;
        }// end function

        ;
        var _loc_1:* = true * false + 1 >>> null;
        var _loc_2:String = null;
        if (_loc_2)
        {
            do
            {
                
                
                if (!_loc_2)
                {
                }
                else
                {
                    if (_loc_2)
                    {
                    }while (true)
                    
                }
                if (!_loc_1)
                {
                    do
                    {
                        
                    }
                    if (_loc_1)
                    {
                    }
                    else
                    {
                    }
                    continue;
                }while (true)
    }
}
