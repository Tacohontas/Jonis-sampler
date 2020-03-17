// Play sound from pads

function playSound(e) {
  const audio = document.querySelector(`audio[data-key="${e.keyCode}"]`);
  const key = document.querySelector(`.key[data-key="${e.keyCode}"]`);
  if (!audio) return; // stop the function from running.
  audio.currentTime = 0; // Här rewindar vi filen till start ifall ljudfilen körs.
  audio.play(); // Kommer inte spelas igen ifall vi ljudfilen redan körs.
  key.classList.add("playing");
  console.log(e);
}

function removeTransition(e) {
  if (e.propertyName !== "transform") return; // skip it if its not a transform
  console.log(e.propertyName);
  console.log(this);
  this.classList.remove("playing");
}

const keys = document.querySelectorAll(".key");
keys.forEach(key => key.addEventListener("transitionend", removeTransition));

window.addEventListener("keydown", playSound);

// -- Create mode ( create-php ) -- //

function createPad() {
  // const inputNum = document.querySelector(`input[name="pad_amount"]`);
  const padContainer = document.querySelector(".create_area");

  if (padContainer.childElementCount < 16) {
//     padContainer.innerHTML += `
//     <div class="key">
//     <p>Choose sound</p>
//         <select name="sound_${padContainer.childElementCount + 1}" >
//             <option value="boom">boom</option>
//             <option value="clap">clap</option>
//             <option value="hihat">hihat</option>
//             <option value="kick">kick</option>
//             <option value="openhat">openhat</option>
//             <option value="ride">ride</option>
//             <option value="snare">snare</option>
//             <option value="tink">tink</option>
//             <option value="tom">tom</option>
//         </select>
//         <p>Choose keybind</p>
//         <input type="text" name="keybind_${padContainer.childElementCount + 1}" maxlength="1">
// </div>
//     `;
    padContainer.innerHTML += `
    <div class="key">
    <p>Choose sound</p>
    
        <select name="sound_${padContainer.childElementCount + 1}" >
            <option value="boom">boom</option>
            <option value="clap">clap</option>
            <option value="hihat">hihat</option>
            <option value="kick">kick</option>
            <option value="openhat">openhat</option>
            <option value="ride">ride</option>
            <option value="snare">snare</option>
            <option value="tink">tink</option>
            <option value="tom">tom</option>
        </select>
        <p>Choose keybind</p>
        <input type="text" name="keybind_${padContainer.childElementCount + 1}" maxlength="1">
</div>
    `;
  } else {
    alert("Du kan max ha 16 pads!");
  }
}

const submitBtn = document.querySelector(".create_btn");
submitBtn.addEventListener("click", createPad);
