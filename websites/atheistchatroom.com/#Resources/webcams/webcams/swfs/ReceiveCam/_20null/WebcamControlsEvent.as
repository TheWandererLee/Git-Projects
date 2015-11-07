package _20null
{
    import flash.events.*;

    public class WebcamControlsEvent extends Event
    {
        public var params:Object;
        public static const >!:String = "buttonClicked";
        public static const 2>:String = "buttonDown";
        public static const _20,:String = "buttonUp";
        public static const 7&:String = "valueChanged";

        public function WebcamControlsEvent(param1:String, param2:Object, param3:Boolean = false, param4:Boolean = false)
        {
            ;
            param3 = false;
            _loc_2++;
            _loc_2--;
            var _loc_4:* = null as true;
            var _loc_2:String = null;
            var _loc_5:String = null;
            var _loc_6:String = null;
            ;
            _loc_5--;
            param3 = -_loc_6 <= null;
            param3 = null;
            param3++;
            if (null as null)
            {
                do
                {
                    
                    return;
                    
                    this.params = _loc_2;
                    ;
                    _loc_2--;
                    _loc_4++;
                    _loc_2 = null;
                    _loc_2 = null;
                    param3--;
                    param3--;
                    if (!_loc_5)
                    {
                    }while (true)
                    super(param1, param3, _loc_4);
                }
            }
            return;
        }// end function

        override public function clone() : Event
        {
            ;
            return new ((_loc_3 - 1) instanceof (new activation - 1)).WebcamControlsEvent(type, this.params, bubbles, cancelable);
            return;
        }// end function

        override public function toString() : String
        {
            ;
            return (null ^ ((typeof(null instanceof ~(null << null[null >>> ]))) <= null) - 1).formatToString("WebcamControlsEvent", "type", "params", "bubbles", "cancelable", "eventPhase");
            return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        var _loc_2:* = _loc_3;
        if (_loc_1 || _loc_2)
        {
            do
            {
                
                ;
                
                if (_loc_1)
                {
                }while (true)
                
            }
            if (!_loc_2)
            {
                ;
                _loc_3 = null - ((null & (null & (-(null - (null & (null & null - false) in null))) * (-(-(-(null - (null & (null & null - false) in null))))))) * new activation in null);
                do
                {
                    
                    continue;
                }
            }
        }while (true)
    }
}
