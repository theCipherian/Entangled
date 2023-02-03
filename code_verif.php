<style>
@import url("assets/styles/aurenso.css");

.grudge{
  position:absolute;
  margin:0 auto;
  left:0;
  right:0;
  display:flex;
  height:100%;
  align-items:center;
  justify-content:center;
  top:0;
  bottom:0;
  background: #ffffff;
}

fieldset {
  border: none;
}

legend {
  font-size: 0;
}

.grudge-1{
  width: 3rem;
  height: 3rem;
  font-size: 2rem;
  text-align: center;
  border: none;
  border-radius: 0.5rem;
  background: rgba(0,0,0,0.05);
}
.grudge {
    padding: 3rem 2rem;
  }

@media only screen and (min-width: 600px) {
  .grudge {
    padding: 3rem 2rem;
  }
  
  .grudge-1 {
    width: 4rem;
    height: 4rem;
    font-size: 3rem; 
  }
  
  .grudge-1 + .grudge-1 {
    margin-left: 1rem;
  }
}

.grudge-1::-webkit-outer-spin-button,
.grudge-1::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}
</style>
  <div style='z-index:99999;' id="toasts_2"></div>
<div class='grudge' style='flex-direction:column;align-items:flex-start'>
  <div style='display:flex;flex-direction:column;'>
    <h3 style='margin-right:1rem'>ENTER - CODE</h3>
    <br> 
  <fieldset name='number-code' data-number-code-form>
    <legend>Number Code</legend>
    <input class='grudge-1 number_1' type="number" min='0' max='9' name='number-code-0' data-number-code-input='0' required />
    <input class='grudge-1 number_2' type="number" min='0' max='9' name='number-code-1' data-number-code-input='1' required />
    <input class='grudge-1 number_3' type="number" min='0' max='9' name='number-code-2' data-number-code-input='2' required />
    <input class='grudge-1 number_4' type="number" min='0' max='9' name='number-code-3' data-number-code-input='3' required />
  </fieldset>
</div>
<div class="note"><i class="uil uil-exclamation-triangle"></i> Check email for verification code</div>
<br>
<input type="button" class="sub_4" name="submit" value="submit" />
</div>
<script>

var toasts__ = document.getElementById('toasts_2')

// button__.addEventListener('click', () => createNotification())

function createNotification2(message) {
    var notif = document.createElement('div')
    notif.classList.add('toast')

    notif.innerText = message;

    toasts__.appendChild(notif)

    setTimeout(() => {
       notif.remove()
    }, 1000);
}
// Elements
let number_1, number_2, number_3, number_4, sub_4;

number_1 = document.querySelector(".number_1");
number_2 = document.querySelector(".number_2");
number_3 = document.querySelector(".number_3");
number_4 = document.querySelector(".number_4");
sub_4 = document.querySelector(".sub_4");

sub_4.addEventListener("click",function(){
  let request = new XMLHttpRequest();
        // Instantiating the request object
        request.open("GET", 'assets/php/data_process.php?n_1='+number_1.value+'&n_2='+number_2.value+'&n_3='+number_3.value+'&n_4='+number_4.value);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // Defining event listener for readystatechange event
        request.onreadystatechange = function() {
            show_pre();
            // Check if the request is compete and was successful
            if(this.readyState === 4 && this.status === 200) {
                // Inserting the response from server into an HTML element
                let convert = JSON.parse(this.responseText); 
                hide_pre();
                createNotification2(convert[0].message);
                if(convert[0].message == 'Signing in'){
                 window.location.href = "aurenso.php";
                }
            }
        };
        // Sending the request to the server
    request.send();
})

const numberCodeForm = document.querySelector('[data-number-code-form]');
const numberCodeInputs = [...numberCodeForm.querySelectorAll('[data-number-code-input]')];

// Event callbacks
const handleInput = ({target}) => {
  if (!target.value.length) { return target.value = null; }
  
  const inputLength = target.value.length;
  let currentIndex = Number(target.dataset.numberCodeInput);
  
  if (inputLength > 1) {
    const inputValues = target.value.split('');
    
    inputValues.forEach((value, valueIndex) => {
      const nextValueIndex = currentIndex + valueIndex;
      
      if (nextValueIndex >= numberCodeInputs.length) { return; }
      
      numberCodeInputs[nextValueIndex].value = value;
    });
    
    currentIndex += inputValues.length - 2;
  }
 
  const nextIndex = currentIndex + 1;
  
  if(nextIndex < numberCodeInputs.length) {
    numberCodeInputs[nextIndex].focus();
  }
}

const handleKeyDown = e => {
  const {code, target} = e;
  
  const currentIndex = Number(target.dataset.numberCodeInput);
  const previousIndex = currentIndex - 1;
  const nextIndex = currentIndex + 1;
  
  const hasPreviousIndex = previousIndex >= 0;
  const hasNextIndex = nextIndex <= numberCodeInputs.length - 1
  
  switch(code) {
    case 'ArrowLeft':
    case 'ArrowUp':
      if (hasPreviousIndex) {
        numberCodeInputs[previousIndex].focus();
      }
      e.preventDefault();
      break;
      
    case 'ArrowRight':
    case 'ArrowDown':
      if (hasNextIndex) {
        numberCodeInputs[nextIndex].focus();
      }
      e.preventDefault();
      break;
    case 'Backspace':
      if (!e.target.value.length && hasPreviousIndex) {
        numberCodeInputs[previousIndex].value = null;
        numberCodeInputs[previousIndex].focus();
      }
      break;
    default:
      break;
  }
}

// Event listeners
numberCodeForm.addEventListener('input', handleInput);
numberCodeForm.addEventListener('keydown', handleKeyDown);
</script>