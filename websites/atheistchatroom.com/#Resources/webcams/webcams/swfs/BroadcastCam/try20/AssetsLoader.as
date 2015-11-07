package try20
{
    import *.*;
    import _-4Y.*;
    import flash.display.*;
    import flash.errors.*;
    import flash.events.*;
    import flash.net.*;

    public class AssetsLoader extends EventDispatcher
    {
        private var _-65:Array;
        private var _-6N:Array;
        private var _-7S:int;
        private var _-CG:int;
        private var _-9p:Boolean;
        private var _-1F:Array;
        private var _-3X:Boolean;
        private var _-0:_-A4;

        public function AssetsLoader()
        {
            var _loc_1:Boolean = true;
            ;
            var _loc_2:String = null;
            if (!_loc_2)
            {
                do
                {
                    
                    return;
                    
                    this._-1F = new Array();
                }
            }while (true)
            
            ;
            ((null[this] + 1 in null) < null <= null)._-6N = new Array();
            if (_loc_1 || _loc_2)
            {
                do
                {
                    
                    this._-3X = false;
                    continue;
                    
                    continue;
                    default xml namespace = null & null instanceof this;
                }
            }while (true)
            this._-0 = new _-A4("AssetsLoader", _-A4._-8W);
            return;
        }// end function

        public function _-7L(param1:String) : uint
        {
            var _loc_2:Boolean = true;
            ;
            var _loc_2:* = _loc_2;
            _loc_2 = false;
            _loc_2--;
            _loc_2--;
            var _loc_3:String = null;
            if (!(_loc_3 && this))
            {
                do
                {
                    
                    ;
                    if (this._-6N << (-_loc_2) * undefined)
                    {
                        return ((this._-6N << (-_loc_2) * undefined).length - 1);
                        
                    }
                    this._-6N.push(param1);
                    ;
                    _loc_2--;
                    _loc_2--;
                    _loc_2--;
                    if (!(null && null === _loc_3))
                    {
                    }while (true)
                    this._-0.info("addContent:", param1);
                }
            }
            ;
            return;
        }// end function

        public function _-AL(param1:uint) : Bitmap
        {
            ;
            return (null * (null instanceof (this > this in null)) == null)._-1F[param1];
            return;
        }// end function

        public function _-Aa(param1:uint) : MovieClip
        {
            ;
            var _loc_2:String = null;
            var _loc_3:* = _loc_3;
            var _loc_4:* = true is false | null;
            _loc_2 = null;
            if (_loc_4 || this)
            {
                ;
                _loc_2++;
            }
            _loc_2 = new MovieClip();
            if (!(_loc_3 && param1))
            {
                _loc_2.addChild(this._-1F[param1]);
                ;
                if (!(_loc_2 && _loc_2))
                {
                    return _loc_2;
                }
            }
            return this._-1F[param1];
            return;
        }// end function

        public function _-5z(param1:uint) : MovieClip
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2++;
            var _loc_3:* = _loc_2 > null;
            if (_loc_3)
            {
            }
            else
            {
                if (!this)
                {
                    ;
                    _loc_2++;
                    _loc_2++;
                    ((this._-0 == null) + 1).info("Got SWF");
                }
                return this._-1F[param1] as MovieClip;
                return;
        }// end function

        public function _-0s(param1:uint, param2:String)
        {
            ;
            var _loc_3:Boolean = false;
            param2 = true;
            _loc_4--;
            param2 = typeof(null / null);
            var _loc_5:String = null;
            var _loc_6:String = null;
            _loc_3 = new activation;
            do
            {
                
                if (!_loc_5)
                {
                    var assets:* = this._-5z();
                    
                }
                var $assetName:* = param2;
                if (!(_loc_5 && param2))
                {
                }while (true)
                
                ;
                var _loc_4:* = param1;
                _loc_4--;
                var $loaderIdx:* = _loc_3 <= null;
            }
            if (_loc_6)
            {
                do
                {
                    
                    var asset:*;
                }
                continue;
                var newClass:Class;
            }while (true)
            try
            {
                if (!_loc_5)
                {
                    if (_loc_6)
                    {
                        newClass = loaderInfo.applicationDomain.getDefinition() as Class;
                    }
                    asset = new ;
                }
                return ;
            }
            catch (e)
            {
                ;
                _loc_4--;
                ((param1 + 1)).info("getSWFAsset:", e);
                return null;
            }
            return;
            return;
        }// end function

        public function _-61() : void
        {
            ;
            var _loc_2:* = true + false;
            _loc_2 = -(_loc_2 <= null);
            var _loc_3:String = null;
            var _loc_1:int = 0;
            do
            {
                
                if (_loc_1 >= this._-7S)
                {
                    if (!_loc_2)
                    {
                        
                        return;
                        
                        _loc_1++;
                    }
                    if (_loc_3 || _loc_3)
                    {
                    }while (true)
                    
                    if (_loc_3 || _loc_1)
                    {
                        this._-65[_loc_1].load(new URLRequest(this._-6N[_loc_1]));
                        do
                        {
                            
                        }
                        ;
                        _loc_2 = _loc_3;
                        null[null].contentLoaderInfo.addEventListener(IOErrorEvent.IO_ERROR, this._-Bn);
                    }
                    if (!_loc_2)
                    {
                        do
                        {
                            
                            if (!_loc_2)
                            {
                                this._-65[_loc_1].contentLoaderInfo.addEventListener(ProgressEvent.PROGRESS, this._-9M);
                            }while (true)
                            
                        }
                        this._-65[_loc_1].contentLoaderInfo.addEventListener(Event.COMPLETE, this._-5J);
                    }
                }while (true)
                
                ;
            }
            
            this._-65[_loc_1] = new Loader();
            do
            {
                
                _loc_1 = 0;
                if (!_loc_2)
                {
                    do
                    {
                        
                        this._-65 = [];
                    }
                    if (!(_loc_2 && _loc_3))
                    {
                    }while (true)
                    
                    this._-1F = [];
                }
            }while (true)
            
            this._-7S = this._-6N.length;
            if (!_loc_2)
            {
                do
                {
                    
                    this._-9p = false;
                    do
                    {
                        
                        ;
                        _loc_2++;
                        with (true)
                        {
                            null._-CG = this | 0 * false;
                        }while (true)
                        if (this._-3X) goto 44;
                    }
                    this._-3X = true;
                }while (true)
                return;
        }// end function

        private function _-5c(param1:int, param2:String) : Class
        {
            ;
            var _loc_4:* = _loc_3;
            with (false)
            {
                _loc_4++;
                _loc_4--;
                var _loc_5:* = null - true;
                var _loc_6:String = null;
                if (_loc_6 || this)
                {
                    var $loaderIdx:* = param1;
                }
                ;
                _loc_4--;
                with (this instanceof param2)
                {
                    var $className:* = null instanceof null in null;
                    try
                    {
                        return this._-1F[].contentLoaderInfo.applicationDomain.getDefinition() as Class;
                    }
                    catch ($e)
                    {
                        ;
                        var _loc_5:* =  & this;
                        throw new ((null - 1)).IllegalOperationError($e + " definition not found.");
                    }
                    return null;
                    return;
        }// end function

        private function _-5J(event:Event) : void
        {
            ;
            _loc_2++;
            var _loc_3:* = true - false < null;
            _loc_3 = null;
            var _loc_4:String = null;
            var _loc_2:int = 0;
            if (!(_loc_3 && this))
            {
                do
                {
                    
                    return;
                    
                    dispatchEvent(new AssetsLoaderEvent(AssetsLoaderEvent._-8q, {}));
                    if (_loc_4)
                    {
                    }while (true)
                    
                    this._-0.info("Total Contents Load is.." + this._-CG);
                    do
                    {
                        
                    }
                    if (_loc_4 || this)
                    {
                        this._-3X = false;
                        if (!_loc_3)
                        {
                            do
                            {
                                
                                _loc_2++;
                            }while (true)
                            
                            this._-65[_loc_2].contentLoaderInfo.removeEventListener(Event.COMPLETE, this._-5J);
                        }
                    }while (true)
                    
                    if (!(_loc_3 && this))
                    {
                        ;
                        _loc_3 = _loc_2;
                        (-(this._-65 in null) - 1)[null].contentLoaderInfo.removeEventListener(ProgressEvent.PROGRESS, this._-9M);
                        do
                        {
                            
                        }
                        this._-65[_loc_2].contentLoaderInfo.removeEventListener(IOErrorEvent.IO_ERROR, this._-Bn);
                    }
                    do
                    {
                        
                    }while (true)
                    
                    this._-1F[_loc_2] = this._-65[_loc_2].content;
                    do
                    {
                        
                        continue;
                        
                        if (!(this._-65[_loc_2].content == "[object Bitmap]")) goto 377;
                        this._-1F[_loc_2] = Bitmap(this._-65[_loc_2].content);
                    }while (true)
                    
                    if (!(_loc_3 && _loc_3))
                    {
                        
                    }
                    if (!(this._-9p == false)) goto 41;
                }
                if (!_loc_3)
                {
                    _loc_2 = 0;
                }while (true)
                
            }
            if (!(this._-CG == this._-7S)) goto 511;
            ;
            _loc_3--;
            _loc_3++;
            ;
            (this._-CG + 1);
            ;
            return;
        }// end function

        private function _-Bn(event:Event) : void
        {
            var _loc_2:Boolean = true;
            ;
            _loc_2--;
            var _loc_2:* = _loc_2;
            var _loc_3:* = _loc_2;
            if (_loc_2)
            {
                do
                {
                    
                    return;
                    
                    ;
                    _loc_2--;
                    _loc_2--;
                    _loc_2++;
                    dispatchEvent(new AssetsLoaderEvent(AssetsLoaderEvent.ERROR, {"errorID" is this._-0:false._-0n(event.toString()), errorText:this._-0._-9G(event.toString())}));
                    ;
                    _loc_2++;
                    if (_loc_2 || event >= undefined)
                    {
                    }while (true)
                    this._-0.get(event.toString());
                }
            }
            ;
            return;
        }// end function

        private function _-9M(event:Event) : void
        {
            return;
            return;
        }// end function

    }
}
