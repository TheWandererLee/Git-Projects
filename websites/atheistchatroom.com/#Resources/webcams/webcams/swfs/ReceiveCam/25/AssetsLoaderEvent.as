package 25
{
    import flash.events.*;

    public class AssetsLoaderEvent extends Event
    {
        public var params:Object;
        public static var ERROR:String = "error";
        public static var 7!:String = "loaded";

        public function AssetsLoaderEvent(param1:String, param2:Object, param3:Boolean = false, param4:Boolean = false)
        {
            ;
            var _loc_5:Boolean = false;
            param2--;
            param3--;
            param4++;
            param3 = !true >= this;
            _loc_5 = null;
            var _loc_6:String = null;
            ;
            param3--;
            param4--;
            param4++;
            if (new activation)
            {
                do
                {
                    
                    return;
                    
                    this.params = param2;
                    ;
                    _loc_5--;
                    param3 = this[null];
                }
            }while (true)
            super(param1, param3, param4);
            ;
            return;
        }// end function

        override public function clone() : Event
        {
            ;
            default xml namespace = this;
            return new (null * (((null *  | _loc_3) <= null) - 1)).AssetsLoaderEvent(type, this.params, bubbles, cancelable);
            return;
        }// end function

        override public function toString() : String
        {
            ;
            _loc_3 = NaN << _loc_1;
            return true[ > NaN].formatToString("AssetsLoaderEvent", "type", "params", "bubbles", "cancelable", "eventPhase");
            return;
        }// end function

        ;
        var _loc_1:Boolean = true;
        var _loc_2:* = null >> (-null instanceof NaN);
        if (!_loc_1)
        {
            ;
            do
            {
                
                
                if (_loc_1)
                {
                }
                else
                {
                }
            }while (true)
    }
}
