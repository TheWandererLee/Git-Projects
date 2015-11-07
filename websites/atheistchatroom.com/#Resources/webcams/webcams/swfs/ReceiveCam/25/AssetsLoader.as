package 25
{
    import 19.*;
    import flash.display.*;
    import flash.errors.*;
    import flash.events.*;
    import flash.net.*;

    public class AssetsLoader extends EventDispatcher
    {
        private var 45:Array;
        private var ?:Array;
        private var 4&:int;
        private var 2#:int;
        private var -2:Boolean;
        private var !!:Array;
        private var 26:Boolean;
        private var 9,:4;

        public function AssetsLoader()
        {
            ;
            _loc_3 = _loc_1;
            var _loc_1:* = null - (typeof(true | false) + 1);
            var _loc_2:String = null;
            if (!(_loc_1 && _loc_1))
            {
                do
                {
                    
                    return;
                    
                    this.!! = new Array();
                    if (!_loc_2)
                    {
                    }
                    else
                    {
                    }
                }while (true)
                
                this.? = new Array();
                if (!(_loc_1 && this))
                {
                    do
                    {
                        
                        this.26 = false;
                    }
                    continue;
                    
                    continue;
                }while (true)
                this.9, = new 4("AssetsLoader", false);
                return;
        }// end function

        public function _203(param1:String) : uint
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            _loc_2++;
            var _loc_3:Number = false;
            _loc_2++;
            _loc_3 = null ^ NaN;
            if (_loc_2)
            {
                do
                {
                    
                    ;
                    _loc_2 = (typeof(param1)) + 1;
                    _loc_2 = _loc_2;
                    _loc_2--;
                    _loc_3 = this.?;
                    _loc_2--;
                    if (param1 || _loc_2)
                    {
                        return (null.length - 1);
                        
                    }
                    this.?.push(param1);
                    ;
                    _loc_2--;
                    _loc_2--;
                }
            }while (true)
            this.9,.info("addContent:", param1);
            ;
            return;
        }// end function

        public function &'(param1:uint) : Bitmap
        {
            ;
            with (this)
            {
                _loc_3 = null - this * _loc_2 + null;
                return null.!![param1];
                return;
        }// end function

        public function ]+(param1:uint) : MovieClip
        {
            var _loc_3:Boolean = true;
            ;
            _loc_2++;
            _loc_3 = false;
            _loc_2--;
            _loc_3--;
            var _loc_2:* = null + 1;
            _loc_2--;
            var _loc_4:* = _loc_2;
            _loc_2 = null;
            if (!_loc_4)
            {
                ;
                _loc_3--;
                _loc_3++;
                _loc_3++;
                _loc_3++;
            }
            _loc_2 = new MovieClip();
            if (_loc_3 || _loc_3)
            {
                _loc_2.addChild(this.!![param1]);
                ;
                _loc_3--;
                _loc_2 = -(-NaN) - 1;
                if (_loc_3)
                {
                    return _loc_2;
                }
            }
            return this.!![param1];
            return;
        }// end function

        public function ]4(param1:uint) : MovieClip
        {
            ;
            _loc_2--;
            _loc_2++;
            _loc_2--;
            _loc_2--;
            var _loc_2:Number = NaN;
            var _loc_3:* = false ^ _loc_2 in true;
            ;
            _loc_2 = false;
            _loc_2 = null instanceof (_loc_3 == null);
            _loc_2 = -null;
            _loc_2--;
            if (_loc_2 || _loc_2)
            {
                ;
                _loc_2--;
                _loc_2 = -(this.9, + 1);
                _loc_2++;
                null.info("Got SWF");
            }
            return this.!![param1] as MovieClip;
            return;
        }// end function

        public function !-(param1:uint, param2:String)
        {
            ;
            _loc_5++;
            var _loc_3:* = null[(false + 1) >= true == null];
            var _loc_5:* = _loc_4;
            var _loc_6:String = null;
            _loc_3 = new activation;
            do
            {
                
                if (_loc_6 || _loc_3)
                {
                    var assets:* = this.]4();
                    
                }
                if (_loc_6)
                {
                    var $assetName:* = param2;
                }while (true)
                
            }
            var $loaderIdx:* = param1;
            do
            {
                
                ;
                _loc_5--;
                _loc_5--;
                default xml namespace = !null[(_loc_3 + 1)];
                param2 = null;
                var asset:*;
                if (!_loc_5)
                {
                    continue;
                    var newClass:Class;
                }
            }while (true)
            try
            {
                if (_loc_6)
                {
                    newClass = loaderInfo.applicationDomain.getDefinition() as Class;
                }
                asset = new ;
                if (!_loc_5)
                {
                    return ;
                }
            }
            catch (e)
            {
                ;
                _loc_5++;
                param2--;
                _loc_5--;
                param2--;
                _loc_4++;
                this.info("getSWFAsset:", e);
                return null;
            }
            return;
            return;
        }// end function

        public function 73() : void
        {
            var _loc_2:Boolean = true;
            ;
            var _loc_2:* = null - null[false];
            _loc_2++;
            _loc_2 = _loc_2;
            _loc_2 = null;
            var _loc_3:String = null;
            var _loc_1:int = 0;
            if (_loc_2)
            {
                do
                {
                    
                    if (_loc_1 >= this.4&)
                    {
                        
                        return;
                        
                        _loc_1++;
                        if (!_loc_3)
                        {
                        }while (true)
                        
                        this.45[_loc_1].load(new URLRequest(this.?[_loc_1]));
                    }
                    do
                    {
                        
                        if (!(_loc_3 && _loc_2))
                        {
                            this.45[_loc_1].contentLoaderInfo.addEventListener(IOErrorEvent.IO_ERROR, this.#+);
                            do
                            {
                                
                            }
                            ;
                            _loc_2++;
                            _loc_2--;
                            _loc_2++;
                            var _loc_2:* = _loc_2;
                            if (!_loc_2)
                            {
                            }
                            if (_loc_2)
                            {
                                _loc_1[_loc_2].contentLoaderInfo.addEventListener(ProgressEvent.PROGRESS, this.dynamic);
                            }while (true)
                            
                        }
                        this.45[_loc_1].contentLoaderInfo.addEventListener(Event.COMPLETE, this.&5);
                    }while (true)
                    
                    ;
                }
                
                this.45[_loc_1] = new Loader();
                do
                {
                    
                    _loc_1 = 0;
                    do
                    {
                        
                        this.45 = [];
                    }
                }while (true)
                
                this.!! = [];
            }while (true)
            
            this.4& = this.?.length;
            do
            {
                
                this.-2 = false;
                continue;
                
                ;
                _loc_2--;
                (-_loc_3).2# = this;
            }while (true)
            if (this.26) goto 48;
            this.26 = true;
            return;
        }// end function

        private function >$(param1:int, param2:String) : Class
        {
            var _loc_5:Boolean = true;
            ;
            with (null - (null + null % false))
            {
                _loc_5--;
                var _loc_6:* = _loc_3;
                if (!_loc_6)
                {
                    var $loaderIdx:* = param1;
                }
                var $className:* = param2;
                try
                {
                    ;
                    param2++;
                    param2 = null + null + 1;
                    param2++;
                    _loc_3 = null >>> null;
                    return null.!![].contentLoaderInfo.applicationDomain.getDefinition() as Class;
                }
                catch ($e)
                {
                    ;
                    _loc_4++;
                    _loc_4--;
                    _loc_5++;
                    _loc_3 =  != this;
                    throw new null.IllegalOperationError($e + " definition not found.");
                }
                return null;
                return;
        }// end function

        private function &5(event:Event) : void
        {
            ;
            _loc_2--;
            var _loc_2:* = (typeof(null)) + _loc_2;
            _loc_2++;
            var _loc_3:* = true[false] - 1;
            var _loc_4:String = null;
            _loc_2 = 0;
            if (_loc_4 || this)
            {
                do
                {
                    
                    return;
                    
                    dispatchEvent(new AssetsLoaderEvent(AssetsLoaderEvent.7!, {}));
                    if (!_loc_3)
                    {
                    }while (true)
                    
                    this.9,.info("Total Contents Load is.." + this.2#);
                }
                if (!_loc_3)
                {
                    do
                    {
                        
                        if (_loc_2 >= this.4&)
                        {
                            this.26 = false;
                            do
                            {
                                
                                _loc_2++;
                                if (!_loc_3)
                                {
                                }while (true)
                                
                                this.45[_loc_2].contentLoaderInfo.removeEventListener(Event.COMPLETE, this.&5);
                            }
                            if (_loc_4 || _loc_3)
                            {
                            }while (true)
                            
                            ;
                            _loc_3++;
                            _loc_2++;
                            _loc_3++;
                            var _loc_2:* = this.45[_loc_2].contentLoaderInfo;
                            _loc_3--;
                            (null as null).removeEventListener(ProgressEvent.PROGRESS, this.dynamic);
                        }
                        do
                        {
                            
                            this.45[_loc_2].contentLoaderInfo.removeEventListener(IOErrorEvent.IO_ERROR, this.#+);
                            do
                            {
                                
                            }while (true)
                            
                            this.!![_loc_2] = this.45[_loc_2].content;
                            do
                            {
                                
                                continue;
                            }
                            
                            if (_loc_4)
                            {
                                if (!(this.45[_loc_2].content == "[object Bitmap]")) goto 343;
                            }
                            this.!![_loc_2] = Bitmap(this.45[_loc_2].content);
                        }
                    }while (true)
                    
                    if (!_loc_3)
                    {
                    }
                    
                    if (!(this.-2 == false)) goto 44;
                    if (_loc_4 || event)
                    {
                        _loc_2 = 0;
                    }
                }
            }while (true)
            
            ;
            _loc_3++;
            _loc_3++;
            _loc_3++;
            _loc_2--;
            if (null || null - (-(this.2# == this.4& === _loc_4 >= ~_loc_2)))
            {
                ;
                (this.2# + 1);
            }
            ;
            return;
        }// end function

        private function #+(event:Event) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            var _loc_3:* = new activation / _loc_2 >>> _loc_2;
            if (_loc_2)
            {
                do
                {
                    
                    return;
                    
                    ;
                    _loc_2++;
                    _loc_2++;
                    _loc_2++;
                    var _loc_2:* = _loc_2;
                    dispatchEvent(new ( === AssetsLoaderEvent).AssetsLoaderEvent(_loc_3.ERROR, {errorID:this.9,.3%(event.toString()), errorText:this.9,.4"(event.toString())}));
                    ;
                    _loc_2++;
                    _loc_2--;
                    _loc_2--;
                    _loc_2--;
                    _loc_2++;
                }
            }while (true)
            this.9,.do20(event.toString());
            return;
        }// end function

        private function dynamic(event:Event) : void
        {
            return;
            return;
        }// end function

    }
}
