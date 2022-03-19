var lightIcon = "fa-regular";
var darkIcon = "fa-solid";

if (localStorage.theme === "dark" || (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
  document.documentElement.classList.add("dark");
  document.getElementById("darkmode").classList.add(darkIcon);
  console.log("Darkmode[Automatic]: Enabled");
} else {
  document.documentElement.classList.remove("dark");
  document.getElementById("darkmode").classList.add(lightIcon);
  console.log("Darkmode[Automatic]: Disabled");
}

function darkmodeToggle() {
  var element = document.documentElement.classList;
  var darkmode = document.getElementById("darkmode");
  element.toggle("dark");

  if (element.contains("dark")) {
    darkmode.classList.remove(lightIcon);
    darkmode.classList.add(darkIcon);

    console.log("Darkmode[Button]: Enabled");
  } else {
    darkmode.classList.remove(darkIcon);
    darkmode.classList.add(lightIcon);

    console.log("Darkmode[Button]: Disabled");
  }
}
