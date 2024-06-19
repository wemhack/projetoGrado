const sbarHeadFlech = document.querySelector(".sbar_head_flech");
const sbar = document.querySelector(".sbar");
const nbar = document.querySelector(".nbar");
const contenedor = document.querySelector(".contenedor");
const titleInfo = document.querySelector(".title_info");
const titleContext = document.querySelector(".title_context");
const entityInfo = document.querySelector(".entity-info");
const contextoInstitucional = document.querySelector(".contexto-institucional");
const title = document.querySelector(".title");

sbarHeadFlech.addEventListener("click", () => {
  sbar.classList.toggle("collapse");
  nbar.classList.toggle("collapse");
  contenedor.classList.toggle("collapse");
});

titleInfo.addEventListener("click", () => {
  if (entityInfo.classList.contains("move-entity")) {
    entityInfo.classList.remove("move-entity");
    contextoInstitucional.classList.remove("move-entity");
    title.classList.remove("move-title");
  }
});

titleContext.addEventListener("click", () => {
  if (!contextoInstitucional.classList.contains("move-entity")) {
    contextoInstitucional.classList.add("move-entity");
    entityInfo.classList.add("move-entity");
    title.classList.add("move-title");
  }
});

// Función para las Alertas

function alertaError(errores) {
  Swal.fire({
    title: "Campos vacios o con errores",
    text: errores,
    icon: "error",
  });
}

const botonCerrar = document.querySelectorAll(".boton-cerrar");

// Contexto Institucional

const botonContextoInsti = document.querySelector("#boton-contexto-insti");
const formContextoInsti = document.querySelector("#form_contexto_insti");

botonContextoInsti.addEventListener("click", () => {
  formContextoInsti.showModal();
});

botonCerrar.forEach((cerrar) => {
  cerrar.addEventListener("click", () => {
    formContextoInsti.classList.add("cerrar");
    setTimeout(() => {
      formContextoInsti.close();
      formContextoInsti.classList.remove("cerrar");
    }, 600);
  });
});

// Información del Negocio

const botonInfoNegocio = document.querySelector("#boton-info-negocio");
const formInfoNegocio = document.querySelector("#form_info_negocio");

botonInfoNegocio.addEventListener("click", () => {
  formInfoNegocio.showModal();
});

botonCerrar.forEach((cerrar) => {
  cerrar.addEventListener("click", () => {
    formInfoNegocio.classList.add("cerrar");
    setTimeout(() => {
      formInfoNegocio.close();
      formInfoNegocio.classList.remove("cerrar");
    }, 600);
  });
});

// Valores Institucionales

const botonValorInst = document.querySelector("#boton-valor-inst");
const formValorInst = document.querySelector("#form_valor_inst");

botonValorInst.addEventListener("click", () => {
  formValorInst.showModal();
});

botonCerrar.forEach((cerrar) => {
  cerrar.addEventListener("click", () => {
    formValorInst.classList.add("cerrar");
    setTimeout(() => {
      formValorInst.close();
      formValorInst.classList.remove("cerrar");
    }, 600);
  });
});

// Misión y Visión Institucional

const botonMiviInst = document.querySelector("#boton-mivi-inst");
const formMiviInst = document.querySelector("#form_mivi_inst");

botonMiviInst.addEventListener("click", () => {
  formMiviInst.showModal();
});

botonCerrar.forEach((cerrar) => {
  cerrar.addEventListener("click", () => {
    formMiviInst.classList.add("cerrar");
    setTimeout(() => {
      formMiviInst.close();
      formMiviInst.classList.remove("cerrar");
    }, 600);
  });
});

// Botón Metas Institucionales

const botonMetaInst = document.querySelector("#boton-meta-inst");
const formMetaInst = document.querySelector("#form_meta_inst");

botonMetaInst.addEventListener("click", () => {
  formMetaInst.showModal();
});

botonCerrar.forEach((cerrar) => {
  cerrar.addEventListener("click", () => {
    formMetaInst.classList.add("cerrar");
    setTimeout(() => {
      formMetaInst.close();
      formMetaInst.classList.remove("cerrar");
    }, 600);
  });
});

// Botón Objetivos Institucionales

const botonObjetInst = document.querySelector("#boton-objet-inst");
const formObjetInst = document.querySelector("#form_objet_inst");

botonObjetInst.addEventListener("click", () => {
  formObjetInst.showModal();
});

botonCerrar.forEach((cerrar) => {
  cerrar.addEventListener("click", () => {
    formObjetInst.classList.add("cerrar");
    setTimeout(() => {
      formObjetInst.close();
      formObjetInst.classList.remove("cerrar");
    }, 600);
  });
});

// Botón Datos Básicos

const botonDatosBasicos = document.querySelector("#boton-datos-basicos");
const formDatosBasicos = document.querySelector("#form_datos_basicos");

botonDatosBasicos.addEventListener("click", () => {
  formDatosBasicos.showModal();
});

botonCerrar.forEach((cerrar) => {
  cerrar.addEventListener("click", () => {
    formDatosBasicos.classList.add("cerrar");
    setTimeout(() => {
      formDatosBasicos.close();
      formDatosBasicos.classList.remove("cerrar");
    }, 600);
  });
});