const contentButton = document.getElementById("contentButton");
const spinner = document.getElementById("spinner");
const customButton = document.getElementById("customButton");

var headers;

async function validateForm(){
  let valid = false;

  try {


    


    if(valid){
      console.log("KR button onClick : ",true)
      return true;
    }else{
      console.log("KR button onClick : ",false)
      return false;
    }
  } catch (error) {
    console.log(error);
  }
}

window.onload = function(){
  KR.button.onClick(validateForm);

}

document.getElementById("customButton").addEventListener("click", () => {
  const database = true; // no hay  horario disponible
  contentButton.style.display = "none";
  spinner.style.display = "block";
  // console.log("horario ocupado");
  if (database) {

    
    KR.submit("#form-izipay")
      .then(({ KR }) => {
        KR.onError((event) => {
          console.log("error: ,",event);
          spinner.style.display = "none";
          contentButton.style.display = "block";
          let code = event.errorCode;
          let message = event.errorMessage;
          let myMessage = code + ": " + message;
          console.log(myMessage);
        });
      })
      .catch((error) => console.log("Error: ", error));
  } else {
    console.log("Vuelva a seleccionar um horario");
  }
});

// Event click  -> Continuar
document.getElementById("form").addEventListener("submit", (e) => {
  e.preventDefault();
  const loading = document.getElementById("loading");
  const izi = document.getElementById("form-izipay");
  const correo = document.getElementById("correo").value;
  izi.style.display = "none";
  contentButton.style.display = "none";
  loading.style.display = "block";
  headers = {
    method: "POST",
    body: JSON.stringify({
      email: correo,
    }),
    headers: {
      "Content-type": "application/json",
    },
  };
  console.log(headers);
  fetch(
    "http://localhost/000webhost/proyecto-izipay/api/CreateToken.php",
    headers
  )
    .then((res) => res.json())
    .then((res) => {
      KR.setFormConfig({
        /* set the minimal configuration */
        // "kr-public-key": "44842422:testpublickey_Az8ibtrm5cAhb3aOt1g20oQtgpR14c9TSdPYSVhqFlj2P",
        "kr-post-url-success": "tokenValidado.php",
        formToken: res.formToken,
        "kr-language": "es-ES",
        // "kr-popin": true
      })
      .then(({ KR }) => {
        return KR.attachForm("#form-izipay");
      }) /* add a payment form  to myPaymentForm div*/
      .then(({ KR, result }) => {
        loading.style.display = "none";
        izi.style.display = "block";
        // customButton.textContent = `Pagar $/${monto}.00`;
        // contentButton.style.display = "block";
        return KR.showForm(result.formId);
      })

    })
    .catch((err) => console.log("Error: ", err));
});
