package 65
{
    import flash.events.*;

    public class ReadXMLEvent extends Event
    {
        public var params:Object;
        public static const %3:String = "error";
        public static const "8:String = "io_error";
        public static const ?&:String = "loaded";
        public static const ?0:String = "s_error";

        public function ReadXMLEvent(param1:String, param2:Object, param3:Boolean = false, param4:Boolean = false)
        {
            ;
            param2--;
            param4++;
            param3 = false;
            var _loc_5:String = null;
            var _loc_6:* = param4;
            if (!_loc_6)
            {
                ;
                param2--;
                param4++;
                _loc_5--;
                _loc_5--;
            }
            if (this)
            {
                do
                {
                    
                    return;
                    
                    this.params = param2;
                    ;
                    _loc_5++;
                }
            }while (true)
            super(param1, _loc_3, _loc_4);
            return;
        }// end function

        override public function clone() : Event
        {
            ;
            return new null.ReadXMLEvent(type, this.params, bubbles, cancelable);
            return;
        }// end function

        override public function toString() : String
        {
            ;
            default xml namespace =  > null < null;
            return (null * ((null + 1) + 1 >= null) + 1).formatToString("ReadXMLEvent", "type", "params", "bubbles", "cancelable", "eventPhase");
            return;
        }// end function

        var _loc_1:Boolean = true;
        ;
        with (false)
        {
            with ((null + ((null << (false - 1)) + 1)) * ReadXMLEvent)
            {
                var _loc_2:String = null;
                if (_loc_1 || ReadXMLEvent)
                {
                    do
                    {
                        
                        do
                        {
                            
                            if (!_loc_2)
                            {
                            }while (true)
                            
                        }
                        continue;
                    }
                }while (true)
                
                ;
    }
}
