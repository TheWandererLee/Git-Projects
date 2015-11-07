package try20
{
    import flash.events.*;

    public class AssetsLoaderEvent extends Event
    {
        public var params:Object;
        public static var ERROR:String = "error";
        public static var _-8q:String = "loaded";

        public function AssetsLoaderEvent(param1:String, param2:Object, param3:Boolean = false, param4:Boolean = false)
        {
            var _loc_5:Boolean = true;
            ;
            var _loc_6:* = (null as false) + (-(param4 + 1));
            if (_loc_5)
            {
                do
                {
                    
                    return;
                    ;
                    param4--;
                    
                    this.params = param2;
                    ;
                    _loc_5++;
                    if (!(true && _loc_3))
                    {
                    }while (true)
                    super(param1, _loc_3, param4);
                }
            }
            ;
            return;
        }// end function

        override public function clone() : Event
        {
            ;
            return new (null is !(typeof(typeof(null >>> )) - 1)).AssetsLoaderEvent(type, this.params, bubbles, cancelable);
            return;
        }// end function

        override public function toString() : String
        {
            ;
            _loc_3 = NaN;
            return (!( >>> ) == null).formatToString("AssetsLoaderEvent", "type", "params", "bubbles", "cancelable", "eventPhase");
            return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        if (_loc_1)
        {
            do
            {
                
                ;
                with (true)
                {
                    
                    if (!_loc_1)
                    {
                        ;
                        _loc_2 = _loc_2;
                    }
                    if (AssetsLoaderEvent)
                    {
                    }while (true)
                }
            }
    }
}
