jQuery(document).ready(function() {
    setInterval(willowTick, 17);
    var willowSlide = 0, willowInt = 0, willowSliding = true, willowSlideRight = false;
    
    function willowTick() {
        willowInt++;
        if (willowSliding) {
            willowSlide = willowMix(willowSlide,(willowSlideRight?0:-300),0.1);
            
            if (willowSlide+300 < 2 && !willowSlideRight) {
                
                willowSliding = false; willowSlide = -300; willowSlideRight = true;
            } else if (willowSlide > -2 && willowSlideRight) {
                
                willowSliding = false; willowSlide = 0; willowSlideRight = false;
            }
            
            document.getElementById('willowSliderCon').style.left = Math.round(willowSlide) + 'px';
        }
        
        if (willowInt >= 300) { willowSliding = true; willowInt = 0; }
    }
    
    function willowMix(num1, num2, amt) {
        return num1*(1-amt)+num2*amt;
    }
});