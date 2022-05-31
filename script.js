const projetstitre = document.querySelector(".t2");
const projets = document.querySelector(".projets");

projetstitre.addEventListener("click", () => {
  projets.classList.add("projetsapp");
});

window.addEventListener("click", (e) => {
  console.log(e.target.nodeName);
  if (e.target.nodeName === "I") {
    projets.style.display = "none";
  }
});
