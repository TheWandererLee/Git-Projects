package _-7b
{
    import flash.events.*;

    public class WebcamEvent extends Event
    {
        public var params:Object;
        public static const use20:String = "allowed";
        public static const _-3N:String = "denied";
        public static const _-5w:String = "onNoCamera";
        public static const _-5Y:String = "onNoMicrophone";

        public function WebcamEvent(param1:String, param2:Object, param3:Boolean = true, param4:Boolean = true)
        {
            var _loc_5:Boolean = true;
            ;
            param2--;
            _loc_5++;
            var _loc_6:* = _loc_5;
            ;
            _loc_5--;
            param2--;
            if (!(null && null))
            {
                do
                {
                    
                    return;
                    
                    this.params = param2;
                    ;
                    _loc_4--;
                    param2++;
                }
            }while (true)
            super(param1, param3, _loc_4);
            return;
        }// end function

        override public function clone() : Event
        {
            ;
            return new (null * (null >> null * !)).WebcamEvent(type, this.params, bubbles, cancelable);
            return;
        }// end function

        override public function toString() : String
        {
            ;
            return (~(-(null as null[])) <= null).formatToString("WebcamEvent", "type", "params", "bubbles", "cancelable", "eventPhase");
            return;
        }// end function

        ;
        var _loc_1:* = _loc_1;
        var _loc_2:* = null / true < ~_loc_2;
        if (_loc_2)
        {
            do
            {
                
                
                if (_loc_1)
                {
                    ;
                    default xml namespace = _loc_2;
                }
            }
        }while (true)
        
        if (!_loc_1)
        {
            ;
            ;
            
        }
        ;
    }
}
