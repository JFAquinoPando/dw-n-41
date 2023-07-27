// https://www.tupi.com.py/inventiva/identidad.php?ci=4301891

documento = document.querySelector("#documento");


documento.addEventListener("focusout", (e) => {
    e.preventDefault();
    fetch("http://localhost/dw-n-41/peticion.php?documento=" + e.target.value)
        .then(cabecera => cabecera.json())
        .then(
            datos => {
                console.log("Datos", datos);
                if (datos?.NOMBRE !== undefined) {
                    if (datos.RUC !== null) {
                        document.querySelector("#respuesta").textContent = `${datos.NOMBRE}, tiene RUC y es: ${datos.RUC}`
                    } else {
                        document.querySelector("#respuesta").textContent = `${datos.NOMBRE}, no tiene RUC`
                    }

                    if (datos.guardado) {
                        confetti({
                            particleCount: 100,
                            spread: 70,
                            origin: { y: 0.6 },
                          });
                    }
                }else{
                    alert("Debes añadir un valor")
                }
            }
        )
})





