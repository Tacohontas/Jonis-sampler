    function playSound(e) {
        const audio = document.querySelector(`audio[data-key="${e.keyCode}"]`);
        const key = document.querySelector(`.key[data-key="${e.keyCode}"]`);
        if (!audio) return; // stop the function from running.
        audio.currentTime = 0; // Här rewindar vi filen till start ifall ljudfilen körs.
        audio.play(); // Kommer inte spelas igen ifall vi ljudfilen redan körs.
        key.classList.add('playing');
      }
  
      function removeTransition(e) {
        if (e.propertyName !== 'transform') return; // skip it if its not a transform
        console.log(e.propertyName);
        console.log(this);
        this.classList.remove('playing');
      }
  
      const keys = document.querySelectorAll(".key");
      keys.forEach(key => key.addEventListener('transitionend', removeTransition));
  
  
      window.addEventListener("keydown", playSound);
  