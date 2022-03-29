var lightIcon = "fa-moon";
var darkIcon = "fa-sun";

function tailwindToggle(){
  if (localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
    document.documentElement.classList.add("dark");
    document.getElementById("darkmode").classList.add(darkIcon);
    document.getElementById("logo").src="./resources/logos/logo_large_darkmode.png"
    console.log("Darkmode[tailwindToggle]: Enabled");
  } else {
    document.documentElement.classList.remove("dark");
    document.getElementById("darkmode").classList.add(lightIcon);
    document.getElementById("logo").src="./resources/logos/logo_large_whitemode.png"
    console.log("Darkmode[tailwindToggle]: Disabled");
  }
}

function darkmodeEnabled() {
  document.documentElement.classList.add("dark");
  document.getElementById("darkmode").classList.remove(lightIcon);
  document.getElementById("darkmode").classList.add(darkIcon);
  document.getElementById("logo").src="./resources/logos/logo_large_darkmode.png"
}

function darkmodeDisabled() {
  document.documentElement.classList.remove("dark");
  document.getElementById("darkmode").classList.remove(darkIcon);
  document.getElementById("darkmode").classList.add(lightIcon);
  document.getElementById("logo").src="./resources/logos/logo_large_whitemode.png"
}

if (localStorage.getItem('isDarkmode') === null) {
  tailwindToggle();
} else {
  if (localStorage.getItem('isDarkmode') === "true"){
    darkmodeEnabled();
    console.log("Darkmode[local]: Enabled");
  } 
    
  if (localStorage.getItem('isDarkmode') === "false") {
    darkmodeDisabled();
    console.log("Darkmode[local]: Disabled");
  }
}





function darkmodeToggle() {
  document.documentElement.classList.toggle("dark");

  if (document.documentElement.classList.contains("dark")) {
    darkmodeEnabled();
    localStorage.setItem('isDarkmode', true);
    console.log("Darkmode[Button]: Enabled");
  } else {
    darkmodeDisabled();
    localStorage.setItem('isDarkmode', false);
    console.log("Darkmode[Button]: Disabled");
  }
}
