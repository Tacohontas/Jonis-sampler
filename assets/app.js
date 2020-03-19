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

// -- Create mode (create.php) -- //


function createPad() {
  const padContainer = document.querySelector(".create_area");

  // Maximum pads allowed = 16.
  if (padContainer.childElementCount < 16) {
    /* create <div class="key"> 
    Then add static HTML to it.  
    */
    const div_key = document.createElement("div");
    div_key.className = "key";
    div_key.innerHTML = `
<p>Pad ${padContainer.childElementCount}</p>
<p>Choose sound</p>

    <select name="sound_${padContainer.childElementCount}" >
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
    </div>
    `;

    // Append child-elements that has input that we need to save if we add another drum pad.
    const input_text = document.createElement("INPUT");
    input_text.setAttribute("type", "text");
    input_text.setAttribute(
      "name",
      `keybind_${padContainer.childElementCount}`
    );
    input_text.setAttribute("maxlength", 1);

    div_key.appendChild(input_text);

    // Append all to padcontainer
    padContainer.appendChild(div_key);
  } else {
    alert("Du kan max ha 16 pads!");
  }
}

const submitBtn = document.querySelector(".create_btn");
submitBtn.addEventListener("click", createPad);
